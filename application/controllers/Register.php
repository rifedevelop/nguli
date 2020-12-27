<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('upload_image'));
        $this->load->model('Registration_m', 'Regis');
    }

    public function insertRegisCustomer()
    {

        // Form Validation
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[m01_customer.email]', array(
            'is_unique' => '%s telah digunakan!!!',
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => 'Silahkan masukan %s!!!',
        ));

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('error', validation_errors() );
            redirect(base_url());
        } 
        
        if($this->input->post('email'))
        {
            // Upload Foto NIK
            // $nik = upload_nik($this->input->post('name',true),'customer');
            // $npwp = upload_npwp($this->input->post('name',true),'customer');

            // Code Verify Email
            $codeEmail = chr(rand(65,90)) . rand(1,9) . chr(rand(65,90)) . rand(1,9) . chr(rand(65,90)) . chr(rand(65,90)); 
            
            // Insert Data
            $row = $this->Regis->registrationCustomer($codeEmail);

            if($this->db->affected_rows())
            {
                // Send Email
                $name = $row->name;
                $email = $row->email;
                $code_verify = $row->email_verif_code;
                $type_user = 'customer';
                $this->send_email_verify($name,$email,$code_verify,$type_user);

                $this->session->set_flashdata('success', 'Registrasi Berhasil!!!');
                redirect(base_url());
            } else {
                $this->session->set_flashdata('error', 'Registrasi Gagal!!!');
                redirect(base_url(), 'refresh');
            }

        } else {
            $this->session->set_flashdata('error', 'Terjadi kesalahan');
            redirect(base_url());
        }
        
    }

    public function insertRegisMitra()
    {
        // Form validation
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[m02_mitra.email]', array(
            'is_unique' => '%s telah digunakan!!!',
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => 'Silahkan masukan %s!!!',
        ));

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('error', validation_errors() );
            redirect(base_url());
        } 
        
        if($this->input->post('email'))
        {
            // Upload Foto NIK NPWP
            // $nik = upload_nik($this->input->post('name',true),'mitra');
            // $npwp = upload_npwp($this->input->post('name',true),'mitra'); 
            
            // Code Verify Email
            $codeEmail = chr(rand(65,90)) . rand(1,9) . chr(rand(65,90)) . rand(1,9) . chr(rand(65,90)) . chr(rand(65,90)); 
            
            // Insert Data
            $row = $this->Regis->registrationMitra($codeEmail);
            
            if($this->db->affected_rows())
            {
                // Send Email
                $name = $row->name;
                $email = $row->email;
                $code_verify = $row->email_verif_code;
                $type_user = 'mitra';
                $this->send_email_verify($name,$email,$code_verify,$type_user);
                
                $this->session->set_flashdata('success', 'Registrasi Berhasil!!!');
                redirect(base_url());
            } else {
                $this->session->set_flashdata('error', 'Registrasi Gagal!!!');
                redirect(base_url(), 'refresh');
            }
        } else {
            $this->session->set_flashdata('error', 'Terjadi kesalahan');
            redirect(base_url());
        }
        
    }

    public function send_email_verify($name,$email,$code_verify,$type_user)
    {
        $this->load->library('email');
        $config = Array(        
            'protocol' => 'mail',
            'smtp_host' => 'mail.perkuahatesimbelin.com',
            'smtp_port' => 587,
            'smtp_user' => 'nguli@perkuahatesimbelin.com',
            'smtp_pass' => 'xef#nguli$beta',
            'smtp_timeout' => '4',
            'mailtype'  => 'html', 
            'charset'   => 'iso-8859-1',
            'wordwrap' => TRUE
        );
        
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");

        $this->email->from('admin@nguliyuk.com','Nguli');
        $this->email->to($email);
        $this->email->subject('Confirm Email');

        $message = '';
        $message .= '<p> Dear ' . $name.',</p>';
        if($type_user == 'customer')
        {
            $message .= '<p> Confrim your email <a href="' . base_url().'register/verify_customer/'.md5((string)$email).'/'.md5((string)$code_verify).'">click here</a></p>';
        } else {
            $message .= '<p> Confrim your email <a href="' . base_url().'register/verify_mitra/'.md5((string)$email).'/'.md5((string)$code_verify).'">click here</a></p>';
        }
            $message .= '<p> Thanks</p>';

        $this->email->message($message);
        $this->email->send();

        if ($this->email->send()){
            return "sent";
        } else {
            return "failed to send";    
        }
    }

    public function verify_customer()
    {
        $email = $this->uri->segment('3');
        $code_verify = $this->uri->segment('4');

        // Check Active
        $result = $this->db->get_where('m01_customer',array('md5(email)'=>$email),1)->row();
        if($result->verif_status < 1)
        {
            $data = array(
                'is_active' => 1
            );
            $this->db->set('email_verif_at','now()',FALSE);
            $this->db->where('md5(email)', $email);
            $this->db->where('md5(email_verif_code)', $code_verify);
            $result = $this->db->update('m01_customer', $data);
            if($result) {
                $this->session->set_flashdata('success', 'Akun berhasil diaktivasi!!!');
                redirect(base_url(),'refresh');
            } else {
                $this->session->set_flashdata('error', 'Akun gagal diaktivasi!!!');
                redirect(base_url(),'refresh');
            }
        } else {
            $this->session->set_flashdata('error', 'Akun sudah terdaftar!!!');
            redirect(base_url(),'refresh');
        }
    }
    
    public function verify_mitra()
    {
        $email = $this->uri->segment('3');
        $code_verify = $this->uri->segment('4');

        // Check Active
        $result = $this->db->get_where('m02_mitra',array('md5(email)'=>$email),1)->row();
        if($result->verif_status < 1)
        {
            $data = array(
                'is_active' => 1
            );
            $this->db->set('email_verif_at','now()',FALSE);
            $this->db->where('md5(email)', $email);
            $this->db->where('md5(email_verif_code)', $code_verify);
            $result = $this->db->update('m02_mitra', $data);
            if($result) {
                $this->session->set_flashdata('success', 'Akun berhasil diaktivasi!!!');
                redirect(base_url(),'refresh');
            } else {
                $this->session->set_flashdata('error', 'Akun gagal diaktivasi!!!');
                redirect(base_url(),'refresh');
            }
        } else {
            $this->session->set_flashdata('error', 'Akun sudah terdaftar!!!');
            redirect(base_url(),'refresh');
        }
    }

    public function send_sms_verify($number='',$message='')
    {
        $username   = 'username';
        $password   = '*******';
        $originator = 'sender name';
        $message    = 'Welcom to ......, your activation code is : '.$message;
        //set POST variables
        $url = 'http://exmaple.com/bulksms/go?';

        $fields = array(
        'username'   => urlencode($username),
        'password'   => urlencode($password),
        'originator' => urlencode($originator),
        'phone'      => urlencode($number),
        'msgtext'    => urlencode($message)
        );

        $fields_string = '';

        //url-ify the data for the POST
        foreach($fields as $key=>$value)
        {
        $fields_string .= $key.'='.$value.'&';
        }

        rtrim($fields_string,'&');

        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POST,count($fields));
        curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);

        //execute post
        $result = curl_exec($ch);

        //close connection
        curl_close($ch);
        return $result;
    }

}