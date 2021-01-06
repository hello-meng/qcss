<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class authen {

    public $id;
	public $is_login;
    public $is_developer;
	public $is_admin;
	public $username;
	public $user_data;
	public $controller;
	public $function;
    public $can_access;
    public $can_manage;
    public $authen;

    public function __construct()
    {
        $CI =& get_instance();
		$CI->load->helper('url');
        
        if(@$_SESSION['admin']['id'] > 0)
        {
            $this->id = $_SESSION['admin']['id'];
            $this->username = $_SESSION['admin']['username'];
            $this->user_data = $_SESSION['admin'];

            $this->is_login = true;
            
            if($_SESSION['admin']['role_id'] == 1)
            {
                $this->is_developer = true;
                $this->is_admin = true;
            }
            else if($_SESSION['admin']['role_id'] == 2)
            {
                $this->is_developer = false;
                $this->is_admin = true;
            }
            else
            {
                $CI->load->model('backend/user_model');
                $this->authen = $CI->user_model->get_auth($_SESSION['admin']['role_id']);
                $this->is_developer = false;
                $this->is_admin = false;
            }
        }
        else
        {
            $this->is_login = false;
            $this->is_developer = false;
            $this->is_admin = false;
        }

        $this->controller = $CI->uri->segment(2);
        $this->function = $CI->uri->segment(3);

        if($this->is_login == false)
        {
            if($this->controller != "user")
            {
                redirect('/backend/user/login');
            }
            else
            {
                if($this->function != "login" && $this->function != "forget_password" && $this->function != "reset_password")
                {
                    redirect('/backend/user/login');
                }
            }
        }
        else
        {
            if($this->controller == "user" && ($this->function == "login" || $this->function == "forget_password" || $this->function == "reset_password"))
            {
                redirect('/backend');
            }

            if($this->controller == "section" || $this->controller == "menu" || $this->controller == "config" || $this->controller == "feature")
            {
                if($this->is_developer == true)
                {
                    $this->can_access = true;
                    $this->can_manage = true;
                }
                else
                {
                    $this->can_access = false;
                    $this->can_manage = false;
                }
            }
            else
            {
                if($this->is_developer == true || $this->is_admin == true)
                {
                    $this->can_access = true;
                    $this->can_manage = true;
                }
                else
                {
                    $this->can_access = false;
                    $this->can_manage = false;

                    if($this->controller == "home" || $this->controller == "")
                    {
                        $this->can_access = true;
                        $this->can_manage = false;
                    }
                    else if($this->controller == "user" && $this->function == "edit_profile")
                    {
                        $this->can_access = true;
                        $this->can_manage = true;
                    }
                    else if($this->controller == "user" && $this->function == "logout")
                    {
                        $this->can_access = true;
                        $this->can_manage = false;
                    }
                    else
                    {
                        if($this->authen[$this->controller] == 'M')
                        {
                            $this->can_access = true;
                            $this->can_manage = true;
                        }
                        else if($this->authen[$this->controller] == 'A')
                        {
                            $this->can_access = true;
                            $this->can_manage = false;
                        }
                        else
                        {
                            $this->can_access = false;
                            $this->can_manage = false;
                        }
                    }
                }
            }

            if($this->can_access == false)
            {
                if($CI->input->get('modal') == '1')
                {
                    $CI->smarty->display('backend/modal_not_allow.tpl');
                    exit();
                }
                else
                {
                    redirect('/backend/user/login');
                }
            }
            else
            {
                $view_function = array('', 'index', 'load_data', 'logout');
                if($this->can_manage == false && !in_array($this->function, $view_function))
                {
                    if($CI->input->get('modal') == '1')
                    {
                        $CI->smarty->display('backend/modal_not_allow.tpl');
                        exit();
                    }
                    else
                    {
                        redirect('/backend/user/login');
                    }
                }
            }
        }
    }
}

?>