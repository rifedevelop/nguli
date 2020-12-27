<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_m extends CI_Model {

	protected $tCustomer = 'm01_customer';

	public function editProfile($idUser)
	{
		$this->db->select('id AS user_id,name,photo,gender,nik,npwp,img_ktp,img_npwp,img_kk,verif_status,address');
		$this->db->where('id',$idUser);
		$result = $this->db->get($this->tCustomer);
		return $result;
	}

	public function insProfile()
	{
		if($this->input->post('id')){
			$id = $this->input->post('id',TRUE);
			$name = $this->input->post('name',TRUE);
			$file_foto_profile = $_FILES['img_profile'];
			// var_dump($file_foto_profile['name']);die();
			$pic_foto = $file_foto_profile['name'] == "" ? $this->input->post('photo_helper',TRUE) : $this->upload_doc($name,$id,'profile','img_profile');
			// $pic_ktp = $this->input->post('ktp_helper') ? $this->input->post('ktp_helper',TRUE) : $this->upload_doc($name,$id,'nik','img_ktp');
			// $pic_npwp = $this->input->post('npwp_helper') ? $this->input->post('npwp_helper',TRUE) : $this->upload_doc($name,$id,'npwp','img_npwp');
			// $pic_kk = $this->input->post('kk_helper') ? $this->input->post('kk_helper',TRUE) : $this->upload_doc($name,$id,'kk','img_kk');
			$insData = array(
				'photo' => $pic_foto,
				// 'img_ktp' => $pic_ktp,
				// 'img_npwp' => $pic_npwp,
				// 'img_kk' => $pic_kk,
				// 'nik' => $this->input->post('nik', TRUE),
				// 'npwp' => $this->input->post('npwp', TRUE),
				'address' => $this->input->post('address', TRUE),
				'gender' => $this->input->post('gender', TRUE)
			);
			
			$this->db->where('md5(id)', $id);
			$this->db->update($this->tCustomer, $insData);
			if ($this->db->affected_rows() > 0) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
		
	}

	public function insVerify()
	{
		if($this->input->post('id')){
			$id = $this->input->post('id',TRUE);
			$name = $this->input->post('name',TRUE);
			// $file_foto_profile = $_FILES['img_profile'];
			// $pic_foto = $file_foto_profile == null ? $this->input->post('photo_helper',TRUE) : $this->upload_doc($name,$id,'profile','img_profile');
			// var_dump($_FILES['img_ktp']['name']);die();
			if($_FILES['img_ktp']['name'] == "" || $_FILES['img_npwp']['name'] == "" || $_FILES['img_kk']['name'] == "")
			{
				$insData = array(
					'nik' => $this->input->post('nik', TRUE),
					'npwp' => $this->input->post('npwp', TRUE)
					// 'photo' => $pic_foto,
					// 'address' => $this->input->post('address', TRUE),
					// 'gender' => $this->input->post('gender', TRUE)
				);
				
				$this->db->where('md5(id)', $id);
				$this->db->update($this->tCustomer, $insData);
				if ($this->db->affected_rows() > 0) {
					return true;
				} else {
					return false;
				}
			} else {
				$pic_ktp = $this->upload_doc($name,$id,'nik','img_ktp');
				$pic_npwp = $this->upload_doc($name,$id,'npwp','img_npwp');
				$pic_kk = $this->upload_doc($name,$id,'kk','img_kk');
				$insData = array(
					'img_ktp' => $pic_ktp,
					'img_npwp' => $pic_npwp,
					'img_kk' => $pic_kk,
					'nik' => $this->input->post('nik', TRUE),
					'npwp' => $this->input->post('npwp', TRUE)
					// 'photo' => $pic_foto,
					// 'address' => $this->input->post('address', TRUE),
					// 'gender' => $this->input->post('gender', TRUE)
				);
				
				$this->db->where('md5(id)', $id);
				$this->db->update($this->tCustomer, $insData);
				if ($this->db->affected_rows() > 0) {
					return true;
				} else {
					return false;
				}
			}
			
		} else {
			return false;
		}
		
	}

	private function upload_doc($name,$id,$folder,$field)
	{
        $this->load->library('upload');
        // Config Upload Image
        $path = $_SERVER['DOCUMENT_ROOT'].'/uploads/customer/'.$folder;
        // $path = './uploads/customer/'.$path;
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '4000';
        $config['overwrite'] = FALSE;
        $config['file_name'] = $folder.'_'.md5((string)$id).'_'.strtolower($name);
        // $config['file_name'] = md5((string)$name).'_nik_'.strtolower($name);
        $this->upload->initialize($config);
        
        // Upload Image NIK   
        if (!$this->upload->do_upload($field)){
            // $result = $this->upload->display_errors();
            $this->session->set_flashdata('error', 'Gagal mengupload foto!!!');
            redirect($this->input->server('HTTP_REFERER'));
        }else{
            // Compress Image
            $this->compress_image($this->upload->file_name,$this->upload->upload_path);
            
            $result = $this->upload->data('file_name');
            return $result;
        }
        
	}

	private function compress_image($file_name,$path)
	{
   
        $this->load->library('image_lib');
        // Compress Image
        $config['image_library'] = 'gd2';
        $config['source_image'] = $path.$file_name;
        $config['upload_path'] = $path;
        $config['maintain_ratio'] = TRUE;
        $config['quality'] = '80%';
        $config['width'] = '1200';
        $config['height'] = 'none';
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
	}

	public function get_customer($customer_id)
	{
		$this->db->select('id, name as customer_name, photo as customer_photo');
        $this->db->from('m01_customer');
        $this->db->where('md5(id)', $customer_id);
        $query = $this->db->get();
        return $query;
	}

}