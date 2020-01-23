<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permissao extends CI_Controller {
	
	// contrutor // function __construct()
	function Permissao(){
	
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

		$this->load->model('permissaomodel');
		$data['permissaoes'] = $this->permissaomodel->get();		
		
		$data['page_title']  = "Permiss&otilde;es";
		$data['content'] = "Cadastro de Permiss&otilde;es";
		
		// Load View
		$this->templateadmin->show('admin/permissao/list', $data);
	}
	
	public function editar($idPermissao = null)
	{
		$result = $this->session->userdata('result');
		$data['result'] = $result;					// usado pelo menu
		$data['usuario'] = $result['usuario'];		// usado pelo menu
		
		$data['page_title']  = "Permiss&otilde;o";
		$data['content'] = "Cadastro de nova Permiss&atilde;o";
		
		if ($idPermissao != null){
			$this->load->model('permissaomodel');
			$data['permissao'] = $this->permissaomodel->get($idPermissao);
			$data['content'] = "Edi&ccedil;&atilde;o da Permiss&atilde;o: ".$data['permissao']['per_nome'];
		}

		// Load View
		$this->templateadmin->show('admin/permissao/edit', $data);
	}
	
	public function novo()
	{
		redirect('admin/permissao/editar');
	}
	
	public function salvar()
	{
		$this->load->model('permissaomodel');
		
		$sql_data = array(
				'per_nome'    => $this->input->post('nome')
		);
		
		if ($this->input->post('id')){ // se id então é update
			$sql_data['per_id'] = $this->input->post('id');
			$this->permissaomodel->update($this->input->post('id'), $sql_data);
		}
		
		else{ // senão é create 
			$this->permissaomodel->create($sql_data);
		}
	
		redirect('admin/permissao');
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
