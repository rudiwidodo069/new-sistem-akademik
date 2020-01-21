<?php
//============================================================+
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Rudi Widodo');
$pdf->SetTitle('Report Data Jadwal Studi');
$pdf->SetSubject('Report Pdf');

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
<h1>Report Daftar Jadwal Akademik</h1>
EOD;
$pdf->writeHTMLCell(0, 0, '', '', $title, 0, 1, 0, true, 'C', true);
$table = '<table cellpadding="4" cellspacing="0" style="border: 1px solid #aaaa;">';
$table .= '<tr>
                    <th style="border: 1px solid #aaaa;"><strong>Prodi</strong></th>
                    <th style="border: 1px solid #aaaa;"><strong>Semester</strong></th>
                    <th style="border: 1px solid #aaaa;"><strong>Nama Dosen</strong></th>
                    <th style="border: 1px solid #aaaa;"><strong>Kode Mata Kuliah</strong></th>
                    <th style="border: 1px solid #aaaa;"><strong>Mata Kuliah</strong></th>
                    <th style="border: 1px solid #aaaa;"><strong>Hari</strong></th>
                    <th style="border: 1px solid #aaaa;"><strong>Kelas</strong></th>
                    <th style="border: 1px solid #aaaa;"><strong>Jam</strong></th>
                </tr>';
$sks = 0;
foreach ($daftar_jadwal as $jadwal) {
    $table .=  '<tr>
                         <td style="border: 1px solid #aaaa;">' . $jadwal['prodi'] . '</td>
                         <td style="border: 1px solid #aaaa;">' . $jadwal['semester'] . '</td>
                         <td style="border: 1px solid #aaaa;">' . $jadwal['nama_dosen'] . '</td>
                         <td style="border: 1px solid #aaaa;">' . $jadwal['kode_matkul'] . '</td>
                         <td style="border: 1px solid #aaaa;">' . $jadwal['matkul'] . '</td>
                         <td style="border: 1px solid #aaaa;">' . $jadwal['hari'] . '</td>
                         <td style="border: 1px solid #aaaa;">' . $jadwal['kelas'] . '</td>
                         <td style="border: 1px solid #aaaa;">' . $jadwal['jam'] . '</td>
                   </tr>';
}
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
