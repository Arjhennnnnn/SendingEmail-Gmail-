<?php

namespace App\Http\Controllers;

use App\Jobs\SlowJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;

class EmailController extends Controller
{
    public function sendWelcomeEmail(){

        $start = microtime(true);

        // $toEmail = 'madlangsakay.arjhen05@gmail.com';
        // $message = 'Welcome to Programming Fields';
        // $subject = 'Welcome Email in laravel Using Gmail';

        // $response = Mail::to($toEmail)->send(new WelcomeEmail($message,$subject));

        SlowJob::dispatch();
        $final = microtime(true);

        // dd($response);




        dd($start - $final);
        
    }
}
