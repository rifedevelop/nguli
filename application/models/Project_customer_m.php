<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Project_customer_m extends CI_Model {

	public function getOngoingProject($idCustomer)
    {
        if(get_cookie('lang_is') == 'english')
        {
            $category = 'category_en';
            $subcategory = 'subcategory_en';
        } else {
            $category = 'category_id';
            $subcategory = 'subcategory_idn';
        }
        
        $this->db->select('a.id,a.category,a.duration,a.handover_date,a.document,a.est_date_fr,a.est_date_to,b.'.$category.' as category_name,a.area,a.budget,d.name as post_name,e.name as customer_name,e.photo');
        $this->db->from('m03_project a');
        $this->db->join('r01_project_category b', 'b.id = a.category', 'inner');
        $this->db->join('m04_progress c', 'c.m03_id = a.id', 'left');
        $this->db->join('m06_post d', 'd.id = a.m06_id', 'inner');
        $this->db->join('m01_customer e', 'e.id = a.customer_id', 'inner');
        $this->db->where('a.customer_id', $idCustomer);
        $this->db->where('a.done', 0);
        $this->db->where('a.payment_status', 1);
        $this->db->order_by('a.created_on', 'desc');
        $query = $this->db->get();
        return $query;
    }

    public function getDetailProject($idProject)
    {
        if(get_cookie('lang_is') == 'english')
        {
            $category = 'category_en';
            $subcategory = 'subcategory_en';
        } else {
            $category = 'category_id';
            $subcategory = 'subcategory_idn';
        }

        $this->db->select('m06_id as post_id,a.id,a.category,a.duration,a.handover_date,a.document,a.est_date_fr,a.est_date_to,b.'.$category.' as category_name,a.area,a.budget,d.name as post_name,e.name as customer_name,e.photo,f.name as mitra_name,f.photo as photo_mitra');
        $this->db->from('m03_project a');
        $this->db->join('r01_project_category b', 'b.id = a.category', 'inner');
        // $this->db->join('m04_progress c', 'c.m03_id = a.id', 'left');
        $this->db->join('m06_post d', 'd.id = a.m06_id', 'inner');
        $this->db->join('m01_customer e', 'e.id = a.customer_id', 'inner');
        $this->db->join('m02_mitra f', 'f.id = a.mitra_id', 'inner');
        $this->db->where('md5(a.id)', $idProject);
        $query = $this->db->get();
        return $query;
        
        // $this->db->select('a.id as id, a.m06_id as post_id, a.budget, a.description, a.est_date_fr, a.est_date_to, a.area, a.m07_id, a.category, b.'.$lang.' as category_name, c.id, c.name, DATEDIFF(a.est_date_to, CURDATE()) as selisih');
        // $this->db->from('m03_project a');
        // $this->db->join('r01_project_category b', 'b.id = a.category', 'inner');
        // $this->db->join('m01_customer c', 'c.id = a.customer_id', 'inner');
        // // $this->db->join('m12_post_d d', 'd.m06_id = a.id', 'inner');
        // $this->db->where('md5(a.id)', $idProject);
        // $query = $this->db->get();
        // return $query;
    }

    public function getActiveProject($idCustomer)
    {
        if(get_cookie('lang_is') == 'english')
        {
            $category = 'category_en';
            $subcategory = 'subcategory_en';
        } else {
            $category = 'category_id';
            $subcategory = 'subcategory_idn';
        }
        
        $this->db->select('a.id,a.category,a.name as post_name,a.est_date_to,b.'.$category.' as category_name,pj.est_date_fr as pj_date_fr');
        $this->db->from('m06_post a');
        $this->db->join('r01_project_category b', 'b.id = a.category', 'inner');
        $this->db->join('m03_project pj', 'pj.m06_id = a.id', 'left');
        $this->db->join('m04_progress d', 'd.m03_id = pj.id', 'left');
        $this->db->where('a.customer_id', $idCustomer);
        $this->db->where('a.payment_status', '1');
        // $this->db->where('pj.done', '0');
        $this->db->order_by('a.created_on', 'desc');
        $query = $this->db->get();
        return $query;
    }
    
    public function getHistory($idCustomer)
    {
        if(get_cookie('lang_is') == 'english')
        {
            $category = 'category_en';
            $subcategory = 'subcategory_en';
        } else {
            $category = 'category_id';
            $subcategory = 'subcategory_idn';
        }
        
        $this->db->select('a.id,a.name as post_name,a.category,a.payment_status,a.done,a.est_date_to, a.area, DATEDIFF(a.est_date_to, CURDATE()) as selisih, b.'.$category.' as category_name,c.id as invoice_id,c.invoice_code,c.total_price,c.created_on,c.paid_on');
        $this->db->from('m03_project a');
        $this->db->join('r01_project_category b', 'b.id = a.category', 'inner');
        $this->db->join('t01_invoice c', 'c.project_id = a.id', 'inner');
        $this->db->where('a.customer_id', $idCustomer);
        $this->db->where('a.done', '1');
        $this->db->order_by('a.created_on','desc');
        $query = $this->db->get();
        return $query;
    }

    public function getImagePost($idPost)
    {
        $this->db->where('m06_id', $idPost);
        $query = $this->db->get('m12_post_d');
        return $query;
    }
}