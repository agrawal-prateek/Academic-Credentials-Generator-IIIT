<?php

function encrypt($string_to_encrypt){
    $encrypted_string=openssl_encrypt($string_to_encrypt,"AES-128-ECB",'QlzbS3go1qqBfykOxDj');
    return $encrypted_string;
}
function decrypt($encrypted_string){
    $decrypted_string=openssl_decrypt($encrypted_string,"AES-128-ECB",'QlzbS3go1qqBfykOxDj');
    return $decrypted_string;
}

$user_request = $_POST['name'];
if($user_request == 'encrypt'){
    $text =encrypt($_POST['stringtoencrypt']);
    echo $text;
}
elseif ($user_request == 'decrypt'){
    echo decrypt($_POST['stringtodecrypt']);
}
