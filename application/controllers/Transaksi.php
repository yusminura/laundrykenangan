<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	function __construct(){

		parent::__construct();
		check_not_login();
		$this->load->model(['M_transaksi', 'M_paket']);

	}

	public function index()
	{
		check_not_login();

		$data['transaksi'] = $this->db->query("SELECT * FROM paket pk, transaksi tr  WHERE pk.id=tr.id_paket ")->result();
		$this->template->load('template', 'Transaksi/transaksi_data', $data);
	}

	public function add() {
		$transaksi = new stdClass();
		$transaksi->id = null;
		$transaksi->nama_pelanggan = null;
		$transaksi->telepon = null;
		$transaksi->paket = null;
		$transaksi->harga = null;
		$transaksi->berat = null;
		$transaksi->tgl_ambil = null;

		$query_paket = $this->M_paket->get_paket();
		$query_paket_harga = $this->M_paket->get_paket();

		$data = array(
			'page' => 'add',
			'row' => $transaksi,
			'paket' => $query_paket,
			'harga' => $query_paket_harga,
		);
		$this->template->load('template', 'Transaksi/transaksi_form', $data);

	}

/*	public function edit($id) {
		$query = $this->M_transaksi->get_transaksi($id);
		if ($query->num_rows() > 0) {
			$transaksi = $query->row();		
			$query_paket = $this->M_paket->get_paket();
			$query_paket_harga = $this->M_paket->get_paket();
			$query_status = $this->M_transaksi->get_status();
		$data = array(
			'page' => 'add',
			'row' => $transaksi,
			'paket' => $query_paket,
			'harga' => $query_paket_harga,
			'status' => $query_status,
		);
		$this->template->load('template', 'Transaksi/transaksi_form', $data);
		} else {
			echo "<script>alert('Data Tidak ditemukan');";
			echo "window.location='".site_url('transaksi')."';</script>";
		}
	}
*/
	public function proses() {
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
			$this->M_transaksi->add_transaksi($post);
		} else if(isset($_POST['edit'])) {
			$this->M_transaksi->edit_transaksi($post);
		}

		if($this->db->affected_rows() > 0){
				echo "<script>alert('Data Tersimpan');</script>";
			}
			echo "<script>window.location='".site_url('transaksi')."';</script>";
	}

/*	public function add() {
		$this->load->library('form_validation');

		$this->form_validation->set_rules('fullname', 'Nama transaksi', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

		$this->form_validation->set_message('required', '%s Wajib Diisi!');
		$this->form_validation->set_message('numeric', 'format %s tidak valid');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->template->load('template', 'transaksi/transaksi_add');
		} else {
			$post = $this->input->post(null, TRUE);
			$this->M_transaksi->add_transaksi($post);
			if($this->db->affected_rows() > 0){
				echo "<script>alert('Data Tersimpan');</script>";
			}
			echo "<script>window.location='".site_url('transaksi')."';</script>";
		}
		
	}

	public function edit() {
		$this->load->library('form_validation');

		$this->form_validation->set_rules('fullname', 'Nama transaksi', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

		$this->form_validation->set_message('required', '%s Wajib Diisi!');
		$this->form_validation->set_message('numeric', 'format %s tidak valid');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$query = $this->M_transaksi->get_transaksi();
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$this->template->load('template', 'transaksi/transaksi_edit', $data);
			} else {
				echo "<script>alert('Data Tidak ditemukan');";
				echo "window.location='".site_url('transaksi')."';</script>";
			}
			
		} else {
			$post = $this->input->post(null, TRUE);
			$this->M_transaksi->edit_transaksi($post);
			if($this->db->affected_rows() > 0){
				echo "<script>alert('Data Tersimpan');</script>";
			}
			echo "<script>window.location='".site_url('transaksi/transaksi_edit')."';</script>";	
		}
		
	}
*/
	public function delete($id) {

		$this->M_transaksi->delete_transaksi($id);
		if($this->db->affected_rows() > 0){
				echo "<script>alert('Data Terhapus');</script>";
			}
		echo "<script>window.location='".site_url('transaksi')."';</script>";	
	}

	public function cetak ($id) {
		$data['transaksi'] = $this->db->query("SELECT * FROM paket pk, transaksi tr  WHERE pk.id=tr.id_paket AND tr.id = '$id' ")->result();
		$this->load->view('Transaksi/cetak', $data);
	}



}