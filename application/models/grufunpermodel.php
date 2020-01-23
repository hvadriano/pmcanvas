<?php

class GrufunperModel extends CI_Model
{
	public function GrufunperModel()
	{
		parent::__construct();
	
	}
	
	private $salt = 'r4nd0m031814hb';
	
    /**
     * Variavel que se refere ao nome da tabela no banco de dados
     *
     * @access protected
     * @name $_table
     */
    protected $_table = 'tbl_grupo_funcionalidade_permissao';
   
    
    protected $_grupoId 			= 'gfp_gru_id';
    protected $_funcionalidadeId 	= 'gfp_fun_id';
    protected $_permissaoId 		= 'gfp_per_id';
    
    public function getModulosByGrupoId($grupoId = false)
	{
    	// Get current CI Instance
    	$CI = & get_instance();
    	$CI->load->model('funcionalidademodel');
    	
    	$gfp = array();
    	 
    	try {
    	
    		if ($grupoId){
    			 
    			$gfp = $this->getGfp($grupoId);
    			
    			
    			foreach ($gfp as $chave=>&$valor)
    			{
    				$valor['funcionalidades'] = $CI->funcionalidademodel->getByModuloAndGrupoAndPermissaoParaListar($valor['mod_id'],$valor[$this->_grupoId], $valor[$this->_permissaoId]);
    			}
    			 
    		}
    	
    	} catch (Exception $e) {
    		$e->getTraceAsString();
    	}
    	 
    	return $gfp;

    }
    
    public function getGfp($grupoId = null)
    {
    	$sql = "SELECT distinct tbl_modulo.*, ".$this->_permissaoId.", ".$this->_grupoId." 
FROM tbl_grupo_funcionalidade_permissao 
INNER JOIN tbl_grupo ON gfp_gru_id = gru_id 
INNER JOIN tbl_funcionalidade ON gfp_fun_id = fun_id 
INNER JOIN tbl_permissao ON gfp_per_id = per_id 
INNER JOIN tbl_modulo ON mod_id = fun_mod_id 
WHERE ".$this->_permissaoId." = 1 ";  // _permissaoId = 1 é usado porque o usuário precisa pelo menos ter permissão para listar
    	
    	if($grupoId != null) $sql.=" and ".$this->_grupoId." = ".$grupoId;
    			
    	$sql .= " ORDER BY mod_ordem asc";
    			 
    	return $this->db->query($sql)->result_array();
    }
    
    
    public function create($data)
    {
    	return $this->db->insert($this->_table, $data);
    }
    
    public function createGroup($grupos, $permissoes, $input, $funcionalidade)
    {
    	
    	foreach ($grupos as $chave=>$valor):

    		foreach ($permissoes as $key=>$value):
    		
    			$grupo_permissao = "g".$valor['gru_id']."_p".$value['per_id'];

    			if(isset($input[$grupo_permissao])):
    			
	    			$g_p 		= explode("_", $input[$grupo_permissao]);
	    			$grupo 		= $g_p[0];
	    			$permissao 	= $g_p[1];
    			
	    			$data[$this->_grupoId] 			= $grupo;
	    			$data[$this->_permissaoId] 		= $permissao;
	    			$data[$this->_funcionalidadeId] = $funcionalidade;
	    			 
	    			$this->db->insert($this->_table, $data);
    			endif;
    		
    		endforeach;
    	endforeach;
    	
    }
    
    /*
     o delete, que é bem simples. Ele recebe um ID de usuário a ser removido e define a condição where com esse ID. Depois disso executamos o delete.
    */
    public function delete($data)
    {
    	$this->db->where($this->_grupoId, $data['grupo']);
    	$this->db->where($this->_funcionalidadeId, $data['funcionalidade']);
    	$this->db->where($this->_permissaoId, $data['permissao']);
    	
    	$this->db->delete($this->_table);
    }
    
    public function deleteByFuncionalidade($funcionalidadeId)
    {
    	$this->db->where($this->_funcionalidadeId, $funcionalidadeId);
    	 
    	$this->db->delete($this->_table);
    }
    
    public function existe($grupo, $funcionalidade, $permissao)
    {
    	$this->db->where($this->_grupoId, $grupo['gru_id']);
    	$this->db->where($this->_funcionalidadeId, $funcionalidade['fun_id']);
    	$this->db->where($this->_permissaoId, $permissao['per_id']);
    	 
    	$get = $this->db->get($this->_table);

    	if($get->num_rows > 0) return true;
    	
    	return false;
    }
    
    
}


