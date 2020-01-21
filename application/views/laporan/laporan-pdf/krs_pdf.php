<?php
//============================================================+
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Rudi Widodo');
$pdf->SetTitle('Report Data Krs');
$pdf->SetSubject('Repport Pdf');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 10);

// add a page
$pdf->AddPage();

// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);

// set cell margins
$pdf->setCellMargins(1, 1, 1, 1);

// set color for background
$pdf->SetFillColor(255, 255, 127);

// set some text for example
$title = <<<EOD
<h1>Report Data Krs Mahasiswa</h1>
EOD;
$pdf->writeHTMLCell(0, 0, '', '', $title, 0, 1, 0, true, 'C', true);
$mahasiswa = '<div>
                            <h4>Nama Mahasiswa : <strong>' . $get_info['nama_mhs'] . '</strong></h4>
                            <h4>Npm Mahasiswa  : <strong>' . $get_info['npm_mhs'] . '</strong></h4>
                            <h4>kelas Mahasiswa : <strong>' . $get_info['kelas'] . '</strong></h4>
                            <h4>Kode Prodi           : <strong>' . $get_info['kode_prodi'] . '</strong></h4>
                            <h4>Prodi                   : <strong>' . $get_info['prodi'] . '</strong></h4>
                            <h4>Semester            : <strong>' . $get_info['semester'] . '</strong></h4>
                    </div>';
$pdf->writeHTMLCell(0, 0, '', '', $mahasiswa, 0, 1, 0, true, 'L', true);
$table = '<table cellpadding="10" cellspacing="0" style="border: 1px solid #aaaa;">';
$table .= '<tr>
                    <th style="border: 1px solid #aaaa;"><strong>Prodi</strong></th>
                    <th style="border: 1px solid #aaaa;"><strong>Mata Kuliah</strong></th>
                    <th style="border: 1px solid #aaaa;"><strong>Sks</strong></th>
                </tr>';
$sks = 0;
foreach ($get_matkul as $matkul) {
    if ($get_info['semester'] == $matkul['semester'] && $get_info['id_akademik'] == $matkul['id_akademik']) {
        $table .=  '<tr>
                         <td style="border: 1px solid #aaaa;">' . $matkul['prodi'] . '</td>
                         <td style="border: 1px solid #aaaa;">' . $matkul['matkul'] . '</td>
                         <td style="border: 1px solid #aaaa;">' . $matkul['sks'] . '</td>
                   </tr>';
        $sks += $matkul['sks'];
    }
}
$table .= '<tr>
                    <th colspan="2" style="border: 1px solid #aaaa;">jumlah sks</th>
                    <td style="border: 1px solid #aaaa;">' . $sks . '</td>
                </tr>';
$table .= '</table>';

$pdf->writeHTMLCell(0, 0, '', '', $table, 0, 1, 0, true, 'C', true);
// move pointer to last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
ob_clean();
$pdf->Output('report.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
