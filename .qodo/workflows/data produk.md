# InvalidArgumentException - Internal Server Error

View [data-produk] not found.

PHP 8.3.30
Laravel 13.7.0
loginmultiuser.test:8080

## Stack Trace

0 - vendor\laravel\framework\src\Illuminate\View\FileViewFinder.php:138
1 - vendor\laravel\framework\src\Illuminate\View\FileViewFinder.php:78
2 - vendor\laravel\framework\src\Illuminate\View\Factory.php:150
3 - vendor\laravel\framework\src\Illuminate\Foundation\helpers.php:1100
4 - routes\web.php:50
5 - vendor\laravel\framework\src\Illuminate\Routing\CallableDispatcher.php:39
6 - vendor\laravel\framework\src\Illuminate\Routing\Route.php:247
7 - vendor\laravel\framework\src\Illuminate\Routing\Route.php:218
8 - vendor\laravel\framework\src\Illuminate\Routing\Router.php:822
9 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:180
10 - app\Http\Middleware\CheckRole.php:20
11 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
12 - vendor\laravel\framework\src\Illuminate\Routing\Middleware\SubstituteBindings.php:52
13 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
14 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\PreventRequestForgery.php:104
15 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
16 - vendor\laravel\framework\src\Illuminate\View\Middleware\ShareErrorsFromSession.php:48
17 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
18 - vendor\laravel\framework\src\Illuminate\Session\Middleware\StartSession.php:120
19 - vendor\laravel\framework\src\Illuminate\Session\Middleware\StartSession.php:63
20 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
21 - vendor\laravel\framework\src\Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse.php:36
22 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
23 - vendor\laravel\framework\src\Illuminate\Cookie\Middleware\EncryptCookies.php:74
24 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
25 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:137
26 - vendor\laravel\framework\src\Illuminate\Routing\Router.php:821
27 - vendor\laravel\framework\src\Illuminate\Routing\Router.php:800
28 - vendor\laravel\framework\src\Illuminate\Routing\Router.php:764
29 - vendor\laravel\framework\src\Illuminate\Routing\Router.php:753
30 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Kernel.php:200
31 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:180
32 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\TransformsRequest.php:21
33 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull.php:31
34 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
35 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\TransformsRequest.php:21
36 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\TrimStrings.php:51
37 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
38 - vendor\laravel\framework\src\Illuminate\Http\Middleware\ValidatePostSize.php:27
39 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
40 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance.php:109
41 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
42 - vendor\laravel\framework\src\Illuminate\Http\Middleware\HandleCors.php:61
43 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
44 - vendor\laravel\framework\src\Illuminate\Http\Middleware\TrustProxies.php:58
45 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
46 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\InvokeDeferredCallbacks.php:22
47 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
48 - vendor\laravel\framework\src\Illuminate\Http\Middleware\ValidatePathEncoding.php:28
49 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:219
50 - vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:137
51 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Kernel.php:175
52 - vendor\laravel\framework\src\Illuminate\Foundation\Http\Kernel.php:144
53 - vendor\laravel\framework\src\Illuminate\Foundation\Application.php:1220
54 - public\index.php:20


## Request

GET /DataProduk

## Headers

* **cookie**: XSRF-TOKEN=eyJpdiI6IjQ1WElvS01ZQ1cxVHNXUTJydUFBUkE9PSIsInZhbHVlIjoiamtubDNNeWExb2w3Rmh1ZUNrSFJIUVZMemxQcWc5QlR4ZUovd25KN3YyZW1pWkZGQ2I0dEVKUVhZT0pYRjYxWWlDcnpWcEVXZExrWkhpcVVLRDZoVXVRSlpreGVlcUNVTU1xRUlqQjFvR0N1UUhXNnB4UUNsYUVtTXR5MFJUamoiLCJtYWMiOiIwZjY1MTZlMzhjY2MxMThhMTUyZjVlMzkyYzBkYWZmYmRjZDYzODE4NDhkMzY4MDk4MWNkZWY3NTIwNGMwOGE2IiwidGFnIjoiIn0%3D; laravel-session=eyJpdiI6IkFUWTJQS1VJN3NVRXoxOHdURThiRkE9PSIsInZhbHVlIjoiOCtSc3BTdzlwQ1NMMmVZSVdwRjB5ZHFXbm5RTEpnTEFZY3JBV1lnbUJQNGhkWk9CUjVoek5WWmpZcGg5WDUxV00xUG9VaXRVZmxod2lWRjlTUUFJbCtiYmk3Ylc2S2FPUnhZejJPc01CbHBHUnhibjEzK1hRZTJyWXI0UmY4L1IiLCJtYWMiOiI5ZTM0NGE0ZTU5NGM0OTA3YmQ4ZThiODU3ZWYyNGNkNGIwM2E5ZTI1YTMyZTAxZGEzNjk5MjliYjAwMjJiYzA0IiwidGFnIjoiIn0%3D
* **accept-language**: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7
* **accept-encoding**: gzip, deflate
* **referer**: http://loginmultiuser.test:8080/admin/dashboard
* **accept**: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7
* **user-agent**: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36
* **upgrade-insecure-requests**: 1
* **connection**: keep-alive
* **host**: loginmultiuser.test:8080

## Route Context

controller: Closure
middleware: web, role:admin,kepala_toko

## Route Parameters

No route parameter data available.

## Database Queries

* mysql - select * from `sessions` where `id` = 'YhdqVBlLKdELbSneRJqcpN03UauxQwuBud6F7Mls' limit 1 (3.77 ms)
* mysql - select * from `users` where `id` = 1 limit 1 (1.01 ms)
