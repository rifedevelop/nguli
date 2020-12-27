<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Post_m extends CI_Model {

    // public $id;
    public $category;
    public $name;
    public $subcategory;
    public $area;
    public $range_min;
    public $range_max;
    public $budget_min;
    public $budget_max;
    public $description;
    public $daily_worker;
    public $date_to;
    public $est_date_to;
    public $announce_date_to;
    public $customer_id;

    public function getCategory()
    {
        if(get_cookie('lang_is') == 'english')
        {
            $this->db->select('id, category_en');
        } else {
            $this->db->select('id, category_id'); 
        }
        $query = $this->db->get('r01_project_category');
        return $query;
    }

    public function getCategoryById($id)
    {
        if(get_cookie('lang_is') == 'english')
        {
            $this->db->select('id, category_en');
        } else {
            $this->db->select('id, category_id'); 
        }
        $this->db->where('id', $id);
        $query = $this->db->get('r01_project_category');
        return $query;
    }
    
    public function getSubCategoryById($id)
    {
        if(get_cookie('lang_is') == 'english')
        {
            $this->db->select('id, subcategory_en');
        } else {
            $this->db->select('id, subcategory_idn'); 
        }
        $this->db->where('category_id', $id);
        $query = $this->db->get('r02_project_subcategory');
        return $query;
    }

    public function getAllPost()
    {
        if(get_cookie('lang_is') == 'english')
        {
            $lang = 'category_en';
        } else {
            $lang = 'category_id';
        }
        
        $this->db->select('category, budget_min, budget_max, description, date_fr, date_to, b.id, b.'.$lang.', c.id, c.name');
        $this->db->from('m06_post a');
        $this->db->join('r01_project_category b', 'b.id = a.category', 'inner');
        $this->db->join('m01_customer c', 'c.id = a.customer_id', 'inner');
        $this->db->where('a.is_active', 1);
        $this->db->order_by('a.date_fr', 'asc');
        $this->db->limit(10);
        $query = $this->db->get();
        return $query;
    }

    public function insertPost()
    {
        $this->category = $this->input->post('category', true);
        $this->name = $this->input->post('project_name', true);
        $this->area = $this->input->post('building_area', true);
        $this->range_min = $this->input->post('range_min', true);
        $this->range_max = $this->input->post('range_max', true);
        $this->budget_min = str_replace(".","",$this->input->post('budget_min', true));
        $this->budget_max = str_replace(".","",$this->input->post('budget_max', true));
        $this->description= $this->input->post('description', true);
        $this->est_date_to = $this->input->post('close_tender', true);
        $this->announce_date_to = $this->input->post('notif_tender', true);
        $this->customer_id = $_SESSION['data_session']['id'];

        $this->db->insert('m06_post', $this);
        $result = $this->db->insert_id();
        

        if($this->db->affected_rows())
        {
            return $result;
        } else {
            return false;
        }

    }

    public function insertPostDaily()
    {
        $insDaily = array(
            'category' => $this->input->post('category', true),
            'name' => $this->input->post('project_name', true),
            'subcategory' => $this->input->post('subcategory', true),
            'daily_worker' => $this->input->post('worker', true),
            'daily_execution' => $this->input->post('execution', true),
            'description' => $this->input->post('daily_desc', true),
            'date_fr' => $this->input->post('start_daily', true),
            'date_to' => $this->input->post('end_daily', true),
            'customer_id' => $_SESSION['data_session']['id'],
            'hp' => $_SESSION['data_session']['hp']
        );
        $this->db->set('updated_on', 'now()', FALSE);
        $this->db->insert('m06_post', $insDaily);
        if($this->db->affected_rows() > 0)
        {
            return true;
        } else {
            return false;
        }
    }

}