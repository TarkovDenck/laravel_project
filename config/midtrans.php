
<?php
return [

/*
|--------------------------------------------------------------------------
| Midtrans Configuration
|--------------------------------------------------------------------------
|
| Konfigurasi ini digunakan untuk integrasi dengan Midtrans API.
| Pastikan Anda telah menambahkan MIDTRANS_CLIENT_KEY dan MIDTRANS_SERVER_KEY
| ke dalam file .env Anda.
|
*/

    'server_key' => env('MIDTRANS_SERVER_KEY'),
    'client_key' => env('MIDTRANS_CLIENT_KEY'),
    'is_production' => env('MIDTRANS_IS_PRODUCTION', false),
];