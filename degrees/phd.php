<?php
function generate_phd_degree(
    $destinationDirectory,
    $rollNo,
    $name,
    $hindiName,
    $QRUrl,
    $place,
    $date,
    $viva_date,
    $thesis_title,
    $thesis_title_hindi,
    $person1Name,
    $person1JOBRole,
    $person1JOBPlace,
    $person2Name,
    $person2JOBRole,
    $person2JOBPlace,
    $LINE_SPACING,
    $distributionYear,
    $totalDegrees
)
{
    $name = strtoupper($name);

    $degreeProvidedDate = $date;
    $degreeProvidedDay = '';
    $degreeProvidedMonth = '';
    $degreeProvidedYear = '';
    $degreeProvidedMonthHindi = '';
    $degreeProvidedMonthEnglish = '';
    $degreeCompletedDate = $viva_date;
    $degreeCompletedDay = '';
    $degreeCompletedMonth = '';
    $degreeCompletedYear = '';
    $degreeCompletedMonthHindi = '';
    $degreeCompletedMonthEnglish = '';

    $counter = 0;
    for (; $counter < strlen($degreeCompletedDate); $counter++) {
        if ($degreeCompletedDate[$counter] == '-' || $degreeCompletedDate[$counter] == '/' || $degreeCompletedDate[$counter] == '.') {
            $counter++;
            break;
        }
        $degreeCompletedDay = $degreeCompletedDay . $degreeCompletedDate[$counter];
    }
    for (; $counter < strlen($degreeCompletedDate); $counter++) {
        if ($degreeCompletedDate[$counter] == '-' || $degreeCompletedDate[$counter] == '/' || $degreeCompletedDate[$counter] == '.') {
            $counter++;
            break;
        }
        $degreeCompletedMonth = $degreeCompletedMonth . $degreeCompletedDate[$counter];
    }
    for (; $counter < strlen($degreeCompletedDate); $counter++) {
        if ($degreeCompletedDate[$counter] == '-' || $degreeCompletedDate[$counter] == '/' || $degreeCompletedDate[$counter] == '.') {
            $counter++;
            break;
        }
        $degreeCompletedYear = $degreeCompletedYear . $degreeCompletedDate[$counter];
    }
    $degreeCompletedMonth = strtoupper($degreeCompletedMonth);
    if (strlen($degreeCompletedMonth) == 2) {
        if ($degreeCompletedMonth == '01') {
            $degreeCompletedMonthHindi = 'tuojh';
            $degreeCompletedMonthEnglish = 'Jan';
        } else if ($degreeCompletedMonth == '02') {
            $degreeCompletedMonthHindi = 'Qjojh';
            $degreeCompletedMonthEnglish = 'Feb';
        } else if ($degreeCompletedMonth == '03') {
            $degreeCompletedMonthHindi = 'ekpZ';
            $degreeCompletedMonthEnglish = 'Mar';
        } else if ($degreeCompletedMonth == '04') {
            $degreeCompletedMonthHindi = 'viSzy';
            $degreeCompletedMonthEnglish = 'Apr';
        } else if ($degreeCompletedMonth == '05') {
            $degreeCompletedMonthHindi = 'ebZ';
            $degreeCompletedMonthEnglish = 'May';
        } else if ($degreeCompletedMonth == '06') {
            $degreeCompletedMonthHindi = 'twu';
            $degreeCompletedMonthEnglish = 'June';
        } else if ($degreeCompletedMonth == '07') {
            $degreeCompletedMonthHindi = 'tqykbZ';
            $degreeCompletedMonthEnglish = 'July';
        } else if ($degreeCompletedMonth == '08') {
            $degreeCompletedMonthHindi = 'vxLRk';
            $degreeCompletedMonthEnglish = 'Aug';
        } else if ($degreeCompletedMonth == '09') {
            $degreeCompletedMonthHindi = 'flrEcj';
            $degreeCompletedMonthEnglish = 'Sep';
        } else if ($degreeCompletedMonth == '10') {
            $degreeCompletedMonthHindi = 'vDVwcj';
            $degreeCompletedMonthEnglish = 'Oct';
        } else if ($degreeCompletedMonth == '11') {
            $degreeCompletedMonthHindi = 'uoEcj';
            $degreeCompletedMonthEnglish = 'Nov';
        } else if ($degreeCompletedMonth == '12') {
            $degreeCompletedMonthHindi = 'fnlEcj';
            $degreeCompletedMonthEnglish = 'Dec';
        }
    } else {
        if ($degreeCompletedMonth[0] == 'J') {
            if ($degreeCompletedMonth[1] == 'A') {
                //January
                $degreeCompletedMonthHindi = 'tuojh';
                $degreeCompletedMonthEnglish = 'Jan';
            } elseif ($degreeCompletedMonth[2] == 'N') {
                //June
                $degreeCompletedMonthHindi = 'twu';
                $degreeCompletedMonthEnglish = 'June';
            } elseif ($degreeCompletedMonth[2] == 'L') {
                $degreeCompletedMonthHindi = 'tqykbZ';
                //July
                $degreeCompletedMonthEnglish = 'July';

            }
        } elseif ($degreeCompletedMonth[0] == 'F') {
            //February
            $degreeCompletedMonthHindi = 'Qjojh';
            $degreeCompletedMonthEnglish = 'Feb';

        } elseif ($degreeCompletedMonth[0] == 'M') {
            if ($degreeCompletedMonth[2] == 'R') {
                //March
                $degreeCompletedMonthHindi = 'ekpZ';
                $degreeCompletedMonthEnglish = 'Mar';

            } elseif ($degreeCompletedMonth[2] == 'Y') {
                //May
                $degreeCompletedMonthHindi = 'ebZ';
                $degreeCompletedMonthEnglish = 'May';

            }
        } elseif ($degreeCompletedMonth[0] == 'A') {
            if ($degreeCompletedMonth[1] == 'P') {
                //April
                $degreeCompletedMonthHindi = 'viSzy';
                $degreeCompletedMonthEnglish = 'Apr';

            } elseif ($degreeCompletedMonth[1] == 'U') {
                //August
                $degreeCompletedMonthHindi = 'vxLRk';
                $degreeCompletedMonthEnglish = 'Aug';

            }
        } elseif ($degreeCompletedMonth[0] == 'S') {
            //September
            $degreeCompletedMonthHindi = 'flrEcj';
            $degreeCompletedMonthEnglish = 'Sep';

        } elseif ($degreeCompletedMonth[0] == 'O') {
            //October
            $degreeCompletedMonthEnglish = 'Oct';

            $degreeCompletedMonthHindi = 'vDVwcj';
        } elseif ($degreeCompletedMonth[0] == 'N') {
            //November
            $degreeCompletedMonthEnglish = 'Nov';

            $degreeCompletedMonthHindi = 'uoEcj';
        } elseif ($degreeCompletedMonth[0] == 'D') {
            //December
            $degreeCompletedMonthEnglish = 'Dec';
            $degreeCompletedMonthHindi = 'fnlEcj';
        }
    }

    $counter = 0;
    for (; $counter < strlen($degreeProvidedDate); $counter++) {
        if ($degreeProvidedDate[$counter] == '-' || $degreeProvidedDate[$counter] == '/' || $degreeCompletedDate[$counter] == '.') {
            $counter++;
            break;
        }
        $degreeProvidedDay = $degreeProvidedDay . $degreeProvidedDate[$counter];
    }
    for (; $counter < strlen($degreeProvidedDate); $counter++) {
        if ($degreeProvidedDate[$counter] == '-' || $degreeProvidedDate[$counter] == '/' || $degreeCompletedDate[$counter] == '.') {
            $counter++;
            break;
        }
        $degreeProvidedMonth = $degreeProvidedMonth . $degreeProvidedDate[$counter];
    }
    for (; $counter < strlen($degreeProvidedDate); $counter++) {
        if ($degreeProvidedDate[$counter] == '-' || $degreeProvidedDate[$counter] == '/' || $degreeCompletedDate[$counter] == '.') {
            $counter++;
            break;
        }
        $degreeProvidedYear = $degreeProvidedYear . $degreeProvidedDate[$counter];
    }

    $degreeProvidedMonth = strtoupper($degreeProvidedMonth);
    if (strlen($degreeProvidedMonth) == 2) {
        if ($degreeProvidedMonth == '01') {
            $degreeProvidedMonthEnglish = 'Jan';
            $degreeProvidedMonthHindi = 'tuojh';
        } else if ($degreeProvidedMonth == '02') {
            $degreeProvidedMonthEnglish = 'Feb';
            $degreeProvidedMonthHindi = 'Qjojh';
        } else if ($degreeProvidedMonth == '03') {
            $degreeProvidedMonthEnglish = 'Mar';
            $degreeProvidedMonthHindi = 'ekpZ';
        } else if ($degreeProvidedMonth == '04') {
            $degreeProvidedMonthEnglish = 'Apr';
            $degreeProvidedMonthHindi = 'viSzy';
        } else if ($degreeProvidedMonth == '05') {
            $degreeProvidedMonthEnglish = 'May';
            $degreeProvidedMonthHindi = 'ebZ';
        } else if ($degreeProvidedMonth == '06') {
            $degreeProvidedMonthEnglish = 'Jun';
            $degreeProvidedMonthHindi = 'twu';
        } else if ($degreeProvidedMonth == '07') {
            $degreeProvidedMonthEnglish = 'July';
            $degreeProvidedMonthHindi = 'tqykbZ';
        } else if ($degreeProvidedMonth == '08') {
            $degreeProvidedMonthEnglish = 'Aug';
            $degreeProvidedMonthHindi = 'vxLRk';
        } else if ($degreeProvidedMonth == '09') {
            $degreeProvidedMonthEnglish = 'Sep';
            $degreeProvidedMonthHindi = 'flrEcj';
        } else if ($degreeProvidedMonth == '10') {
            $degreeProvidedMonthEnglish = 'Oct';
            $degreeProvidedMonthHindi = 'vDVwcj';
        } else if ($degreeProvidedMonth == '11') {
            $degreeProvidedMonthEnglish = 'Nov';
            $degreeProvidedMonthHindi = 'uoEcj';
        } else if ($degreeProvidedMonth == '12') {
            $degreeProvidedMonthEnglish = 'Dec';
            $degreeProvidedMonthHindi = 'fnlEcj';
        }
    } else {
        if ($degreeProvidedMonth[0] == 'J') {
            if ($degreeProvidedMonth[1] == 'A') {
                //January
                $degreeProvidedMonthEnglish = 'Jan';
                $degreeProvidedMonthHindi = 'tuojh';
            } elseif ($degreeProvidedMonth[2] == 'N') {
                //June
                $degreeProvidedMonthEnglish = 'Jun';
                $degreeProvidedMonthHindi = 'twu';
            } elseif ($degreeProvidedMonth[2] == 'L') {
                $degreeProvidedMonthEnglish = 'July';
                $degreeProvidedMonthHindi = 'tqykbZ';
                //July
            }
        } elseif ($degreeProvidedMonth[0] == 'F') {
            //February
            $degreeProvidedMonthEnglish = 'Feb';
            $degreeProvidedMonthHindi = 'Qjojh';
        } elseif ($degreeProvidedMonth[0] == 'M') {
            if ($degreeProvidedMonth[2] == 'R') {
                //March
                $degreeProvidedMonthEnglish = 'Mar';
                $degreeProvidedMonthHindi = 'ekpZ';
            } elseif ($degreeProvidedMonth[2] == 'Y') {
                //May
                $degreeProvidedMonthEnglish = 'May';
                $degreeProvidedMonthHindi = 'ebZ';
            }
        } elseif ($degreeProvidedMonth[0] == 'A') {
            if ($degreeProvidedMonth[1] == 'P') {
                //April
                $degreeProvidedMonthEnglish = 'Apr';
                $degreeProvidedMonthHindi = 'viSzy';
            } elseif ($degreeProvidedMonth[1] == 'U') {
                //August
                $degreeProvidedMonthEnglish = 'Aug';
                $degreeProvidedMonthHindi = 'vxLRk';
            }
        } elseif ($degreeProvidedMonth[0] == 'S') {
            //September
            $degreeProvidedMonthEnglish = 'Sep';
            $degreeProvidedMonthHindi = 'flrEcj';
        } elseif ($degreeProvidedMonth[0] == 'O') {
            //October
            $degreeProvidedMonthEnglish = 'Oct';
            $degreeProvidedMonthHindi = 'vDVwcj';
        } elseif ($degreeProvidedMonth[0] == 'N') {
            //November
            $degreeProvidedMonthEnglish = 'Nov';
            $degreeProvidedMonthHindi = 'uoEcj';
        } elseif ($degreeProvidedMonth[0] == 'D') {
            //December
            $degreeProvidedMonthEnglish = 'Dec';
            $degreeProvidedMonthHindi = 'fnlEcj';
        }
    }

    $thesis_title_hindi = iconv('UTF-8', 'windows-1252', preg_replace('/\\\u([0-9a-z]{4})/i', '&#x$1;', $thesis_title_hindi));
    $hindiName = iconv('UTF-8', 'windows-1252', preg_replace('/\\\u([0-9a-z]{4})/i', '&#x$1;', $hindiName));

    putenv('GDFONTPATH=' . realpath('.'));

    list($left, , $right) = imageftbbox(12, 0, "public/fonts/times.ttf", $person1Name);
    $person1NameWidth = ($right - $left) * 0.75;

    list($left, , $right) = imageftbbox(12, 0, "public/fonts/times.ttf", $person1JOBRole);
    $person1JOBRoleWidth = ($right - $left) * 0.75;

    list($left, , $right) = imageftbbox(12, 0, "public/fonts/times.ttf", $person1JOBPlace);
    $person1JOBPlaceWidth = ($right - $left) * 0.75;

    list($left, , $right) = imageftbbox(12, 0, "public/fonts/times.ttf", $person2Name);
    $person2NameWidth = ($right - $left) * 0.75;

    list($left, , $right) = imageftbbox(12, 0, "public/fonts/times.ttf", $person2JOBRole);
    $person2JOBRoleWidth = ($right - $left) * 0.75;

    list($left, , $right) = imageftbbox(12, 0, "public/fonts/times.ttf", $person2JOBPlace);
    $person2JOBPlaceWidth = ($right - $left) * 0.75;

    list($left, , $right) = imageftbbox(12, 0, "public/fonts/times.ttf", 'THESIS TITLE : ' . $thesis_title);
    $thesis_title_width = ($right - $left) * 0.75;

    list($left, , $right) = imageftbbox(12, 0, "public/fonts/kurti-dev-040-bold.ttf", '\'kks/k izcU/k \'kh"kZd% ' . $thesis_title_hindi);
    $thesis_title_hindi_width = ($right - $left) * 0.75;


///////////////////////////////////////////////////////////////////////
    $pdf = new FPDF('L', 'pt', 'A4');
    $pdf->AddPage();

// Add Required Fonts
    $pdf->AddFont('Kruti_Dev_010', '', 'Kruti_Dev_010.php');
    $pdf->AddFont('kurti-dev-040-bold', '', 'kurti-dev-040-bold.php');
    $pdf->AddFont('Kruti_Dev_100', '', 'Kruti_Dev_100.php');


// Get Page Dimensions
    $pageWidth = $pdf->GetPageWidth();
    $pageHeight = $pdf->GetPageHeight();
// Background Watermark
    $pdf->Image(
        'public/images/logo-big-copy.png',
        $pageWidth / 2 - 250,
        $pageHeight / 2 - 250,
        500,
        500
    );

// Roll No at Top Right
    $pdf->SetFont('Kruti_Dev_100', '', 12);
    $pdf->Cell(0, 20, 'vuqdzeakd                            ', '', '', 'R');
    $pdf->SetFont('times', '', 12);
    $pdf->Cell(0, 20, '/ Roll No: ' . $rollNo, '', '', 'R');
    $pdf->SetFont('times', 'B', 12);
    $pdf->Ln();
    $pdf->Cell(60, 20, $degreeCompletedYear . '-' . str_pad((int)($totalDegrees + 1), 3, '0', STR_PAD_LEFT), 1, '', 'L');

// First Hindi Details
    $pdf->SetFont('kurti-dev-040-bold', '', 16);

    $pdf->Cell(0, $LINE_SPACING, 'vVy fcgkjh oktis;h& Hkkjrh; lwpuk izkSS|ksfxdh ,oa izca/ku laLFkku] Xokfy;j', '', '', 'C');
    $pdf->Ln();
    $pdf->SetFont('Kruti_Dev_100', '', 16);
    $pdf->Cell(0, 0, 'vfHk"kn~ dh vuq\'kalk ij', '', '', 'C');
    $pdf->Ln();
    $pdf->SetFont('kurti-dev-040-bold', '', 16);
    $pdf->Cell(0, $LINE_SPACING, 'MWkDVj vWkQ fQyWklQh', '', '', 'C');
    $pdf->SetFont('Kruti_Dev_100', '', 16);
    $pdf->Ln();
    $pdf->Cell(0, 0, 'dh mikf/k', '', '', 'C');
    $pdf->Ln();
    $pdf->SetFont('kurti-dev-040-bold', '', 16);
    $pdf->Cell(0, $LINE_SPACING, $hindiName, '', '', 'C');
    $pdf->Ln();


    if ($thesis_title_hindi_width > $pageWidth - 10) {
        $pdf->SetFont('Kruti_Dev_100', '', 14);
        $pdf->Cell(0, 0, 'dks ftUgksaus bl mikf/k dh vokfIr gsrq fofu;e fofgr vis{kkvksa dks ' . $degreeCompletedDay . ' ' . $degreeCompletedMonthHindi . ' ' . $degreeCompletedYear . ' dks lQyrkiwoZd iwjk dj fy;k gS] ,rn~}kjk iznku djrk gSA', '', '', 'C');
        $pdf->Ln();
        $pdf->Cell(0, 9, '', '', '');
        $pdf->Ln();

        $pdf->SetFont('Kruti_Dev_010', '', 14);
        $pdf->MultiCell(0, 18, '\'kks/k izcU/k \'kh"kZd% ' . $thesis_title_hindi, '', 'C', '');
        $pdf->Ln();
        $pdf->Cell(0, -9, '', '', '');
        $pdf->Ln();

        $pdf->SetFont('Kruti_Dev_100', '', 16);
        $pdf->Cell(0, 0, 'Hkkjrh; x.kjkT; ds vUrxZr Xokfy;j esa vkt] fnuakd ' . $degreeProvidedDay . ' ' . $degreeProvidedMonthHindi . ' ' . $degreeProvidedYear . ' laLFkku dh eqnzzk vafdr ;g mikf/k nh xbZA', '', '', 'C');
    } else {
        $pdf->SetFont('Kruti_Dev_100', '', 14);
        $pdf->Cell(0, 0, 'dks ftUgksaus bl mikf/k dh vokfIr gsrq fofu;e fofgr vis{kkvksa dks ' . $degreeCompletedDay . ' ' . $degreeCompletedMonthHindi . ' ' . $degreeCompletedYear . ' dks lQyrkiwoZd iwjk dj fy;k gS] ,rn~}kjk iznku djrk gSA', '', '', 'C');
        $pdf->Ln();

        $pdf->SetFont('Kruti_Dev_010', '', 14);
        $pdf->Cell(0, $LINE_SPACING, '\'kks/k izcU/k \'kh"kZd% ' . $thesis_title_hindi, '', '', 'C');
        $pdf->Ln();

        $pdf->SetFont('Kruti_Dev_100', '', 16);
        $pdf->Cell(0, 0, 'Hkkjrh; x.kjkT; ds vUrxZr Xokfy;j esa vkt] fnuakd ' . $degreeProvidedDay . ' ' . $degreeProvidedMonthHindi . ' ' . $degreeProvidedYear . ' laLFkku dh eqnzzk vafdr ;g mikf/k nh xbZA', '', '', 'C');

    }

//LOGO IN CENTER
    $pdf->Ln();
    $pdf->Cell(0, 15, '');
    $pdf->Ln();
    $pdf->Cell(
        0, 0,
        $pdf->Image('public/images/logo.png', $pageWidth / 2 - 23, $pdf->GetY(), 46, 68),
        '', '', 'C', false);
    $pdf->Ln();
    $pdf->Cell(0, 80, '');

//English Typing
    $pdf->Ln();
    $pdf->SetFont('times', 'B', 11);
    $pdf->Cell(0, 0, 'ATAL BIHARI VAJPAYEE- INDIAN INSTITUTE OF INFORMATION TECHNOLOGY & MANAGEMENT, GWALIOR', '', '', 'C');
    $pdf->Ln();
    $pdf->SetFont('times', '', 11);
    $pdf->Cell(0, $LINE_SPACING, 'UPON THE RECOMMENDATION OF THE SENATE HEREBY CONFERS THE DEGREE OF', '', '', 'C');
    $pdf->Ln();
    $pdf->SetFont('times', 'B', 11);
    $pdf->Cell(0, 0, 'DOCTOR OF PHILOSOPHY', '', '', 'C');
    $pdf->SetFont('times', '', 11);
    $pdf->Ln();
    $pdf->Cell(0, $LINE_SPACING, 'to', '', '', 'C');
    $pdf->SetFont('times', 'B', 11);
    $pdf->Ln();
    $pdf->Cell(0, 0, $name, '', '', 'C');
    $pdf->Ln();
    $pdf->SetFont('times', '', 11);

    if ($pageWidth - 10 < $thesis_title_width) {
        $pdf->Ln();
        $pdf->Cell(0, 18, '', '', '', 'C');
        $pdf->Ln();
        $pdf->Cell(0, 0, 'who has successfully completed requirements predescribed under the regulations for the award of this degree on ' . $degreeCompletedDay . '-' . $degreeCompletedMonthEnglish . '-' . $degreeCompletedYear, '', '', 'C');
        $pdf->Ln();
        $pdf->Cell(0, 10, '', '', '', 'C');
        $pdf->Ln();
        $pdf->SetFont('times', 'B', 11);
        $pdf->MultiCell(0, 18, 'THESIS TITLE : ' . $thesis_title, 0, 'C', '');
        $pdf->SetFont('times', '', 11);
        $pdf->Cell(0, 18, 'Given this day the Date ' . $degreeProvidedDay . '-' . $degreeProvidedMonthEnglish . '-' . $degreeProvidedYear . ' under the seal of Institute at Gwalior in the Republic of India', '', '', 'C');

    } else {
        $pdf->Cell(0, $LINE_SPACING, 'who has successfully completed requirements predescribed under the regulations for the award of this degree on ' . $degreeCompletedDay . '-' . $degreeCompletedMonthEnglish . '-' . $degreeCompletedYear, '', '', 'C');
        $pdf->Ln();
        $pdf->SetFont('times', 'B', 11);
        $pdf->MultiCell(0, 0, 'THESIS TITLE : ' . $thesis_title, 0, 'C', '');
        $pdf->SetFont('times', '', 11);
        $pdf->Cell(0, $LINE_SPACING, 'Given this day the Date ' . $degreeProvidedDay . '-' . $degreeProvidedMonthEnglish . '-' . $degreeProvidedYear . ' under the seal of Institute at Gwalior in the Republic of India', '', '', 'C');

    }


//QR Code
    $pdf->Image($QRUrl, $pageWidth / 2 - 30, $pageHeight - 110, 60, 60, 'PNG');

//Footer Line
    $pdf->Line(40, $pageHeight - 40, $pageWidth - 40, $pageHeight - 40);

// Signatures
    $pdf->SetFont('times', 'B', 11);

    $pdf->Text($pageWidth / 4 - $person1NameWidth / 2, $pageHeight - 100, $person1Name);
    $pdf->Text($pageWidth / 4 - $person1JOBRoleWidth / 2, $pageHeight - 80, $person1JOBRole);
    $pdf->Text($pageWidth / 4 - $person1JOBPlaceWidth / 2, $pageHeight - 60, $person1JOBPlace);

    $pdf->Text($pageWidth * 0.75 - $person2NameWidth / 2, $pageHeight - 100, $person2Name);
    $pdf->Text($pageWidth * 0.75 - $person2JOBRoleWidth / 2, $pageHeight - 80, $person2JOBRole);
    $pdf->Text($pageWidth * 0.75 - $person2JOBPlaceWidth / 2, $pageHeight - 60, $person2JOBPlace);

    $pdf->SetFont('times', '', 10);

//Place
    $pdf->Text(40, $pageHeight - 30, 'Place : ' . $place);

//Date
    $pdf->Text($pageWidth - 155, $pageHeight - 30, 'Date : ' . $degreeProvidedDay . '-' . $degreeProvidedMonthEnglish . '-' . $degreeProvidedYear);
    $pdf->Output($destinationDirectory . '/' . $rollNo . '.pdf', 'F');
}
