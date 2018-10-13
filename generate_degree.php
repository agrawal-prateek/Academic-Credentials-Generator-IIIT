
<h2 style="margin-left: 45%;margin-top: 10%">Generating files...</h2>
<h2 style="margin-left: 50%;margin-top: 3%" id="numbering">0</h2>


<?php
require('public/fpdf/fpdf.php');

require('degrees/mba.php');
require('degrees/ipgmba.php');
require('degrees/mtech(an).php');
require('degrees/mtech(dc).php');
require('degrees/mtech(is).php');
require('degrees/mtech(vlsi).php');
require('degrees/ipgmtech.php');
require('degrees/phd.php');

require('generate_qr_code.php');
require('safeCrypto.php');

$jsonString = file_get_contents('settings.json');
$jsondata = json_decode($jsonString);
$place = $jsondata->place;
$LINE_SPACING = $jsondata->padding;
$date = $jsondata->distributiondate;
$person1Name = $jsondata->person1Name;
$person1JOBRole = $jsondata->person1JobRole;
$person1JOBPlace = $jsondata->person1JobPlace;
$person2Name = $jsondata->person2Name;
$person2JOBRole = $jsondata->person2JobRole;
$person2JOBPlace = $jsondata->person2JobPlace;

$totalDegreesString = file_get_contents('totaldegrees.json');
$degreeCountingData = json_decode($totalDegreesString);
$currentYearIndex=-1;
$distributionYear = (int)($date[6].$date[7].$date[8].$date[9]);
$flag=0;
$i=0;
for ($i=0;$i<sizeof($degreeCountingData);$i++){
    if($degreeCountingData[$i]->year == $distributionYear){
        $currentYearIndex = $i;
        $flag=1;
        break;
    }
}
if ($flag==0){
    $degreeCountingData[$i] = null;
    $degreeCountingData[$i]->year = $distributionYear;
    $degreeCountingData[$i]->degrees = 0;
    $currentYearIndex = $i;
}
$totalDegrees = $degreeCountingData[$currentYearIndex]->degrees;

$data = array('mba' => '4', 'ipgmba' => '', 'mtech(an)' => '','mtech(is)' => '','mtech(dc)' => '','mtech(vlsi)' => '', 'ipgmtech' => '', 'phd' => '');


if(file_exists('data/mba.json')){
$jsonString = file_get_contents('data/mba.json');
$jsondata = json_decode($jsonString);
$data['mba'] = $jsondata;
}

if(file_exists('data/ipgmba.json')){
$jsonString = file_get_contents('data/ipgmba.json');
$jsondata = json_decode($jsonString);
$data['ipgmba'] = $jsondata;
   
}


if(file_exists('data/mtech(an).json')){
$jsonString = file_get_contents('data/mtech(an).json');
$jsondata = json_decode($jsonString);
$data['mtech(an)'] = $jsondata;    
}


if(file_exists('data/mtech(dc).json')){
$jsonString = file_get_contents('data/mtech(dc).json');
$jsondata = json_decode($jsonString);
$data['mtech(dc)'] = $jsondata;    
}


if(file_exists('data/mtech(is).json')){
$jsonString = file_get_contents('data/mtech(is).json');
$jsondata = json_decode($jsonString);
$data['mtech(is)'] = $jsondata;    
}


if(file_exists('data/mtech(vlsi).json')){
$jsonString = file_get_contents('data/mtech(vlsi).json');
$jsondata = json_decode($jsonString);
$data['mtech(vlsi)'] = $jsondata;    
}


if(file_exists('data/ipgmtech.json')){
$jsonString = file_get_contents('data/ipgmtech.json');
$jsondata = json_decode($jsonString);
$data['ipgmtech'] = $jsondata;    
}


if(file_exists('data/phd.json')){
$jsonString = file_get_contents('data/phd.json');
$jsondata = json_decode($jsonString);
$data['phd'] = $jsondata;    
}

$roll_no_list = $_GET['roll_no'];
$roll_no_list = explode(',', $roll_no_list);

