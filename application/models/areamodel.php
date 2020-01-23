<?php

class AreaModel extends CI_Model
{
	public function AreaModel()
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
    protected $_table = 'tbl_projeto';
   
    /**
     * Variavel que se refere a chave primaria da tabela
     *
     * @access protected
     * @name $_pk
     */
    protected $_pk 		= 'id';
    protected $_link 	= 'link_publico';
    protected $_pitch 	= 'pitch';
    protected $_nome 	= 'nome';
        
    public function get($id = false)
    {
    	if ($id) $this->db->where($this->_pk, $id);
    	$get = $this->db->get($this->_table);
    	if($id) return $get->row_array();
    	if($get->num_rows > 0) return $get->result_array();
    	return array();
    }
    
}

?>
