<?php

$allowedExts = array("csv", "CSV");
$file_name = $_FILES['file']['name'];
$degree = $_POST["degree"];
$startyear = $_POST["startyear"];
$endyear = $_POST["endyear"];
$extension = '';
for ($i = strlen($file_name) - 1; $i > -1; $i--) {
    if ($file_name[$i] == '.')
        break;
    else
        $extension = $file_name[$i] . $extension;
}

if (in_array($extension, $allowedExts)) {
    if ($_FILES["file"]["error"] > 0) {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    } else {
        $filename = $_FILES["file"]["name"];
        move_uploaded_file($_FILES["file"]["tmp_name"],
            "uploads/" . $filename);
    }
} else {
    echo "Invalid file";
}


 if ($degree == 'phd'){
    $createjsoncommand='python createjson.py '.$degree.' uploads/' . $file_name.' data/'.$degree.'.json';
    exec($createjsoncommand);
 }
 elseif ($degree == 'mba'){
     $degree = 'mba';
     $createjsoncommand='python createjson.py '.$degree.' uploads/' . $file_name.' data/'.$degree.'.json '.$startyear.' '.$endyear;
     exec($createjsoncommand);
 }

 elseif ($degree == 'mtech(an)'){
     $degree = 'mtechan';
     $createjsoncommand='python createjson.py '.$degree.' uploads/' . $file_name.' data/'.$degree.'.json '.$startyear.' '.$endyear;
     exec($createjsoncommand);
 }

 elseif ($degree == 'mtech(is)'){
     $degree = 'mtechis';
     $createjsoncommand='python createjson.py '.$degree.' uploads/' . $file_name.' data/'.$degree.'.json '.$startyear.' '.$endyear;
     exec($createjsoncommand);
 }

 elseif ($degree == 'mtech(dc)'){
     $degree = 'mtechdc';
     $createjsoncommand='python createjson.py '.$degree.' uploads/' . $file_name.' data/'.$degree.'.json '.$startyear.' '.$endyear;
     exec($createjsoncommand);
 }

 elseif ($degree == 'mtech(vlsi)'){
     $degree = 'mtechvlsi';
     $createjsoncommand='python createjson.py '.$degree.' uploads/' . $file_name.' data/'.$degree.'.json '.$startyear.' '.$endyear;
     exec($createjsoncommand);
 }

 elseif ($degree == 'ipgmba'){
     $degree = 'ipgmba';
     $createjsoncommand='python createjson.py '.$degree.' uploads/' . $file_name.' data/'.$degree.'.json '.$startyear.' '.$endyear;
     exec($createjsoncommand);
 }

 elseif ($degree == 'ipgmtech'){
     $degree = 'ipgmtech';
     $createjsoncommand='python createjson.py '.$degree.' uploads/' . $file_name.' data/'.$degree.'.json '.$startyear.' '.$endyear;
     exec($createjsoncommand);
 }


?>
<h2>Data Uploaded Successfully</h2>
