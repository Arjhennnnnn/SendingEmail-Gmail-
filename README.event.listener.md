<h1> 🚀🚀🚀 Event and Listener </h1>

<p> Laravel's events provide a simple [ observer pattern ] implementation, allowing you to subscribe and listen for various events that occur within your application. </p>

## How to use Event and Listener (sample)

sample code

$order = Order::create();

Http::post('https://vendor.com',[
    'order' => $order->toArray();
]);

Http::post('https://company.com',[
    'order' => $order->toArray();
]);

<p> when you send the two post request and if you want to convert this piece of code to use the observer pattern we will need to fire an event</p> 

## Create a Event

    php artisan make:event OrderPlaced


## Create a Listener

    php artisan make:listener UpdateInventoryAboutOrder --event

    php artisan make:listener UpdateVendorAboutOrder --event


<p> and this listener will be listening to OrderPlaced event </p> 

## So First Start with the update vendor and company listener

<p> every listener created will have a constructor and handle method </p>

[ Handle ] -> inside the handle method you can put any business logic you want that is related to that listener

<h4> UpdateVendorAboutOrder </h4>

    public function handle(OrderPlaced $event)
    {
        Http::post('https://vendor.com',[
            'order' => $event->order->toArray();
        ]);

        // or print

        info('Vendor was updated order' . $event->order->id);

    }

<h4> UpdateInventoryAboutOrder </h4>

    public function handle(OrderPlaced $event)
    {
        Http::post('https://company.com',[
            'order' => $event->order->toArray();
        ]);

        // or print

        info('Inventory was updated order' . $event->order->id);

    }

## Event Class (OrderPlaced)

    public function __construct (public Order $order)
    {

    }

<p> and now inside the listeners, the order instance can be extracted from the event instance </p>

<h3> And now we have the listeners created and the event created </h3>

## Dispatch the OrderPlaced event instead by using dispatch method or any arguments that we pass 

    $order = Order::create();

    \App\Events\OrderPlaced::dispatch($order);

## Register the event and it's listeners inside the EventServiceProvider

<p> under the listen property let's register the event and listener </p>

    protected $listen = [

        OrderPlaced::class => [
            UpdateVendorAboutOrder::class,
            UpdateInventoryAboutOrder::class
        ]

    ]

<p> And now we are ready to test our code </p>


## If the event you want to dispatch is related to an eloquent model that's being created, updated or deleted 

<p> Define dispatch events property inside the model class</p>

    class Order extends Model
    {

        protected $dispatchesEvents = [
            'created' => OrderPlaced::class
        ]

    }

##  Handle automatically Registering events and listeners instead of register them inside the EventServiceProvider

<p> you can enable automatic event discovery </p>

    // EventServiceProvider

    public function shouldDiscoverEvents(){

        return true;

    }

<p> laravel finds event listeners by scanning the listener classes will register the handle method of each listener as a listener for the event that is type hinted in the method signature </p>

    // OrderPlaced
    public function handle(OrderPlaced $event)



##  Speed up your application

<p> Send listeners that perform heavy work to the queue </p>
<p> Implementing the shouldqueue interface </p>

    // Listener
    // implements ShouldQueue

    class UpdateVendorAboutOrder implements ShouldQueue

