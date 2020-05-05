<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pelanggan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if($this->session->userdata('role_id') != '1'){
			$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">Silahkan Login Dahulu<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('auth/login');
		}
		$this->load->model('m_pelanggan');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['pelanggan']= $this->m_pelanggan->tampil_pelanggan()->result();

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('v_pelanggan', $data);
		$this->load->view('templates/footer');
	}

		public function tambah_pelanggan() 
	{
		if ($this->input->post()){
			$nama = $this->input->post('nama');
			$alamat = $this->input->post('alamat');
			$telepon = $this->input->post('telepon');
			

		$tambah = array(
			'nama_pelanggan' => $nama,
			'alamat_pelanggan' => $alamat,
			'telepon_pelanggan' => $telepon
			
		);

		$this->db->insert('pelanggan', $tambah);
		$this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
            Data pelanggan Baru Berhasil Ditambahkan</div>');
		redirect('pelanggan');

	} else {
		$data['title'] = 'Tambah Data pelanggan Baru';
		$data['pelanggan'] = $this->db->get('pelanggan')->result_array();


		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('tambah_pelanggan');
		$this->load->view('templates/footer');
	}
}
		public function ubah_pelanggan($id_pelanggan = null)
	{
		//cek proses update dilakukan
		if ($this->input->post()) {
			$data = $this->input->post();
			$result = $this->pelanggan->update($data);
			if ($result > 0) {
				$this->session->set_flashdata('msg',template_success_msg("Data Menu Kantin Berhasil diupdate"));
			}
			else{
				$this->session->set_flashdata('msg',template_error_msg("Menu Kantin gagal diupdate"));
			}

			//redirect
			redirect('pelanggan');

		}
		else{
			//proses mengambil dan menampilkan
			//data spesifik sesuai dengan data yang diupdate
			$data['pelanggan'] = $this->m_pelanggan->get_pelanggan_specific($id_pelanggan);
			$data['title'] = 'Update Data Menu Kantin';
			$this->load->view('ubah_pelanggan',$data);
		}
	}

	public function hapus_pelanggan()
	{
	 $id = $this->input->get('id');

        $this->db->where('id_pelanggan', $id);
        $this->db->delete('pelanggan');
        $this->session->set_flashdata('message_pnd', '<div class="alert alert-success" role="alert">
            Data Pendidikan Telah Dihapus</div>');
        redirect('pelanggan');
	}
	}

