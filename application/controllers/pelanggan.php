<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	function __construct(){

		parent::__construct();
		check_not_login();
		$this->load->model('M_customer');

	}

	public function index()
	{
		check_not_login();

		$this->load->model('M_customer');

		$data['row'] = $this->M_customer->get_customer();
		$this->template->load('template', 'Customer/customer_data', $data);
	}

	public function add() {
		$customer = new stdClass();
		$customer->id = null;
		$customer->name = null;
		$customer->address = null;
		$customer->telepon = null;
		$data = array(
			'page' => 'add',
			'row' => $customer
		);
		$this->template->load('template', 'Customer/customer_form', $data);

	}

	public function edit($id) {
		$query = $this->M_customer->get_customer($id);
		if ($query->num_rows() > 0) {
			$customer = $query->row();
			$data = array(
			'page' => 'edit',
			'row' => $customer
		);
		$this->template->load('template', 'Customer/customer_form', $data);	
		} else {
			echo "<script>alert('Data Tidak ditemukan');";
			echo "window.location='".site_url('customer')."';</script>";
		}
	}

	public function proses() {
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
			$this->M_customer->add_customer($post);
		} else if(isset($_POST['edit'])) {
			$this->M_customer->edit_customer($post);
		}

		if($this->db->affected_rows() > 0){
				echo "<script>alert('Data Tersimpan');</script>";
			}
			echo "<script>window.location='".site_url('customer')."';</script>";
	}
/*	public function add() {
		$this->load->library('form_validation');

		$this->form_validation->set_rules('fullname', 'Nama', 'required');
		$this->form_validation->set_rules('address', 'Alamat', 'required');
		$this->form_validation->set_rules('telepon', 'Telepon','required');

		$this->form_validation->set_message('required', '%s Wajib Diisi!');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->template->load('template', 'Customer/customer_add');
		} else {
			$post = $this->input->post(null, TRUE);
			$this->M_customer->add_customer($post);
			if($this->db->affected_rows() > 0){
				echo "<script>alert('Data Tersimpan');</script>";
			}
			echo "<script>window.location='".site_url('customer')."';</script>";
		}
	}

	public function edit() {
		$this->load->library('form_validation');

		$this->form_validation->set_rules('fullname', 'Nama', 'required');
		$this->form_validation->set_rules('address', 'Alamat', 'required');
		$this->form_validation->set_rules('telepon', 'Telepon','required');

		$this->form_validation->set_message('required', '%s Wajib Diisi!');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$query = $this->M_customer->get_customer();
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$this->template->load('template', 'Customer/customer_edit', $data);
			} else {
				echo "<script>alert('Data Tidak ditemukan');";
				echo "window.location='".site_url('customer')."';</script>";
			}
			
		} else {
			$post = $this->input->post(null, TRUE);
			$this->M_customer->edit_customer($post);
			if($this->db->affected_rows() > 0){
				echo "<script>alert('Data Tersimpan');</script>";
			}
			echo "<script>window.location='".site_url('customer')."';</script>";	
		}
	}
*/
	public function delete($id) {

		$this->M_customer->delete_customer($id);
		if($this->db->affected_rows() > 0){
				echo "<script>alert('Data Terhapus');</script>";
			}
		echo "<script>window.location='".site_url('customer')."';</script>";	
	}

}

