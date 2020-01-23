<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Funcionalidade extends CI_Controller {
	
	protected $_limit = 10;
	
	protected $_temPermissao = array();
	
	// contrutor // function __construct()
	function Funcionalidade(){
	
		parent::__construct();
	
		if(!$this->session->userdata('logged')){ //confiro se está logado
			redirect('admin/login'); // se não estiver redireciono para a controller de login
			
		}else { // ainda tenho que verificar se o usuário tem permissão para acessar o atributo "alias" para a funcionalidade
			
			if(!$this->validarPermissaoByAliasAndUri()) {
				
				redirect('admin/home/index/'.'1'); // se não tem permissao para listar envio para a home
				
			}else $this->_temPermissao = $this->validarPermissaoByAliasAndUri();
			
		}
			
	}
	
	
	public function index($indice = 0)
	{	
		$result = $this->session->userdata('result');
		$data['result'] = $result;					// usado pelo menu
		$data['usuario'] = $result['usuario'];		// usado pelo menu
		$data['temPermissao'] = $this->_temPermissao; // teste  
		
		$this->load->model('funcionalidademodel', 		'', true);

		$data['funcionalidades'] = $this->funcionalidademodel->get(null, $indice, $this->_limit);		
		
		$data['page_title']  = "Funcionalidades";
		$data['content'] = "Funcionalidades";
		
		$data['pagination'] = $this->pagination();
		$data['indice'] = $indice;
		$data['limit'] = $this->_limit;
		
		// para controlar a exibição dos botões na view ---------------------
		$data['btnEditar'] = $this->validarPermissaoCRUD(false, "editar");
		$data['btnCriar'] = $this->validarPermissaoCRUD(false, "criar");
		// ------------------------------------------------------------------
		
		// Load View
		$this->templateadmin->show('admin/funcionalidade/list', $data);
	}
	
	public function editar($idFuncionalidade = null)
	{
		// caso não tenha permissão para realizar a ação, redireciono
		if(!$this->validarPermissaoCRUD()) redirect('admin/home/index/'.'1');
		
		if ($idFuncionalidade == null) redirect('admin/home'); // se id = null então retorno para a home
		
		$this->load->model('modulomodel', 		'', true);
		$this->load->model('permissaomodel', 	'', true);
		$this->load->model('grupomodel', 		'', true);
		
		$result = $this->session->userdata('result');
		$data['result'] = $result;					// usado pelo menu
		$data['usuario'] = $result['usuario'];		// usado pelo menu
	
		$this->load->model('funcionalidademodel', '', true);
		$data['funcionalidade'] = $this->funcionalidademodel->get($idFuncionalidade);
			
		$data['modulo'] = $this->modulomodel->get($data['funcionalidade']['fun_mod_id']);
		$data['modulos'] = $this->modulomodel->get();
	
		$data['gfp'] = $this->permissaomodel->getByFuncionalidade($idFuncionalidade);
		$data['permissoes'] = $this->permissaomodel->get();
		
		$data['grupos'] = $this->grupomodel->get();
		
		$data['page_title']  = "Funcionalidade: ".$data['funcionalidade']['fun_nome'];
		$data['content'] = "Edi&ccedil;&atilde;o da funcionalidade: ".$data['funcionalidade']['fun_nome'].", do m&oacute;dulo: ".$data['modulo']['mod_nome'];
	
		// Load View
		$this->templateadmin->show('admin/funcionalidade/edit', $data);
	}
	
	public function criar($idModulo = null)
	{
		
		// caso não tenha permissão para realizar a ação, redireciono
		if(!$this->validarPermissaoCRUD()) redirect('admin/home/index/'.'1');
		
		$this->load->model('modulomodel', 		'', true);
		$this->load->model('permissaomodel', 	'', true);
		$this->load->model('grupomodel', 		'', true);
		
		$result = $this->session->userdata('result');
		$data['result'] = $result;					// usado pelo menu
		$data['usuario'] = $result['usuario'];		// usado pelo menu
		
		$data['permissoes'] = $this->permissaomodel->get();
		$data['grupos'] = $this->grupomodel->get();
		$data['gfp'] = array(); // colocado aqui somente para tornar mais amigável a classe view
		
		if ($idModulo != null){
				
			$data['modulo'] = $this->modulomodel->get($idModulo);
			$data['content'] = "Cadastro de nova funcionalidade para o M&oacutedulo: ".$data['modulo']['mod_nome'];
			
		} else {			
			$data['modulos'] = $this->modulomodel->get();
			$data['content'] = "Cadastro de nova funcionalidade";			
		}
		
		$data['page_title']  = "Cadastro de nova funcionalidade";
		
		// Load View
		$this->templateadmin->show('admin/funcionalidade/edit', $data);

	}
	
	public function salvar()
	{
		// caso não tenha permissão para criar ou editar, então não pode salvar aqui, senão redireciono
		if($this->validarPermissaoCRUD(false, "criar") || $this->validarPermissaoCRUD(false, "editar")){
		
			$this->load->model('funcionalidademodel',	'', true);
			$this->load->model('grufunpermodel', 		'', true);
			$this->load->model('permissaomodel', 		'', true);
			$this->load->model('grupomodel', 			'', true);
			
			$funcionalidade = array();
			
			$sql_data = array(
					'fun_nome'    => $this->input->post('nome'),
					'fun_alias'   => $this->input->post('alias'),
					'fun_ordem'   => $this->input->post('ordem'),
					'fun_visible' => $this->input->post('visible'),
					'fun_mod_id' => $this->input->post('modulo')
			);
			
			if ($this->input->post('funcionalidade')){ // se funcionalidade então é update
				$sql_data['fun_id'] = $this->input->post('funcionalidade');
				$this->funcionalidademodel->update($this->input->post('funcionalidade'), $sql_data);
				$funcionalidade = $this->input->post('funcionalidade');
				
				$this->grufunpermodel->deleteByFuncionalidade($funcionalidade);
				
				$this->grufunpermodel->createGroup(
						$this->grupomodel->get(),
						$this->permissaomodel->get(), 
						$this->input->post(),
						$funcionalidade
				);
				
			}
			else{ // senão é create 
				$funcionalidade = $this->funcionalidademodel->create($sql_data);
				
				$this->grufunpermodel->createGroup(
						$this->grupomodel->get(),
						$this->permissaomodel->get(),
						$this->input->post(),
						$funcionalidade
				);
			}
		
			redirect('admin/funcionalidade/editar/'.$funcionalidade);
		
		}else redirect('admin/home/index/'.'1');
	}
	
	private function pagination(){
		
		$totalRows = $this->funcionalidademodel->count();
		
		$this->load->library('pagination');
		$config['base_url'] 	= base_url()."admin/funcionalidade/index/";
		$config['total_rows'] 	= $totalRows;
		$config['per_page'] 	= $this->_limit;
		$config['uri_segment'] 	= 4; // índice vindo no URL
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
