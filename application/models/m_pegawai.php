<?php

class M_pegawai extends CI_Model {

	public function tampil_pegawai()
	{
		return $this->db->query('SELECT id_pegawai,nama_pegawai,user_pegawai,alamat_pegawai,telepon_pegawai FROM pegawai');
	}
	
	public function get_pegawai()
	{
		 $result = $this->db->get('pegawai');

        return $result->row();
	}

	public function ubah_pegawai($data)
	{
		$query = "UPDATE pegawai
				SET nama_pegawai =?,
				user_pegawai = ?,
				alamat_pegawai =?,
				telepon_pegawai =?
				WHERE id_pegawai = ?";

		$this->db->query($query,array($data['nama_pegawai'],$data['user_pegawai'],$data['alamat_pegawai'],$data['telepon_pegawai'],$data['id_pegawai']));

		return $this->db->affected_rows();
	}

	public function get_pegawai_specific($id_pegawai)
	{
		//RAW SQL
		// $query = "SELECT * from menu WHERE k_menu = ?";
		// $result = $this->db->query($query, array($k_menu));
		// return $result->result();

		//QUERY BUILDER
		// return $this->db->get_where('menu', array('k_menu'=> $k_menu))->result();

		//equivalent
		$result = $this->db->get_where('pegawai', array('id_pegawai'=> $id_pegawai));
		return $result->result();

	}
}

