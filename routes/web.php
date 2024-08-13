<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;


require_once __DIR__ . '/auth.php';

Route::middleware(AdminMiddleware::class)->group(function () {
    require_once __DIR__ . '/admin.php';
    require_once __DIR__ . '/common.php';
});

require_once __DIR__ . '/home.php';

// Route::get('/', function () {
//     return view('welcome');
// });
