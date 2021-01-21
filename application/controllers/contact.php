<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
class Contact extends CI_Controller {

	public function __construct()
    {
		parent::__construct();

		$this->load->library('authen_member', NULL, 'authen');
		$this->smarty->assign('member', $this->authen->member_data);
		$this->smarty->assign('authen', $this->authen);
		$this->lang->load('default', $this->authen->lang);
		$this->smarty->assign('phrase', $this->lang->language);

		
		if($this->authen->controller != "")
		{
			$this->this_page = $this->authen->controller;
			$this->this_sub_page = $this->authen->function;
		}
		else
		{
			$this->this_page = "contact";
			$this->this_sub_page = 'index';
		}
		
		$this->smarty->assign('page_name', 'Contact');
		$this->smarty->assign('page', $this->this_page);
		$this->smarty->assign('sub_page', $this->this_sub_page);
		$this->smarty->assign('site_name', config_item('site_name'));
		$this->smarty->assign('company_name', config_item('company_name'));
		$this->smarty->assign('base_url', config_item('base_url'));
		$this->smarty->assign('image_url', config_item('image_url'));
		$this->smarty->assign('error_msg', '');
		$this->smarty->assign('success_msg', '');		

		//$this->load->model('cover_model', 'cover_model');
		//$this->load->model('content_model', 'content_model');
		$this->load->model($this->this_page.'_model', 'this_model');
	}
	
	public function index()
	{
		//this->this_page = "contact";

		$this->load->library('user_agent');
		//if(strstr($this->agent->referrer(),$this->this_page.'/add') && $this->input->get('update') == "1")
		if(strstr($this->agent->referrer(),$this->this_page) && $this->input->get('update') == "1")
		{
			$this->smarty->assign('success_msg', 'Insert data successful.');
		}

		
		//$this->smarty->assign('cover',$this->cover_model->get_cover($this->this_page));	
		//$this->smarty->assign('content',$this->content_model->get_content($this->this_page));

		$this->smarty->assign('cover',$this->this_model->get_cover());
		$this->smarty->assign('content',$this->this_model->get_content());

		$this->smarty->display($this->this_page.'.tpl');
	}

	public function add()
	{
		if($this->input->post('save'))
		{
            $this->this_model->insert();
			redirect($this->this_page.'?update=1');
		}
		else
		{
			//$this->smarty->assign('cover',$this->cover_model->get_cover('contact'));	
			//$this->smarty->assign('content',$this->content_model->get_content('contact'));

			$this->smarty->assign('cover',$this->this_model->get_cover());
			$this->smarty->assign('content',$this->this_model->get_content());
			$this->smarty->display($this->this_page.'.tpl');
		}
	}

}