<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';

$route['id'] = 'home';
$route['id/(:any)'] = 'page/index';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
