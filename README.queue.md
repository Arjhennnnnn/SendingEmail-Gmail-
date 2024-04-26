<h1> 🚀🚀🚀 Sending Email through Gmail </h1>

## Create a credentials through gmail

<p> [s.1] Click Manage your Google Account</p>

<p> [s.2] Click Security </p>

<p> [s.3] Click or Search App Password in search bar </p>

<p> [s.4] Create new application -> App name eg. test email </p>

<p> [s.5] Copy the generated app password -> eg. [kxxd rnud satp icbn] </p>

## Env configuration

<p>    [s.1] in this MAIL_USERNAME you will to provide your email address </p>
            
            MAIL_USERNAME=sample@gmail.com

<p>    [s.2] in this MAIL_PASSWORD you will to provide your password that you have generated </p>

            MAIL_PASSWORD=kxxdrnudsatpicbn

<p>    [s.3] in this MAIL_ENCRYPTION you can add [ TLS ] </p>

            MAIL_ENCRYPTION=tls

<p>    [s.4] in this MAIL_HOST you can add [ TLS ] </p>

            MAIL_HOST=smtp.gmail.com

<p>    [s.5] in this MAIL_PORT you can add port by default gmail port [ 587 ] </p>

            MAIL_PORT=587


<p>    [s.6] in this MAIL_FROM_ADDRESS you will to provide same email address </p>
    
            MAIL_FROM_ADDRESS=sample@gmail.com
        

<p>  .env sample </p>

    MAIL_MAILER=smtp
    MAIL_HOST=smtp.gmail.com
    MAIL_PORT=587
    MAIL_USERNAME=sample@gmail.com
    MAIL_PASSWORD=kxxdrnudsatpicbn
    MAIL_ENCRYPTION=tls
    MAIL_FROM_ADDRESS="sample@gmail.com"
    MAIL_FROM_NAME="${APP_NAME}"


## To implement send email , First is Create Mail Class 

    php artisan make:mail WelcomeEmail

## Inside the MailClass

<p> [Construct] -> if we want to receive any parameters from the controller 
    or any function we can receive that directly inside this constuction </p>


<p> [Envelope] -> this subject is based on the given classname </p>

        return new Envelope (
            subject : 'Welcome Email'
        );

<p> further example </p>

<p>    [configuring the sender of the email] [from] </p>

            return new Envelope(
                from: new Address('sample@gmail.com', 'Sample Name'),
                subject: 'Welcome Email',
            );


<p>     [you may also specify a replyTo address] </p>

        return new Envelope(
            from: new Address('sample@gmail.com', 'Sample Name'),
            replyTo: [
                new Address('receiver@gmail.com', 'Receiver Name'),
            ],
            subject: 'Welcome Email',
        );




<p>   [Content] -> inside this content we have this [ view ] option , we can render the blade template </p>

        return new Content (
            view : 'view.email'
        );


<p>    [Attachments] -> so this can be image or pdf for any file </p>

        return [
            Attachment::fromPath('path/to/file')
        ];

    

## Make Emeil Controller

    php aritisan make:controller EmailController

## Define recipient Email Address to whom we will send Email

    use Illuminate\Support\Facades\Mail;
    use App\Mail\WelcomeEmail;

    public function sendWelcomeEmail(){

        $toEmail = 'sample@gmail.com';
        $message = 'Welcome to Programming Fields';
        $subject = 'Welcome Email in laravel Using Gmail';

        Mail::to($toEmail)->send(new WelcomeEmail($message,$subject))

    }


<p>     [s.1] we will have to pass the mail class that we want to call eg.WelcomeEmail </p>
<p>     [s.2] we will pass the $message in the parameter </p>




## and now let's come back to this mail class

<p>    and now we will have to receive that message so we will create one variable  </p>

    public $mailMessage;
    public $subject;


## and we have to capture this parameter in the mail class Constructor

    public function __construct($message,$subject){
        $this->message = $message;
        $this->subject = $subject;

    }

    return new Envelope (
        subject : $this->subject
    );

    return new Content (
        view : 'view.email'
    );

<p>    in mail blade template call the variable you need </p>

        <h4> {{ $subject }} </h4>
        <p> {{ $mailMessage }} </p>



