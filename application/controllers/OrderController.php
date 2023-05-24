<?php
class OrderController extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();

		$this->load->model('Order_Model');
		$this->load->model('Customer_Model');
        $this->load->model('Order_Details_Model');
		check_login();
	}

	public function index()
	{
		$data['orders'] = $this->Order_Model->get_orders();
		$this->load->view('admin_template/header');
		$this->load->view('order/index',$data);
		$this->load->view('admin_template/footer');

	}

	public function create()
	{
		$this->load->view('admin_template/header');
		$this->load->view('order/create');
		$this->load->view('admin_template/footer');

	}

	public function store()
	{
        // Lưu dữ liệu customer và order vào cơ sở dữ liệu
        $customer_data = array(
            'first_name' 	=> $this->input->post('first_name'),
            'last_name' 	=> $this->input->post('last_name'),
            'email' 		=> $this->input->post('email'),
            'phone_number' 	=> $this->input->post('phone_number'),
            'address' 		=> $this->input->post('address')
        );

        $customer_id = $this->Customer_Model->create_customer($customer_data);

        $order_data = array(
            'customer_id' 	=> $customer_id,
            'order_date' 	=> $this->input->post('order_date'),
            'status' 		=> $this->input->post('status')
        );
        
        $order_id = $this->Order_Model->create_order($order_data);
        
        $order_detail_data = array(
            'order_id' => $order_id,
            'product_id' => $this->input->post('product_id'),
            'quantity' => $this->input->post('quantity')
        );
        
        $this->Order_Details_Model->create_order_detail($order_detail_data);


		redirect(base_url('/order'));
	}


	public function show($order_id) {

        $order 			= $this->Order_Model->get_order($order_id);
        $customer 		= $this->Customer_Model->get_customer($order->customer_id);
        $order_details 	= $this->Order_Details_Model->get_order_details($order_id);
        
        $data['order'] = $order;
        $data['customer'] = $customer;
        $data['order_details'] = $order_details;
        
        $this->load->view('order_detail', $data);
    }


	public function delete($order_id) {
        $this->Order_Model->delete_order($order_id);
        redirect(base_url('/order'));
    }
}
