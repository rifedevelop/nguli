<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Bid_project_m extends CI_Model {

    public $m06_id;
    public $proposed_price;
    public $duration;
    public $est_project_cost;
    public $desc;
    public $created_on;
    public $updated_on;
    public $is_active;
    public $mitra_id;
    public $customer_id;

    public function insertBid()
    {
        $project_value = str_replace(".","",$this->input->post('project_value'));
        $this->m06_id = $this->input->post('id_post');
        $this->proposed_price = $project_value;
        $this->duration = $this->input->post('duration');
        $this->desc = $this->input->post('description');
        $this->created_on = date("Y-m-d H:i:s");
        $this->mitra_id = $_SESSION['data_session']['id'];
        $this->customer_id = $this->input->post('customer_id');

        $this->db->insert('m07_post_bid', $this);
        $result = $this->db->insert_id();
        if($this->db->affected_rows() > 0){
            return $result;
        } else {
            return false;
        }
    }

    public function getProjectBiddingMitra($id)
    {
        if(get_cookie('lang_is') == 'english')
        {
            $category = 'category_en';
            $subcategory = 'subcategory_en';
        } else {
            $category = 'category_id';
            $subcategory = 'subcategory_idn';
        }
        
        $this->db->select('a.id as id_post, a.name as post_name, a.customer_id, a.area, a.budget_min, a.budget_max, a.date_fr, a.date_to, b.name, b.id as customer_id, c.id as categoryid, c.'.$category.', DATEDIFF(a.est_date_to, CURDATE()) as selisih');
        $this->db->from('m06_post a');
        $this->db->join('m01_customer b', 'b.id = a.customer_id', 'inner');
        $this->db->join('r01_project_category c', 'c.id = a.category', 'inner');
        $this->db->where('md5(a.id)', $id);
        $query = $this->db->get();
        return $query;
    }

    public function getBiddingCustomer($idCustomer)
    {
        if(get_cookie('lang_is') == 'english')
        {
            $category = 'category_en';
            $subcategory = 'subcategory_en';
        } else {
            $category = 'category_id';
            $subcategory = 'subcategory_idn';
        }
        
        $this->db->select('a.id as id_bid, count(a.id) AS countbid, b.name as post_name, b.id as id_post, c.'.$category.' as category_name');
        $this->db->from('m07_post_bid a');
        $this->db->join('m06_post b', 'b.id = a.m06_id', 'inner');
        $this->db->join('r01_project_category c', 'c.id = b.category', 'inner');
        $this->db->join('m03_project d', 'd.m07_id = a.id', 'left');
        $this->db->where('a.customer_id', $idCustomer);
        $this->db->where('d.m07_id IS NULL');
        // $this->db->where('a.is_active', 1);
        $this->db->group_by('b.id');
        $this->db->order_by('a.created_on','desc');
        $query = $this->db->get();
        return $query;
    }

    public function getDetailBiddingCustomer($idPost)
    {
        if(get_cookie('lang_is') == 'english')
        {
            $category = 'category_en';
            $subcategory = 'subcategory_en';
        } else {
            $category = 'category_id';
            $subcategory = 'subcategory_idn';
        }
        
        $this->db->select('a.id as post_id, a.name as post_name, a.category as categoryid, a.budget_min, a.budget_max, a.description, a.area, b.id, b.'.$category.' as category_name, c.id, c.name as customer_name, c.photo as customer_photo, DATEDIFF(a.est_date_to, CURDATE()) as selisih');
        $this->db->from('m06_post a');
        $this->db->join('r01_project_category b', 'b.id = a.category', 'inner');
        $this->db->join('m01_customer c', 'c.id = a.customer_id', 'inner');
        // $this->db->join('m12_post_d d', 'd.m06_id = a.id', 'inner');
        $this->db->where('md5(a.id)', $idPost);
        $query = $this->db->get();
        return $query;
    }

    public function getBiddingFromMitra($idPost)
    {
        $this->db->select('a.id, a.proposed_price, a.m06_id, b.id as mitra_id, b.name as mitra_name, b.photo as mitra_photo');
        $this->db->from('m07_post_bid a');
        $this->db->join('m02_mitra b', 'b.id = a.mitra_id', 'inner');
        $this->db->where('a.m06_id', $idPost);
        $this->db->order_by('a.created_on','desc');
        $query = $this->db->get();
        return $query;
    }

    public function getDetailBiddingMitra($idBid)
    {
        if(get_cookie('lang_is') == 'english')
        {
            $category = 'category_en';
            $subcategory = 'subcategory_en';
        } else {
            $category = 'category_id';
            $subcategory = 'subcategory_idn';
        }

        $this->db->select('a.id, a.proposed_price, a.m06_id, a.desc, a.duration, b.id as mitra_id, b.name as mitra_name, c.id as post_id, c.name as post_name, c.category, c.area, d.id as customer_id, d.name as customer_name, DATEDIFF(c.est_date_to, CURDATE()) as selisih, e.'.$category.' as category_name');
        $this->db->from('m07_post_bid a');
        $this->db->join('m02_mitra b', 'b.id = a.mitra_id', 'inner');
        $this->db->join('m06_post c', 'c.id = a.m06_id', 'inner');
        $this->db->join('m01_customer d', 'd.id = c.customer_id', 'inner');
        $this->db->join('r01_project_category e', 'e.id = c.category', 'inner');
        $this->db->where('md5(a.id)', $idBid);
        $query = $this->db->get();
        return $query;
    }

    public function getImageBidMitra($idBid)
    {
        $this->db->where('m07_id', $idBid);
        $query = $this->db->get('m08_post_bid_pict');
        return $query;
    }

    // public function getDatailBiddingCustomer($idCustomer)
    // {
    //     if(get_cookie('lang_is') == 'english')
    //     {
    //         $category = 'category_en';
    //         $subcategory = 'subcategory_en';
    //     } else {
    //         $category = 'category_id';
    //         $subcategory = 'subcategory_idn';
    //     }
        
    //     $this->db->select('a.id as id_bid, count(a.id) AS countbid, c.name, d.'.$category.' as category_name, c.name as mitra_name');
    //     $this->db->from('m07_post_bid a');
    //     $this->db->join('m06_post b', 'b.id = a.m06_id', 'left');
    //     $this->db->join('m02_mitra c', 'c.id = a.mitra_id', 'left');
    //     $this->db->join('r01_project_category d', 'd.id = b.category', 'left');
    //     $this->db->group_by('b.id');
    //     $this->db->where('a.customer_id', $idCustomer);
    //     $query = $this->db->get();
    //     return $query;
    // }

}