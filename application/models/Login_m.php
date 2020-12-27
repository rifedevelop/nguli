<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_m extends CI_Model {

    public $email;

    public function authMitra()
    {
        $this->email = $this->input->post('email', true);
        $this->db->select('id, name, email, password, verif_status, is_active, photo');
        $this->db->where('email', $this->email);
        $query = $this->db->get('m02_mitra',1);
        return $query;
    } 
    
    public function authCustomer()
    {
        $this->email = $this->input->post('email', true);
        $this->db->select('id,name,email,hp,password,verif_status, is_active, photo');
        $this->db->where('email', $this->email);
        $query = $this->db->get('m01_customer',1);
        return $query;
    }

}