<?php defined('BASEPATH') or exit('No direct script access allowed');

class Project_m extends CI_Model
{

    protected $tPost = 'm06_post';
    // public $id;
    public $category;
    public $area;
    public $range_min;
    public $range_max;
    public $budget_min;
    public $budget_max;
    public $description;
    public $date_to;
    public $est_date_to;
    public $announce_date_to;
    public $customer_id;

    public function getCategory()
    {
        if (get_cookie('lang_is') == 'english') {
            $this->db->select('id, category_en');
        } else {
            $this->db->select('id, category_id');
        }
        $query = $this->db->get('r01_project_category');
        return $query;
    }

    public function getCategoryById($id)
    {
        if (get_cookie('lang_is') == 'english') {
            $this->db->select('id, category_en');
        } else {
            $this->db->select('id, category_id');
        }
        $this->db->where('id', $id);
        $query = $this->db->get('r01_project_category');
        return $query;
    }

    public function getDetailProject($id)
    {
        if (get_cookie('lang_is') == 'english') {
            $lang = 'category_en';
        } else {
            $lang = 'category_id';
        }

        $this->db->select('a.id as post_id, a.name as post_name, a.budget_min, a.budget_max, a.description, a.date_fr, a.date_to, a.area, b.id, b.' . $lang . ' as category_name, c.id, c.name, DATEDIFF(a.est_date_to, CURDATE()) as selisih');
        $this->db->from('m06_post a');
        $this->db->join('r01_project_category b', 'b.id = a.category', 'inner');
        $this->db->join('m01_customer c', 'c.id = a.customer_id', 'inner');
        // $this->db->join('m12_post_d d', 'd.m06_id = a.id', 'inner');
        $this->db->where('md5(a.id)', $id);
        $query = $this->db->get();
        return $query;
    }

    public function getImagePost($idPost)
    {
        $this->db->where('m06_id', $idPost);
        $query = $this->db->get('m12_post_d');
        return $query;
    }

    public function getPublishProject($limit, $offset)
    {
        if (get_cookie('lang_is') == 'english') {
            $lang = 'category_en';
        } else {
            $lang = 'category_id';
        }

        $date_now = date("Y-m-d");
        $this->db->select('a.id as id_post, a.name as post_name, a.budget_min, a.budget_max, a.description, a.est_date_to, b.id, b.' . $lang . ', c.id as customer_id, c.name as customer_name, DATEDIFF(a.est_date_to, CURDATE()) as selisih');
        $this->db->from('m06_post a');
        $this->db->join('r01_project_category b', 'b.id = a.category', 'inner');
        $this->db->join('m01_customer c', 'c.id = a.customer_id', 'inner');
        $this->db->join('m03_project d', 'd.m06_id = a.id', 'left');
        // $this->db->join('m07_post_bid e', 'a.id = e.m06_id', 'left');
        $this->db->where('a.is_active', 1);
        $this->db->where('d.m06_id IS NULL');
        // $this->db->where('e.m06_id IS NULL');
        $this->db->where('a.est_date_to >= DATE_ADD(NOW(), INTERVAL 1 DAY)');
        $category = array('1', '2');
        $this->db->where_in('a.category', $category);
        // $this->db->where('a.est_date_to >=', $date_now);
        $this->db->group_by('a.id');
        $this->db->order_by('a.id', 'DESC');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query;
    }

    public function totalPost()
    {
        $this->db->select('COUNT(id) AS total');
        $this->db->from('m06_post');
        $category = array('1', '2');
        $this->db->where_in('category', $category);
        $this->db->where('is_active', 1);
        $this->db->where('est_date_to >= DATE_ADD(NOW(), INTERVAL 1 DAY)');
        return $this->db->get();
    }

    public function insertPost()
    {
        $this->category = $this->input->post('category', true);
        $this->area = $this->input->post('building_area', true);
        $this->range_min = $this->input->post('range_min', true);
        $this->range_max = $this->input->post('range_max', true);
        $this->budget_min = $this->input->post('budget_min', true);
        $this->budget_max = $this->input->post('budget_max', true);
        $this->description = $this->input->post('description', true);
        $this->est_date_to = $this->input->post('close_tender', true);
        $this->announce_date_to = $this->input->post('notif_tender', true);
        $this->customer_id = $_SESSION['data_session']['id'];

        $this->db->insert('m06_post', $this);
        $result = $this->db->insert_id();


        if ($this->db->affected_rows() > 0) {
            return $result;
        } else {
            return false;
        }
    }
}
