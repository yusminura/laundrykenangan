<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if($this->session->userdata('role_id') != '1'){
			$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">Silahkan Login Dahulu<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('auth/login');
		}

		$this->load->model('m_paket');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['paket']= $this->m_paket->tampil_paket()->result();

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('v_paket', $data);
		$this->load->view('templates/footer');
	}

		public function tambah_paket() 
	{
		if ($this->input->post()){
			$jenis = $this->input->post('jenis');
			$harga = $this->input->post('harga');
			

		$tambah = array(
			'jenis_paket' => $jenis,
			'harga_paket' => $harga
		);

		$this->db->insert('paket', $tambah);
		$this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
            Data paket Baru Berhasil Ditambahkan</div>');
		redirect('paket');

	} else {
		$data['title'] = 'Tambah Data paket Baru';
		$data['paket'] = $this->db->get('paket')->result_array();


		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('tambah_paket');
		$this->load->view('templates/footer');
	}
}
		public function ubah_paket($id_paket = null)
	{
		//cek proses update dilakukan
		if ($this->input->post()) {
			$data = $this->input->post();
			$result = $this->paket->update($data);
			if ($result > 0) {
				$this->session->set_flashdata('msg',template_success_msg("Data Menu Kantin Berhasil diupdate"));
			}
			else{
				$this->session->set_flashdata('msg',template_error_msg("Menu Kantin gagal diupdate"));
			}

			//redirect
			redirect('paket');

		}
		else{
			//proses mengambil dan menampilkan
			//data spesifik sesuai dengan data yang diupdate
			$data['paket'] = $this->m_paket->get_paket_specific($id_paket);
			$data['title'] = 'Update Data Menu Kantin';
			$this->load->view('ubah_paket',$data);
		}
	}

	public function hapus_paket()
	{
	 $id = $this->input->get('id');

        $this->db->where('id_paket', $id);
        $this->db->delete('paket');
        $this->session->set_flashdata('message_pnd', '<div class="alert alert-success" role="alert">
            Data Pendidikan Telah Dihapus</div>');
        redirect('paket');
	}
	}

