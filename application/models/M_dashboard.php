<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {
	
	public function get_count_monthly(){
	    $sql = "SELECT SUM(subtotal) as id FROM transaksi where tgl_transaksi=CURRENT_DATE() ";
	    $result = $this->db->query($sql);
	    return $result->row()->id;
	}

	public function get_count_pegawai(){
	    $sql = "SELECT COUNT(id_user) as id FROM user WHERE user.level = '2' ";
	    $result = $this->db->query($sql);
	    return $result->row()->id;
	}

	public function get_count_daily(){
		$sql = "SELECT COUNT(id) as id FROM transaksi WHERE tgl_transaksi=CURRENT_DATE()";
		$result = $this->db->query($sql);
		return $result->row()->id;
	}

	public function get_count_transaksi(){
	    $sql = "SELECT COUNT(id) as id FROM transaksi";
	    $result = $this->db->query($sql);
	    return $result->row()->id;
	}
}
