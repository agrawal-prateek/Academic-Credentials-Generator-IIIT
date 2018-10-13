<?php
include('phpqrcode/qrlib.php');

function generateQRCode($rollNo, $name, $qrdegree, $encrypted_string){
    $codeContents = $rollNo.$name.$qrdegree.$encrypted_string;
    $fileName = $rollNo;
    $pngAbsoluteFilePath = 'qr_codes/'.$fileName.'.png';
    QRcode::png($codeContents, $pngAbsoluteFilePath, 'QR_ECELEVEL_L', 4);
    file_put_contents('qr_codes/qrcodes.txt', $rollNo."  :  ".$rollNo.$name.$qrdegree.$encrypted_string."\n", FILE_APPEND);
}