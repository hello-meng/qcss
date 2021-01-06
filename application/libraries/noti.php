<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class noti {

    public $cnt;

    public function __construct()
    {
        $CI =& get_instance();
		$CI->load->helper('url');
        
		$CI->load->model('backend/home_model');

		$this->cnt['count_product'] = $CI->home_model->count_all_waiting_product(); 
		$this->cnt['count_product_review'] = $CI->home_model->count_all_waiting_product_review();
		$this->cnt['count_merchant'] = $CI->home_model->count_all_waiting_merchant();
		$this->cnt['count_inf'] = $CI->home_model->count_all_waiting_inf();
		$this->cnt['count_inf_review'] = $CI->home_model->count_all_waiting_inf_review();

		$this->cnt['count_chat'] = $CI->home_model->count_all_chat();

    }
}

?>