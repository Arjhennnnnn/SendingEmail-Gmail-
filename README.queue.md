<h1> 🚀🚀🚀 The Queue Component in Laravel </h1>

## Create a job
<p> Job is a laravel term for a background task </p>


    php artisan make:job SlowJob


[ Job Class ] -> has a constructor and handle method

[ Handle ] -> is going to be executed in the background when the job runs

## Handle Job

<p> Instead of running the heavy or slow work here , we are going to run it inside the job</p>


    public function handle(): void
    {
        
        $toEmail = 'madlangsakay.arjhen05@gmail.com';
        $message = 'Welcome to Programming Fields';
        $subject = 'Welcome Email in laravel Using Gmail';

        Mail::to($toEmail)->send(new WelcomeEmail($message,$subject));

    }

## Dispatch Job

<p> Dispatch Job in your controller </p>


    SlowJob::dispatch();


## The queue configuration are kept under the queue.php


    queue.php


## In order to use the database queue driver, you will need a database table to hold the jobs.


    php artisan queue:table

    php artisan migrate


## Updating the QUEUE_CONNECTION variable in your application's .env file


    QUEUE_CONNECTION=database


## Call queue:work command


    php artisan queue:work


## Delay Job Processing [ chain the delay method ]


    SlowJob::dispatch()->delay(5);
