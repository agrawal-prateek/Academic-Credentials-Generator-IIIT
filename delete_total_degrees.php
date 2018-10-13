<?php
/**
 * Created by PhpStorm.
 * User: prateek
 * Date: 3/13/18
 * Time: 8:04 PM
 */
$dir = 'generated_degrees';
$subdirectories = scandir($dir);
foreach ($subdirectories as $dirtodelete) {
    if ($dirtodelete !== '.' && $dirtodelete !== '..') {
        $path = 'generated_degrees/' . $dirtodelete.'/*';
        $files = glob($path);
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
    }
}