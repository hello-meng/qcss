<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

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

		$this->smarty->assign('page_name', 'User Management');
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

    public function check_username_exists()
    {
    	header('Content-Type: application/json');

    	$inputJSON = file_get_contents('php://input');
		$input = json_decode($inputJSON, TRUE);

		$output = array(
			"status" => (($this->this_model->check_username_exists($input) == false) ? false : true)
		);

		echo json_encode($output);
    }

    public function login()
	{
		$this->smarty->assign('page_name', 'Login');

		if(@$_SESSION['admin']['id'] > 0)
		{
			redirect('backend/home');
		}
		
		if($this->input->post('login'))
		{
			$data = $this->this_model->login();
			if(@$data['id']>0)
			{
				$_SESSION['admin'] = $data;
				redirect('backend/home');
			}
			else
			{	
				$this->smarty->assign('error_msg', 'Username & Password Incorrect.');
				$this->smarty->display('backend/'.$this->this_page.'_'.$this->this_sub_page.'.tpl');
			}
		}
		else
		{
			$this->smarty->display('backend/'.$this->this_page.'_'.$this->this_sub_page.'.tpl');
		}
	}
	
	public function logout()
	{
		unset($_SESSION['admin']);
		redirect('backend/home');
	}

	public function forget_password()
	{
		$this->smarty->assign('page_name', 'Forget Password');

		if(@$_SESSION['admin']['id'] > 0)
		{
			redirect('backend/home');
		}
		
		if($this->input->post('forget_password'))
		{
			$code = $this->this_model->forget_password();
			if($code != false)
			{
				$username = $this->input->post('username');
				$email = $this->input->post('email');
				$reset_password_url = config_item('base_url').$this->this_page.'/reset_password?username='.$username.'&salt='.$code;

				$to = $this->input->post('email');
				$subject = 'Forget Password - '.config_item('site_name').' : '.config_item('company_name');
				$message = 'You have been submit forget password form.<hr />If you want to reset password please click link below.<br /><a href="'.$reset_password_url.'">Reset Password</a>';
				$this->load->library('mailer');
				$this->mailer->send($email, $subject, $message);
				$this->smarty->assign('success_msg', 'Please check email & click link for reset password.');
				$this->smarty->display('backend/'.$this->this_page.'_'.$this->this_sub_page.'.tpl');
			}
			else
			{
				$this->smarty->assign('error_msg', 'Username & Email Incorrect.');
				$this->smarty->display('backend/'.$this->this_page.'_'.$this->this_sub_page.'.tpl');
			}
		}
		else
		{
			$this->smarty->display('backend/'.$this->this_page.'_'.$this->this_sub_page.'.tpl');
		}
	}

	public function reset_password()
	{
		$this->smarty->assign('page_name', 'Reset Password');

		if(@$_SESSION['admin']['id'] > 0)
		{
			redirect('backend/home');
		}

		if($this->input->get('username') != "" && $this->input->get('salt') != "")
		{
			$salt = $this->this_model->get_salt($this->input->get('username'));
			if($salt == false || $salt == "" || $salt != $this->input->get('salt'))
			{
				redirect('backend/home');
			}
		}
		else
		{
			redirect('backend/home');
		}
		
		if($this->input->post('reset_password'))
		{
			$this->this_model->reset_password();
			$this->smarty->assign('success_msg', 'Reset Password complete, You can login with new Password.');
			$this->smarty->display('backend/'.$this->this_page.'_'.$this->this_sub_page.'.tpl');
		}
		else
		{
			$this->smarty->display('backend/'.$this->this_page.'_'.$this->this_sub_page.'.tpl');
		}
	}
	
	public function edit_profile()
	{
		$this->smarty->assign('page_name', 'Edit Profile');

		$this->load->library('user_agent');
		if(strstr($this->agent->referrer(),$this->this_page.'/edit_profile') && $this->input->get('update') == "1")
		{
			$this->smarty->assign('success_msg', 'Update data successful.');
		}
		else if(strstr($this->agent->referrer(),$this->this_page.'/edit_profile') && $this->input->get('error') == "1")
		{
			$this->smarty->assign('error_msg', 'File cannot upload, Please try again.');
		}

		if($this->input->post('save'))
		{
			$this->this_model->update_profile();
			
			if(@$_FILES['thumbnail']['name']!="")
			{
				$_id = $this->authen->id;

				if(!is_dir('./images/upload/user'))
				{
					mkdir('./images/upload/user',0777);
				}

				if(!is_dir('./images/upload/user/'.($_id%4000)))
				{
					mkdir('./images/upload/user/'.($_id%4000),0777);
				}
				
				if(!is_dir('./images/upload/user/'.($_id%4000).'/'.$_id))
				{
					mkdir('./images/upload/user/'.($_id%4000).'/'.$_id,0777);
				}
				
				$config = array();
				$config['upload_path'] = './images/upload/user/'.($_id%4000).'/'.$_id.'/';
				$config['allowed_types'] = 'jpg|jpeg|gif|png';
				$config['max_size']    = 3072;
				$config['overwrite']    = FALSE;
				$this->load->library('upload', $config);

				if($this->upload->do_upload('thumbnail'))
				{
					$upload_info = $this->upload->data();
					
					$params = array(
						'fileName' => './images/upload/user/'.($_id%4000).'/'.$_id.'/'.$upload_info['file_name'],
					);
					$this->load->library('resize', $params);
					$this->resize->resizeImage(225, 225, 'crop');
					$this->resize->saveImage('./images/upload/user/'.($_id%4000).'/'.$_id.'/thumbnail.jpg', 100);
				}
			}

			$data = $this->this_model->get_profile();
			if(@$data['id']>0)
			{
				$_SESSION['admin'] = $data;
			}

			redirect('backend/'.$this->this_page.'/edit_profile?update=1');
		}
		else
		{
			$this->smarty->assign('prefix', $this->this_model->get_prefix());
			$this->smarty->assign('item', $this->this_model->get_profile());
			$this->smarty->display('backend/'.$this->this_page.'_'.$this->this_sub_page.'.tpl');
		}
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
		else if(strstr($this->agent->referrer(),$this->this_page.'/delete'))
		{
			$this->smarty->assign('success_msg', 'Delete data successful.');
		}

		$this->smarty->assign('role', $this->this_model->get_role());
		$this->smarty->assign('prefix', $this->this_model->get_prefix());
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
		if($this->input->post('username') != "")
		{
			$this->this_model->insert();

			if(@$_FILES['thumbnail']['name']!="")
			{
				$_id = $this->this_model->last_id();

				if(!is_dir('./images/upload/user'))
				{
					mkdir('./images/upload/user',0777);
				}

				if(!is_dir('./images/upload/user/'.($_id%4000)))
				{
					mkdir('./images/upload/user/'.($_id%4000),0777);
				}
				
				if(!is_dir('./images/upload/user/'.($_id%4000).'/'.$_id))
				{
					mkdir('./images/upload/user/'.($_id%4000).'/'.$_id,0777);
				}
				
				$config = array();
				$config['upload_path'] = './images/upload/user/'.($_id%4000).'/'.$_id.'/';
				$config['allowed_types'] = 'jpg|jpeg|gif|png';
				$config['max_size']    = 3072;
				$config['overwrite']    = FALSE;
				$this->load->library('upload', $config);

				if($this->upload->do_upload('thumbnail'))
				{
					$upload_info = $this->upload->data();
					
					$params = array(
						'fileName' => './images/upload/user/'.($_id%4000).'/'.$_id.'/'.$upload_info['file_name'],
					);
					$this->load->library('resize', $params);
					$this->resize->resizeImage(225, 225, 'crop');
					$this->resize->saveImage('./images/upload/user/'.($_id%4000).'/'.$_id.'/thumbnail.jpg', 100);
				}
			}

			redirect('backend/'.$this->this_page.'?update=1');
		}
		else
		{
			$this->smarty->assign('role', $this->this_model->get_role());
			$this->smarty->assign('prefix', $this->this_model->get_prefix());
			$this->smarty->display('backend/'.$this->this_page.'_'.$this->this_sub_page.'.tpl');
		}
	}
	
	public function edit()
	{
		if($this->input->post('save'))
		{
			$this->this_model->update();
			
			if(@$_FILES['thumbnail']['name']!="")
			{
				$_id = $this->uri->segment(4);

				if(!is_dir('./images/upload/user'))
				{
					mkdir('./images/upload/user',0777);
				}

				if(!is_dir('./images/upload/user/'.($_id%4000)))
				{
					mkdir('./images/upload/user/'.($_id%4000),0777);
				}
				
				if(!is_dir('./images/upload/user/'.($_id%4000).'/'.$_id))
				{
					mkdir('./images/upload/user/'.($_id%4000).'/'.$_id,0777);
				}
				
				$config = array();
				$config['upload_path'] = './images/upload/user/'.($_id%4000).'/'.$_id.'/';
				$config['allowed_types'] = 'jpg|jpeg|gif|png';
				$config['max_size']    = 3072;
				$config['overwrite']    = FALSE;
				$this->load->library('upload', $config);

				if($this->upload->do_upload('thumbnail'))
				{
					$upload_info = $this->upload->data();
					
					$params = array(
						'fileName' => './images/upload/user/'.($_id%4000).'/'.$_id.'/'.$upload_info['file_name'],
					);
					$this->load->library('resize', $params);
					$this->resize->resizeImage(225, 225, 'crop');
					$this->resize->saveImage('./images/upload/user/'.($_id%4000).'/'.$_id.'/thumbnail.jpg', 100);
				}
			}

			redirect('backend/'.$this->this_page.'?update=1');
		}
		else
		{
			$user_item = $this->this_model->get_by_id();
			if(@$user_item['id'] <= 0)
			{
				redirect('backend/'.$this->this_page);
			}

			$this->smarty->assign('role', $this->this_model->get_role());
			$this->smarty->assign('prefix', $this->this_model->get_prefix());
			$this->smarty->assign('item', $user_item);
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