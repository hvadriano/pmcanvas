<?php

class LinkModel extends CI_Model
{
	public function LinkModel()
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
    protected $_table = 'tbl_link';
   
    /**
     * Variavel que se refere a chave primaria da tabela
     *
     * @access protected
     * @name $_pk
     */
    protected $_pk 		= 'id';
    protected $_de 		= 'card_de';
    protected $_para	= 'card_para';
    
    public function get($id = false)
    {
    	if ($id) $this->db->where($this->_pk, $id);
    	$this->db->order_by($this->_area, 'asc');
    	$get = $this->db->get($this->_table);
    	if($id) return $get->row_array();
    	if($get->num_rows > 0) return $get->result_array();
    	return array();
    }
    
	public function getLinkByCardDe( $id = false)
    {
    	if( ! $id ) return array();
    	
    	$this->db->where($this->_de, $id);
    	$get = $this->db->get($this->_table);
    	
    	$res = array();
    	
    	foreach ( $get->result_array() as $link ) {
    		array_push( $res, $link[ $this->_para ] );
    	}
    	
    	return $res;
    }
    
    public function create( $data )
    {
    	$dados[ $this->_de ] 	= $data[ 'cardDe' ];
    	$dados[ $this->_para ] 	= $data[ 'cardPara' ];
    	
    	$this->db->insert($this->_table, $dados);
    	return $this->db->insert_id();
    }
    
    public function delete( $data )
    {
    	$this->db->where( $this->_de, $data[ 'cardDe' ] );
    	$this->db->where( $this->_para, $data[ 'cardPara' ] );
    	$this->db->delete( $this->_table );
    }
    
}

?>
