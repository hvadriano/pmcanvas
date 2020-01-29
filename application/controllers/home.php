<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	// contrutor
	function Home(){
		
		parent::__construct();
		
	}
	
	public function index()
	{   
		if ( $this->session->userdata('result') != null )
		{
			$result = $this->session->userdata('result');
			$data['result'] = $result;
			$data['usuario'] = $result['usuario'];
		}
		
		$data['page_title']  = "Home";
        $data['content'] = "Bem Vindo ao site Companhia de Arte!";
		
		//$this->load->library('encrypt');
		//$data['msg_cripto'] = $this->encrypt->encode("1");
		//$data['msg_decripto'] = $this->encrypt->decode($data['msg_cripto']);      
      
        // Load View
        $this->template->show('home', $data);
	}
	
}