<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
class Car extends CI_Controller {

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
			$this->this_page = "car";
			$this->this_sub_page = 'index';
		}
		
		$this->smarty->assign('page_name', 'Car');
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
		$fBrand = "";
		$fModel = "";
		$fYear = "";

		if($this->input->post())
		{
			$fBrand = $this->input->post('fBrand');
			$fModel = $this->input->post('fModel');
			$fYear = $this->input->post('fYear');
			//$this->smarty->assign('car_count', $this->this_model->count_all($fBrand,$fModel,$fYear));
			//$this->smarty->assign('cars', $this->this_model->get_all($fBrand,$fModel,$fYear));
		}
		else
		{
			//$this->smarty->assign('car_count', $this->this_model->count_all("","",""));
			//$this->smarty->assign('cars', $this->this_model->get_all("","",""));
		}

		$this->smarty->assign('brands', $this->this_model->get_brand());
		$this->smarty->assign('models', $this->this_model->get_model());
		$this->smarty->assign('years', $this->this_model->get_year());

		$this->smarty->assign('car_count', $this->this_model->count_all($fBrand,$fModel,$fYear));
		$this->smarty->assign('cars', $this->this_model->get_all($fBrand,$fModel,$fYear));
		//$this->smarty->assign('car_count', $this->this_model->count_all("","",""));
		//$this->smarty->assign('cars', $this->this_model->get_all("","",""));

		$this->smarty->display($this->this_page.'.tpl');
	}


	public function detail($id = 0)
	{
		//$this->smarty->display($this->this_sub_page.'.tpl');
		$this->smarty->assign('car', $this->this_model->get_by_id($id));
		$this->smarty->display($this->this_page.'_'.$this->this_sub_page.'.tpl');
	}
}