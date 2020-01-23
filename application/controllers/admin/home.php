<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
	protected $_msg = array(
			'1'	=> "Acesso Negado!",
			'2'	=> "Sua URI apresentou erros!",
			'3'	=> "N&atilde;o existente em nossa Base de Dados!"
	);

	// contrutor
	function Home(){
		
		parent::__construct();
		
		$this->load->library('AreaUtil');
		
		if(!$this->session->userdata('logged'))
			redirect('admin/login');
		
	}
	
	public function index($msg = FALSE)
	{
		if($msg && isset($this->_msg[$msg])) $data['mensagem'] = $this->_msg[$msg];
		
		$result = $this->session->userdata('result');
		$data['result'] = $result;
		
		$data['usuario'] = $result['usuario'];
		
		
		$data['page_title']  = "Home Sistema Administrador";
        $data['content'] = "Sistema Administrador " + MENU_TITLE;

        if(isset($result['temPermissao'])) $data['temPermissao'] = $result['temPermissao'];
        
        // adicionando o mapa contendo os projetos do usuário -----------------
        $this->load->model('projetomodel', '', true);
        $data[ 'projetos' ] = $this->projetomodel->getByUserId( $data[ 'usuario' ][ 'usu_id' ] );
        
        // -------------------------------------------------------------------
        
        // Load View
        $this->templateadmin->show('admin/projeto/list', $data);
	}
	
}