<?php
defined('BASEPATH') or exit('No direct script access allowed');

function check_login()
{
    $CI = &get_instance();
    if (!$CI->session->userdata('userLogged')) {
        redirect(base_url('/login'));
    }
}
