<?php defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('ceksession'))
{
	function ceksession()
	{
        $CI =& get_instance();
        if($CI->session->userdata('data_session') == null)
        {
            redirect(base_url(),'refresh');
            return;
        } else {
            return $CI->session->userdata('data_session');
        }
	}
}

if ( ! function_exists('cekSessionMitra'))
{
    function cekSessionMitra($reSession='')
    {
        $CI =& get_instance();
        if($CI->session->userdata('data_session') == null)
        {
            $CI->session->set_flashdata('error', 'Sesi berakhir silahkan login!!!');
            redirect(base_url(),'refresh');
            return;
        }

        if($_SESSION['data_session']['type_user'] !== 'mitra')
        {
            $CI->session->set_flashdata('error', 'Hanya bisa diakses oleh Mitra!!!');
            redirect($CI->input->server('HTTP_REFERER'));
        }

        if($reSession == 'cek')
        {
            $sess = $CI->session->userdata('data_session');
            $CI->db->select('id, name, email, password, verif_status, is_active, photo');
            $CI->db->from('m02_mitra');
            $CI->db->where('id',$sess['id']);
            $newTemp = $CI->db->get()->result_array();
            $newSession = array(
                'id' => $newTemp[0]['id'],
                'name' => $newTemp[0]['name'],
                'email' => $newTemp[0]['email'],
                'status_verif' => $newTemp[0]['verif_status'],
                'photo_profile' => $newTemp[0]['photo'],
                'type_user' => 'mitra',
                'logged_in' => TRUE,
            );
            $CI->session->unset_userdata('data_session');
            $CI->session->set_userdata('data_session', $newSession);
            return $CI->session->userdata('data_session');
        }
        return $CI->session->userdata('data_session');
    }
}

if ( ! function_exists('cekSessionCustomer'))
{
    function cekSessionCustomer($reSession='')
    {
        $CI =& get_instance();
        if($CI->session->userdata('data_session') == null)
        {
            redirect(base_url(),'refresh');
        }

        if($_SESSION['data_session']['type_user'] !== 'customer')
        {
            $CI->session->set_flashdata('error', 'Hanya bisa diakses oleh Customer!!!');
            redirect($CI->input->server('HTTP_REFERER'));
        }

        if($reSession == 'cek')
        {
            $sess = $CI->session->userdata('data_session');
            $CI->db->select('id, name, email, password, verif_status, is_active, photo');
            $CI->db->from('m01_customer');
            $CI->db->where('id',$sess['id']);
            $newTemp = $CI->db->get()->result_array();
            $newSession = array(
                'id' => $newTemp[0]['id'],
                'name' => $newTemp[0]['name'],
                'email' => $newTemp[0]['email'],
                'status_verif' => $newTemp[0]['verif_status'],
                'photo_profile' => $newTemp[0]['photo'],
                'type_user' => 'customer',
                'logged_in' => TRUE,
            );
            $CI->session->unset_userdata('data_session');
            $CI->session->set_userdata('data_session', $newSession);
            return $CI->session->userdata('data_session');
        }

        return $CI->session->userdata('data_session');
    }
}