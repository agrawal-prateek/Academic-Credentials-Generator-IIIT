<?php

function generate_ipgmtech_degree(
    $destinationDirectory,
    $rollNo,
    $startYear,
    $endYear,
    $name,
    $hindiName,
    $QRUrl,
    $place,
    $date,
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

///////////////////////////////////////////////////////////////////////
    $pdf = new FPDF('P', 'pt', 'A4');
    $pdf->AddPage();

// Add Required Fonts
    $pdf->AddFont('Kruti_Dev_010', '', 'Kruti_Dev_010.php');
    $pdf->AddFont('kurti-dev-040-bold', '', 'kurti-dev-040-bold.php');
    $pdf->AddFont('Kruti_Dev_100','','Kruti_Dev_100.php');

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
    $pdf->SetFont('Kruti_Dev_010', '', 12);
    $pdf->Cell(0, 20, 'vuqdzeakd                          ', '', '', 'R');
    $pdf->SetFont('times', '', 12);
    $pdf->Cell(0, 20, '/ Roll No: ' . $rollNo, '', '', 'R');
    $pdf->SetFont('times','B',12);
    $pdf->Ln();
    $pdf->Cell(60,20,$endYear.'-'.str_pad((int)($totalDegrees + 1),3,'0',STR_PAD_LEFT),1,'','L');

// First Hindi Details
    $pdf->Ln();
    $pdf->SetFont('kurti-dev-040-bold', '', 16);
    $pdf->Cell(0, $LINE_SPACING, 'vVy fcgkjh oktis;h&', '', '', 'C');
    $pdf->Ln();
    $pdf->Cell(0, 0, 'Hkkjrh; lwpuk izkSS/kksfxdh ,ao izca/ku laLFkku', '', '', 'C');
    $pdf->Ln();
    $pdf->Cell(0, $LINE_SPACING, 'Xokfy;j', '', '', 'C');
    $pdf->Ln();
    $pdf->SetFont('Kruti_Dev_010', '', 16);
    $pdf->Cell(0, 0, 'dk lapkyd e.My', '', '', 'C');
    $pdf->Ln();
    $pdf->Cell(0, $LINE_SPACING, 'fo/kk ifj"kn dh vuq\'kalk ij', '', '', 'C');
    $pdf->Ln();
    $pdf->SetFont('kurti-dev-040-bold', '', 16);
    $pdf->Cell(0, 0, $hindiName, '', '', 'C');
    $pdf->Ln();
    $pdf->SetFont('Kruti_Dev_010', '', 16);
    $pdf->Cell(0, $LINE_SPACING, 'dks', '', '', 'C');
    $pdf->Ln();
    $pdf->SetFont('kurti-dev-040-bold', '', 16);
    $pdf->Cell(0, 0, 'lwpuk izkSS/kksfxdh esa izkSS/kksfxdh Lukrd', '', '', 'C');
    $pdf->Ln();
    $pdf->Cell(0, $LINE_SPACING, ',ao', '', '', 'C');
    $pdf->Ln();
    $pdf->Cell(0, 0, 'lwpuk izkSS/kksfxdh esa izkSS/kksfxdh vf/kLukrd', '', '', 'C');
    $pdf->Ln();
    $pdf->SetFont('Kruti_Dev_010', '', 16);
    $pdf->Cell(0, $LINE_SPACING, 'dh mikf/k', '', '', 'C');
    $pdf->Ln();
    $pdf->Cell(0, 0, 'ipao"khZ; lesfdr vf/kLukrd dk;Zdze ds vUrxZr', '', '', 'C');
    $pdf->SetFont('Kruti_Dev_100','',14);
    $pdf->Ln();
    $pdf->Cell(525,$LINE_SPACING,'¼'.$startYear.'&'.$endYear,'','','C');
    $pdf->Cell(-465,$LINE_SPACING,'½','','','C');$pdf->SetFont('Kruti_Dev_010', '', 16);
    $pdf->Ln();
    $pdf->Cell(0, 0, 'fu/kkZfjr vgZrk,a lQyrkiwoZd iw.kZ djus ij iznku djrk gS', '', '', 'C');

    $pdf->Ln();
    $pdf->Cell(0, 15, '');
    $pdf->Ln();
    $pdf->Cell(
        0, 0,
        $pdf->Image('public/images/logo.png', $pageWidth / 2 - 23, $pdf->GetY(), 46, 68),
        '', '', 'C', false);
    $pdf->Ln();
    $pdf->Cell(0, 25, '');
    $pdf->Ln();

//English Typing
    $pdf->SetFont('times', 'B', 14);
    $pdf->Ln();
    $pdf->Cell(0, 15, '', '', '', 'C');
    $pdf->Ln();
    $pdf->Cell(0, $LINE_SPACING, 'THE BOARD OF GOVERNORS', '', '', 'C');
    $pdf->Ln();
    $pdf->Cell(0, 0, 'OF THE', '', '', 'C');
    $pdf->SetFont('times', '', 10);
    $pdf->Ln();
    $pdf->Cell(0, $LINE_SPACING, 'ABV-Indian Institute of Information Technology & Management Gwalior', '', '', 'C');
    $pdf->SetFont('times', '', 12);
    $pdf->Ln();
    $pdf->Cell(0, 0, 'UPON THE RECOMMENDATION OF THE SENATE', '', '', 'C');
    $pdf->Ln();
    $pdf->Cell(0, $LINE_SPACING, 'HEREBY CONFERS ON', '', '', 'C');
    $pdf->Ln();
    $pdf->SetFont('times', 'B', 12);
    $pdf->Cell(0, 0, $name, '', '', 'C');
    $pdf->Ln();
    $pdf->SetFont('times', '', 12);
    $pdf->Cell(0, $LINE_SPACING, 'THE DEGREE OF', '', '', 'C');
    $pdf->Ln();
    $pdf->SetFont('times', 'B', 12);
    $pdf->Cell(0, 0, 'BACHELOR OF TECHNOLOGY IN INFORMATION TECHNOLOGY', '', '', 'C');
    $pdf->Ln();
    $pdf->Cell(0, $LINE_SPACING, '&', '', '', 'C');
    $pdf->Ln();
    $pdf->Cell(0, 0, 'MASTER OF TECHNOLOGY IN INFORMATION TECHNOLOGY', '', '', 'C');
    $pdf->Ln();
    $pdf->SetFont('times', '', 12);
    $pdf->Cell(0, $LINE_SPACING, 'UNDER THE', '', '', 'C');
    $pdf->Ln();
    $pdf->Cell(0, 0, 'FIVE YEAR INTEGRATED POSTGRADUATE PROGRAMME', '', '', 'C');
    $pdf->Ln();
    $pdf->Cell(0, $LINE_SPACING, '(' . $startYear . '-' . $endYear . ')', '', '', 'C');
    $pdf->Ln();
    $pdf->Cell(0, 0, 'ON HAVING SUCCESSFULLY COMPLETED THE', '', '', 'C');
    $pdf->Ln();
    $pdf->Cell(0, $LINE_SPACING, 'PRESCRIBED REQUIREMENTS.', '', '', 'C');
    $pdf->Ln();

//QR Code
    $pdf->Image($QRUrl, $pageWidth / 2 - 30, $pageHeight - 110, 60, 60, 'PNG');

//Footer Line
    $pdf->Line(40, $pageHeight - 40, $pageWidth - 40, $pageHeight - 40);

// Signatures
    $pdf->SetFont('times', 'B', 12);

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
    $pdf->Text($pageWidth - 150, $pageHeight - 30, 'Date : ' . $date);
    $pdf->Output($destinationDirectory.'/'.$rollNo.'.pdf','F');
}