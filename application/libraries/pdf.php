<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
require_once(APPPATH.'libraries/MPDF57/mpdf.php');
 
class pdf extends mPDF {
 
    function __construct()
    {
        parent::__construct('th', 'A4', '0', '');
        
		return new mPDF();
    }
}
 
?>