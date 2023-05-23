<?php

class Database_Model extends CI_Model
{

	public function get_data_from_default_db() {
        $query = $this->db->query("SELECT * FROM products");
        return $query->result();
    }

    public function get_data_from_second_db() {
        $query = $this->second_db->query("SELECT * FROM products");
        return $query->result();
    }
}


?>
