<?php
/**
 * Created by PhpStorm.
 * User: prateek
 * Date: 3/13/18
 * Time: 9:01 PM
 */

$path = 'qr_codes/*';
$files = glob($path);
foreach ($files as $file) {
    if (is_file($file)) {
        unlink($file);
    }
}