<?php
defined('BASEPATH') or exit('No direct script access allowed');

function check_login()
{
    $CI = &get_instance();
    if (!$CI->session->userdata('user_logged')) {
        redirect(base_url('/login'));
    }
}

function check_access($permission_name) {
    $CI = &get_instance();

    $user_id = $CI->session->userdata('user_logged')['id'];

    // Check user has role is 'super_admin' then skip access
    $CI->db->select('roles.name');
    $CI->db->from('user_roles');
    $CI->db->join('roles', 'user_roles.role_id = roles.id');
    $CI->db->where('user_roles.user_id', $user_id);
    $CI->db->where('roles.name', 'super_admin');
    $query = $CI->db->get();


    if ($query->num_rows() > 0) {
        return true; // Having permission access
    }

    //  Check access by user_id
    $CI->db->select('permissions.name');
    $CI->db->from('user_roles');
    $CI->db->join('role_permissions', 'user_roles.role_id = role_permissions.role_id');
    $CI->db->join('permissions', 'role_permissions.permission_id = permissions.id');
    $CI->db->where('user_roles.user_id', $user_id);
    $CI->db->where('permissions.name', $permission_name);
    $query = $CI->db->get();

    if ($query->num_rows() > 0) {
        return true; // Having permission access
    }

    return false; //Not have access
}
