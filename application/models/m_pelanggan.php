<?php

class M_pelanggan extends CI_Model {

	public function tampil_pelanggan()
	{
		return $this->db->query('SELECT id_pelanggan,nama_pelanggan,alamat_pelanggan,telepon_pelanggan FROM pelanggan');
	}
	
	public function get_pelanggan()
	{
		 $result = $this->db->get('pelanggan');

        return $result->row();
	}

	public function ubah_pelanggan($data)
	{
		$query = "UPDATE pelanggan
				SET nama_pelanggan =?,
				alamat_pelanggan =?,
				telepon_pelanggan =?
				WHERE id_pelanggan = ?";

		$this->db->query($query,array($data['nama_pelanggan'],$data['alamat_pelanggan'],$data['telepon_pelanggan'],$data['id_pelanggan']));

		return $this->db->affected_rows();
	}

	public function get_pelanggan_specific($id_pelanggan)
	{
		//RAW SQL
		// $query = "SELECT * from menu WHERE k_menu = ?";
		// $result = $this->db->query($query, array($k_menu));
		// return $result->result();

		//QUERY BUILDER
		// return $this->db->get_where('menu', array('k_menu'=> $k_menu))->result();

		//equivalent
		$result = $this->db->get_where('pelanggan', array('id_pelanggan'=> $id_pelanggan));
		return $result->result();

	}
}

