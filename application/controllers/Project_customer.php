<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_customer extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('ceksession','language','timeago'));
        $this->load->model('Project_m','project');
        $this->load->library('pagination');
        ceksession();
        language();
    }
    
    public function index()
    {
        $page_num = $this->uri->segment(3,0);
        $limit = 5;
        $offset = ($page_num == NULL) ? 0 : ($page_num * $limit) - $limit;
        $totalPost = $this->project->totalPost()->result();

        $config = array(
            'base_url' => site_url('project/page/'),
            'total_rows' => $totalPost[0]->total,
            'per_page' => 5,
            'num_links' => 9,
            'use_page_numbers' => true,
            'first_link'       => 'First',
            'last_link'        => 'Last',
            'next_link'        => 'Next',
            'prev_link'        => 'Prev',
            'full_tag_open'   => '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">',
            'full_tag_close'   => '</ul></nav></div>',
            'num_tag_open'     => '<li class="page-item"><span class="page-link">',
            'num_tag_close'    => '</span></li>',
            'cur_tag_open'     => '<li class="page-item active"><span class="page-link">',
            'cur_tag_close'    => '<span class="sr-only">(current)</span></span></li>',
            'next_tag_open'    => '<li class="page-item"><span class="page-link">',
            'next_tagl_close'  => '<span aria-hidden="true">&raquo;</span></span></li>',
            'prev_tag_open'    => '<li class="page-item"><span class="page-link">',
            'prev_tagl_close'  => '</span>Next</li>',
            'first_tag_open'   => '<li class="page-item"><span class="page-link">',
            'first_tagl_close' => '</span></li>',
            'last_tag_open'    => '<li class="page-item"><span class="page-link">',
            'last_tagl_close'  => '</span></li>',
        );
        
        // $config['num_links'] = 1 ;
        // $config['prev_tag_open'] = '<button class="btn bg-red text-white mx-0 mx-sm-2">';
        // $config['prev_link'] = '<i class="fa fa-arrow-left"></i> Sebelumnya';
        // $config['prev_tag_open'] = '</button>';
        // $config['next_tag_open'] = '<button class="btn bg-red text-white mx-0 mx-sm-2">';
        // $config['next_link'] = 'Selanjutnya <i class="fa fa-arrow-right"></i>';
        // $config['next_tag_close'] = '</button>';
       

        $this->pagination->initialize($config);

		$data = array(
			'title' => $this->lang->line('title'), 
            'data_session' => $this->session->userdata('data_session'),
            'listPost' => $this->project->getPublishProject($config['per_page'],$offset)->result(),
            'total' => $totalPost[0]->total,
            'link' => $this->pagination->create_links(),
        );
        
        $data['main'] = 'page/project_v';

		$this->load->view('layout', $data);
    }

    public function page()
    {
        $page_num = $this->uri->segment(3,0);
        $limit = 5;
        $offset = ($page_num == NULL) ? 0 : ($page_num * $limit) - $limit;
        $totalPost = $this->project->totalPost()->result();

        $config = array(
            'base_url' => site_url('project/page/'),
            'first_url' => site_url('project'),
            'total_rows' => $totalPost[0]->total,
            'per_page' => $limit,
            'num_links' => 9,
            'use_page_numbers' => TRUE,
            'first_link'       => 'First',
            'last_link'        => 'Last',
            'next_link'        => 'Next',
            'prev_link'        => 'Prev',
            'full_tag_open'   => '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">',
            'full_tag_close'   => '</ul></nav></div>',
            'num_tag_open'     => '<li class="page-item"><span class="page-link">',
            'num_tag_close'    => '</span></li>',
            'cur_tag_open'     => '<li class="page-item active"><span class="page-link">',
            'cur_tag_close'    => '<span class="sr-only">(current)</span></span></li>',
            'next_tag_open'    => '<li class="page-item"><span class="page-link">',
            'next_tagl_close'  => '<span aria-hidden="true">&raquo;</span></span></li>',
            'prev_tag_open'    => '<li class="page-item"><span class="page-link">',
            'prev_tagl_close'  => '</span>Next</li>',
            'first_tag_open'   => '<li class="page-item"><span class="page-link">',
            'first_tagl_close' => '</span></li>',
            'last_tag_open'    => '<li class="page-item"><span class="page-link">',
            'last_tagl_close'  => '</span></li>',
        );
        
        // $config['num_links'] = 1 ;
        // $config['prev_tag_open'] = '<button class="btn bg-red text-white mx-0 mx-sm-2">';
        // $config['prev_link'] = '<i class="fa fa-arrow-left"></i> Sebelumnya';
        // $config['prev_tag_open'] = '</button>';
        // $config['next_tag_open'] = '<button class="btn bg-red text-white mx-0 mx-sm-2" style="color:#fff !important">';
        // $config['next_link'] = 'Selanjutnya <i class="fa fa-arrow-right"></i>';
        // $config['next_tag_close'] = '</button>';
       

        $this->pagination->initialize($config);

        $data = array(
            'title' => $this->lang->line('title'), 
            'data_session' => $this->session->userdata('data_session'),
            'listPost' => $this->project->getPublishProject($config['per_page'],$offset)->result(),
            'total' => $totalPost[0]->total,
            'link' => $this->pagination->create_links(),
        );
        
        $data['main'] = 'page/project_v';

        $this->load->view('layout', $data);
    }

    public function detail()
    {
        if($this->input->get('id')) {
            $id = addslashes($this->input->get('id'));
        } else {
            redirect($this->input->server('HTTP_REFERER'));
        }

        $getDetail = $this->project->getDetailProject($id)->result();
        $getImg = $this->project->getImagePost($getDetail[0]->post_id)->result();
        // var_dump($getImg);die();
        $data = array(
			'title' => $this->lang->line('title'), 
            'data_session' => $this->session->userdata('data_session'),
            'dataProject' => $getDetail[0],
            'dataImg' => $getImg,
        );
        
        $data['main'] = 'page/project_detail_v';

		$this->load->view('layout', $data);
    }

}