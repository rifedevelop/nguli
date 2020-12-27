<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Project_mitra_m extends CI_Model {

	public function getOngoingProject($idMitra)
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
        // $this->db->join('m04_progress c', 'c.m03_id = a.id', 'left');
        $this->db->join('m06_post d', 'd.id = a.m06_id', 'inner');
        $this->db->join('m01_customer e', 'e.id = a.customer_id', 'inner');
        $this->db->where('a.mitra_id', $idMitra);
        $this->db->where('a.done', 0);
        $this->db->where('a.paid_on >', 0);
        $this->db->order_by('a.created_on','desc');
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
        
        $this->db->select('m06_id as post_id,a.id,a.category,a.duration,a.handover_date,a.document,a.est_date_fr,a.est_date_to,b.'.$category.' as category_name,a.area,a.budget,d.name as post_name,e.name as customer_name,e.photo,f.name as mitra_name');
        $this->db->from('m03_project a');
        $this->db->join('r01_project_category b', 'b.id = a.category', 'inner');
        // $this->db->join('m04_progress c', 'c.m03_id = a.id', 'left');
        $this->db->join('m06_post d', 'd.id = a.m06_id', 'inner');
        $this->db->join('m01_customer e', 'e.id = a.customer_id', 'inner');
        $this->db->join('m02_mitra f', 'f.id = a.mitra_id', 'inner');
        $this->db->where('md5(a.id)', $idProject);
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