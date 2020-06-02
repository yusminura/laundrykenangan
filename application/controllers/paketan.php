<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paketan extends CI_Controller {

	function __construct(){

		parent::__construct();
		check_not_login();
		$this->load->model('M_paket');

	}

	public function index()
	{
		check_not_login();

		$this->load->model('M_paket');

		$data['row'] = $this->M_paket->get_paket();
		$this->template->load('template', 'Paket/paket_data', $data);
	}

	public function add() {
		$paket = new stdClass();
		$paket->id = null;
		$paket->nama_paket = null;
		$paket->harga = null;
		$data = array(
			'page' => 'add',
			'row' => $paket
		);
		$this->template->load('template', 'Paket/paket_form', $data);

	}

	public function edit($id) {
		$query = $this->M_paket->get_paket($id);
		if ($query->num_rows() > 0) {
			$paket = $query->row();
			$data = array(
			'page' => 'edit',
			'row' => $paket
		);
		$this->template->load('template', 'Paket/paket_form', $data);	
		} else {
			echo "<script>alert('Data Tidak ditemukan');";
			echo "window.location='".site_url('paket')."';</script>";
		}
	}

	public function proses() {
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
			$this->M_paket->add_paket($post);
		} else if(isset($_POST['edit'])) {
			$this->M_paket->edit_paket($post);
		}

		if($this->db->affected_rows() > 0){
				echo "<script>alert('Data Tersimpan');</script>";
			}
			echo "<script>window.location='".site_url('paket')."';</script>";
	}

/*	public function add() {
		$this->load->library('form_validation');

		$this->form_validation->set_rules('fullname', 'Nama Paket', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

		$this->form_validation->set_message('required', '%s Wajib Diisi!');
		$this->form_validation->set_message('numeric', 'format %s tidak valid');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->template->load('template', 'Paket/paket_add');
		} else {
			$post = $this->input->post(null, TRUE);
			$this->M_paket->add_paket($post);
			if($this->db->affected_rows() > 0){
				echo "<script>alert('Data Tersimpan');</script>";
			}
			echo "<script>window.location='".site_url('paket')."';</script>";
		}
		
	}

	public function edit() {
		$this->load->library('form_validation');

		$this->form_validation->set_rules('fullname', 'Nama Paket', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

		$this->form_validation->set_message('required', '%s Wajib Diisi!');
		$this->form_validation->set_message('numeric', 'format %s tidak valid');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$query = $this->M_paket->get_paket();
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$this->template->load('template', 'Paket/paket_edit', $data);
			} else {
				echo "<script>alert('Data Tidak ditemukan');";
				echo "window.location='".site_url('paket')."';</script>";
			}
			
		} else {
			$post = $this->input->post(null, TRUE);
			$this->M_paket->edit_paket($post);
			if($this->db->affected_rows() > 0){
				echo "<script>alert('Data Tersimpan');</script>";
			}
			echo "<script>window.location='".site_url('Paket/paket_edit')."';</script>";	
		}
		
	}
*/
	public function delete($id) {

		$this->M_paket->delete_paket($id);
		if($this->db->affected_rows() > 0){
				echo "<script>alert('Data Terhapus');</script>";
			}
		echo "<script>window.location='".site_url('paket')."';</script>";	
	}

}
