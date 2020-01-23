<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class PermissaoUtil {
	
	public function validarPermissaoByAliasAndUri(){
	
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
	public function validarPermissaoCRUD($alias = false, $actionName = false){
	
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
   
	public function getByFuncionalidade($funcionalidadeId)
	{
		$res = array();
		 
		try {
		
			$sql = "SELECT tbl_permissao.*
FROM tbl_grupo_funcionalidade_permissao
INNER JOIN tbl_funcionalidade ON gfp_fun_id = fun_id
INNER JOIN tbl_permissao ON gfp_per_id = per_id
WHERE gfp_fun_id = ".$funcionalidadeId;
		
			$sql .= " ORDER BY per_id asc";
			
			$this->load->model('permissaomodel');
		
			$res = $this->db->query($sql)->result_array();
		
		} catch (Exception $e) {
			$e->getTraceAsString();
		}
		return $res;
	}
	
 
}
 
/* End of file TemplateAdmin.php */