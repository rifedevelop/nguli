<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration_m extends CI_Model {

    public $name;
    public $email;
    public $hp;
    public $email_verif_code;
    public $password;
    // public $img_ktp;
    // public $img_npwp;
    public $hp_verif_at;
    public $created_on;

    public function registrationCustomer($codeEmail) 
    {
        $this->name = $this->input->post('name', true);
        $this->email = $this->input->post('email', true);
        $this->hp = $this->input->post('hp', true);
        $this->password = password_hash($this->input->post('password', true), PASSWORD_DEFAULT);
        // $this->img_ktp = $nik;
        // $this->img_npwp = $npwp;
        $this->created_on = date("Y-m-d H:i:s");
        $this->email_verif_code = $codeEmail;

        $result = $this->db->insert('m01_customer', $this);

        if($result)
        {
            $this->db->where('name',$this->name);
            $this->db->where('email', $this->email);
            $result = $this->db->get('m01_customer',1);
            $row = $result->row();
            return $row;
        }
    }
    
    public function registrationMitra($codeEmail) 
    {
    
        $this->name = $this->input->post('name', true);
        $this->email = $this->input->post('email', true);
        $this->password = password_hash($this->input->post('password', true), PASSWORD_DEFAULT);
        // $this->img_ktp = $imgNik;
        // $this->img_npwp = $imgNpwp;
        $this->created_on = date("Y-m-d H:i:s");
        $this->email_verif_code = $codeEmail;

        $result = $this->db->insert('m02_mitra', $this);

        if($result)
        {
            $this->db->where('name',$this->name);
            $this->db->where('email', $this->email);
            $result = $this->db->get('m02_mitra',1);
            $row = $result->row();
            return $row;
        }
    }

}