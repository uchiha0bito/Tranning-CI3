<?php
defined('BASEPATH') or exit('No direct script access allowed');

function check_login()
{
    $CI = &get_instance();
    if (!$CI->session->userdata('learn_user_logged')) {
        redirect(base_url('/login'));
    }
}

if (!function_exists('check_access')) {
	function check_access($permission) {
		$CI = &get_instance();
	
		$user_id = $CI->session->userdata('learn_user_logged')['id'];

		$CI->load->model('User_Model');

        // Check if user is "super_admin"
        $user_role = $CI->User_Model->get_role_name_by_user_id($user_id);
        if ($user_role == 'super_admin') {
            return true; // Allow access for "super_admin"
        }
	
		// Kiểm tra quyền truy cập dựa trên user_id
		$CI->db->select('permissions.name');
		$CI->db->from('user_roles');
		$CI->db->join('role_permissions', 'user_roles.role_id = role_permissions.role_id');
		$CI->db->join('permissions', 'role_permissions.permission_id = permissions.id');
		$CI->db->where('user_roles.user_id', $user_id);
		$CI->db->where('permissions.name', $permission);
		$query = $CI->db->get();
	
		if ($query->num_rows() > 0) {
			return true; // Có quyền truy cập
		}
	
		return false; // Không có quyền truy cập
	}
}

