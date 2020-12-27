<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Login_m', 'Login');
    }

    public function authMitra()
    {
        // Validation
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('error', form_error('email').form_error('password') );
            redirect(base_url());
            return;
        }
        
        // Get Data User
        $getTemp = $this->Login->authMitra()->result_array();
        
        if($this->Login->authMitra()->num_rows() > 0)
        {
            // Cek status verify
            if($getTemp[0]['is_active'] > 0)
            {
                if(password_verify($this->input->post('password', true), $getTemp[0]['password']))
                {
                    $dataSession = array(
                        'id' => $getTemp[0]['id'],
                        'name' => $getTemp[0]['name'],
                        'email' => $getTemp[0]['email'],
                        'status_verif' => $getTemp[0]['verif_status'],
                        'type_user' => 'mitra',
                        'photo_profile' => $getTemp[0]['photo'],
                        'logged_in' => TRUE,
                    );
                    $this->session->set_userdata('data_session', $dataSession);
                    redirect(base_url('mitra/profile'));
                } else {
                    $this->session->set_flashdata('error', "Email atau Password salah!!!" );
                    redirect(base_url());
                }
            } else {
                $this->session->set_flashdata('error', "Silahkan konfirmasi email!!!" );
                redirect(base_url());
            }
        } else {
            $this->session->set_flashdata('error', "Pengguna tidak ditemukan!!!" );
            redirect(base_url());
        }
    }

    public function authCustomer()
    {

        // Validation
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('error', form_error('email').form_error('password') );
            redirect(base_url());
            return;
        }
        
        // Get Data User
        $getTemp = $this->Login->authCustomer()->result_array();
        
        if($this->Login->authCustomer()->num_rows() > 0)
        {   
            // Cek status verify
            if($getTemp[0]['is_active'] > 0)
            {
                if(password_verify($this->input->post('password', true), $getTemp[0]['password']))
                {
                    $dataSession = array(
                        'id' => $getTemp[0]['id'],
                        'name' => $getTemp[0]['name'],
                        'email' => $getTemp[0]['email'],
                        'hp' => $getTemp[0]['hp'],
                        'status_verif' => $getTemp[0]['verif_status'],
                        'photo_profile' => $getTemp[0]['photo'],
                        'type_user' => 'customer',
                        'logged_in' => TRUE,
                    );
                    $this->session->set_userdata('data_session', $dataSession);
                    redirect(base_url('customer/profile'));
                } else {
                    $this->session->set_flashdata('error', "Email atau Password salah!!!" );
                    redirect(base_url());
                }
            } else {
                $this->session->set_flashdata('error', "Silahkan konfirmasi email!!!" );
                redirect(base_url());
            }
        } else {
            $this->session->set_flashdata('error', "Pengguna tidak ditemukan!!!" );
            redirect(base_url());
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url(), 'refresh');
    }

}