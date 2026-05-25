<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    // Menampilkan riwayat transaksi
    public function index()
    {
        $transaksis = Transaksi::with('user')->latest()->get();
        return view('transaksi.index', compact('transaksis'));
    }

    // Menampilkan Halaman POS Kasir (Form Transaksi & Keranjang)
    public function create()
    {
        $produks = Produk::where('stok', '>', 0)->get();
        return view('transaksi.create', compact('produks'));
    }

    // Logika Inti Pembuatan Transaksi
    public function store(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|array',
            'qty' => 'required|array',
            'bayar' => 'required|integer|min:1',
        ]);

        // Mulai Database Transaction untuk keamanan dan konsistensi data
        DB::beginTransaction();

        try {
            $totalHarga = 0;
            $detailData = [];

            // 1. Looping barang dari keranjang, Validasi Stok & Hitung Subtotal
            foreach ($request->produk_id as $index => $pid) {
                // Gunakan lockForUpdate untuk menghindari 'Race Condition' saat sistem diakses bersamaan
                $produk = Produk::lockForUpdate()->find($pid);
                $qtyBeli = $request->qty[$index];

                if (!$produk || $produk->stok < $qtyBeli) {
                    throw new \Exception("Stok {$produk->nama_produk} tidak mencukupi. Sisa stok: " . ($produk ? $produk->stok : 0));
                }

                $subtotal = $produk->harga * $qtyBeli;
                $totalHarga += $subtotal;

                $detailData[] = [
                    'produk' => $produk,
                    'qty' => $qtyBeli,
                    'harga' => $produk->harga,
                    'subtotal' => $subtotal
                ];
            }

            // 2. Validasi Pembayaran
            if ($request->bayar < $totalHarga) {
                throw new \Exception("Jumlah uang pembayaran (Rp. " . number_format($request->bayar) . ") kurang dari total tagihan (Rp. " . number_format($totalHarga) . ")!");
            }

            // 3. Simpan data ke tabel Transaksi
            $transaksi = Transaksi::create([
                'kode_transaksi' => 'TRX-' . strtoupper(uniqid()),
                'user_id' => Auth::id(),
                'total' => $totalHarga,
                'bayar' => $request->bayar,
                'kembalian' => $request->bayar - $totalHarga,
            ]);

            // 4. Simpan ke Detail Transaksi dan Kurangi Stok Produk
            foreach ($detailData as $detail) {
                DetailTransaksi::create([
                    'transaksi_id' => $transaksi->id,
                    'produk_id' => $detail['produk']->id,
                    'harga' => $detail['harga'],
                    'qty' => $detail['qty'],
                    'subtotal' => $detail['subtotal'],
                ]);

                // Pengurangan Stok Otomatis
                $detail['produk']->stok -= $detail['qty'];
                $detail['produk']->save();
            }

            // Jika semua lancar, Commit (Simpan paten ke Database)
            DB::commit();

            return redirect()->route('transaksi.show', $transaksi->id)->with('success', 'Transaksi berhasil diproses!');

        } catch (\Exception $e) {
            // Jika ada gagal ditengah jalan, rollback semua proses insert dan update stok
            DB::rollBack();
            return back()->with('error', $e->getMessage())->withInput();
        }
    }

    // Menampilkan Detail Transaksi / Invoice / Struk
    public function show($id)
    {
        $transaksi = Transaksi::with(['details.produk', 'user'])->findOrFail($id);
        return view('transaksi.show', compact('transaksi'));
    }
}