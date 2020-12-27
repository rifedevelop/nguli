<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Author: https://www.roytuts.com
*/

class Multilingual extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$language = '';
		if ($this->input->post('locale')) {
			$language = $this->input->post('locale');
			if($language == 'id') {
				$this->lang->load('locale', 'indonesia');
			} else if($language == 'french') {
				$this->lang->load('locale', 'french');
			} else {
				$this->lang->load('locale', 'english');
			}
		} else {
			$this->lang->load('locale', 'english');
		}
		
		$data = array(
			'title' => $this->lang->line('welcome')
		);
		
		$data['language'] = $language == '' ? 'en' : $language;

		$this->load->view('multilingual', $data);
	}
}