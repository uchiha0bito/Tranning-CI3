<?php

class User_model extends CI_Model {

    public function login($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
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

}
?>
