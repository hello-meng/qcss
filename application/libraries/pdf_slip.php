<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
require_once(APPPATH.'libraries/MPDF57/mpdf.php');
 
class pdf_slip extends mPDF {
 
    function __construct()
    {
        parent::__construct('th', array(80, 257), '0', '', 2, 2, 2, 2);

		return new mPDF();
    }
}
 
?>