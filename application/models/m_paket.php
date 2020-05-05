<?php

class M_paket extends CI_Model {

	public function tampil_paket()
	{
		return $this->db->query('SELECT id_paket, jenis_paket, harga_paket FROM paket');
	}
	
	public function get_paket()
	{
		 $result = $this->db->get('paket');

        return $result->row();
	}

	public function ubah_paket($data)
	{
		$query = "UPDATE paket
				SET jenis_paket =?,
				harga_paket =?,
				WHERE id_paket = ?";

		$this->db->query($query,array($data['jenis_paket'],$data['harga_paket'],$data['id_paket']));

		return $this->db->affected_rows();
	}

	public function get_paket_specific($id_paket)
	{
		//RAW SQL
		// $query = "SELECT * from menu WHERE k_menu = ?";
		// $result = $this->db->query($query, array($k_menu));
		// return $result->result();

		//QUERY BUILDER
		// return $this->db->get_where('menu', array('k_menu'=> $k_menu))->result();

		//equivalent
		$result = $this->db->get_where('paket', array('id_paket'=> $id_paket));
		return $result->result();

	}
}

