<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chatt extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('ceksession','language'));
        ceksession();
        language();
    }

    public function customer()
    {
        $this->load->view('customer/chatt/chatt_v');
    }

}