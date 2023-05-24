<?php
class Order_Model extends CI_Model {

	public function get_orders()
	{
		return $this->db->get('orders')->result();

	}
    public function create_order($data) {
        $this->db->insert('orders', $data);
        return $this->db->insert_id();
    }

    public function get_order_details($order_id) {
        $this->db->where('order_id', $order_id);
        return $this->db->get('order_details')->result();
    }

	public function delete_order($order_id)
	{
		$this->db->where('order_id',$order_id);
		$this->db->delete('orders');
	}
}
