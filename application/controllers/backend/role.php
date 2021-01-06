<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Role extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		
		$this->load->library('authen');
		$this->smarty->assign('admin', $this->authen->user_data);
		$this->smarty->assign('authen', $this->authen);
		$this->this_page = $this->authen->controller;
		
		if($this->authen->function != "")
		{
			$this->this_sub_page = $this->authen->function;
		}
		else
		{
			$this->this_sub_page = 'index';
		}
		
		$this->smarty->assign('page_name', 'Role');
		$this->smarty->assign('page', $this->this_page);
		$this->smarty->assign('sub_page', $this->this_sub_page);
		$this->smarty->assign('site_name', config_item('site_name'));
		$this->smarty->assign('company_name', config_item('company_name'));
		$this->smarty->assign('base_url', config_item('base_url'));
		$this->smarty->assign('image_url', config_item('image_url'));
		$this->smarty->assign('error_msg', '');
		$this->smarty->assign('success_msg', '');

		$this->load->model('backend/'.$this->this_page.'_model', 'this_model');
    }

	public function index()
	{	
		$this->load->library('user_agent');
		if(strstr($this->agent->referrer(),$this->this_page.'/add') && $this->input->get('update') == "1")
		{
			$this->smarty->assign('success_msg', 'Insert data successful.');
		}
		else if(strstr($this->agent->referrer(),$this->this_page.'/edit') && $this->input->get('update') == "1")
		{
			$this->smarty->assign('success_msg', 'Update data successful.');
		}
		else if(strstr($this->agent->referrer(),$this->this_page.'/authen') && $this->input->get('update') == "1")
		{
			$this->smarty->assign('success_msg', 'Update data successful.');
		}
		else if(strstr($this->agent->referrer(),$this->this_page.'/delete'))
		{
			$this->smarty->assign('success_msg', 'Delete data successful.');
		}

		$this->smarty->display('backend/'.$this->this_page.'.tpl');
	}

	public function load_data()
	{
		header('Content-Type: application/json');

		$total = $this->this_model->count_all();
		$data = $this->this_model->get_all($this->input->post('start'), $this->input->post('length'));

		$output = array(
			"draw" => $this->input->post('draw'),
			"recordsFiltered" => $total,
			"recordsTotal" => $total,
			"data" => $data
		);

		echo json_encode($output);
	}
	
	public function add()
	{
		if($this->input->post('save') != "")
		{
			$this->this_model->insert();
			redirect('backend/'.$this->this_page.'?update=1');
		}
		else
		{
			$this->smarty->assign('section', $this->this_model->get_section());
			$this->smarty->assign('menu', $this->this_model->get_menu());
			$this->smarty->display('backend/'.$this->this_page.'_'.$this->this_sub_page.'.tpl');
		}
	}
	
	public function edit()
	{
		if($this->input->post('save'))
		{
			$this->this_model->update();
			redirect('backend/'.$this->this_page.'?update=1');
		}
		else
		{
			$this->smarty->assign('section', $this->this_model->get_section());
			$this->smarty->assign('menu', $this->this_model->get_menu());
			$this->smarty->assign('item', $this->this_model->get_by_id());
			$this->smarty->display('backend/'.$this->this_page.'_'.$this->this_sub_page.'.tpl');
		}
	}
	
	public function delete()
	{
		$this->this_model->delete();
		$this->smarty->assign('location', 'backend/'.$this->this_page);
		$this->smarty->display('backend/do_complete.tpl');
	}
}