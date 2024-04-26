[1] Create a credentials through gmail

    [s.1] Click Manage your Google Account

    [s.2] Click Security

    [s.3] Click or Search App Password in search bar

    [s.4] Create new application -> App name eg. test email

    [s.5] Copy the generated app password -> eg. [kxxd rnud satp icbn]

[2] Env configuration

    [s.1] in this MAIL_USERNAME you will to provide your email address
            
            eg. MAIL_USERNAME=sample@gmail.com

    [s.2] in this MAIL_PASSWORD you will to provide your password that you  
        have generated

            eg. MAIL_PASSWORD=kxxdrnudsatpicbn

    [s.3] in this MAIL_ENCRYPTION you can add [ TLS ]

            eg. MAIL_ENCRYPTION=tls

    [s.4] in this MAIL_HOST you can add [ TLS ]

            eg. MAIL_HOST=smtp.gmail.com

    [s.5] in this MAIL_PORT you can add port by default gmail port [ 587 ]

        eg. MAIL_PORT=587


    [s.6] in this MAIL_FROM_ADDRESS you will to provide same email address
    
        eg. MAIL_FROM_ADDRESS=sample@gmail.com
        

    .env sample

    MAIL_MAILER=smtp
    MAIL_HOST=smtp.gmail.com
    MAIL_PORT=587
    MAIL_USERNAME=sample@gmail.com
    MAIL_PASSWORD=kxxdrnudsatpicbn
    MAIL_ENCRYPTION=tls
    MAIL_FROM_ADDRESS="sample@gmail.com"
    MAIL_FROM_NAME="${APP_NAME}"


[3] To implement send email , First is Create Mail Class

    php artisan make:mail WelcomeEmail

[4] Inside the MailClass

    [Construct] -> if we want to receive any parameters from the controller 
        or any function we can receive that directly inside this constuction


    [Envelope] -> this subject is based on the given classname

        return new Envelope (
            subject : 'Welcome Email'
        );

        further example

        [configuring the sender of the email] [from]

            return new Envelope(
                from: new Address('sample@gmail.com', 'Sample Name'),
                subject: 'Welcome Email',
            );


        [you may also specify a replyTo address]

        return new Envelope(
            from: new Address('sample@gmail.com', 'Sample Name'),
            replyTo: [
                new Address('receiver@gmail.com', 'Receiver Name'),
            ],
            subject: 'Welcome Email',
        );




    [Content] -> inside this content we have this [ view ] option , we can render
        the blade template

        return new Content (
            view : 'view.email'
        );


    [Attachments] -> so this can be image or pdf for any file

        return [
            Attachment::fromPath('path/to/file')
        ];

    

[5] Make Emeil Controller

    php aritisan make:controller EmailController

[6] Define recipient Email Address to whom we will send Email

import : use Illuminate\Support\Facades\Mail;
         use App\Mail\WelcomeEmail;

    public function sendWelcomeEmail(){

        $toEmail = 'sample@gmail.com';
        $message = 'Welcome to Programming Fields';
        $subject = 'Welcome Email in laravel Using Gmail';



        [s.1] we will have to pass the mail class that we want to call eg.WelcomeEmail
        [s.2] we will pass the $message in the parameter

        Mail::to($toEmail)->send(new WelcomeEmail($message,$subject))

    }


[7] and now let's come back to this mail class

    and now we will have to receive that message so we will create one variable 


    public $mailMessage;
    public $subject;


[8] and we have to capture this parameter in the mail class Constructor

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

    in mail blade template call the variable you need

        eg. <h4>{{ $subject }}</h4>
            <p>{{ $mailMessage }}</p>



