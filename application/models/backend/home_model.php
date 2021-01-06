<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function count_all_chat()
    {
        $this->db->select('count(*) as count_chat');
        $this->db->from('chat');

        $this->db->where("chat.status", "S");

        $query = $this->db->get();
        $data = $query->row_array();
        return $data['count_chat'];
    }

    function count_all_waiting_product()
    {
        $this->db->select('count(*) as count_product');
        $this->db->from('product');
        $this->db->join('product_category', 'product_category.id = product.category_id');
        $this->db->join('product_sub_category', 'product_sub_category.id = product.sub_category_id');

        $this->db->where("product.status", "Y");
        $this->db->where("product.status_approve", "W");

        $query = $this->db->get();
        $data = $query->row_array();
        return $data['count_product'];
    }

    function count_all_waiting_product_review()
    {
        $this->db->select('count(*) as count_product_review');
		$this->db->from('review');
		$this->db->join('member', 'member.id = review.member_id');
        $this->db->join('product', 'product.id = review.product_id');

        $this->db->where("review.status", "Y");
        $this->db->where("review.status_approve", "W");

        $query = $this->db->get();
        $data = $query->row_array();
        return $data['count_product_review'];
    }

    function count_all_waiting_merchant()
    {
        $this->db->select('count(*) as count_merchant');
        $this->db->from('merchant');

        $this->db->where("merchant.status", "Y");
        $this->db->where("merchant.status_approve", "W");

        $query = $this->db->get();
        $data = $query->row_array();
        return $data['count_merchant'];
    }

    function count_all_waiting_inf()
    {
        $this->db->select('count(*) as count_inf');
        $this->db->from('influencer');

        $this->db->where("influencer.status", "Y");
        $this->db->where("influencer.status_approve", "W");

        $query = $this->db->get();
        $data = $query->row_array();
        return $data['count_inf'];
    }

    function count_all_waiting_inf_review()
    {
        $this->db->select('count(*) as count_inf_review');
        $this->db->from('influencer_review');
        $this->db->join('influencer', 'influencer.id = influencer_review.influencer_id');

        $this->db->where("influencer.status", "Y");
        $this->db->where("influencer.status_approve", "A");

        $this->db->where("influencer_review.status", "Y");
        $this->db->where("influencer_review.status_approve", "W");

        $query = $this->db->get();
        $data = $query->row_array();
        return $data['count_inf_review'];
    }

}