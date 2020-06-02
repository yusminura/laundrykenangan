<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function index()
	{
		check_not_login();

		$dari = $this->input->post('dari');
		$sampai = $this->input->post('sampai');
	//	var_dump($sampai);
	//	die();
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->template->load('template', 'Laporan/V_laporan');
		} else {
			$data['laporan'] = $this->db->query("SELECT * FROM paket pk, transaksi tr  WHERE pk.id=tr.id_paket AND date (tgl_transaksi) >= '$dari' AND date (tgl_transaksi) <= '$sampai'")->result();
		//	var_dump($data);
		//	die();
			$this->template->load('template', 'Laporan/tampilkan_laporan', $data);
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('dari', 'Dari Tanggal', 'required');
		$this->form_validation->set_rules('sampai', 'Sampai Tanggal', 'required');
	}

	public function print() {
		$dari = $this->input->get('dari');
		$sampai = $this->input->get('sampai');
		$data['laporan'] = $this->db->query("SELECT * FROM paket pk, transaksi tr  WHERE pk.id=tr.id_paket AND date (tgl_transaksi) >= '$dari' AND date (tgl_transaksi) <= '$sampai'")->result();

		$this->load->view('Laporan/tampilan_print', $data);
	}
}