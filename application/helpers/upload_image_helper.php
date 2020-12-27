<?php defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('upload_nik')) {
    function upload_nik($name, $type_user)
    {
        $CI = &get_instance();
        $CI->load->library('upload');
        // Config Upload Image
        $path = './uploads/' . $type_user . '/nik';
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '4000';
        $config['overwrite'] = TRUE;
        $config['file_name'] = 'nik_' . strtolower($name);
        // $config['file_name'] = md5((string)$name).'_nik_'.strtolower($name);
        $CI->upload->initialize($config);

        // Upload Image NIK   
        if (!$CI->upload->do_upload('nik')) {
            // $result = $CI->upload->display_errors();
            $CI->session->set_flashdata('error', 'Gagal mengupload foto NIK!!!');
            redirect(base_url());
        } else {
            // Compress Image
            compress_image($CI->upload->file_name, $CI->upload->upload_path);

            $result = $CI->upload->data('file_name');
            return $result;
        }
    }
}

if (!function_exists('upload_npwp')) {
    function upload_npwp($name, $type_user)
    {
        $CI = &get_instance();
        $CI->load->library('upload');
        // Config Upload Image
        $path = './uploads/' . $type_user . '/npwp';
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '4000';
        $config['overwrite'] = TRUE;
        $config['file_name'] = 'npwp_' . strtolower($name);
        $CI->upload->initialize($config);
        // var_dump($CI->upload->data());die();
        // Upload Image NIK   
        if (!$CI->upload->do_upload('npwp')) {
            // $result = $CI->upload->display_errors();
            $CI->session->set_flashdata('error', 'Gagal mengupload foto NPWP!!!');
            redirect(base_url());
        } else {
            // Compress Image
            compress_image($CI->upload->file_name, $CI->upload->upload_path);

            $result = $CI->upload->data('file_name');
            return $result;
        }
    }
}

if (!function_exists('upload_post')) {
    function upload_post($files, $name, $type_user, $idPost)
    {
        $CI = &get_instance();
        $CI->load->library('upload');
        // Config Upload Image
        $path = './uploads/' . $type_user . '/post';
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '4000';
        $config['overwrite'] = FALSE;
        $config['remove_spaces'] = TRUE;

        $images = array();
        $result = array();

        foreach ($files['name'] as $key => $image) {
            $_FILES['images[]']['name'] = $files['name'][$key];
            $_FILES['images[]']['type'] = $files['type'][$key];
            $_FILES['images[]']['tmp_name'] = $files['tmp_name'][$key];
            $_FILES['images[]']['error'] = $files['error'][$key];
            $_FILES['images[]']['size'] = $files['size'][$key];

            $fileName = 'post_' . strtolower($name) . '_' . strtolower($image);
            $images[] = $fileName;
            $config['file_name'] = $fileName;
            $CI->upload->initialize($config);
            // var_dump($image);die();

            if (!$CI->upload->do_upload('images[]')) {
                $result = $CI->upload->display_errors();
            } else {
                $images[] = compress_image($CI->upload->file_name, $CI->upload->upload_path);
                $result[] = array(
                    'm06_id' => $idPost,
                    'img' => $CI->upload->data('file_name'),
                );
                // $result[] = array(
                //     'm06_id' => 1,
                //     'img' => $CI->upload->data('file_name')
                // );
            }

            // if (!$CI->upload->do_upload('images[]')){
            //     $result = $CI->upload->display_errors();
            //     return $result;
            //     // $CI->session->set_flashdata('error', 'Gagal mengupload foto!!!');
            //     // redirect(base_url());
            // }else{
            //     // Compress Image
            //     compress_image($fileName,$CI->upload->upload_path);

            //     $result = $CI->upload->data('images[]');
            //     return $result;
            // }
        }

        return $result;
    }
}

if (!function_exists('upload_post_bid')) {
    function upload_post_bid($files, $name, $type_user, $idBid, $idPost, $desc)
    {
        $CI = &get_instance();
        $CI->load->library('upload');
        // Config Upload Image
        $path = './uploads/' . $type_user . '/bid';
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '4000';
        $config['overwrite'] = FALSE;
        $config['remove_spaces'] = TRUE;

        $images = array();
        $result = array();

        foreach ($files['name'] as $key => $image) {
            $_FILES['konsep_desain[]']['name'] = $files['name'][$key];
            $_FILES['konsep_desain[]']['type'] = $files['type'][$key];
            $_FILES['konsep_desain[]']['tmp_name'] = $files['tmp_name'][$key];
            $_FILES['konsep_desain[]']['error'] = $files['error'][$key];
            $_FILES['konsep_desain[]']['size'] = $files['size'][$key];
            $descript = $desc[$key];

            $fileName = $idBid . '_' . strtolower($name) . '_' . strtolower($image);
            $images[] = $fileName;
            $config['file_name'] = $fileName;
            $CI->upload->initialize($config);

            if (!$CI->upload->do_upload('konsep_desain[]')) {
                $result = $CI->upload->display_errors();
            } else {
                $images[] = compress_image($CI->upload->file_name, $CI->upload->upload_path);
                $result[] = array(
                    'm07_id' => $idBid,
                    'm06_id' => $idPost,
                    'img' => $CI->upload->data('file_name'),
                    'desc' => $descript,
                    'created_on' => date("Y-m-d H:i:s"),
                    'updated_on' => date("Y-m-d H:i:s"),
                    'is_active' => 1,
                );
            }
        }

        return $result;
    }
}

if (!function_exists('compress_image')) {
    function compress_image($file_name, $path)
    {
        $CI = &get_instance();
        $CI->load->library('image_lib');
        // Compress Image
        $config['image_library'] = 'gd2';
        $config['source_image'] = $path . $file_name;
        $config['upload_path'] = $path;
        $config['maintain_ratio'] = TRUE;
        $config['quality'] = '80%';
        $config['width'] = '1200';
        $config['height'] = 'none';
        $CI->image_lib->initialize($config);
        $CI->image_lib->resize();
    }
}
