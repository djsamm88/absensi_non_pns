<?php 
	if (!defined('BASEPATH'))exit('No direct script access allowed');

	class M_absensi extends CI_Model {
		
		function __construct() {
			parent::__construct();
		
			$this->load->helper('custom_func');
		}
		
	
		
		public function cek_pegawai($username,$password)
		{
			$q = $this->db->query(" SELECT a.*,b.departemen,c.jabatan
											 FROM tbl_pegawai a 
											 LEFT JOIN tbl_departemen b 
											 ON a.id_departemen = b.id 
											 LEFT JOIN tbl_jabatan c 
											 ON a.id_jabatan = c.id
											 WHERE username='$username' AND password='$password'");

			return $q->result();
		}

		public function all_history_by_nip($id,$tahun,$bulan)
		{
			$q = $this->db->query("SELECT * FROM tbl_log WHERE id_pegawai='$id' AND YEAR(tgl_log)='$tahun' AND MONTH(tgl_log)='$bulan' ORDER BY tgl_log DESC");

			//echo "SELECT * FROM tbl_log WHERE id='$id' AND YEAR(tgl_log)='$tahun' AND MONTH(tgl_log)='$bulan'";

			return $q->result();

		}


		public function view_history_by_id($id)
		{
			$q = $this->db->query("SELECT * FROM tbl_log WHERE id='$id'");

			//echo "SELECT * FROM tbl_log WHERE id='$id' AND YEAR(tgl_log)='$tahun' AND MONTH(tgl_log)='$bulan'";

			return $q->result();

		}

		
	}
?>
