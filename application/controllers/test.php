<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
class Test extends CI_Controller {

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
			$this->this_page = "test";
			$this->this_sub_page = 'index';
		}
		
		$this->smarty->assign('page_name', 'Test');
		$this->smarty->assign('page', $this->this_page);
		$this->smarty->assign('sub_page', $this->this_sub_page);
		$this->smarty->assign('site_name', config_item('site_name'));
		$this->smarty->assign('company_name', config_item('company_name'));
		$this->smarty->assign('base_url', config_item('base_url'));
		$this->smarty->assign('image_url', config_item('image_url'));
		$this->smarty->assign('error_msg', '');
		$this->smarty->assign('success_msg', '');

		$this->load->model($this->this_page.'_model', 'this_model');
	}
	
	public function index()
	{
		$this->smarty->assign('items', $this->this_model->get_all());
		$this->smarty->display($this->this_page.'.tpl');
	}

	public function add()
	{
		if($this->input->post('save'))
		{
			$this->this_model->insert();
			redirect($this->this_page);
		}

		$this->smarty->display($this->this_page.'_'.$this->this_sub_page.'.tpl');
	}

	public function edit($id = 0)
	{
		if($this->input->post('save'))
		{
			$this->this_model->update($id);
			redirect($this->this_page);
		}

		$this->smarty->assign('item', $this->this_model->get_by_id($id));
		$this->smarty->display($this->this_page.'_'.$this->this_sub_page.'.tpl');
	}

	public function delete($id = 0)
	{
		$this->this_model->delete($id);
		redirect($this->this_page);
	}
}