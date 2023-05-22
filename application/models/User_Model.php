<?php

class User_Model extends CI_Model {

	public function login($usernameOrEmail, $password) {
		$this->db->where('password', $password);
		$this->db->group_start();
		$this->db->where('username', $usernameOrEmail);
		$this->db->or_where('email', $usernameOrEmail);
		$this->db->group_end();
		$query = $this->db->get('users');
	
		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			return false;
		}
	}

	public function get_all_users() {
        $query = $this->db->get('users');
        return $query->result();
    }
	
    public function create_user($user_data) {
        $this->db->insert('users', $user_data);
        return $this->db->insert_id();
    }

    public function delete_user($user_id) {
        $this->db->where('id', $user_id);
        $this->db->delete('users');
    }

    public function update_user($user_id, $user_data) {
        $this->db->where('id', $user_id);
        $this->db->update('users', $user_data);
    }

	public function get_user_by_id($user_id) {
        $this->db->where('id', $user_id);
        $query = $this->db->get('users');

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return null; 
        }
    }

	public function get_user_name_by_id($user_id) {

		$this->db->select('username');
        $this->db->where('id', $user_id);
        return $this->db->get('users');
    }

	public function get_role_name_by_user_id($user_id) {

		$this->db->select('roles.name');
		$this->db->from('roles');
		$this->db->join('user_roles', 'user_roles.role_id = roles.id');
		$this->db->where('user_roles.user_id', $user_id);

		$query = $this->db->get();



		if ($query->num_rows() > 0) {
			$row = $query->row();
			return $row->name;
		}
	
		return null;
    }

	public function get_user_roles($user_id)
    {
        $this->db->select('roles.*');
        $this->db->from('roles');
        $this->db->join('role_user', 'roles.id = role_user.role_id');
        $this->db->where('role_user.user_id', $user_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function has_permission($user_id, $permission)
    {
        $this->db->select('permissions.id');
        $this->db->from('permissions');
        $this->db->join('permission_role', 'permissions.id = permission_role.permission_id');
        $this->db->join('role_user', 'permission_role.role_id = role_user.role_id');
        $this->db->where('role_user.user_id', $user_id);
        $this->db->where('permissions.name', $permission);
        $query = $this->db->get();
        return $query->num_rows() > 0;
    }

}
?>
