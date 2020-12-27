<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('ceksession','language'));
        $this->load->model('Post_customer_m','post');
        $this->load->model('Project_customer_m','project');
        $this->load->model('Bid_project_m');
        $this->load->model('Project_m','project');
        $this->load->model('Appoint_project_m','appoint');
        $this->load->model('Customer_m','customer');
        $this->load->library('form_validation');
        ceksession();
        language();
    }

    public function profile()
    {
        $sess = cekSessionCustomer('cek');
        
		$data = array(
            'title' => $this->lang->line('title'), 
            'data_session' => $sess
        );
        
        $data['main'] = 'customer/profile_customer_v';

		$this->load->view('layout', $data);
    }

    public function edit_profile()
    {
        $sess = cekSessionCustomer('cek');
        $user = $this->customer->editProfile($sess['id'])->result();

        $data = array(
            'title' => $this->lang->line('title'), 
            'data_session' => $sess,
            'dataUser' => $user[0]
        );
        
        $data['main'] = 'customer/profile_customer_edit_v';

        $this->load->view('layout', $data);
    }

    public function save_verif()
    {
        cekSessionCustomer();

        // Form Validation
        $this->form_validation->set_rules('nik', 'NIK', 'is_unique[m01_customer.nik]', array(
            'is_unique' => '%s telah digunakan!',
        ));
        $this->form_validation->set_rules('npwp', 'NPWP', 'is_unique[m01_customer.npwp]', array(
            'is_unique' => '%s telah digunakan!',
        ));

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('error', validation_errors() );
            redirect($this->input->server('HTTP_REFERER'));
        } else {
            $result = $this->customer->insVerify();
            if($result)
            {
                $this->session->set_flashdata('success', 'Upload dokumen berhasil!');
                redirect($this->input->server('HTTP_REFERER'));
            } else {
                $this->session->set_flashdata('error', 'Upload dokumen gagal!');
                redirect($this->input->server('HTTP_REFERER'));
            }
        }
    }

    public function save_profile()
    {
        cekSessionCustomer();
        $result = $this->customer->insProfile();
        if($result)
        {
            $this->session->set_flashdata('success', 'Profile berhasil diperbarui.');
            redirect($this->input->server('HTTP_REFERER'));
        } else {
            $this->session->set_flashdata('error', 'Profile gagal diperbarui.');
            redirect($this->input->server('HTTP_REFERER'));
        }
    }

    public function form_project()
    {
        $sess = cekSessionCustomer();
		$data = array(
            'title' => 'Form Project', 
            'data_session' => $sess,
            'categoryPost' => $this->post->getCategory()->result(),
            'subCategoryDialy' => $this->post->getSubCategoryById('3')->result(),
        );
        
        $data['main'] = 'customer/form_project_v';

		$this->load->view('layout', $data);
    }

    public function active_project()
    {
        $sess = cekSessionCustomer();
        $ongoingProject = $this->project->getActiveProject($sess['id'])->result();
        
		$data = array(
			'title' => $this->lang->line('title'),
            'data_session' => $sess,
            'categoryPost' => $this->post->getCategory()->result(),
            'subCategoryDialy' => $this->post->getSubCategoryById('3')->result(),
            'data_project' => $ongoingProject
        );
        
        $data['main'] = 'customer/active_project_v';

		$this->load->view('layout', $data);
    } 

    public function ongoing_project()
    {
        $sess = cekSessionCustomer();
        $ongoingProject = $this->project->getOngoingProject($sess['id'])->result();
        
        $data = array(
            'title' => $this->lang->line('title'),
            'data_session' => $sess,
            'categoryPost' => $this->post->getCategory()->result(),
            'subCategoryDialy' => $this->post->getSubCategoryById('3')->result(),
            'data_project' => $ongoingProject
        );
        
        $data['main'] = 'customer/active_project_v';

        $this->load->view('layout', $data);
    }

    public function detail_ongoing_design($idProject)
    {
        $customer = cekSessionCustomer();
        $getProject = $this->project->getDetailProject($idProject)->result();
        $imgPost = $this->project->getImagePost($getProject[0]->post_id)->result();
        $data = array(
            'title' => $this->lang->line('title'),
            'data_session' => $customer,
            'detail_project' => $getProject,
            'imgPost' => $imgPost,
        );
        
        $data['main'] = 'customer/ongoing_project_detail_design_v';

        $this->load->view('layout', $data);
    }

    public function detail_ongoing_project($idProject)
    {
        $customer = cekSessionCustomer();
        $getProject = $this->project->getDetailProject($idProject)->result();
        $imgPost = $this->project->getImagePost($getProject[0]->post_id)->result();
        $data = array(
            'title' => $this->lang->line('title'),
            'data_session' => $customer,
            'detail_project' => $getProject,
            'imgPost' => $imgPost,
        );
        
        $data['main'] = 'customer/ongoing_project_detail_v';

        $this->load->view('layout', $data);
    }

    public function transaction_post()
    {
        cekSessionCustomer();
        $idCustomer = $_SESSION['data_session']['id'];
        $getPost = $this->post->getPostCustomer($idCustomer)->result();
        $data = array(
            'title' => $this->lang->line('title'),
            'data_session' => $this->session->userdata('data_session'),
            'dataPost' => $getPost,
        );
        
        $data['main'] = 'customer/transaction_project_v';

        $this->load->view('layout', $data);
    }

    public function transaction_project()
    {
        cekSessionCustomer();
        $idCustomer = $_SESSION['data_session']['id'];
        $getPost = $this->post->getPostCustomer($idCustomer)->result();
        // $getPost = $this->post->getProjectCustomer($idCustomer)->result();
        $data = array(
            'title' => $this->lang->line('title'),
            'data_session' => $this->session->userdata('data_session'),
            'data_transaction' => $getPost,
        );
        
        $data['main'] = 'customer/transaction_project_v';

        $this->load->view('layout', $data);
    }

    public function history_project()
    {
        cekSessionCustomer();
        $idCustomer = $_SESSION['data_session']['id'];
        $getPost = $this->project->getHistory($idCustomer)->result();
        // $getPost = $this->post->getProjectCustomer($idCustomer)->result();
        $data = array(
            'title' => $this->lang->line('title'),
            'data_session' => $this->session->userdata('data_session'),
            'data_transaction' => $getPost,
        );
        
        $data['main'] = 'customer/history_project_v';

        $this->load->view('layout', $data);
    }

    public function detail_post($idPost)
    {
        cekSessionCustomer();
        $getPost = $this->post->getDetailPostCustomer($idPost)->result();
        // var_dump($getPost);die();
        $imgPost = $this->post->getImagePost($idPost)->result();
        $data = array(
            'title' => $this->lang->line('title'),
            'data_session' => $this->session->userdata('data_session'),
            'dataPost' => $getPost[0],
            'imgPost' => $imgPost,
        );
        
        $data['main'] = 'customer/detail_history_post_v';

        $this->load->view('layout', $data);
    }

    public function detail_transaction_project($idProject)
    {
        cekSessionCustomer();
        $getPost = $this->post->getDetailProjectCustomer($idProject)->result();
        // var_dump($getPost);die();
        $imgPost = $this->post->getImagePost($idProject)->result();
        $data = array(
            'title' => $this->lang->line('title'),
            'data_session' => $this->session->userdata('data_session'),
            'dataPost' => $getPost[0],
            'imgPost' => $imgPost,
        );
        
        $data['main'] = 'customer/detail_history_project_v';

        $this->load->view('layout', $data);
    }

    public function ongoing_bidding()
    {
        cekSessionCustomer();
        $idCustomer = $_SESSION['data_session']['id'];
        $getBid = $this->Bid_project_m->getBiddingCustomer($idCustomer)->result();
        // $countBid = $this->db->count_all_results();
		$data = array(
			'title' => $this->lang->line('title'),
            'data_session' => $this->session->userdata('data_session'),
            'categoryPost' => $this->post->getCategory()->result(),
            'subCategoryDialy' => $this->post->getSubCategoryById('3')->result(),
            'dataBid' => $getBid,
            // 'countbid' => $countBid,
        );
        
        $data['main'] = 'customer/ongoing_bidding_v';

		$this->load->view('layout', $data);
    }

    public function ongoing_bidding_detail()
    {
        if($this->input->get('id')) {
            $id = addslashes($this->input->get('id'));
        } else {
            redirect($this->input->server('HTTP_REFERER'));
        }

        $getDetail = $this->Bid_project_m->getDetailBiddingCustomer($id)->result();
        $getBiddingMitra = $this->Bid_project_m->getBiddingFromMitra($getDetail[0]->post_id)->result();
        $getImg = $this->project->getImagePost($getDetail[0]->post_id)->result();
        // var_dump($getBiddingMitra);die();
        $data = array(
			'title' => $this->lang->line('title'), 
            'data_session' => $this->session->userdata('data_session'),
            'dataProject' => $getDetail[0],
            'dataImg' => $getImg,
            'dataBidMitra' => $getBiddingMitra,
        );
        
        $data['main'] = 'customer/ongoing_bidding_detail_v';

		$this->load->view('layout', $data);
    }

    public function ongoing_bidding_mitra()
    {

    // mendapatkan 90 hari sebelum tanggal 12 Desember 2014
    // $tgl_beli_tiket = mktime(0, 0, 0, date("m"), date("d")+30, date("Y"));
    // echo date("Y-m-d", $tgl_beli_tiket);

        if($this->input->get('id')) {
            $idBid = addslashes($this->input->get('id'));
        } else {
            redirect($this->input->server('HTTP_REFERER'));
        }

        $getBiddingMitra = $this->Bid_project_m->getDetailBiddingMitra($idBid)->result();
        $getImg = $this->Bid_project_m->getImageBidMitra($getBiddingMitra[0]->id)->result();
        // var_dump($getBiddingMitra);die();
        $data = array(
            'title' => $this->lang->line('title'), 
            'data_session' => $this->session->userdata('data_session'),
            'dataBidMitra' => $getBiddingMitra[0],
            'dataImg' => $getImg,
        );
        
        $data['main'] = 'customer/ongoing_bidding_mitra_v';

        $this->load->view('layout', $data);
    }

    public function form_pemilihan()
    {

        if($this->input->get('id')) {
            $idBid = addslashes($this->input->get('id'));
        } else {
            redirect($this->input->server('HTTP_REFERER'));
        }

        $cekAppoint = $this->appoint->cekAppointCustomer($idBid)->result();

        if($cekAppoint){
            redirect(site_url().'payment_appoint/detail/'.md5((string)$cekAppoint[0]->id));
        }

        $getBiddingMitra = $this->Bid_project_m->getDetailBiddingMitra($idBid)->result();
        $getImg = $this->Bid_project_m->getImageBidMitra($getBiddingMitra[0]->id)->result();
        
        $data = array(
            'title' => $this->lang->line('title'), 
            'data_session' => $this->session->userdata('data_session'),
            'dataBidMitra' => $getBiddingMitra[0],
            'dataImg' => $getImg,
        );
        
        $data['main'] = 'customer/form_pemilihan_v';

        $this->load->view('layout', $data);
    }
    
}