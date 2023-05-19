<?php


class GroupUser_model extends CI_Model {
    
    public function get_all_groups() {
        $query = $this->db->get('group_users');
        return $query->result();
    }

    public function create_group($group_data) {
        $this->db->insert('group_users', $group_data);
        return $this->db->insert_id();
    }

    public function delete_group($group_id) {
        $this->db->where('id', $group_id);
        $this->db->delete('group_users');
    }

    public function update_group($group_id, $group_data) {
        $this->db->where('id', $group_id);
        $this->db->update('group_users', $group_data);
    }

	public function get_group_by_id($group_id) {
        $this->db->where('id', $group_id);
        $query = $this->db->get('group_users');

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return null; 
        }
    }
}

?>
