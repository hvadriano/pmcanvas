<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Controller {
	
	private $salt = 'r4nd0m031814hb';
	private $token = 'token_usuario';
	
	protected $_limit = 10;
	
	protected $_temPermissao = array();
	
	// contrutor // function __construct()
	function Usuario(){
	
		parent::__construct();
	
		if(!$this->session->userdata('logged')){ //confiro se está logado
			redirect('admin/login'); // se não estiver redireciono para a controller de login
			
		}else { // ainda tenho que verificar se o usuário tem permissão para acessar o atributo "alias" para a funcionalidade
			
			$permissao = $this->validarPermissaoByAliasAndUri();
			if(!$permissao) {
				
				redirect('admin/home/index/'.'1'); // se não tem permissao para listar envio para a home
				
			}else $this->_temPermissao = $permissao;
			
		}
	}
	
	
	public function index($indice = 0)
	{
		$result = $this->session->userdata('result');
		$data['result'] = $result;					// usado pelo menu
		$data['usuario'] = $result['usuario'];		// usado pelo menu

		$this->load->model('usuariomodel');
		$data['usuarios'] = $this->usuariomodel->get(null, $indice, $this->_limit);
		
		$data['page_title']  = "Usu&aacute;rios";
		$data['content'] = "Cadastro de Usu&aacute;rios";
		
		$data['pagination'] = $this->pagination();
		$data['indice'] = $indice;
		$data['limit'] = $this->_limit;
		
		// para controlar a exibição dos botões na view ---------------------
		$data['btnEditar'] = $this->validarPermissaoCRUD(false, "editar");
		$data['btnCriar'] = $this->validarPermissaoCRUD(false, "criar");
		$data['btnRemover'] = $this->validarPermissaoCRUD(false, "remover");
		//-------------------------------------------------------------------
		
		// Load View
		$this->templateadmin->show('admin/usuario/list', $data);
	}
	
	public function editar($idUsuario = null)
	{
		// caso não tenha permissão para realizar a ação, redireciono
		if(!$this->validarPermissaoCRUD()) redirect('admin/home/index/'."1");
		
		// caso não tenha passado id  para editar eu redireciono
		if($idUsuario == null) redirect('admin/home/index/'."2");
		
		// tenho permissão e id, então vou ver se existe esse id no banco de dados
		$this->load->model('usuariomodel', 		'', true);
		$usuario = $this->usuariomodel->get($idUsuario);
		
		// caso venha false eu redireciono
		if(!$usuario) redirect('admin/home/index/'."3");		
		
		$result = $this->session->userdata('result');
		$data['result'] = $result;					// usado pelo menu
		$data['usuario'] = $result['usuario'];		// usado pelo menu
		
		$data['page_title']  = "Usu&aacute;rio";
		
		$data['usu'] = $usuario;
		$data['content'] = "Edi&ccedil;&atilde;o do Usu&aacute;rio: ".$usuario['usu_nome'];
		
		$data['grupos'] = $this->grupomodel->get();
		
		// para controlar a exibição dos botões na view ---------------------
		$data['btnCriar'] = $this->validarPermissaoCRUD(false, "criar");
		$data['token'] = sha1($this->token.$this->salt);
		// ------------------------------------------------------------------
		
		// Load View
		$this->templateadmin->show('admin/usuario/edit', $data);
	}
	
	public function criar() // ver se pode criar
	{
		
		// caso não tenha permissão para realizar a ação, redireciono
		if(!$this->validarPermissaoCRUD()) redirect('admin/home/index/'."1");
		
		$result = $this->session->userdata('result');
		$data['result'] = $result;					// usado pelo menu
		$data['usuario'] = $result['usuario'];		// usado pelo menu
		
		$data['page_title']  = "Usu&aacute;rio";
		
		$data['content'] = "Adi&ccedil;&atilde;o de Usu&aacute;rio.";
		
		$this->load->model('grupomodel', 		'', true);
		$data['grupos'] = $this->grupomodel->get();
		
		// para controlar a exibição dos botões na view ---------------------
		$data['btnCriar'] = $this->validarPermissaoCRUD(false, "criar");
		$data['token'] = sha1($this->token.$this->salt);
		// ------------------------------------------------------------------
		
		// Load View
		$this->templateadmin->show('admin/usuario/edit', $data);
	}
	
	public function salvar()
	{
		
		if($this->input->post("ok") != sha1($this->token.$this->salt))  redirect('admin/home/index/'."2");
		
		// caso não tenha permissão para criar ou editar, então não pode salvar aqui, senão redireciono
		if($this->validarPermissaoCRUD(false, "criar") || $this->validarPermissaoCRUD(false, "editar")){
		
			$this->load->model('usuariomodel', 		'', true);
			
			$sql_data = array(
					'usu_nome'    		=> $this->input->post('nome'),
					'usu_email'    		=> $this->input->post('email'),
					'usu_delete'    	=> 0,
					'usu_data_expira'	=> $this->input->post('expira'),
					'usu_gru_id'    	=> $this->input->post('grupo')
					
			);
			
			// validação --------------
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules($this->usuariomodel->getRules());
			
			if ($this->form_validation->run() == FALSE)
			{
				redirect('admin/home/index/'.'1');
			}
			
			// ------------------------
			
			
			
			
			if($this->input->post('delete')){
				$sql_data['usu_delete'] = $this->input->post('delete');
			}
			
			if($this->input->post('reset_senha')){
				$sql_data['usu_senha'] = $this->input->post('senha');
			}
			
			if ($this->input->post('id')){ // se id então é update
				$sql_data['usu_id'] = $this->input->post('id');
				$this->usuariomodel->update($this->input->post('id'), $sql_data);
			}
			
			else{ // senão é create 
				//$sql_data['usu_created'] = time();
				$this->usuariomodel->create($sql_data);
			}
		
			redirect('admin/usuario');
		
		}else redirect('admin/home/index/'.'1');
	}
	
	public function remover($id = FALSE){
		
		if($id && $this->validarPermissaoCRUD(false, false)) {
			
			$this->load->model('usuariomodel', 		'', true);
			
			$sql_data['usu_delete'] = "0";
			
			$this->usuariomodel->update($id, $sql_data);
			
			redirect('admin/usuario');
			
		}
		
		redirect('admin/home/index/'.'1');
	}
	
	private function pagination(){
	
		$totalRows = $this->usuariomodel->count();
	
		$this->load->library('pagination');
		$config['base_url'] 	= base_url()."admin/usuario/index/";
		$config['total_rows'] 	= $totalRows;
		$config['per_page'] 	= $this->_limit;
		$config['uri_segment'] 	= 4;
		$config['num_links'] 	= 3;
		$config['first_link'] 	= 'PRIMEIRO';
		$config['last_link'] 	= '&Uacute;LTIMO';
		$config['next_link'] 	= 'Pr&oacute;x.';
		$config['prev_link'] 	= 'Ant.';
	
		$this->pagination->initialize($config);
	
		$res['totalRows'] = $totalRows;
		$res['pageLinks'] = $this->pagination->create_links();
	
		return $res;
	}
	
	private function validarPermissaoByAliasAndUri(){
	
		// aqui pego o alias da funcionalidade e posso conferir se o grupo tem acesso a ele
		$uri = $this->uri->segment(1).'/'.$this->uri->segment(2);
	
		$result = $this->session->userdata('result');
		$usuario = $result['usuario'];
	
		foreach ($result['modulos'] as $chave=>$valor){ // todos os módulos que este usuário tem acesso
				
			foreach ($valor['funcionalidades'] as $key=>$value){ // as funcionalidades destes módulos
	
				// quando tem um "alias" de funcionalidade pode acessar pelo menu, então retorno true
				if($value['fun_alias'] == $uri)
					return true;
					
			}
				
		}
	
		return false;
	}
	
	// o método validarPermissaoCRUD é usado tanto para validar a exibição de botões para açoes quanto a url
	private function validarPermissaoCRUD($alias = false, $actionName = false){
	
		$this->load->model('funcionalidademodel', 		'', true);
		$this->load->model('permissaomodel', 			'', true);
		$this->load->model('grufunpermodel', 			'', true);
		
		// aqui pego o alias da funcionalidade
		$alias = ($alias) ? $alias: $this->uri->segment(1).'/'.$this->uri->segment(2);
		
		// aqui pego a ação que se pretende tomar. EX: editar, remover, criar
		$actionName = ($actionName) ? $actionName : $this->uri->segment(3);
		
		$funcionalidade = $this->funcionalidademodel->getByAlias($alias);
		$permissao = $this->permissaomodel->getByNome($actionName);
		
		$result = $this->session->userdata('result');
		$grupo = $result['grupo'];
	
		return $this->grufunpermodel->existe($grupo, $funcionalidade, $permissao);
	}
	
}
