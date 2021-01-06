<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
include_once(APPPATH.'libraries/PHPWord/Autoloader.php');
use PhpOffice\PhpWord\Autoloader;
use PhpOffice\PhpWord\Settings;
Autoloader::register();
Settings::loadConfig();

class word extends \PhpOffice\PhpWord\PhpWord{
 
    function __construct()
    {
    	parent::__construct();

		return new \PhpOffice\PhpWord\PhpWord();
    }
}
 
?>