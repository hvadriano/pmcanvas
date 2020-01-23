<?php
/**
 * Class UsuarioModel
 * Classe de modelo da entidade tbl_usuario
 *
 * @author v1ctor
 * @version 1.0
 * @copyright Savoir Tecnologia 2009
 * @access public
 * @package system/application/models
 */
class UsuarioModel extends CI_Model
{
	public function UsuarioModel()
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
    protected $_table = 'tbl_usuario';
   
    /**
     * Variavel que se refere a chave primaria da tabela
     *
     * @access protected
     * @name $_pk
     */
    protected $_pk = 'usu_id';
    protected $_email = 'usu_email';
    protected $_senha = 'usu_senha';
    protected $_delete = 'usu_delete';
    protected $_grupoId = 'usu_gru_id';
   
	/*
	 *  aqui as regras de valida��o 
	 */
    protected $_rules = array(
					array(
							'field'   => 'nome',
							'label'   => 'Nome',
							'rules'   => 'required'
					),
					array(
							'field'   => 'email',
							'label'   => 'E-mail',
							'rules'   => 'required|valid_email'
					)
			);
    
    public function getRules(){
    	return $this->_rules;
    }
    
   
    /**
     * Variavel que se refere as associacaes com outras entidades
     *
     * @access protected
     * @name $_associations
     */
    protected $_associations = array(
    		array('type'=>'one-to-many', 'class'=>'ProjetoModel', 'key'=>'user')
    );
    
    public function get($id = false, $indice = 0, $limit = 10)
    {
    	$this->load->model('grupomodel');
    	
    	$res = array();
    	
    	if ($id) $this->db->where($this->_pk, $id);
    	
    	$this->db->where($this->_delete . ' != ', "0");
    	
		$this->db->order_by($this->_grupoId.','.$this->_pk, 'asc');
		
		if($id):
			$get = $this->db->get($this->_table);
		
			if($get->num_rows == 0) return false; // n�o achou nada com o id informado ent�o retorna false
		
			$res = $get->row_array();
			$res['grupo'] = $this->grupomodel->get($res['usu_gru_id']);
		
			return $res;
		endif;
		
		// caso n�o seja passado o id, quer dizer que vai listar e assim usarei as vari�veis indice e limit
		$get = $this->db->get($this->_table, $limit, $indice);
		
		if($get->num_rows > 0):
			$res = $get->result_array();
		
			foreach ($res as $chave=>&$valor):
			
				$valor['grupo'] = $this->grupomodel->get($valor['usu_gru_id']);
			
			endforeach;
		
			return $res;
		endif;
		
		return array();
    }
    
    public function create($data)
    {
    	$data[$this->_senha] = sha1($data[$this->_senha].$this->salt);
    	return $this->db->insert($this->_table, $data);
    }
    
    public function validate($email, $password) // faz a valida��o e monta uma session com tudo que precisa
    {
    	$result = array();
    	
    	try {
    		
    		$this->db->where($this->_email, $email)->where($this->_senha, sha1($password.$this->salt));
    		$get = $this->db->get($this->_table);
    		
    		if($get->num_rows > 0){ // encontrando o usuario vamos montar o menu dele
    			$result['usuario'] = $get->row_array(); // atribuo o rusult para a vari�vel usuario
    		
    			// carrego o GrupoModel e fa�o um get passando grupoId
    			$this->load->model('grupomodel');
    			$result['grupo'] = $this->grupomodel->get($result['usuario'][$this->_grupoId]);
    		
    			// Get current CI Instance
    			$CI = & get_instance();
    			$CI->load->model('grufunpermodel');
    			
    			$result['modulos'] = $CI->grufunpermodel->getModulosByGrupoId($result['usuario'][$this->_grupoId]);
    		
    			$this->load->model('modulomodel', '', true);
    			$result['modAndFunAndPerAndGru'] = $this->modulomodel->getModulosAndFuncionalidadeAndPermissaoAndGrupo();
    			
    		}
    		
    	} catch (Exception $e) {
    		$e->getTraceAsString();
    	}
    	
    	return $result;
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
    	if(isset($data['password']))
    		$data['password'] = sha1($data['password'].$this->salt);
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
    
    public function count(){
    	
    	$this->db->where($this->_delete . ' != ', "0");
    	$this->db->from($this->_table);
    	return $this->db->count_all_results();
    	
    }
    
}

?>
