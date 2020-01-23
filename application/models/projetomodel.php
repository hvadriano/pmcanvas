<?php

class ProjetoModel extends CI_Model
{
	public function ProjetoModel()
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
    protected $_table = 'tbl_area';
   
    /**
     * Variavel que se refere a chave primaria da tabela
     *
     * @access protected
     * @name $_pk
     */
    protected $_pk 				= 'id';
    protected $_imagem 			= 'imagem';
    protected $_titulo 			= 'titulo';
    protected $_questao_fk 		= 'questao_fk';
    protected $_area_saida_fk 	= 'area_saida_fk';
    protected $_area_entrada_fk = 'area_entrada_fk';
    protected $_descricao 		= 'descricao';
    
    public function get($id = false)
    {
    	if ($id) $this->db->where($this->_pk, $id);
    	$this->db->order_by($this->_area, 'asc');
    	$get = $this->db->get($this->_table);
    	if($id) return $get->row_array();
    	if($get->num_rows > 0) return $get->result_array();
    	return array();
    }
    
    public function getTituloById( $id = false ) {
    	
    	$this->db->select( $this->_titulo );
    	
    	$get = $this->db->get($this->_table);
    	if($id) return $get->row_array();
    	if($get->num_rows > 0) return $get->result_array();
    	return array();
    	
    }
    
    public function getByUserId( $id = false ) {
    	 
    	$res = array();
    	 
    	$sql = "SELECT * FROM tbl_projeto p "
    			//."join tbl_usuario_projeto up on up.projeto_fk = p.id "
    			."WHERE p.usuario_fk = " . $id;
    	 
    	try {
    
    		$res = $this->db->query($sql)->result_array();
    
    	} catch (Exception $e) {
    		$e->getTraceAsString();
    	}
    	 
    	return $res;
    	 
    }
    
}

?>
