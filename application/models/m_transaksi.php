<?php

class M_transaksi extends CI_Model {

	public function tampil_transaksi()
	{
		return $this->db->query('SELECT id_transaksi,tanggal_transaksi,nama_pelanggan,jenis_paket,berat,tanggal_jadi,status_transaksi FROM transaksi');
	}
	
	public function get_transaksi()
	{
		 $result = $this->db->get('transaksi');

        return $result->row();
	}

	public function ubah_transaksi($data)
	{
		$query = "UPDATE transaksi
				SET tangal transaksi =?,
				nama_pelanggan =?,
				jenis_paket =?,
				berat =?,
				tanggal_jadi =?,
				status_transaksi =?
				WHERE id_transaksi = ?";

		$this->db->query($query,array($data['tanggal_transaksi'],$data['nama_pelanggan'],$data['jenis_paket'],$data['berat'],$data['tanggal_jadi'],$data['status_transaksi'],$data['id_transaksi']));

		return $this->db->affected_rows();
	}

	public function get_transaksi_specific($id_transaksi)
	{
		//RAW SQL
		// $query = "SELECT * from menu WHERE k_menu = ?";
		// $result = $this->db->query($query, array($k_menu));
		// return $result->result();

		//QUERY BUILDER
		// return $this->db->get_where('menu', array('k_menu'=> $k_menu))->result();

		//equivalent
		$result = $this->db->get_where('transaksi', array('id_transaksi'=> $id_transaksi));
		return $result->result();

	}
}

