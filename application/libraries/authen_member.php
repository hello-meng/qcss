<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class authen_member {

    public $id;
    public $member_data;
    public $controller;
    public $function;
    public $is_login;
    public $is_writer;
    public $is_writer_approve;
    public $lang;
    public $lang_code;
    
    public function __construct()
    {
        $CI =& get_instance();
        $CI->load->helper('url');
        
        if(@$_SESSION['member']['lang'] == "")
        {
            $_SESSION['member']['lang'] = "thai";
        }
        
        if(@$_GET['lang'] == "th")
        {
            $_SESSION['member']['lang'] = "thai";
        }
        else if(@$_GET['lang'] == "en")
        {
            $_SESSION['member']['lang'] = "english";
        }
        
        $this->lang = $_SESSION['member']['lang'];
        $this->lang_code = substr($this->lang, 0, 2);
        
        $this->controller = $CI->uri->segment(1);
        $this->function = $CI->uri->segment(2);
    }
}

?>