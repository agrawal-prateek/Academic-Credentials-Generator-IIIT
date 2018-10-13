<?php

$student_data = array();
$dataFiles = scandir('data');
foreach ($dataFiles as $filename){
    if ($filename == '.' or $filename == '..')
        continue;
    if ($filename == 'phd.json'){
        $jsonString = file_get_contents('data/phd.json');
        $data = json_decode($jsonString);
        foreach ($data as $row){
            if($row->b == '' || $row->c =='')
                continue;
            $student_row=[$row->b, $row->c, 'Ph.D', 0, 0];
            array_push($student_data, $student_row);
        }
    }
    elseif ($filename == 'mba.json'){
        $jsonString = file_get_contents('data/mba.json');
        $data = json_decode($jsonString);
        $start_year = $data->start_year;
        $end_year = $data->end_year;
        foreach ($data->data as $row){
            if($row->b == '' || $row->c =='') continue;
            $student_row=[$row->b, $row->c, 'MBA', $start_year, $end_year];
            array_push($student_data, $student_row);
        }
    }
    elseif ($filename == 'ipgmba.json'){
        $jsonString = file_get_contents('data/ipgmba.json');
        $data = json_decode($jsonString);
        $start_year = $data->start_year;
        $end_year = $data->end_year;
        foreach ($data->data as $row){
            if($row->b == '' || $row->c =='') continue;
            $student_row=[$row->b, $row->c, 'IPG-MBA', $start_year, $end_year];
            array_push($student_data, $student_row);
        }
    }
    elseif ($filename == 'mtech(an).json'){
        $jsonString = file_get_contents('data/mtech(an).json');
        $data = json_decode($jsonString);
        $start_year = $data->start_year;
        $end_year = $data->end_year;
        foreach ($data->data as $row){
            if($row->b == '' || $row->c =='') continue;
            $student_row=[$row->b, $row->c, 'M.Tech(AN)', $start_year, $end_year];
            array_push($student_data, $student_row);
        }
    }
    elseif ($filename == 'mtech(dc).json'){
        $jsonString = file_get_contents('data/mtech(dc).json');
        $data = json_decode($jsonString);
        $start_year = $data->start_year;
        $end_year = $data->end_year;
        foreach ($data->data as $row){
            if($row->b == '' || $row->c =='') continue;
            $student_row=[$row->b, $row->c, 'M.Tech(DC)', $start_year, $end_year];
            array_push($student_data, $student_row);
        }
    }
    elseif ($filename == 'mtech(is).json'){
        $jsonString = file_get_contents('data/mtech(is).json');
        $data = json_decode($jsonString);
        $start_year = $data->start_year;
        $end_year = $data->end_year;
        foreach ($data->data as $row){
            if($row->b == '' || $row->c =='') continue;
            $student_row=[$row->b, $row->c, 'M.Tech(IS)', $start_year, $end_year];
            array_push($student_data, $student_row);
        }
    }
    elseif ($filename == 'mtech(vlsi).json'){
        $jsonString = file_get_contents('data/mtech(vlsi).json');
        $data = json_decode($jsonString);
        $start_year = $data->start_year;
        $end_year = $data->end_year;
        foreach ($data->data as $row){
            if($row->b == '' || $row->c =='') continue;
            $student_row=[$row->b, $row->c, 'M.Tech(VLSI)', $start_year, $end_year];
            array_push($student_data, $student_row);
        }
    }

    elseif ($filename == 'ipgmtech.json'){
        $jsonString = file_get_contents('data/ipgmtech.json');
        $data = json_decode($jsonString);
        $start_year = $data->start_year;
        $end_year = $data->end_year;
        foreach ($data->data as $row){
            if($row->b == '' || $row->c =='') continue;
            $student_row=[$row->b, $row->c, 'IPG-M.Tech', $start_year, $end_year];
            array_push($student_data, $student_row);
        }
    }
}

$courses = array('Ph.D', 'MBA', 'IPG-MBA', 'M.Tech(AN)','M.Tech(IS)','M.Tech(DC)','M.Tech(VLSI)', 'IPG-M.Tech');
$data = array(
  'student_data'=>$student_data,
  'courses'=>$courses
);
echo json_encode($data);