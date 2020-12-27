<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testemail extends CI_Controller {

    public function index() 
    {
        $from_email = "rife.beta@gmail.com"; 
        $to_email = 'rife.develop@gmail.com';
        $pass = 'Xef#rife$beta';

        //  $config = Array(
        //         'mailtype'  => 'html',
        //         'charset'   => 'utf-8',
        //         'protocol' => 'smtp',
        //         'smtp_host' => 'ssl://smtp.googlemail.com',
        //         'smtp_user' => $from_email,
        //         'smtp_pass' => $pass,
        //         // 'smtp_crypto' => 'ssl',
        //         'smtp_port' => 465,
        // );

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
        $this->load->library('email', $config); 
        $this->email->set_newline("\r\n");
        $this->email->from($from_email, 'Nguli');
        $this->email->to($to_email);
        $this->email->subject('Kirim Email dengan SMTP Gmail CodeIgniter | Die Coding');
        $this->email->message("Ini adalah contoh email");

        if ($this->email->send()) {
            echo 'Sukses! email berhasil dikirim.';
        } else {
            show_error($this->email->print_debugger());
        }
    }

}