<?php

class FuncionalidadeModel extends CI_Model
{
	public function FuncionalidadeModel()
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
    protected $_table = 'tbl_funcionalidade';
   
    /**
     * Variavel que se refere a chave primaria da tabela
     *
     * @access protected
     * @name $_pk
     */
    protected $_pk 			= 'fun_id';
    protected $_moduloId 	= 'fun_mod_id';
    protected $_nome 		= 'fun_nome';
    protected $_alias 		= 'fun_alias';
    protected $_ordem 		= 'fun_ordem';
    protected $_visible 	= 'fun_visible';
    
    public function getByModulo($moduloId = false)
    {
    	$funcionalidades = array();
    	
    	$this->db->where($this->_moduloId, $moduloId);
    	$this->db->order_by($this->_ordem, 'asc');
    	$get = $this->db->get($this->_table);
    	
    	$funcionalidades = $get->result_array();
    	
    	//$CI = & get_instance();
    	$this->load->model('permissaomodel');
    	foreach ($funcionalidades as $chave=>&$valor)
    	{
    		$valor['permissoes'] = $this->permissaomodel->getByFuncionalidade($valor['fun_id']);
    	}
    	
    	return $funcionalidades;
    }
    
    public function get($id = false, $indice = 0, $limit = 10)
    {    	 
    	$this->load->model('modulomodel');
    	
    	$res = array();
    	
    	if ($id) $this->db->where($this->_pk, $id);
		$this->db->order_by($this->_moduloId.','.$this->_pk, 'asc');
		
		if($id):
			$get = $this->db->get($this->_table);
		
			$res = $get->row_array();
			$res['modulo'] = $this->modulomodel->get($res['fun_mod_id']);
		
			return $res;
		endif;
		
		// caso não seja passado o id, quer dizer que vai listar e assim usarei as variáveis indice e limit
		$get = $this->db->get($this->_table, $limit, $indice);
		
		if($get->num_rows > 0):
			$res = $get->result_array();
		
			foreach ($res as $chave=>&$valor):
			
				$valor['modulo'] = $this->modulomodel->get($valor['fun_mod_id']);
			
			endforeach;
		
			return $res;
		endif;
		
		return array();
    }
    
    public function getByModuloAndGrupoAndPermissaoParaListar($moduloId, $grupoId, $permissaoId)
    {
    	$res = array();
    	
    	try {
    		
    		$sql = "SELECT tbl_funcionalidade.* 
FROM tbl_grupo_funcionalidade_permissao 
INNER JOIN tbl_grupo ON gfp_gru_id = gru_id 
INNER JOIN tbl_funcionalidade ON gfp_fun_id = fun_id 
INNER JOIN tbl_permissao ON gfp_per_id = per_id 
INNER JOIN tbl_modulo ON mod_id = fun_mod_id 
WHERE gfp_per_id = ".$permissaoId." AND gfp_gru_id = ".$grupoId." AND mod_id = ".$moduloId;

    		$sql .= " ORDER BY ".$this->_ordem." asc";
    		
    		$res = $this->db->query($sql)->result_array();
    		
    	} catch (Exception $e) {
    		$e->getTraceAsString();
    	}
    	return $res;
    }
      
    public function create($data)
    {
    	//$data[$this->_created] = date('Y-m-d', time());
    	$this->db->insert($this->_table, $data);
    	return $this->db->insert_id();
    }
    
    /*
     O método update tem dois parâmetros – o ID do usuário e um array com a informação a ser atualizada.
    A senha (que pode ser enviada neste array caso o usuário escolha atualizar a senha) será concatenada a propriedade salt e
    encriptada utilizando a função sha1, da mesma maneira que fazemos quando o usuário é criado.
    ID será adicionado a condição where e o update será executado para a tabela ‘user’.
    Esse método retornará se a atualização foi um sucesso ou não.
    */
    public function update($id, $data)
    {
    	$this->db->where($this->_pk, $id);
    	$update = $this->db->update($this->_table, $data);
    	return $update;
    }
    
    /*
     o delete, que é bem simples. Ele recebe um ID de usuário a ser removido e define a condição where com esse ID. Depois disso executamos o delete.
    */
    public function delete($id)
    {
    	$this->db->where($this->_pk, $id);
    	$this->db->delete($this->_table);
    }
    
    public function count(){
    	return $this->db->count_all($this->_table);
    }
    
    public function getByAlias($alias)
    {    	 
    	$this->db->where($this->_alias, $alias);
    	$get = $this->db->get($this->_table);
    	 
    	$funcionalidade = $get->row_array();
    	
    	return $funcionalidade;
    }
    
}

?>
