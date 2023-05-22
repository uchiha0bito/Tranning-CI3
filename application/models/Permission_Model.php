<?php
class Permission_Model extends CI_Model
{
	public function getPermissions()
	{
		return $this->db->get('permissions')->result();
	}

	public function getPermission($permissionId)
	{
		return $this->db->get_where('permissions', ['id' => $permissionId])->row();
	}

	public function createPermission($data)
	{
		$slug = $data['name'];
		if (!$this->isUniqueSlug($slug)) {
			// Slug already exists, error handling or error message
			return false;
		}
		$this->db->insert('permissions', $data);
		return $this->db->insert_id();
	}

	public function updatePermission($permissionId, $data)
	{

		$slug = $data['name'];
		if (!$this->isUniqueSlug($slug, $permissionId)) {
			// Slug already exists, error handling or error message
			return false;
		}
		$this->db->where('id', $permissionId);
		$this->db->update('permissions', $data);
	}

	public function deletePermission($permissionId)
	{
		$this->db->delete('permissions', ['id' => $permissionId]);
	}

	public function isUniqueSlug($slug)
	{
		$query = $this->db->get_where('permissions', array('name' => $slug));
		return $query->num_rows() === 0;
	}
}
