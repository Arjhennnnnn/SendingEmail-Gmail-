<?php

namespace App\Jobs;

use App\Mail\WelcomeEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SlowJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        $toEmail = 'madlangsakay.arjhen05@gmail.com';
        $message = 'Welcome to Programming Fields';
        $subject = 'Welcome Email in laravel Using Gmail';

        Mail::to($toEmail)->send(new WelcomeEmail($message, $subject));

        // throw new \Exception('Failed');
    }

    public function failed(): void
    {

        info('This job has failed');
    }
}
