<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grupo extends CI_Controller {
	
	// contrutor // function __construct()
	function Grupo(){
	
		parent::__construct();
	
		if(!$this->session->userdata('logged')){ //confiro se está logado
			redirect('admin/login'); // se não estiver redireciono para a controller de login
			
		}else { // ainda tenho que verificar se o usuário tem permissão para acessar o atributo "alias" para a funcionalidade
			
			if(!$this->validarPermissaoByAliasAndUri()) {
				
				redirect('admin/home/index/'.'1'); // se não tem permissao para listar envio para a home
				
			}else $this->_temPermissao = $this->validarPermissaoByAliasAndUri();
			
		}
	}
	
	
	public function index()
	{
		$result = $this->session->userdata('result');
		$data['result'] = $result;					// usado pelo menu
		$data['usuario'] = $result['usuario'];		// usado pelo menu

		$this->load->model('grupomodel');
		$data['grupos'] = $this->grupomodel->get();		
		
		$data['page_title']  = "Grupos";
		$data['content'] = "Cadastro de Grupos";
		
		// Load View
		$this->templateadmin->show('admin/grupo/list', $data);
	}
	
	public function editar($idGrupo = null)
	{
		$result = $this->session->userdata('result');
		$data['result'] = $result;					// usado pelo menu
		$data['usuario'] = $result['usuario'];		// usado pelo menu
		
		$data['page_title']  = "Grupo";
		$data['content'] = "Cadastro de novo Grupo";
		
		if ($idGrupo != null){
			$this->load->model('grupomodel');
			$data['grupo'] = $this->grupomodel->get($idGrupo);
			$data['content'] = "Edi&ccedil;&atilde;o do Grupo: ".$data['grupo']['gru_nome'];
		}

		// Load View
		$this->templateadmin->show('admin/grupo/edit', $data);
	}
	
	public function novo()
	{
		redirect('admin/grupo/editar');
	}
	
	public function salvar()
	{
		$this->load->model('grupomodel');
		
		$sql_data = array(
				'gru_nome'    => $this->input->post('nome')
		);
		
		if ($this->input->post('id')){ // se id então é update
			$sql_data['gru_id'] = $this->input->post('id');
			$this->grupomodel->update($this->input->post('id'), $sql_data);
		}
		
		else{ // senão é create 
			$this->grupomodel->create($sql_data);
		}
	
		redirect('admin/grupo');
	}
	
	private function validarPermissaoByAliasAndUri(){
	
		// aqui pego o alias da funcionalidade e posso conferir se o grupo tem acesso a ele
		$uri = $this->uri->segment(1).'/'.$this->uri->segment(2);
	
		$result = $this->session->userdata('result');
		$usuario = $result['usuario'];
		$modAndFunAndPerAndGru = $result['modAndFunAndPerAndGru'];
	
		foreach ($result['modulos'] as $chave=>$valor){ // todos os módulos que este usuário tem acesso
	
			foreach ($valor['funcionalidades'] as $key=>$value){ // as funcionalidades destes módulos
	
				// quando tem um "alias" de funcionalidade pode acessar pelo menu, então retorno true
				if($value['fun_alias'] == $uri)
					return true;
					
			}
	
		}
	
		return false;
	}
}
