<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){

		parent::__construct();
		check_not_login();
		$this->load->model(['M_transaksi', 'M_paket', 'M_dashboard']);

	}
	
	public function index()
	{
		check_not_login();
		$data['count_baru'] = $this->M_dashboard->get_count_monthly();
		$data['count_pegawai'] = $this->M_dashboard->get_count_pegawai();
		$data['countdaily'] = $this->M_dashboard->get_count_daily();
		$data['counttransaksi'] = $this->M_dashboard->get_count_transaksi();

		$data['recent'] = $this->db->query("SELECT * FROM paket pk, transaksi tr  WHERE pk.id=tr.id_paket AND tgl_transaksi=CURRENT_DATE() ")->result();
		//	var_dump($data);
		//	die();
		$this->template->load('template', 'dashboard', $data);
	}

}
