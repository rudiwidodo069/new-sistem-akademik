<?php
//============================================================+
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Rudi Widodo');
$pdf->SetTitle('Report Detail Pembayaran Akademik');
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
<h1>Report Detail Pembayaran Akademik</h1>
EOD;
$pdf->writeHTMLCell(0, 0, '', '', $title, 0, 1, 0, true, 'C', true);
$table = '<table cellpadding="4" cellspacing="0" style="border: 1px solid #aaaa;">';
$table .= '<tr>
                    <th style="border: 1px solid #aaaa;">nama mahasiswa</th>
                    <td style="border: 1px solid #aaaa;">' . $data_mhs['nama_mhs'] . '</td>
                </tr>
                <tr>
                    <th style="border: 1px solid #aaaa;">npm mahasiswa</th>
                    <td style="border: 1px solid #aaaa;">' . $data_mhs['npm_mhs'] . '</td>
                </tr>
                <tr>
                    <th style="border: 1px solid #aaaa;">kode prodi</th>
                    <td style="border: 1px solid #aaaa;">' . $data_mhs['kode_prodi'] . '</td>
                </tr>
                <tr>
                    <th style="border: 1px solid #aaaa;">prodi</th>
                    <td style="border: 1px solid #aaaa;">' . $data_mhs['prodi'] . '</td>
                </tr>
                <tr>
                    <th style="border: 1px solid #aaaa;">perkuliahan</th>
                    <td style="border: 1px solid #aaaa;">' . $data_mhs['perkuliahan'] . '</td>
                </tr>
                <tr>
                    <th style="border: 1px solid #aaaa;">total biaya akademik</th>
                    <td style="border: 1px solid #aaaa;">Rp. ' . number_format($data_mhs['total_biaya']) . '</td>
                </tr>
                <tr>
                    <th style="border: 1px solid #aaaa;">tanggal cicilan pertama</th>
                    <td style="border: 1px solid #aaaa;">' . $data_mhs['tgl_cicilan_pertama'] . '</td>
                </tr>
                <tr>
                    <th style="border: 1px solid #aaaa;">jumlah cicilan pertama</th>
                    <td style="border: 1px solid #aaaa;">Rp. ' . number_format($data_mhs['cicilan_pertama']) . '</td>
                </tr>
                <tr>
                    <th style="border: 1px solid #aaaa;">tanggal cicilan kedua</th>
                    <td style="border: 1px solid #aaaa;">' . $data_mhs['tgl_cicilan_kedua'] . '</td>
                </tr>
                <tr>
                    <th style="border: 1px solid #aaaa;">jumlah cicilan kedua</th>
                    <td style="border: 1px solid #aaaa;">Rp. ' . number_format($data_mhs['cicilan_kedua']) . '</td>
                </tr>
                <tr>
                    <th style="border: 1px solid #aaaa;">tanggal cicilan ketiga</th>
                    <td style="border: 1px solid #aaaa;">' . $data_mhs['tgl_cicilan_ketiga'] . '</td>
                </tr>
                <tr>
                    <th style="border: 1px solid #aaaa;">jumlah cicilan ketiga</th>
                    <td style="border: 1px solid #aaaa;">Rp. ' . number_format($data_mhs['cicilan_ketiga']) . '</td>
                </tr>
                <tr>
                    <th style="border: 1px solid #aaaa;">tanggal pelunasan</th>
                    <td style="border: 1px solid #aaaa;">' . $data_mhs['tgl_lunas'] . '</td>
                </tr>
                <tr>
                    <th style="border: 1px solid #aaaa;">jumlah pelunasan</th>
                    <td style="border: 1px solid #aaaa;">Rp. ' . number_format($data_mhs['lunas']) . '</td>
                </tr>
                <tr>
                    <th style="border: 1px solid #aaaa;">total pembayaran akademik</th>
                    <td style="border: 1px solid #aaaa;">Rp. ' . number_format($data_mhs['total_pembayaran']) . '</td>
                </tr>
                <tr>
                    <th style="border: 1px solid #aaaa;">status pembayaran akademik</th>
                    <td style="border: 1px solid #aaaa;">' . $data_mhs['status_pembayaran'] . '</td>
                </tr>
                ';
$table .= '</table>';
$pdf->writeHTMLCell(0, 0, '', '', $table, 0, 1, 0, true, 'L', true);
// move pointer to last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
ob_clean();
$pdf->Output('report.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
