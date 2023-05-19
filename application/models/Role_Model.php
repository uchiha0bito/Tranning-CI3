<?php


class Role_Model extends CI_Model
{
    public function get_roles()
    {
        return $this->db->get('roles')->result();
    }

    public function get_role($role_id)
    {
        return $this->db->get_where('roles', ['id' => $role_id])->row();
    }

    public function create_role($data)
    {
        $this->db->insert('roles', $data);
        return $this->db->insert_id();
    }

    public function update_role($role_id, $data)
    {
        $this->db->where('id', $role_id);
        $this->db->update('roles', $data);
    }

    public function delete_role($role_id)
    {
        $this->db->where('id', $role_id);
        $this->db->delete('roles');
    }
}


?>
