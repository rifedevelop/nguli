<?php

class Language extends CI_Controller
{

    public function set($language)
	{
        if(strtolower($language) === 'english') {
            $lang = 'english';
            $this->lang->load('nguli', 'english');
        } else {
            $lang = 'indonesia';
            $this->lang->load('nguli', 'indonesia');
        }

        set_cookie(
            array(
                'name' => 'lang_is',
                'value' => $lang,
                'expire'  => '8650',
                'prefix'  => ''
            )
        );
        
        if($this->input->server('HTTP_REFERER')){
            redirect($this->input->server('HTTP_REFERER'));
        }
    }
    
}
