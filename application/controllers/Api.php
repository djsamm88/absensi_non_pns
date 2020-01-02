<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {


	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');		
		$this->load->model('m_absensi');
		$this->load->helper('custom_func');
		
		$this->load->helper('text');
		date_default_timezone_set("Asia/jakarta");
		
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: *");
		header('Content-Type: application/json');
	}
	
	
	public function index()
	{
		echo json_encode(array("Selamat datang api"));
	}

    public function login()
    {		   
	   	

	    	$username = $this->input->get('username');
	    	$password = $this->input->get('password');

	    	if($username==""){
		    	$err = array();
				$err['msg']='username - password Required by php://input.';
				echo json_encode($err);
				die();
		    }


	    	
	    	$cek = $this->m_absensi->cek_pegawai($username,$password);
	    	
	    	echo json_encode($cek);
	    

    }
	
	
	public function    simpan_absensi_base64()
	{
		$json = file_get_contents('php://input');        
        $data = json_decode($json);
                
        if($json)
        {

            $id_pegawai = $data->fid;
            $lat = $data->lat;
            $lng = $data->lng;
            $base64 = $data->base64;
            $NIP = $data->NIP;
            $wak = date('YmdHi');
            $image = $this->base64_to_jpeg( $base64, 'bukti_absensi/'.$NIP.'_'.$wak.'.jpg' );


            $this->db->query("INSERT INTO tbl_log SET 

                                    lat='$lat',
                                    lng='$lng', 
                                    image='$image', 
                                    id_pegawai='$id_pegawai'
                                    
                                ");

           
        }else{
           
        }
        
        
	}
	
	
    private function base64_to_jpeg( $base64_string, $output_file ) 
    {
            $ifp = fopen( $output_file, "wb" ); 
            fwrite( $ifp, base64_decode( $base64_string) ); 
            fclose( $ifp ); 
            return( $output_file ); 
    }


    public function all_history_by_nip()
    {
    	$id_pegawai = $this->input->get('fid');
        $tahun = $this->input->get('tahun');
        $bulan = $this->input->get('bulan');

        $q = $this->m_absensi->all_history_by_nip($id_pegawai,$tahun,$bulan);
        echo json_encode($q);

    }

	
}
