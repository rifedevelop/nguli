<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Login_m', 'Login');
		$this->load->helper(array('language'));
    }

    public function insForgotMitra()
    {
        // Form Validation
        $this->form_validation->set_rules('email', 'Email', 'required', array(
            'required' => 'Masukan %s!',
        ));

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('error', validation_errors() );
            redirect(site_url());
        }

        if($this->input->post('email'))
        {
            $f_email = $this->input->post('email');

            // Code Verify Email
            $otp_email = chr(rand(65,90)) . rand(1,9) . chr(rand(65,90)) . rand(1,9) . chr(rand(65,90)) . chr(rand(65,90));

            $update_code = $this->db->query("UPDATE m02_mitra SET email_verif_code='$otp_email' WHERE email='$f_email'");

            if($update_code)
            {
                $row = $this->db->query("SELECT name,email,email_verif_code FROM m02_mitra WHERE email='$f_email' LIMIT 1")->row();

                // Send Email
                $name = $row->name;
                $email = $row->email;
                $code_verify = $row->email_verif_code;
                $type_user = 'mitra';
                $result_send_email = $this->send_email_forgot($name,$email,$otp_email,$type_user);

                // var_dump($row->name);die();

                $this->session->set_flashdata('success', 'Reset password berhasil dikirim.');
                redirect(base_url());
            } else {
                $this->session->set_flashdata('error', 'Reset password gagal dikirim.');
                redirect(base_url(), 'refresh');
            }

        } else {
            $this->session->set_flashdata('error', 'Terjadi kesalahan');
            redirect(base_url());
        }
    }

    public function insForgotCustomer()
    {
        // Form Validation
        $this->form_validation->set_rules('email', 'Email', 'required', array(
            'required' => 'Masukan %s!',
        ));

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('error', validation_errors() );
            redirect(site_url());
        }

        if($this->input->post('email'))
        {
            $f_email = $this->input->post('email', true);

            // Code Verify Email
            $otp_email = chr(rand(65,90)) . rand(1,9) . chr(rand(65,90)) . rand(1,9) . chr(rand(65,90)) . chr(rand(65,90));

            $update_code = $this->db->query("UPDATE m01_customer SET email_verif_code='$otp_email' WHERE email='$f_email'");

            if($update_code)
            {
                $row = $this->db->query("SELECT name,email,email_verif_code FROM m01_customer WHERE email='$f_email' LIMIT 1")->row();

                // Send Email
                $name = $row->name;
                $email = $row->email;
                $code_verify = $row->email_verif_code;
                $type_user = 'customer';
                $result_send_email = $this->send_email_forgot($name,$email,$otp_email,$type_user);

                // var_dump($row->name);die();

                $this->session->set_flashdata('success', 'Reset password berhasil dikirim.');
                redirect(base_url());
            } else {
                $this->session->set_flashdata('error', 'Reset password gagal dikirim.');
                redirect(base_url(), 'refresh');
            }

        } else {
            $this->session->set_flashdata('error', 'Terjadi kesalahan');
            redirect(base_url());
        }
    }

    public function send_email_forgot($name,$email,$code_verify,$type_user)
    {

        $this->load->library('email'); 
        $config = Array(        
            'protocol' => 'mail',
			'mailpath' => '/usr/sbin/sendmail',
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
            $message .= '<p> Reset your password <a href="' . site_url().'forgot/verifyforgotcustomer/'.md5((string)$email).'/'.md5((string)$code_verify).'">click here</a></p>';
        } else {
            $message .= '<p> Reset your password <a href="' . site_url().'forgot/verifyforgotmitra/'.md5((string)$email).'/'.md5((string)$code_verify).'">click here</a></p>';
        }
            $message .= '<p> Thanks</p>';

        $this->email->message($message);

        if ($this->email->send()){
            return true;
        } else {
            return false; 
            // return $this->email->print_debugger(array('headers')); 
        }
    }

    public function verifyForgotMitra()
    {
		language();
        $email = $this->uri->segment('3');
        $code_verify = $this->uri->segment('4');

        // Check Active
        $row = $this->db->query("SELECT id,email FROM m02_mitra WHERE md5(email)='$email' AND md5(email_verif_code)='$code_verify' LIMIT 1")->row();

        if($row !== NULL)
        {
        	$data['title'] = 'Nguliyuk.com - Reset Password';
        	// $_SESSION['id'] = $row->id;
			// $data['user'] = $this->session->mark_as_temp('id', 1000);
			$tempdata = array('id' => $row->id);
			$expire = 300;
			$data['user'] = $this->session->set_tempdata($tempdata, NULL, $expire);
			$data['main'] = 'page/reset_password_mitra_v';
			if($this->session->tempdata('id'))
			{
         		$this->load->view('layout', $data);
			} else {
				$this->session->set_flashdata('error', 'Sesi telah habis.');
            	redirect(site_url(),'refresh');
			}
        } else {
            $this->session->set_flashdata('error', 'Terjadi kesalahan, silahkan ulangi kembali.');
            redirect(site_url(),'refresh');
        }
    } 

    public function verifyForgotCustomer()
    {
        language();
        $email = $this->uri->segment('3');
        $code_verify = $this->uri->segment('4');

        // Check Active
        $row = $this->db->query("SELECT id,email FROM m01_customer WHERE md5(email)='$email' AND md5(email_verif_code)='$code_verify' LIMIT 1")->row();

        if($row !== NULL)
        {
        	$data['title'] = 'Nguliyuk.com - Reset Password';
        	// $_SESSION['id'] = $row->id;
			// $data['user'] = $this->session->mark_as_temp('id', 1000);
			$tempdata = array('id' => $row->id, 'type' => 'customer');
			$expire = 300;
			$data['user'] = $this->session->set_tempdata($tempdata, NULL, $expire);
			$data['main'] = 'page/reset_password_customer_v';
			if($this->session->tempdata('id'))
			{
         		$this->load->view('layout', $data);
			} else {
				$this->session->set_flashdata('error', 'Sesi telah habis.');
            	redirect(site_url(),'refresh');
			}
        } else {
            $this->session->set_flashdata('error', 'Terjadi kesalahan, silahkan ulangi kembali.');
            redirect(site_url(),'refresh');
        }
    }

    public function savePasswordMitra()
    {
    	$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]', array(
            	'matches' => 'Password tidak sama!',
        	)
		);

		if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('error', validation_errors() );
            redirect($this->input->server('HTTP_REFERER'));
        }

        if($_POST['password'] && $_POST['id'])
        {
        	$id = $this->input->post('id', TRUE);
        	$password = $this->input->post('password', TRUE);
        	$hash_password = password_hash($password, PASSWORD_DEFAULT);
        	$result = $this->db->query("UPDATE m02_mitra SET email_verif_code=NULL, password='$hash_password' WHERE md5(id)='$id'");
        	if($result)
        	{
        		$this->session->unset_tempdata('id');
        		$this->session->set_flashdata('success', 'Password berhasil direset!');
            	redirect(site_url());
        	}
        } else {
        	$this->session->set_flashdata('error', 'Terjadi kesalahan.');
            redirect(site_url(),'refresh');
        }
    }

    public function savePasswordCustomer()
    {
    	$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]', array(
            	'matches' => 'Password tidak sama.',
        	)
		);

		if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('error', validation_errors() );
            redirect($this->input->server('HTTP_REFERER'));
        }

        if($_POST['password'] && $_POST['id'])
        {
        	$id = $this->input->post('id', TRUE);
        	$password = $this->input->post('password', TRUE);
        	$hash_password = password_hash($password, PASSWORD_DEFAULT);
        	$result = $this->db->query("UPDATE m01_customer SET email_verif_code=NULL, password='$hash_password' WHERE md5(id)='$id'");
        	if($result)
        	{
        		$this->session->unset_tempdata('id');
        		$this->session->set_flashdata('success', 'Password berhasil direset!');
            	redirect(site_url());
        	}
        } else {
        	$this->session->set_flashdata('error', 'Terjadi kesalahan.');
            redirect(site_url(),'refresh');
        }
    }

}