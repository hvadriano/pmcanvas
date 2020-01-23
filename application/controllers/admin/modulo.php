<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modulo extends CI_Controller {

	protected $_limit = 10;
	
	// contrutor // function __construct()
	function Modulo(){
	
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

		$this->load->model('modulomodel');
		$data['modulos'] = $this->modulomodel->get();		
		
		$data['page_title']  = "M&oacute;dulos";
		$data['content'] = "Cadastro de M&oacute;dulos";
		
		$data['pagination'] = $this->pagination();
		$data['indice'] = $indice;
		$data['limit'] = $this->_limit;
		
		// Load View
		$this->templateadmin->show('admin/modulo/list', $data);
	}
	
	public function editar($idModulo = null)
	{
		if ($idModulo == null) redirect('admin/modulo/novo'); // se id = null então é "novo"
		
		$result = $this->session->userdata('result');
		$data['result'] = $result;					// usado pelo menu
		$data['usuario'] = $result['usuario'];		// usado pelo menu
		
		$this->load->model('modulomodel');
		$data['modulo'] = $this->modulomodel->get($idModulo);
	
		$this->load->model('funcionalidademodel');
		$data['funcionalidades'] = $this->funcionalidademodel->getByModulo($data['modulo']['mod_id']);
	
		$data['page_title']  = $data['modulo']['mod_nome'];
		$data['content'] = "Edi&ccedil;&atilde;o do m&oacute;dulo: ".$data['modulo']['mod_nome'];
	
		// Load View
		$this->templateadmin->show('admin/modulo/edit', $data);
	}
	
	public function novo()
	{
		$result = $this->session->userdata('result');
		$data['result'] = $result;					// usado pelo menu
		$data['usuario'] = $result['usuario'];		// usado pelo menu
	
// 		$this->load->model('modulomodel');
// 		$data['modulo'] = $this->modulomodel->get($idModulo);
	
	
		$data['page_title']  = "M&oacute;dulos";
		$data['content'] = "Novo M&oacute;dulo";
	
		// Load View
		$this->templateadmin->show('admin/modulo/edit', $data);
	}
	
	public function salvar()
	{
		$this->load->model('modulomodel');
		
		$sql_data = array(
				'mod_nome'    => $this->input->post('nome'),
				'mod_alias'   => $this->input->post('alias'),
				'mod_ordem'   => $this->input->post('ordem'),
				'mod_visible' => $this->input->post('visible')
		);
		
		$idModulo = array();
		
		if ($this->input->post('id')){ // se id então é update
			
			$idModulo = $this->input->post('id');
			
			$sql_data['mod_id'] = $this->input->post('id');
			$this->modulomodel->update($this->input->post('id'), $sql_data);
		}
		
		else{ // senão é create 
			$idModulo = $this->modulomodel->create($sql_data);
		}
	
		redirect('admin/modulo/editar/'.$idModulo);
	}
	
	private function pagination(){
	
		$totalRows = $this->modulomodel->count();
	
		$this->load->library('pagination');
		$config['base_url'] 	= base_url()."admin/funcionalidade/index/";
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
