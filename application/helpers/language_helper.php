<?php defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('language'))
{
	function language()
	{
                $CI =& get_instance();
                $language = get_cookie('lang_is');
                switch ($language) {
                case 'english':
                        $lang = $CI->lang->load('nguli', 'english');
                break;
                default:
                        $lang = $CI->lang->load('nguli', 'indonesia');
                break;
                }
                
                return $lang;

	}
}