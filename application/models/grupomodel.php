<?php

class GrupoModel extends CI_Model
{
	public function GrupoModel()
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
    protected $_table = 'tbl_grupo';
   
    /**
     * Variavel que se refere a chave primaria da tabela
     *
     * @access protected
     * @name $_pk
     */
    protected $_pk = 'gru_id';
    protected $_nome = 'gru_nome';
    protected $_created = 'gru_created';
    
    public function get($id = false)
    {
    	if ($id) $this->db->where($this->_pk, $id);
    	$this->db->order_by($this->_nome, 'asc');
    	$get = $this->db->get($this->_table);
    	if($id) return $get->row_array();
    	if($get->num_rows > 0) return $get->result_array();
    	return array();
    }
    public function create($data)
    {
    	$data[$this->_created] = date('Y-m-d', time());
    	return $this->db->insert($this->_table, $data);
    }
    
    /*
     O m�todo update tem dois par�metros � o ID do usu�rio e um array com a informa��o a ser atualizada.
    A senha (que pode ser enviada neste array caso o usu�rio escolha atualizar a senha) ser� concatenada a propriedade salt e
    encriptada utilizando a fun��o sha1, da mesma maneira que fazemos quando o usu�rio � criado.
    ID ser� adicionado a condi��o where e o update ser� executado para a tabela �user�.
    Esse m�todo retornar� se a atualiza��o foi um sucesso ou n�o.
    */
    public function update($id, $data)
    {
    	$this->db->where($this->_pk, $id);
    	$update = $this->db->update($this->_table, $data);
    	return $update;
    }
    
    /*
     o delete, que � bem simples. Ele recebe um ID de usu�rio a ser removido e define a condi��o where com esse ID. Depois disso executamos o delete.
    */
    public function delete($id)
    {
    	$this->db->where($this->_pk, $id);
    	$this->db->delete($this->_table);
    }
}

?>
