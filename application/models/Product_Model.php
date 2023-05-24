<?php
class Product_Model extends CI_Model {
    public function add_product($data) {
        $this->db->insert('products', $data);
    }

    public function update_product($id, $data) {
        $this->db->where('product_id', $id);
        $this->db->update('products', $data);
    }

    public function delete_product($id) {
        $this->db->where('product_id', $id);
        $this->db->delete('products');
    }

    public function get_product($id) {
        $this->db->where('product_id', $id);
        return $this->db->get('products')->row();
    }

	public function get_products() {
        return $this->db->get('products')->result();
    }
}
?>
