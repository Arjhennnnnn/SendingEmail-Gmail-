<h1> 🚀🚀🚀 Generate QrCode </h1>


## Configuration

Run composer require simplesoftwareio/simple-qrcode "~4" to add the package.

    composer require simplesoftwareio/simple-qrcode "~4"
    

## Usage

Using the QrCode Generator is very easy. The most basic syntax is:

    use SimpleSoftwareIO\QrCode\Facades\QrCode;

    // Generate (string $data, string $filename = null)

    QrCode::generate('Make me into a QrCode!');

    QrCode::generate('Make me into a QrCode!', '../public/qrcodes/qrcode.svg');

    
## Format (string $format)

Three formats are currently supported; png, eps, and svg. To change the format use the following code:

    QrCode::format('png');  //Will return a png image
    QrCode::format('eps');  //Will return a eps image
    QrCode::format('svg');  //Will return a svg image

## Size (int $size)

You can change the size of a QrCode by using the size method. Simply specify the size desired in pixels using the following syntax:

    QrCode::size(100);


<h4> try to visit => https://github.com/SimpleSoftwareIO/simple-qrcode/tree/develop/docs/en </h4>

