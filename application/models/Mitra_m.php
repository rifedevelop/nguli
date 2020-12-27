<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mitra_m extends CI_Model {

	protected $tMitra = 'm02_mitra';

	public function editProfile($idUser)
	{
		$this->db->select('id AS user_id,name,photo,nik,npwp,gender,status_nikah,img_ktp,img_npwp,img_kk,verif_status,address');
		$this->db->where('id',$idUser);
		$result = $this->db->get($this->tMitra);
		return $result;
	}

	public function insVerify()
	{
		$id = $this->input->post('id',TRUE);
		$name = $this->input->post('name',TRUE);

		if($_FILES['img_ktp']['name'] == "" || $_FILES['img_npwp']['name'] == "" || $_FILES['img_kk']['name'] == "")
		{
			$insData = array(
				'address' => $this->input->post('address', TRUE),
				'nik' => $this->input->post('nik', TRUE),
				'npwp' => $this->input->post('npwp', TRUE),
				'gender' => $this->input->post('gender', TRUE),
				'status_nikah' => $this->input->post('status', TRUE),
			);
			
			$this->db->where('md5(id)', $id);
			$this->db->update($this->tMitra, $insData);
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
				'address' => $this->input->post('address', TRUE),
				'nik' => $this->input->post('nik', TRUE),
				'npwp' => $this->input->post('npwp', TRUE),
				'gender' => $this->input->post('gender', TRUE),
				'status_nikah' => $this->input->post('status', TRUE),
			);
			
			$this->db->where('md5(id)', $id);
			$this->db->update($this->tMitra, $insData);
			if ($this->db->affected_rows() > 0) {
				return true;
			} else {
				return false;
			}
		}
	}

	public function insProfile()
	{
		$id = $this->input->post('id',TRUE);
		$name = $this->input->post('name',TRUE);
		$file_foto_profile = $_FILES['img_profile'];
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
			'gender' => $this->input->post('gender', TRUE),
			'status_nikah' => $this->input->post('status', TRUE),
		);
		
		$this->db->where('md5(id)', $id);
		$this->db->update($this->tMitra, $insData);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	private function upload_doc($name,$id,$folder,$field)
	{
        $this->load->library('upload');
        // Config Upload Image
        $path = $_SERVER['DOCUMENT_ROOT'].'/uploads/mitra/'.$folder;
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
            $this->session->set_flashdata('error', $this->upload->display_errors());
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

	public function get_mitra($mitra_id)
	{
		$this->db->select('id, name as mitra_name, photo as mitra_photo');
        $this->db->from('m02_mitra');
        $this->db->where('md5(id)', $mitra_id);
        $query = $this->db->get();
        return $query;
	}

}