foreach ($roll_no_list as $rollNo) {

    $found = 0;
    $name = null;
    $hindiname = null;
    $degree = null;
    $thesis_title = null;
    $thesis_title_hindi = null;
    $start_year = null;
    $end_year = null;
    $viva_date = null;

    if ($found == 0) {
        if (is_array($data['mba']->data) || is_object($data['mba']->data)){
            foreach ($data['mba']->data as $list) {
                if ($list->b == $rollNo) {
                    $start_year = $data['mba']->start_year;
                    $end_year = $data['mba']->end_year;
                    $degree = 'mba';
                    $name = $list->c;
                    $hindiname = $list->d;
                    $found = 1;
                    break;
                }
            }
        }
    }
    if ($found == 0) {
        if (is_array($data['ipgmba']->data) || is_object($data['ipgmba']->data)){
            foreach ($data['ipgmba']->data as $list) {
                if ($list->b == $rollNo) {
                    $start_year = $data['ipgmba']->start_year;
                    $end_year = $data['ipgmba']->end_year;
                    $degree = 'ipgmba';
                    $name = $list->c;
                    $hindiname = $list->d;
                    $found = 1;
                    break;
                }
            }
        }
    }
    if ($found == 0) {
        if (is_array($data['mtech(an)']->data) || is_object($data['mtech(an)']->data)){
            foreach ($data['mtech(an)']->data as $list) {
            if ($list->b == $rollNo) {
                $start_year = $data['mtech(an)']->start_year;
                $end_year = $data['mtech(an)']->end_year;
                $degree = 'mtech(an)';
                $name = $list->c;
                $hindiname = $list->d;
                $found = 1;
                break;
            }
        }
        }
    }
    if ($found == 0) {
        if (is_array($data['mtech(is)']->data) || is_object($data['mtech(is)']->data)){
            foreach ($data['mtech(is)']->data as $list) {
            if ($list->b == $rollNo) {
                $start_year = $data['mtech(is)']->start_year;
                $end_year = $data['mtech(is)']->end_year;
                $degree = 'mtech(is)';
                $name = $list->c;
                $hindiname = $list->d;
                $found = 1;
                break;
            }
        }
        }
        
    }
    if ($found == 0) {
        if (is_array($data['mtech(vlsi)']->data) || is_object($data['mtech(vlsi)']->data)){
        foreach ($data['mtech(vlsi)']->data as $list) {
            if ($list->b == $rollNo) {
                $start_year = $data['mtech(vlsi)']->start_year;
                $end_year = $data['mtech(vlsi)']->end_year;
                $degree = 'mtech(vlsi)';
                $name = $list->c;
                $hindiname = $list->d;
                $found = 1;
                break;
            }
        }
        }

    }
    if ($found == 0) {
        if (is_array($data['mtech(dc)']->data) || is_object($data['mtech(dc)']->data)){
        foreach ($data['mtech(dc)']->data as $list) {
            if ($list->b == $rollNo) {
                $start_year = $data['mtech(dc)']->start_year;
                $end_year = $data['mtech(dc)']->end_year;
                $degree = 'mtech(dc)';
                $name = $list->c;
                $hindiname = $list->d;
                $found = 1;
                break;
            }
        }            
        }

    }
    if ($found == 0) {
        if (is_array($data['ipgmtech']->data) || is_object($data['ipgmtech']->data)){
        foreach ($data['ipgmtech']->data as $list) {
            if ($list->b == $rollNo) {
                $start_year = $data['ipgmtech']->start_year;
                $end_year = $data['ipgmtech']->end_year;
                $degree = 'ipgmtech';
                $name = $list->c;
                $hindiname = $list->d;
                $found = 1;
                break;
            }
        }            
        }

    }
    if ($found == 0) {
        if (is_array($data['phd']) || is_object($data['phd'])){
        foreach ($data['phd'] as $list) {
            if ($list->b == $rollNo) {
                $degree = 'phd';
                $name = $list->c;
                $hindiname = $list->d;
                $thesis_title = $list->e;
                $thesis_title_hindi = $list->f;
                $viva_date = $list->g;
                $found = 1;
                break;
            }
        }            
        }
    }
    if ($degree == 'mba') {
        $destinationDirectory = 'generated_degrees/mba';
        $qrdegree = 'MBA';
        generateQRCode($rollNo,$name,$qrdegree,encrypt($rollNo.$name.$qrdegree));
        $QrUrl = 'qr_codes/'.$rollNo.'.png';
        generate_mba_degree($destinationDirectory,$rollNo, $start_year, $end_year, $name, $hindiname, $QrUrl, $place, $date,$person1Name,$person1JOBRole,$person1JOBPlace,$person2Name,$person2JOBRole,$person2JOBPlace,$LINE_SPACING, $distributionYear, $totalDegrees);
    }
    else if ($degree == 'ipgmba') {
        $destinationDirectory = 'generated_degrees/ipgmba';
        $qrdegree = 'IPGBTECH(IT)+MBA';
        generateQRCode($rollNo,$name,$qrdegree,encrypt($rollNo.$name.$qrdegree));
        $QrUrl = 'qr_codes/'.$rollNo.'.png';
        generate_ipgmba_degree($destinationDirectory,$rollNo, $start_year, $end_year, $name, $hindiname, $QrUrl, $place, $date,$person1Name,$person1JOBRole,$person1JOBPlace,$person2Name,$person2JOBRole,$person2JOBPlace,$LINE_SPACING, $distributionYear, $totalDegrees);
    }
    else if ($degree == 'mtech(an)') {

        $destinationDirectory = 'generated_degrees/mtech(an)';
        $qrdegree = 'MTECH(AN)';
        generateQRCode($rollNo,$name,$qrdegree,encrypt($rollNo.$name.$qrdegree));
        $QrUrl = 'qr_codes/'.$rollNo.'.png';
        generate_mtech_an_degree($destinationDirectory,$rollNo, $start_year, $end_year, $name, $hindiname, $QrUrl, $place, $date,$person1Name,$person1JOBRole,$person1JOBPlace,$person2Name,$person2JOBRole,$person2JOBPlace,$LINE_SPACING, $distributionYear, $totalDegrees);
    }
    else if ($degree == 'mtech(is)') {

        $destinationDirectory = 'generated_degrees/mtech(is)';
        $qrdegree = 'MTECH(IS)';
        generateQRCode($rollNo,$name,$qrdegree,encrypt($rollNo.$name.$qrdegree));
        $QrUrl = 'qr_codes/'.$rollNo.'.png';
        generate_mtech_is_degree($destinationDirectory,$rollNo, $start_year, $end_year, $name, $hindiname, $QrUrl, $place, $date,$person1Name,$person1JOBRole,$person1JOBPlace,$person2Name,$person2JOBRole,$person2JOBPlace,$LINE_SPACING, $distributionYear, $totalDegrees);
    }
    else if ($degree == 'mtech(dc)') {

        $destinationDirectory = 'generated_degrees/mtech(dc)';
        $qrdegree = 'MTECH(DC)';
        generateQRCode($rollNo,$name,$qrdegree,encrypt($rollNo.$name.$qrdegree));
        $QrUrl = 'qr_codes/'.$rollNo.'.png';
        generate_mtech_dc_degree($destinationDirectory,$rollNo, $start_year, $end_year, $name, $hindiname, $QrUrl, $place, $date,$person1Name,$person1JOBRole,$person1JOBPlace,$person2Name,$person2JOBRole,$person2JOBPlace,$LINE_SPACING, $distributionYear, $totalDegrees);
    }
    else if ($degree == 'mtech(vlsi)') {

        $destinationDirectory = 'generated_degrees/mtech(vlsi)';
        $qrdegree = 'MTECH(VLSI)';
        generateQRCode($rollNo,$name,$qrdegree,encrypt($rollNo.$name.$qrdegree));
        $QrUrl = 'qr_codes/'.$rollNo.'.png';
        generate_mtech_vlsi_degree($destinationDirectory,$rollNo, $start_year, $end_year, $name, $hindiname, $QrUrl, $place, $date,$person1Name,$person1JOBRole,$person1JOBPlace,$person2Name,$person2JOBRole,$person2JOBPlace,$LINE_SPACING, $distributionYear, $totalDegrees);
    }

    else if ($degree == 'ipgmtech') {
        $destinationDirectory = 'generated_degrees/ipgmtech';
        $qrdegree = 'IPGBTECH(IT)+MTECH(IT)';
        generateQRCode($rollNo,$name,$qrdegree,encrypt($rollNo.$name.$qrdegree));
        $QrUrl = 'qr_codes/'.$rollNo.'.png';
        generate_ipgmtech_degree($destinationDirectory,$rollNo, $start_year, $end_year, $name, $hindiname, $QrUrl, $place, $date,$person1Name,$person1JOBRole,$person1JOBPlace,$person2Name,$person2JOBRole,$person2JOBPlace,$LINE_SPACING, $distributionYear, $totalDegrees);
    }
    else if ($degree == 'phd') {
        $destinationDirectory = 'generated_degrees/phd';

        $qrdegree = 'PHD';
        generateQRCode($rollNo,$name,$qrdegree,encrypt($rollNo.$name.$qrdegree));
        $QrUrl = 'qr_codes/'.$rollNo.'.png';
        generate_phd_degree($destinationDirectory,$rollNo, $name, $hindiname, $QrUrl, $place, $date, $viva_date,$thesis_title,$thesis_title_hindi, $person1Name,$person1JOBRole,$person1JOBPlace,$person2Name,$person2JOBRole,$person2JOBPlace,$LINE_SPACING, $distributionYear, $totalDegrees);
    }

    $totalDegrees = (int)$totalDegrees + 1;
    $degreeCountingData[$currentYearIndex]->degrees = $totalDegrees;
    file_put_contents('totaldegrees.json', json_encode($degreeCountingData));

    ?>
    <script type="text/javascript">
    document.getElementById('numbering').innerHTML = parseInt(document.getElementById('numbering').innerHTML)+1;
</script>

    <?php
}
?>
<script type="text/javascript">
    window.location.href = '/';
</script>
