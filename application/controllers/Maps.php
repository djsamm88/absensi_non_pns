<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maps extends CI_Controller {


	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');		
		$this->load->model('m_absensi');
		$this->load->helper('custom_func');
		
		$this->load->helper('text');
		date_default_timezone_set("Asia/jakarta");
		
	}
	
    
    
	public function view_history_by_id()
	{
				
		$Id = $this->input->get('id');
        
        $x = $this->m_absensi->view_history_by_id($Id);
        
        $data['byId'] = $x[0];
        $this->load->view('maps.php',$data);
	}
	
    
    
}