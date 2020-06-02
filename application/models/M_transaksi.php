<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {

	public function get_transaksi($id = null){

		$this->db->from('transaksi');
		if($id != null){
			$this->db->where('id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function add_transaksi($post){
		$params['nama_pelanggan'] = $post['name'];
		$params['telepon'] = $post['telepon'];
		$params['tgl_transaksi'] = date('Y-m-d H:i:s');
		$params['id_paket'] = $post['paket'];
		$params['harga'] = $post['harga'];
		$params['berat'] = $post['berat'];
		$params['tgl_ambil'] = $post['tgl_ambil'];
		$params['subtotal'] = $post['harga']*$post['berat'];

		$this->db->insert('transaksi', $params);
	}

/*	public function edit_transaksi($post){
		$params['nama_pelanggan'] = $post['name'];
		$params['telepon'] = $post['telepon'];
		$params['tgl_transaksi'] = date('Y-m-d H:i:s');
		$params['id_paket'] = $post['paket'];
		$params['harga'] = $post['harga'];
		$params['berat'] = $post['berat'];
		$params['tgl_ambil'] = $post['tgl_ambil'];
		$params['status'] = $post['status'];
		$params['subtotal'] = $post['harga']*$post['berat'];

		$this->db->where('id', $post['transaksi']);
		$this->db->update('transaksi', $params);
	}
*/
	public function delete_transaksi($id) {
		$this->db->where('id', $id);
		$this->db->delete('transaksi');
	}
}
