<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_m extends CI_Model {

	protected $tProject = 'm03_project';
	protected $tPost = 'm06_post';
	protected $tConfirm = 't02_payment_confirm';

	public function __construct() {
        parent::__construct();
        $this->load->helper(array('compress'));
    }

	public function detailPost($idPost)
	{
		$this->db->select('id,name,category');
		$this->db->where('md5(id)', $idPost);
		$query = $this->db->get($this->tPost);
		return $query;
	}

	public function detailImage($idPost)
	{	
		$this->db->select('img');
		$this->db->where('md5(m06_id)',$idPost);
		$this->db->limit('1');
		$query = $this->db->get('m12_post_d');
		return $query;
	}

	public function insPost()
	{
		$idPost = $this->input->post('post_id',true);
		$invoiceCode = $this->invoice('PS');
		
        $this->db->trans_start();
	        $this->db->set('payment_method', $this->input->post('method_pay',true));
			$this->db->set('updated_on', 'now()', FALSE);
	        $this->db->set('payment_status', 0);
			$this->db->where('id', $idPost);
			$this->db->update($this->tPost);

			$this->db->set('post_id', $idPost);
			$this->db->set('invoice_code', $invoiceCode);
	        $this->db->set('status', 0);
	        $this->db->set('price', $this->input->post('total',true));
	        $this->db->set('total_price', $this->input->post('total',true));
	        $this->db->set('payment_method', $this->input->post('method_pay',true));
			$this->db->insert('t01_invoice');
        $this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
		{
		    return false;
		} else {
			return true;
		}
	}

	public function insAppoint()
	{
		$idProject = $this->input->post('project_id',true);
		$invoiceCode = $this->invoice('PJ');
	 	$this->db->trans_start();
			$this->db->set('payment_method', $this->input->post('method_pay',true));
			$this->db->set('updated_on', 'now()', FALSE);
	        $this->db->set('payment_status', 0);
			$this->db->where('id', $idProject);
			$this->db->update($this->tProject);

			$this->db->set('project_id', $idProject);
			$this->db->set('invoice_code', $invoiceCode);
	        $this->db->set('status', 0);
	        $this->db->set('price', $this->input->post('total',true));
	        $this->db->set('total_price', $this->input->post('total',true));
	        $this->db->set('payment_method', $this->input->post('method_pay',true));
			$this->db->insert('t01_invoice');
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
		{
		    return false;
		} else {
			return true;
		}
	}

	public function detailAppoint($idProject)
	{
		$this->db->select('a.id, a.name, a.category, a.budget, a.duration, a.payment_status, c.name as post_name');
		$this->db->from($this->tProject.' a');
		$this->db->join('m07_post_bid b', 'b.id = a.m07_id', 'inner');
		$this->db->join($this->tPost.' c', 'c.id = b.m06_id', 'inner');
		$this->db->where('md5(a.id)', $idProject);
		$query = $this->db->get();
		return $query;
	}

	public function confirm_post()
	{
		$idInvoice = $this->input->post('invoice_id',true);
		$codeInvoice = $this->input->post('invoice_code',true);

		$imgName = $this->upload_image($idInvoice,$codeInvoice);

		$this->db->set('t01_id', $idInvoice);
		$this->db->set('proof_img', $imgName);
		$this->db->insert($this->tConfirm);

		if ($this->db->affected_rows() > 0)
		{
			return true;
		} else {
		    return false;
		}
	}

	public function invoice($code){
        $sql = "SELECT max(id) as id, curdate() as today FROM t01_invoice";
        $data = $this->db->query($sql)->result();

        $date = str_replace('-','',$data[0]->today);
        $kodeBarang = $data[0]->id;
        $urutan = (int) substr($kodeBarang, 5, 5);
        $urutan++;
        $huruf = $code;
		$resultCode = $huruf.$date.$_SESSION['data_session']['id'].$data[0]->id;
        
        return $resultCode;
    }

	public function upload_image($idInvoice,$codeInvoice)
	{
        $this->load->library('upload');
        // Config Upload Image
        $path = './uploads/payment-post';
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '4000';
        $config['overwrite'] = FALSE;
        $config['remove_spaces'] = TRUE;
        $config['file_name'] = strtolower($idInvoice.'_'.$codeInvoice);
        // $config['file_name'] = md5((string)$name).'_nik_'.strtolower($name);
        $result = $this->upload->initialize($config);
        // Upload Image NIK   
        if (!$this->upload->do_upload('image')){
            $result = $this->upload->display_errors();
            $this->session->set_flashdata('error', $result);
            redirect($this->input->server('HTTP_REFERER'));
        }else{
        	// Compress Image
            compress_image($this->upload->data('file_name'),$path);
            $result = strtolower($this->upload->data('file_name'));
            return $result;
        }
        
	}

}