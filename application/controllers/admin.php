<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if($this->session->userdata('role_id') != '1'){
			$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">Silahkan Login Dahulu<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('auth/login');
		}

		$this->load->model('m_admin');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['admin']= $this->m_admin->tampil_admin()->result();

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('v_admin', $data);
		$this->load->view('templates/footer');
	}

		public function tambah_admin() 
	{
		if ($this->input->post()){
			$nama = $this->input->post('nama');
			$alamat = $this->input->post('alamat');
			$telepon = $this->input->post('telepon');
			

		$tambah = array(
			'nama_admin' => $nama,
			'alamat_admin' => $alamat,
			'telepon_admin' => $telepon
			
		);

		$this->db->insert('admin', $tambah);
		$this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
            Data admin Baru Berhasil Ditambahkan</div>');
		redirect('admin');

	} else {
		$data['title'] = 'Tambah Data admin Baru';
		$data['admin'] = $this->db->get('admin')->result_array();


		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('tambah_admin');
		$this->load->view('templates/footer');
	}
}
		public function ubah_admin($id_admin = null)
	{
		//cek proses update dilakukan
		if ($this->input->post()) {
			$data = $this->input->post();
			$result = $this->admin->update($data);
			if ($result > 0) {
				$this->session->set_flashdata('msg',template_success_msg("Data Menu Kantin Berhasil diupdate"));
			}
			else{
				$this->session->set_flashdata('msg',template_error_msg("Menu Kantin gagal diupdate"));
			}

			//redirect
			redirect('admin');

		}
		else{
			//proses mengambil dan menampilkan
			//data spesifik sesuai dengan data yang diupdate
			$data['admin'] = $this->m_admin->get_admin_specific($id_admin);
			$data['title'] = 'Update Data Menu Kantin';
			$this->load->view('ubah_admin',$data);
		}
	}

	public function hapus_admin()
	{
	 $id = $this->input->get('id');

        $this->db->where('id_admin', $id);
        $this->db->delete('admin');
        $this->session->set_flashdata('message_pnd', '<div class="alert alert-success" role="alert">
            Data Pendidikan Telah Dihapus</div>');
        redirect('admin');
	}
	}

