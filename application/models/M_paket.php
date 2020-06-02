<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_paket extends CI_Model {

	public function get_paket($id = null){

		$this->db->from('paket');
		if($id != null){
			$this->db->where('id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function add_paket($post){
		$params['nama_paket'] = $post['nama_paket'];
		$params['harga'] = $post['harga'];

		$this->db->insert('paket', $params);
	}

	public function edit_paket($post){
		$params['nama_paket'] = $post['nama_paket'];
		$params['harga'] = $post['harga'];

		$this->db->where('id', $post['id']);
		$this->db->update('paket', $params);
	}

	public function delete_paket($id) {
		$this->db->where('id', $id);
		$this->db->delete('paket');
	}
}
