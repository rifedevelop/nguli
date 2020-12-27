<?php defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('compress_image'))
{
        function compress_image($file_name,$path)
        {
                $CI =& get_instance();
                $CI->load->library('image_lib');
                // Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = $path.$file_name;
                $config['upload_path'] = $path;
                $config['maintain_ratio'] = TRUE;
                $config['quality'] = '80%';
                $config['width'] = '1200';
                $config['height'] = 'none';
                $CI->image_lib->initialize($config);
                $CI->image_lib->resize();
        }
}