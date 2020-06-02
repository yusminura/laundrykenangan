<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_customer extends CI_Model {

	public function get_customer($id = null){

		$this->db->from('pelanggan');
		if($id != null){
			$this->db->where('id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function add_customer($post){
		$params['nama_customer'] = $post['nama_customer'];
		$params['harga'] = $post['harga'];

		$this->db->insert('customer', $params);
	}

	public function edit_customer($post){
		$params['nama_customer'] = $post['nama_customer'];
		$params['harga'] = $post['harga'];

		$this->db->where('id', $post['id']);
		$this->db->update('customer', $params);
	}

	public function delete_customer($id) {
		$this->db->where('id', $id);
		$this->db->delete('customer');
	}
}
