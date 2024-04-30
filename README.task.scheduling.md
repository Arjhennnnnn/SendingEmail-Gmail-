<h1> 🚀🚀🚀 Task Scheduling </h1>
<p> If you want to do a task at a [ later point of time but not now ] then you will schedule it at a certain point of time </p>

<p> Using cron-jobs </p>

## Go to App/Console/Kernel
now you can see [ Schedule ] method

    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
    }

<p> whatever we write inside the schedule method , laravel will run it automatically </p>


## Run Every Minute

    $schedule->call(function () {

        info('called every minute');

    })->everyMinute();

## Running the scheduler locally

    php artisan schedule:work


## Executing artisan command

    php artisan make:command HelloWorldCommand

And inside this [ HelloWorldCommand ]

    protected $signature = 'hello:world';

whatever we write here we can call via php artisan

    
[ HelloWorldCommand Handle method ] ->

    public function handle(){

        info('hello world)

    }

And now in App/Console/Kernel schedule method 

    // $schedule->call(function () {

    //  info('called every minute');

    // })->everyMinute();


    //call signature command hello:world
    $schedule->command('hello:world')->everyMinute();


Then Command php artisan schedule:work

## Schedule Frequency Options

try to visit ->

    https://laravel.com/docs/10.x/scheduling#schedule-frequency-options


## Preventing Task Overlaps


    handle(){

        info('hello world before')

        sleep(65)

        info('hello world after')

    }

    Result => 
        hello world before
        hello world before
        hello world after

Schedule command doesn't wait for previous command to be [ completed ] 

<p> Without Overlapping </p>

    $schedule->command('hello:world')->everyMinute()->withoutOverlapping();

## Running Task on One Server

<p> if the scheduler is running on multiple servers or you have implemented load balancing in your server </p>

To prevent run on every server

    $schedule->command('hello:world')
                    ->friday()
                    ->at('17:00)
                    ->onOneServer();


## Background Task

IF you have three task that are schedule at the same time but what happen is one task will get completed then only the second task will be called

    $schedule->command('hello:world')->everyMinute();
    $schedule->command('hello:world')->everyMinute();
    $schedule->command('hello:world')->everyMinute();

<p> If you want all those task [ run at the same time ], you can add runInBackground(); </p>

    $schedule->command('hello:world')->everyMinute()->runInBackground();
    $schedule->command('hello:world')->everyMinute()->runInBackground();
    $schedule->command('hello:world')->everyMinute()->runInBackground();

All the tasks that are scheduled at the same time will run at that specific time , and they will not get any delay


## Maintenance Mode

During the maintenance mode all the scheduler will not get executed but if you want any schedule that needs to be executed whenever we are in the maintenance mode , then you can add this evenInMaintenanceMode();

    $schedule->command('hello:world')->evenInMaintenanceMode();










