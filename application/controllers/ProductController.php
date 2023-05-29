<?php

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ProductController extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Product_Model');
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = 2048;
		$this->load->library('upload', $config);
	}

	public function index()
	{
		$data['products'] = $this->Product_Model->get_products();
		$this->load->view('admin_template/header');
		$this->load->view('products/index', $data);
		$this->load->view('admin_template/footer');
	}

	public function create()
	{
		$this->load->view('admin_template/header');
		$this->load->view('products/create');
		$this->load->view('admin_template/footer');
	}

	public function store()
	{

		if (!empty($_FILES['image']['name'])) {

			if ($this->upload->do_upload('image')) {
				// Get data file uploaded
				$upload_data = $this->upload->data();
				$image_name = $upload_data['file_name'];

				$data = array(
					'name' 			=> $this->input->post('name'),
					'description' 	=> $this->input->post('description'),
					'image' 		=> $image_name,
					'price' 		=> $this->input->post('price'),
					'other_details' => $this->input->post('other_details')
				);

				// Save data
				$this->Product_Model->add_product($data);
				redirect(base_url('products'));
			} else {
				//Handling when an error occurs during file upload
				echo $error = $this->upload->display_errors();
				//Error handling or navigation to another page
			}
		} else {
			// Handle when no file is selected
			// Save product information to the database (not including images)
			$data = array(
				'name' 			=> $this->input->post('name'),
				'description' 	=> $this->input->post('description'),
				'price' 		=> $this->input->post('price'),
				'other_details' => $this->input->post('other_details')
			);

			// Save data
			$this->Product_Model->add_product($data);

			redirect(base_url('products'));
		}
	}


	public function edit($id)
	{
		$data['product'] = $this->Product_Model->get_product($id);
		$this->load->view('admin_template/header');
		$this->load->view('products/edit', $data);
		$this->load->view('admin_template/footer');
	}

	public function update($product_id)
	{

		// Check if the product exists or not
		$product = $this->Product_Model->get_product($product_id);
		if (!$product) {
			// If product not exists
			redirect('error');
		}

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			// Get data
			$product_data = array(
				'name' 			=> $this->input->post('name'),
				'description' 	=> $this->input->post('description'),
				'price' 		=> $this->input->post('price'),
				'other_details' => $this->input->post('other_details')
			);

			// Check if new photo is uploaded
			if (!empty($_FILES['image']['name'])) {
				// Delete image old
				$old_image_path = base_url('./uploads/' . $product->image);

				if (file_exists($old_image_path)) {
					unlink($old_image_path);
				}

				if ($this->upload->do_upload('image')) {
					$upload_data 			= $this->upload->data();
					$product_data['image'] 	= $upload_data['file_name'];
				} else {
					// Display error when uploading new photos
					$error = $this->upload->display_errors();
					// Error handling or navigation to another page
					redirect('error');
				}
			}

			$this->Product_Model->update_product($product_id, $product_data);

			redirect(base_url('products'));
		}

		$data['product'] = $product;
		$this->load->view('admin_template/header');
		$this->load->view('products/edit', $data);
		$this->load->view('admin_template/footer');
	}


	public function delete($id)
	{
		$product 	= $this->Product_Model->get_product($id);

		$image_path = $_SERVER['DOCUMENT_ROOT'] . '/learnci/uploads/' . $product->image;

		$this->Product_Model->delete_product($id);

		if (file_exists($image_path)) {
			unlink($image_path);
		}
		redirect(base_url('products'));
	}

	public function importExcelProduct()
	{
		// Check if the file has been uploaded or not
		if (!empty($_FILES['excel_file']['name'])) {
			// The path to save the temp file
			$tempFile = $_FILES['excel_file']['tmp_name'];
	
			try {
				// Load file Excel
				$spreadsheet = IOFactory::load($tempFile);
				$worksheet = $spreadsheet->getActiveSheet();

			// Get data from cells in Excel file (remove column headers)

            $data = [];
            $startRow = 2; // Starting from 2nd line
            $endRow = $worksheet->getHighestRow();
            $highestColumn = $worksheet->getHighestColumn();
            $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);

            for ($row = $startRow; $row <= $endRow; $row++) {
                $rowData = [];
                for ($col = 1; $col <= $highestColumnIndex; $col++) {
                    $cell = $worksheet->getCellByColumnAndRow($col, $row);
                    $rowData[] = $cell->getValue();
                }
                $data[] = $rowData;
            }
	
				// Process data and save to database
				if (!empty($data)) {
	
					foreach ($data as $row) {
						$productId 		= $row[0];
						$name 			= $row[1];
						$image 			= $row[2];
						$description 	= $row[3];
						$price 			= $row[4];
						$otherDetails 	= $row[5];
	
						$this->db->insert('products', [
							'product_id' 	=> $productId,
							'name' 			=> $name,
							'image' 		=> $image,
							'description' 	=> $description,
							'price' 		=> $price,
							'other_details' => $otherDetails
						]);
					}
	
					// Data imported successfully
					redirect(base_url('products'));

				} else {
					echo 'No data found in the Excel file.';
				}
			} catch (Exception $e) {
				echo 'Error loading file: ' . $e->getMessage();
			}
		} else {
			echo 'No file uploaded.';
		}
	}

	public function exportExcelProduct()
	{
		$query = $this->db->get('products');
		$data = $query->result_array();

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
	
		// Set column headings
		$sheet->setCellValue('A1', 'Product ID');
		$sheet->setCellValue('B1', 'Name');
		$sheet->setCellValue('C1', 'Image');
		$sheet->setCellValue('D1', 'Description');
		$sheet->setCellValue('E1', 'Price');
		$sheet->setCellValue('F1', 'Other Details');
	
		// Put the data from the database in the corresponding cells
		$row = 2;
		foreach ($data as $item) {
			$sheet->setCellValue('A' . $row, $item['product_id']);
			$sheet->setCellValue('B' . $row, $item['name']);
			$sheet->setCellValue('C' . $row, $item['image']);
			$sheet->setCellValue('D' . $row, $item['description']);
			$sheet->setCellValue('E' . $row, $item['price']);
			$sheet->setCellValue('F' . $row, $item['other_details']);
	
			$row++;
		}
	
		// Create Writer object and export Excel file
		$writer = new Xlsx($spreadsheet);
		$filename = 'product_data.xlsx'; // Output Excel file name
	
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $filename . '"');
		header('Cache-Control: max-age=0');
	
		$writer->save('php://output');
	}
	
}
