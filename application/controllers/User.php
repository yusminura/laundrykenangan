<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){

		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->model('M_user');
		$this->load->library('form_validation');

	}

	public function index()
	{
		check_not_login();

		$this->load->model('M_user');

		$data['row'] = $this->M_user->get();
		$this->template->load('template', 'User/user_data', $data);
	}

	public function add() {
		$this->form_validation->set_rules('fullname', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[user.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_rules('passconf', 'Konfirmasi Kata Sandi', 'required|matches[password]', array('matches' => '%s tidak sesuai'));
		$this->form_validation->set_rules('address', 'Alamat', 'required');
		$this->form_validation->set_rules('telepon', 'Telepon','required');
		$this->form_validation->set_rules('level', 'Level','required');

		$this->form_validation->set_message('required', '%s Wajib Diisi!');
		$this->form_validation->set_message('min_length', '%s minimal 5 karakter');
		$this->form_validation->set_message('is_unique', '%s Telah Dipakai');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$this->template->load('template', 'User/user_add');
		} else {
			$post = $this->input->post(null, TRUE);
			$this->M_user->add_user($post);
			if($this->db->affected_rows() > 0){
				echo "<script>alert('Data Tersimpan');</script>";
			}
			echo "<script>window.location='".site_url('user')."';</script>";	
		}
	}

	public function edit($id) {
		$this->form_validation->set_rules('fullname', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|callback_username_check');
		if($this->input->post('password')) {
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
			$this->form_validation->set_rules('passconf', 'Konfirmasi Kata Sandi', 'required|matches[password]', array('matches' => '%s tidak sesuai'));
		}
		if($this->input->post('passconf')) {
			$this->form_validation->set_rules('passconf', 'Konfirmasi Kata Sandi', 'required|matches[password]', array('matches' => '%s tidak sesuai'));
		}
		$this->form_validation->set_rules('address', 'Alamat', 'required');
		$this->form_validation->set_rules('telepon', 'Telepon','required');
		$this->form_validation->set_rules('level', 'Level','required');

		$this->form_validation->set_message('required', '%s Wajib Diisi!');
		$this->form_validation->set_message('min_length', '%s minimal 5 karakter');
		$this->form_validation->set_message('is_unique', '%s Telah Dipakai');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE){
			$query = $this->M_user->get($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$this->template->load('template', 'User/user_edit', $data);
			} else {
				echo "<script>alert('Data Tidak ditemukan');";
				echo "window.location='".site_url('user')."';</script>";
			}
			
		} else {
			$post = $this->input->post(null, TRUE);
			$this->M_user->edit_user($post);
			if($this->db->affected_rows() > 0){
				echo "<script>alert('Data Tersimpan');</script>";
			}
			echo "<script>window.location='".site_url('user')."';</script>";	
		}
	}

	public function username_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND id_user != '$post[id_user]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('username_check', '{field} ini sudah dipakai boss');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function delete() {

		$id = $this->input->post('id_user');
		$this->M_user->delete_user($id);

		if($this->db->affected_rows() > 0){
				echo "<script>alert('Data Terhapus');</script>";
			}
		echo "<script>window.location='".site_url('user')."';</script>";	
	}

}
