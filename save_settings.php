<?php

$name = $_POST['name'];
$value = $_POST['value'];
$jsonString = file_get_contents('settings.json');
$data = json_decode($jsonString);
$data->$name = $value;
$newJsonString = json_encode($data);
file_put_contents('settings.json', $newJsonString);