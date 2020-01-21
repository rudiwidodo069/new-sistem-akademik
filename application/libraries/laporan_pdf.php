<?php

defined('BASEPATH') or exit('No direct script access allowed');

require_once dirname(__FILE__) . './TCPDF/tcpdf.php';
class laporan_pdf extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }
}
