<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if($this->session->userdata('role_id') != '1'){
			$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">Silahkan Login Dahulu<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('auth/login');
		}
		$this->load->model('m_pegawai');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['pegawai']= $this->m_pegawai->tampil_pegawai()->result();

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('v_pegawai', $data);
		$this->load->view('templates/footer');
	}

		public function tambah_pegawai() 
	{
		if ($this->input->post()){
			$nama = $this->input->post('nama');
			$username = $this->input->post('username');
			$alamat = $this->input->post('alamat');
			$telepon = $this->input->post('telepon');
			

		$tambah = array(
			'nama_pegawai' => $nama,
			'user_pegawai' => $username,
			'alamat_pegawai' => $alamat,
			'telepon_pegawai' => $telepon
			
		);

		$this->db->insert('pegawai', $tambah);
		$this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
            Data Pegawai Baru Berhasil Ditambahkan</div>');
		redirect('pegawai');

	} else {
		$data['title'] = 'Tambah Data Pegawai Baru';
		$data['pegawai'] = $this->db->get('pegawai')->result_array();


		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('tambah_pegawai');
		$this->load->view('templates/footer');
	}
}
		public function ubah_pegawai($id_pegawai = null)
	{
		//cek proses update dilakukan
		if ($this->input->post()) {
			$data = $this->input->post();
			$result = $this->pegawai->update($data);
			if ($result > 0) {
				$this->session->set_flashdata('msg',template_success_msg("Data Menu Kantin Berhasil diupdate"));
			}
			else{
				$this->session->set_flashdata('msg',template_error_msg("Menu Kantin gagal diupdate"));
			}

			//redirect
			redirect('pegawai');

		}
		else{
			//proses mengambil dan menampilkan
			//data spesifik sesuai dengan data yang diupdate
			$data['pegawai'] = $this->m_pegawai->get_pegawai_specific($id_pegawai);
			$data['title'] = 'Update Data Menu Kantin';
			$this->load->view('ubah_pegawai',$data);
		}
	}

	public function hapus_pegawai()
	{
	 $id = $this->input->get('id');

        $this->db->where('id_pegawai', $id);
        $this->db->delete('pegawai');
        $this->session->set_flashdata('message_pnd', '<div class="alert alert-success" role="alert">
            Data Pendidikan Telah Dihapus</div>');
        redirect('pegawai');
	}
	}

