<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class GenerateQrCodeController extends Controller
{
    public function generateQrCOde()
    {
        $qrCOde = QrCode::generate('Make me into a QrCode!');

        return $qrCOde;

    }
}
