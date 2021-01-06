<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
require_once(APPPATH.'libraries/Smarty/Smarty.class.php');
 
class CI_Smarty extends Smarty {
 
    function __construct()
    {
        parent::__construct();
        $this->setTemplateDir(APPPATH.'views');
        $this->setCompileDir(APPPATH.'../templates_c');
        $this->compile_check = true; // should be false for production
        $this->force_compile = true; // should be false for production
    }
}
 
?>