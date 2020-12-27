<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Post_customer_m extends CI_Model {

	public function getPostCustomer($idCustomer)
    {
        if(get_cookie('lang_is') == 'english')
        {
            $category = 'category_en';
            $subcategory = 'subcategory_en';
        } else {
            $category = 'category_id';
            $subcategory = 'subcategory_idn';
        }
        
        $this->db->select('a.id,a.name,a.category,a.payment_status,a.est_date_fr,a.est_date_to,a.name as post_name,a.area,a.paid_on,DATEDIFF(a.est_date_to, CURDATE()) as selisih,a.created_on,b.'.$category.' as category_name,c.id as invoice_id,c.invoice_code,c.price as total_price,c.expired_on');
        $this->db->from('m06_post a');
        $this->db->join('r01_project_category b', 'b.id = a.category', 'inner');
        $this->db->join('t01_invoice c', 'c.post_id = a.id', 'inner');
        $this->db->where('a.customer_id', $idCustomer);
        $this->db->where('c.expired_on >', 'now()');
        $this->db->where('c.status', '0');
        $this->db->where('c.paid_on', 'is not null');
        $this->db->order_by('a.created_on','desc');
        $query = $this->db->get();
        return $query;
    }

    public function getProjectCustomer($idCustomer)
    {
        if(get_cookie('lang_is') == 'english')
        {
            $category = 'category_en';
            $subcategory = 'subcategory_en';
        } else {
            $category = 'category_id';
            $subcategory = 'subcategory_idn';
        }
        
        $this->db->select('a.id,a.name as post_name,a.category,a.payment_status, a.est_date_to, b.'.$category.' as category_name,c.id as invoice_id,c.invoice_code');
        $this->db->from('m03_project a');
        $this->db->join('r01_project_category b', 'b.id = a.category', 'inner');
        $this->db->join('t01_invoice c', 'c.project_id = a.id', 'inner');
        $this->db->where('a.customer_id', $idCustomer);
        $this->db->order_by('a.created_on','desc');
        $query = $this->db->get();
        return $query;
    }

    public function getDetailProjectCustomer($idProject)
    {
        if(get_cookie('lang_is') == 'english')
        {
            $category = 'category_en';
            $subcategory = 'subcategory_en';
        } else {
            $category = 'category_id';
            $subcategory = 'subcategory_idn';
        }
        
        $this->db->select('a.id,a.budget,a.area,a.m07_id,DATEDIFF(a.est_date_to, CURDATE()) as selisih ,b.'.$category.' as category_name,c.id as invoice_id,c.invoice_code,d.desc as description,e.name as post_name,f.name as customer_name');
        $this->db->from('m03_project a');
        $this->db->join('r01_project_category b', 'b.id = a.category', 'inner');
        $this->db->join('t01_invoice c', 'c.project_id = a.id', 'inner');
        $this->db->join('m07_post_bid d', 'd.id = a.m07_id', 'inner');
        $this->db->join('m06_post as e', 'e.id = d.m06_id', 'inner');
        $this->db->join('m01_customer as f', 'f.id = a.customer_id', 'inner');
        $this->db->where('md5(a.id)', $idProject);
        $query = $this->db->get();
        return $query;
    }

    public function getDetailPostCustomer($idPost)
    {
        if(get_cookie('lang_is') == 'english')
        {
            $category = 'category_en';
            $subcategory = 'subcategory_en';
        } else {
            $category = 'category_id';
            $subcategory = 'subcategory_idn';
        }
        
        $this->db->select('a.id,a.name,a.description,a.category,a.payment_status,a.budget_min,a.budget_max,a.category as category_id,a.area,b.'.$category.' as category_name, DATEDIFF(a.est_date_to, CURDATE()) as selisih_tgl, a.est_date_to as close_tender, now() as now, timediff(a.est_date_to, now()) as selisih_waktu, c.name as customer_name');
        $this->db->from('m06_post a');
        $this->db->join('r01_project_category b', 'b.id = a.category', 'inner');
        $this->db->join('m01_customer c', 'c.id = a.customer_id', 'inner');
        $this->db->where('md5(a.id)', $idPost);
        $query = $this->db->get();
        return $query;
    }

    public function getDetailBiddingCustomer($idPost)
    {
        if(get_cookie('lang_is') == 'english')
        {
            $lang = 'category_en';
        } else {
            $lang = 'category_id';
        }
        
        $this->db->select('a.id as post_id, a.category as categoryid, a.budget_min, a.budget_max, a.description, a.area, b.id, b.'.$lang.', c.id, c.name, DATEDIFF(a.est_date_to, CURDATE()) as selisih');
        $this->db->from('m06_post a');
        $this->db->join('r01_project_category b', 'b.id = a.category', 'inner');
        $this->db->join('m01_customer c', 'c.id = a.customer_id', 'inner');
        // $this->db->join('m12_post_d d', 'd.m06_id = a.id', 'inner');
        $this->db->where('md5(a.id)', $idPost);
        $query = $this->db->get();
        return $query;
    }

    public function getTransactionCustomer($idCustomer)
    {
        if(get_cookie('lang_is') == 'english')
        {
            $category = 'category_en';
            $subcategory = 'subcategory_en';
        } else {
            $category = 'category_id';
            $subcategory = 'subcategory_idn';
        }
        
        $this->db->select('a.id,a.name as post_name,a.category,a.payment_status, a.est_date_to, a.area, DATEDIFF(a.est_date_to, CURDATE()) as selisih, b.'.$category.' as category_name,c.id as invoice_id,c.invoice_code,c.total_price,c.created_on,c.paid_on');
        $this->db->from('m03_project a');
        $this->db->join('r01_project_category b', 'b.id = a.category', 'inner');
        $this->db->join('t01_invoice c', 'c.project_id = a.id', 'inner');
        $this->db->where('a.customer_id', $idCustomer);
        // $this->db->where('a.done', '1');
        $this->db->order_by('a.created_on','desc');
        $query = $this->db->get();
        return $query;
    }

    public function getImagePost($idPost)
    {
        $this->db->where('md5(m06_id)', $idPost);
        $query = $this->db->get('m12_post_d');
        return $query;
    }

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
}