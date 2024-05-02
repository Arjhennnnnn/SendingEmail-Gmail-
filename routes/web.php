<?php

use App\Http\Controllers\EmailController;
use App\Http\Controllers\GenerateQrCodeController;
use App\Jobs\SlowJob;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    $start = microtime(true);
    SlowJob::dispatch();
    $final = microtime(true);

    dd($start - $final);
});

Route::get('/sendEmail', [EmailController::class, 'sendWelcomeEmail']);


// $generate = QrCode::generate('Make me into a QrCode!');

// return [
//     'qrCode' => $generate
// ];

// return response()->success($generate, 'Ready to Start', 200);
