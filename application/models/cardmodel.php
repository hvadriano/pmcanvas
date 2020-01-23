<?php

class CardModel extends CI_Model
{
	public function CardModel()
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
    protected $_table = 'tbl_card';
   
    /**
     * Variavel que se refere a chave primaria da tabela
     *
     * @access protected
     * @name $_pk
     */
    protected $_pk 			= 'id';
    protected $_area 		= 'area_fk';
    protected $_post 		= 'post';
    protected $_autor 		= 'autor';
    protected $_descricao	= 'descricao';
    protected $_url 		= 'url';
    protected $_cor 		= 'cor';
    protected $_ordem 		= 'ordem';
    protected $_deletado	= 'deletado';
    protected $_projeto		= 'projeto_fk';
    
    protected $_areas = array(
    		'div_justificativa'	=> 1,
    		'div_objetivos'		=> 2,
    		'div_beneficios'	=> 3,
    		'div_produto'		=> 4,
    		'div_requisitos'	=> 5,
    		'div_stakeholders'	=> 6,
    		'div_equipe'		=> 7,
    		'div_premissas'		=> 8,
    		'div_grupoentregas'	=> 9,
    		'div_restricoes'	=> 10,
    		'div_riscos'		=> 11,
    		'div_linhatempo'	=> 12,
    		'div_custos'		=> 13
    			
    );
    
    protected $_array_cards_by_areas = array(
    		1 => 'Justificativas',
    		2 => 'Objetivos SMART',
    		3 => 'Benef&iacute;cios',
    		4 => 'Produto',
    		5 => 'Requisitos',
    		6 => 'Stakeholders',
    		7 => 'Equipe',
    		8 => 'Premissas',
    		9 => 'Grupos de Entregas',
    		10 => 'Restri&ccedil;&otilde;es',
    		11 => 'Riscos',
    		12 => 'Linha do Tempo',
    		13 => 'Custos'
    		 
    );
    
    public function get_array_cards_by_areas () {
    	return $this->_array_cards_by_areas;
    }
    
    public function array_areas() {
    	return $this->_areas;
    }
    
    public function get($id = false)
    {
    	if ($id) $this->db->where($this->_pk, $id);
    	
    	$this->db->where($this->_deletado, 0);
    	
    	$this->db->order_by($this->_area, 'asc');
    	$get = $this->db->get($this->_table);
    	if($id) return $get->row_array();
    	if($get->num_rows > 0) return $get->result_array();
    	return array();
    }
    
    public function getCardsAndArea ( $projetoId ) {
    	
    	$sql = "SELECT * FROM tbl_card c join tbl_area a on c.area_fk = a.id where 
    			c.deletado = 0 and c.projeto_fk = $projetoId 
    			order by c.area_fk asc";
    	
    	try {

    		$res = $this->db->query($sql)->result_array();
    		
    	} catch (Exception $e) {
    		$e->getTraceAsString();
    	}
    	
    	
    	
    	return $res;
    	
    }
    
    public function getByArea( $areaId, $projetoId)
    {
    	$this->db->where($this->_area, $areaId);
    	$this->db->where($this->_deletado, 0);
    	$this->db->where($this->_projeto, $projetoId);
    	$this->db->order_by($this->_ordem, "desc");
    	$get = $this->db->get($this->_table);
    	
    	if($get->num_rows > 0) return $get->result_array();
    	return array();
    }
    
	public function getOrdemByArea($data, $projetoId)
    {
    	$this->db->where($this->_area, $data[ $this->_area ]);
    	$this->db->where($this->_projeto, $projetoId);
    	$this->db->where($this->_deletado, 0);
    	$this->db->select_max($this->_ordem, 'ordem');
    	$get = $this->db->get($this->_table);
    	
    	if($get->num_rows > 0) return $get->row_array();
    	return false;
    }
    
    public function getDiferenteDe( $cardDe, $projetoId )
    {
    	$this->db->where($this->_pk . ' <> ', $cardDe );
    	$this->db->where($this->_projeto, $projetoId);
    	$this->db->where($this->_deletado, 0);
    	$this->db->order_by( $this->_area, "asc");
    	$get = $this->db->get($this->_table);
    	
    	if($get->num_rows > 0) return $get->result_array();
    	return false;
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
    	$this->db->set( $this->_deletado, 1 );
    	$this->db->update( $this->_table );
    }
    
    public function atualizarCardsByDestino( $cards, $destino )
    {
    	
    	if ( sizeof( $cards ) > 0 ) {
    		
    		$cardsIn = "";
    		
    		$ordem = sizeof( $cards );
    		
    		foreach ( $cards as $cardId ){
    			$cardsIn .= $cardId . ",";
    			
    			$this->db->where( $this->_pk, $cardId );
    			$this->db->set( $this->_area, $this->_areas[ $destino ] );
    			$this->db->set( $this->_ordem, $ordem );
    			$this->db->update( $this->_table );
    			
    			$ordem--;
    		}
    		
    		echo $cardsIn;
    		
//     		$cardsIn = substr( $cardsIn, 0, -1 ); // removo a última vírgula
//     		$cardsIn = "(" . $cardsIn . ")";
    		
//     		$sql = "UPDATE " . $this->_table . " SET " . $this->_area . "=" . $this->_areas[ $destino ];
//     		$sql .= " WHERE " . $this->_pk . " IN " . $cardsIn;
    		
//     		try {

//     			$res = $this->db->query($sql);
//     			return $res;
    			
//     		} catch (Exception $e) {
//     			$e->getTraceAsString();
//     		}
    		
    	}
    	
    }
    
}

?>
