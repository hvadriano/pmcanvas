<?php
/**
 * GenericModel Class
 * 
 * @package system.application.libraries
 * @author Ricardo Cajueiro
 * @copyright Copyright by Savoir Tecnologia
 * @since 1.0
 * @filesource
 */

class GenericModel extends CI_Model
{
	private $_fromAndJoinsIsSet = false;
	private $_fieldsSelect = array();
	
	protected $_cache = false;
	
	/**
	 * Campos da tabela
	 * @access protected
	 * @name $_fields
	 */
	protected $_fields = array();
	
	/**
	 * Atributos da entidade
	 * @access protected
	 * @name $_attributes
	 */
	protected $_attributes = array();
	
	/**
	 * Limite por pagina padrao
	 * @access protected
	 * @name $_limitDefault
	 */
	protected $_limitDefault = 10;
	
	/**
	 * Limite da arvore de associacao
	 * @access protected
	 * @name $_limitTree
	 */
	protected $_limitTree = 4;
	
	/**
	 * Instancia do Codeigniter
	 * @access protected
	 * @name $_CI
	 */
	protected $_CI;
	
	/**
	 * Constructor
	 * 
	 * @access public
	 */
	public function __construct()
	{
		parent::__construct();
		
		$this->_attributes = array_flip ($this->_fields);
		
		$this->_CI =& get_instance();
	}
	
	/**
	 * Metodo getFields()
	 * 
	 * @access public
	 * 
	 * @return Array Campos da entidade
	 */
	public function getFields()
	{
		return $this->_fields;
	}
	
	/**
	 * Metodo getAttributes()
	 * 
	 * @access public
	 * 
	 * @return Array Atributos da entidade
	 */
	public function getAttributes()
	{
		return $this->_attributes;
	}
	
	public function getRules( )
    {
        return $this->_rules;
    }

    public function generateRules( $rulesModel, $modelName = null, $exceptions = array( ) )
    {
        $rulesFinal = array();

        foreach ( $exceptions as $campo => $regras )
        {
            if ( is_array( $regras ) )
        	{
        		if ( !isset($rulesModel[ $campo ]) )
        			$rulesModel[ $campo ] = '';
        			
        		$rulesModel[ $campo ] = implode( '|', array_diff( $regras, explode( '|', $rulesModel[ $campo ] ) ) );
       		}
            else
                unset( $rulesModel[ $campo ] );
        }

        foreach ( $rulesModel as $campo => $regras )
        {
            if ( preg_match("/\[\]$/", $campo) )
        	{
            	//$rulesFinal[] = array();
            	$campo = str_replace("[]", "", $campo);
            	if ( isset($_POST[$campo]) )
            	{
            		$qtdCampos = count($_POST[$campo]);
            		
            		foreach ( $_POST[$campo] as $key=>$fieldsPost )
            		{
            			foreach ( $fieldsPost as $field=>$value )
            			{
            				if ( isset($regras[$field]) )
            					$rulesFinal[] = array(
            						'field'=>$campo.'['.$key.']['.$field.']',
            						'label'=>ucwords($field),
            						'rules'=>$regras[$field]
            					);
            				
            			}
            		}
            		
            	}
            	
        	}
            else
            	$rulesFinal[] = array( 'field' => ($modelName? $modelName . '[' . $campo . ']': $campo), 'label' => ucwords( $campo ), 'rules' => $regras );
        }

        return $rulesFinal;
    }
    
	/**
	 * Metodo _getClass()
	 * 
	 * @access public
	 * 
	 * @param Object $class Instancia da entidade
	 * 
	 * @return String Nome da entidade
	 */
	public function _getClass(&$class)
	{
		$ret = is_object($class) ?str_replace('Model', '', get_class($class)) :$class;
		
		$ret = trim(strtolower(substr($ret, 0, 1)) . substr($ret, 1, strlen($ret)-1));
		
		return $ret;
	}
	
	/**
	 * Metodo _getFieldSelect()
	 * 
	 * @access private
	 * 
	 * @param Object $object Instancia da classe de modelo (Model)
	 * @param String $attr Nome do atributo da classe de modelo (Model)
	 * @param String $field Nome do campo da tabela do banco de dados
	 * 
	 * @return String String para montar a SELECT
	 */
	private function _getFieldSelect($objet, $attr, $field, $prefix='')
	{
		$res = explode('.', $field);
		if(count($res) == 1)
			return $prefix.'.'.$field.' AS "'.str_replace('_', '.', $prefix).'.'.$attr.'"';
		else
			return $field.' AS "'.str_replace('_', '.', $prefix).'.'.$attr.'"';
	}
	
	/**
	 * TODO documentar o metodo
	 */
	private function _getField($attr)
	{
		$itens = explode('.', $attr);
				
		if ( count($itens) > 1 )
		{
			$class = $this;
			$prefix = '';
			foreach ( $itens as $item )
			{
				if ( isset($this->_CI->$item) && is_object($this->_CI->$item) )
				{
					$prefix.= $this->_getClass($class).'_';
					
					$class = $this->_CI->$item;
				}
				elseif ( isset($class->_attributes[$item]) )
					return $prefix . $this->_getClass($class) . '.' . $class->_attributes[$item];
			}
		}
		else
		{
			return $this->_getClass($this) . '.' . $this->_attributes[$itens[0]];
		}
	}
	
	/**
	 * Metodo _getAssociations()
	 * 
	 * @access private
	 * 
	 * @param String $fieldsSelect Variavel com os campos para montar a SELECT
	 * @param Array $associations Array com as associacoes
	 * 
	 * @return void
	 */
	private function _getAssociations($class=null, $alias='')
	{
		$class = $class!=null ?$class :$this;
		
		if ( isset($class->_associations) && is_array($class->_associations) )
		{
			$alias.= $this->_getClass($class) . '_';
			 
			foreach ( $class->_associations as $rel )
			{
				$relType = $rel['type'];
				
				if ( !isset($this->_CI->{$this->_getClass($rel['class'])}) )
					continue;

				$assocClass = $this->_CI->{$this->_getClass($rel['class'])};

				switch ( $relType )
				{
					case 'many-to-one':
						foreach ( $assocClass->_fields  as $field=>$attr )
							$this->_fieldsSelect[] = $this->_getFieldSelect($assocClass, $attr, $field, $alias.$this->_getClass($assocClass));
							
						$this->_setJoins($assocClass, $class, $rel, $alias, 'left');
						
						if ( isset($assocClass->_associations) && is_array($assocClass->_associations) )
							$this->_getAssociations($assocClass, $alias);
						
						break;
				}
				
			}
		}
	}

        public function addAssociation($type, $class, $key)
        {
            $this->_associations[] = array('type'=>$type, 'class'=>$class, 'key'=>$key);
        }

        public function removeAssociation($class)
        {
            foreach ( $this->_associations as $key=>$item )
            {
                if ( $item['class'] == $class )
                    unset($this->_associations[$key]);
            }
        }

	/**
	 * Metodo _setAssociations()
	 * 
	 * @access private
	 * 
	 * @param Array $data description
	 * @param Array $row description
	 * @param Array $associations description
	 * @param Integer $nivel description
	 * 
	 * @return void
	 */
	private function _setAssociations(&$data, &$row, $class=null, $alias='')
	{
		$class = $class!=null ?$class :$this;
		
		if ( isset($class->_associations) && is_array($class->_associations) )
		{
			$alias.= $this->_getClass($class) . '.';

			foreach ( $class->_associations as $rel )
			{
				if ( !isset($this->_CI->{$this->_getClass($rel['class'])}) )
					continue;

				$assocClass = $this->_CI->{$this->_getClass($rel['class'])};
				
				$relType = $rel['type'];

				switch ( $relType )
				{
					case 'many-to-one':
						foreach ( $assocClass->_fields as $field )
							$data[$this->_getClass($assocClass)][$field] = $row[$alias.$this->_getClass($assocClass).'.'.$field];
						
						if( isset($assocClass->_associations) && is_array($assocClass->_associations) )
							$this->_setAssociations($data[$this->_getClass($assocClass)], $row, $assocClass, $alias);

						break;

					case 'one-to-one':
					case 'one-to-many':
						//$findAllByAssoc = 'getAllBy'. ucfirst($rel['key']);
						$fields[$rel['key']] = $row[$alias.'id'];
						if ( isset($assocClass->_fields['delete']) )
							$fields[$assocClass->getPrefixField() . 'delete'] = 1;
						
						$orderBy = isset($rel['orderBy']) ?$rel['orderBy'] :null;
						$order = isset($rel['order']) ?$rel['order'] :null;

						if ( $relType == 'one-to-one' )
							$data[$this->_getClass($assocClass)] = $assocClass->getByFields($fields, null, null, $orderBy, $order, false, false);
						else
							$data[$this->_getClass($assocClass).'s'] = $assocClass->getAllByFields($fields, null, null, $orderBy, $order, false, false);
						
						break;
						
					case 'many-to-many':
						// TODO como manter a consulta da query qdo for one-to-many e/ou many-to-many
						$this->db->join($rel['join']['table'], $assocClass->_pk.'='.$rel['join']['inverseColumn']);
						$this->db->where($rel['join']['column'], $row[$this->_getClass($this).'.id']);

						$data[$rel['mapTo']] = $assocClass->findAll(null, null, null, null, false, false);
						break;
				}
			}
		}
		
	}
	
	/**
	 * Metodo _setJoins()
	 * 
	 * @access private
	 * 
	 * @param Object $assocClass description
	 * @param Array $rel
	 * @param String $type description
	 * 
	 * @return void
	 */
	private function _setJoins($assocClass, $class, $rel, $aliasTable, $type=null)
	{
		$alias = $aliasTable . $this->_getClass($assocClass);
		$table = $assocClass->_table . ' as ' . $alias;
		$on = $alias . '.' . $assocClass->_pk . ' = ' . substr($aliasTable, 0, strlen($aliasTable)-1) . '.' . $class->_attributes[$rel['key']];
		
		if ( isset($assocClass->_fields['delete']) )
			$on.= ' and ' . $alias.'.'.$assocClass->getPrefixField().'delete = 1';
		 
		$this->db->join($table, $on, $type);
	}
	
	/**
	 * Metodo __call() - Generico
	 * 
	 * TODO - Descrever o metodo generico
	 * 
	 * @access public
	 * 
	 * @param String $strMethod
	 * @param Array $args
	 * 
	 * @return Array|Boolean description
	 */
	public function __call($strMethod, $args)
	{
		if ( preg_match("/(find|find[aA]ll|get|get[aA]ll)[bB]y([a-zA-Z]+)/", $strMethod, $res) )
		{
			$this->_setFromAndJoins();
			
			$method = $res[1];
			$attr = strtolower(substr($res[2], 0, 1)).substr($res[2], 1, strlen($res[2])-1);
			
			foreach ( $this->_fields as $key=>$value )
			{
				if ( $value == $attr )
				{
					if ( strpos($method, 'get') === FALSE )
						$this->db->like($this->_getClass($this).'.'.$key, $args[0]);
					else
						$this->db->where($this->_getClass($this).'.'.$key, $args[0]);
					
					break;
				}
			}
			
			$page 		= isset($args[1]) ?$args[1] :null;
			$limit 		= isset($args[2]) ?$args[2] :null;
			$orderBy 	= isset($args[3]) ?$args[3] :null;
			$order 		= isset($args[4]) ?$args[4] :'asc';
			$justFirst 	= isset($args[5]) ?$args[5] :false;
			$complete 	= isset($args[6]) ?$args[6] :true;
			return $this->{$method}($page, $limit, $orderBy, $order, $justFirst, $complete);
		}
		
		return array();
	}
	
	/**
	 * Metodo findByFields()
	 * 
	 * TODO - Descrever o metodo
	 * 
	 * @access public
	 * 
	 * @param Array $fields Valores para consulta indexado pelos atributos da entidade
	 * 
	 * @return Array A primeira ocorrencia da consulta
	 */
	public function findByFields($fields)
	{
		return $this->findAllByFields($fields, null, null, null, null, true);
	}
	
	/**
	 * Metodo findAllByFields()
	 * 
	 * TODO - Descrever o metodo
	 * 
	 * @access public
	 * 
	 * @param Array $fields Valores para busca indexado pelos atributos da entidade
	 * @param Integer $page Numero da pagina atual
	 * @param Integer $limit Limite de registros por pagina
	 * @param String $orderBy Nome do atributo para ordenacao
	 * @param String $order Forma de ordecao - asc|desc
	 * @param Boolean $justFirst Se verdadeiro, retorna o primeiro registro da consulta
	 * 
	 * @return Array Todas as ocorrencias do resultado da consulta
	 */
	public function findAllByFields($fields, $page=null, $limit=null, $orderBy=null, $order='asc', $justFirst = false)
	{
		return $this->getAllByFields($fields, $page, $limit, $orderBy, $order, $justFirst);
	}
	
	/**
	 * Metodo getByFields()
	 * 
	 * TODO - Descrever o metodo
	 * 
	 * @access public
	 * 
	 * @param Array $fields Valores para consulta indexado pelos atributos da entidade
	 * 
	 * @return Array A primeira ocorrencia da consulta
	 */
	public function getByFields($fields, $orderBy=null, $order=null)
	{
		return $this->getAllByFields($fields, null, null, $orderBy, $order, true);
	}
	
	/**
	 * Metodo getAllByFields()
	 * 
	 * TODO - Descrever o metodo
	 * 
	 * @access public
	 * 
	 * @param Array $fields Valores para consulta indexado pelos atributos da entidade
	 * @param Integer $page Numero da pagina atual
	 * @param Integer $limit Limite de registros por pagina
	 * @param String $orderBy Nome do atributo para ordenacao
	 * @param String $order Forma de ordenacao - asc|desc
	 * @param Boolean $justFirst Se verdadeiro, retorna o primeiro registro da consulta
	 * 
	 * @return Array Todas as ocorrencias do resultado da consulta
	 */
	public function getAllByFields($fields, $page=null, $limit=null, $orderBy=null, $order='asc', $justFirst = false)
	{
		$this->_setFromAndJoins();

		foreach ( $fields as $attr=>$value )
		{
			if ( (is_array($value) && count($value) == 0) || (!is_array($value) && !is_null($value) && trim($value) == '') )
				continue;
			
			$attr = str_replace('_', '.', $attr);
			
			$logic = '';
			if ( preg_match("/AND|OR/", $attr, $res) )
			{
				$attr = trim(str_replace($res[0], '', $attr));
				$logic = $res[0];
			}

			if ( preg_match("/[a-zA-Z0-9\.]+/", $attr, $res) )
			{
				$field = $this->_getField($res[0]);
			}

			$operation = ' = ';
			if ( preg_match("/[!=<>]+|LIKE|NOT IN|IN/", $attr, $res) )
				$operation = ' ' . $res[0] . ' ';
			else if ( preg_match("/IS NOT|IS/", $attr, $res) )
				$operation = ' ' . $res[0] . ' ';	
			
			$open = preg_match("/[\(]+/", $attr, $res) ?$res[0] . ' ' :'';
			
			$close = preg_match("/[\)]+/", $attr, $res) ?' ' . $res[0] :'';
			
			if ( is_array($value) )
			{
				foreach ( $value as &$v )
					$v = $this->db->escape(trim($v));
					
				$value = '(' . implode(',', $value) . ')';
			}
			elseif ( is_null($value) )
			{
				$value = 'NULL';
			}
			else
			{
				if ( preg_match("/([0-9]{2})\/([0-9]{2})\/([0-9]{4})\ ([0-9]{2}\:[0-9]{2})/", $value, $res) )
				{
					$value = $res[3].'-'.$res[2].'-'.$res[1] . ' ' . $res[4] . ':00';
				}
				elseif ( preg_match("/([0-9]{2})\/([0-9]{2})\/([0-9]{4})/", $value, $res ) )
				{
					$extra = '';
					
					if ( trim($operation) == '>=' )
						$extra = ' 00:00:00';
					elseif ( trim($operation) == '<=' )
						$extra = ' 23:59:59';
					
					$value = $res[3].'-'.$res[2].'-'.$res[1] . $extra;
				}

				$value = trim($operation)=='LIKE' ?$this->db->escape('%'.trim($value).'%') :$this->db->escape(trim($value));
			}
			
			$where = $open . $field . $operation . $value . $close;
			
			if ( trim($logic) == 'OR' )
				$this->db->orwhere($where);
			else
				$this->db->where($where);
		}
			
		return $this->findAll($page, $limit, $orderBy, $order, $justFirst);
	}
	
	/**
	 * Metodo get()
	 * 
	 * TODO - Descrever o metodo
	 * 
	 * @access public
	 * 
	 * @return Array A primeira ocorrencia da pesquisa
	 */
	public function get()
	{
		return $this->find();
	}
	
	/**
	 * Metodo get()
	 * 
	 * TODO - Descrever o metodo
	 * 
	 * @access public
	 * 
	 * @return Array A primeira ocorrencia da pesquisa
	 */
	public function find()
	{
		return $this->findAll(null, null, null, null, true);
	}
	
	/**
	 * Metodo getAll()
	 * 
	 * TODO - Descrever o metodo
	 * 
	 * @access public
	 * 
	 * @param Integer $page Numero da pagina atual
	 * @param Integer $limit Limite de registros por pagina
	 * @param String $orderBy Nome do atributo para ordenacao
	 * @param String $order Forma de ordenacao - asc|desc
	 * @param Boolean $justFirst Se verdadeiro, retorna o primeiro registro da consulta
	 * 
	 * @return Array Todas as ocorrencias de registro
	 */
	public function getAll($page=null, $limit=null, $orderBy=null, $order='asc')
	{
		return $this->findAll($page, $limit, $orderBy, $order);
	}
	
	private function _setFromAndJoins()
	{
		if ( !$this->_fromAndJoinsIsSet )
		{
			$this->db->from($this->_table . ' as ' . $this->_getClass($this));
			$this->_getAssociations();
			
			$this->_fromAndJoinsIsSet = true;
		}
	}
	/**
	 * Metodo findAll()
	 * 
	 * TODO - Descrever o metodo
	 * 
	 * @access public
	 * 
	 * @param Integer $page Numero da pagina atual
	 * @param Integer $limit Limite de registros por pagina
	 * @param String $orderBy Nome do atributo para ordenacao
	 * @param String $order Forma de ordenacao - asc|desc
	 * @param Boolean $justFirst Se verdadeiro, retorna o primeiro registro da consulta
	 * 
	 * @return Array Todas as ocorrencias de registro
	 */
	public function findAll($page=null, $limit=null, $orderBy=null, $order='asc', $justFirst = false, $complete=true)
	{
		$this->_setFromAndJoins();
		
		foreach ( $this->_fields as $field=>$attr )
			$this->_fieldsSelect[] = $this->_getFieldSelect($this, $attr, $field, $this->_getClass($this));

		if ( isset($this->_attributes['delete']) )
			$this->db->where($this->_attributes['delete'], '1');
		
		// total de registros da consulta
		if ( $page != null )
		{
			//$ret['total'] = $this->db->count_all_results('', false);

                    $ar_select = $this->db->ar_select;
                    $this->db->_reset_run($ar_reset_items = array('ar_select' => array()));

                    $this->db->select('count(distinct '.$this->_attributes['id'].') as total');
                    $ret['total'] = $this->db->get('', null, null, false)->row()->total;

                    $this->db->_reset_run($ar_reset_items = array('ar_select' => array()));

                    $this->db->select($ar_select);
		
			// se informado a pagina, setar o limit off-set e o numero de paginas
			if ( $page !== null )
			{
				$limit = ($limit!=null) ?$limit :$this->_limitDefault;
	
				if ( $ret['total'] != null && $limit != null )
					$ret['nPages'] =  $ret['total']==0?0: ceil($ret['total'] / $limit);
	
				if ( $page < 1 )
					$page = 1;
				elseif ( $ret['nPages'] > 0 && $page > $ret['nPages'] )
					$page = $ret['nPages'];
				
				$this->db->limit($limit, ($page-1)*$limit);
		
				$ret['page'] = $page;
			}
		}

		if ( $orderBy != null )
        {
            $orderBy = !is_array( $orderBy )? array( $orderBy ): $orderBy;
            foreach( $orderBy as $ord )
                $this->db->order_by($this->_getField($ord), $order );
        }
		
		$this->db->select(implode(',', $this->_fieldsSelect));
		
		if ( $this->_cache && get_instance()->uri->segment(1)!='admin' )
			$this->db->cache_on();
		else
			$this->db->cache_off();
		$rs = $this->db->get();

		$this->_fieldsSelect = array();
		$this->_fromAndJoinsIsSet = false;
		
		$data = $justFirst ?null :array();
        
		if ( $rs->num_rows() > 0 )
		{
			foreach ( $rs->result_array() as $key=>$row )
			{
				foreach ( $this->_fields as $field )
				{
					$data[$key][$field] = $row[$this->_getClass($this).'.'.$field];
				}
				
				$this->_getFiles($data, $row, $key);
				
				$this->_setAssociations($data[$key], $row);
				
				if ( $justFirst )
					return $data[$key];
			}
		}
		elseif ( $justFirst )
			return null;
			
		
		$ret['rows'] = $data;
		
		return $complete ?$ret :$ret['rows'];
	}
	
	public function query($sql, $objects=array())
	{
		if ( $this->_cache )
			$this->db->cache_on();
		else
			$this->db->cache_off();
		
		$rs = $this->db->query($sql);
		
		$data = array();
		
		if ( $rs->num_rows() > 0 )
		{
			foreach ( $rs->result_array() as $key=>$row )
			{
				foreach ( $this->_fields as $field=>$att )
				{
					if ( isset($row[$field]) )
					{
						$data[$key][$att] = $row[$field];
						$row[trim($this->_getClass($this)).'.'.$att] =& $row[$field];
					}
				}
				
				foreach ( $objects as $mdlName )
				{
					if ( isset($this->{$mdlName}) )
					{
						$mdl =& $this->{$mdlName};
						
						foreach ( $mdl->_fields as $field=>$att )
						{
							if ( isset($row[$field]) )
							{
								$data[$key][$mdlName][$att] = $row[$field];
								
								$row[$mdlName.'.'.$att] =& $row[$field];
							}
						} 
						
						$this->_getFiles($data[$key], $row, $mdlName, $mdl);
					}
				}
				
				$this->_getFiles($data, $row, $key);
			}
		}
		
		return array(
			'rows'=>$data
		);
	}
	
	public function _getFiles(&$data, &$row, &$key, $obj=null)
	{
		// Pegando arquivos
		$obj = $obj!=null ?$obj :$this;
		
		if ( isset($obj->_files) && is_array($obj->_files) )
		{
			foreach ( $obj->_files as $typeFile=>$_files )
			{
				if ( !isset($row[trim($obj->_getClass($obj)).'.id']) || !isset($row[trim($obj->_getClass($obj)).'.'.$typeFile.'Ext']) )
				{
					if($obj->_getClass($obj)!="colecao")
					{
						continue;	
					} 
				}					

				$dir = 'files/'.$obj->_getClass($obj).'/'.$typeFile.'/'.$row[$obj->_getClass($obj).'.id'].'/';
					
				$file = $dir . sha1($row[$obj->_getClass($obj).'.id']);
				
				$ext = $row[trim($obj->_getClass($obj)).'.'.$typeFile.'Ext'];
				
				$file.='.'.$ext;
									
				if ( file_exists(FCPATH.$file) )
				{
					$data[$key]['files'][$typeFile]['original'] = $obj->getFileInfo($file, $ext);
					
					foreach ( $_files as $fileName=>$infoFile )
					{
						$dinamicFile = $dir.$fileName.'.'.$ext;
						
						if ( !file_exists(FCPATH.$dinamicFile)  || ( file_exists(FCPATH.$dinamicFile) && (time() - filemtime(FCPATH.$dinamicFile)) > (60 * 5) ) )
						{
							switch ($infoFile['type'])
							{
								case 'image':
									@resizeImage($file, $dinamicFile, $infoFile['dimensions']['width'], $infoFile['dimensions']['height']);
									break;
									
								default:
									@copy($file, $dinamicFile);
									break;
							}
						}
						$data[$key]['files'][$typeFile][$fileName] = $obj->getFileInfo($dinamicFile, $ext);
					}
				}
				else{
					$file = $dir . sha1($row[$obj->_getClass($obj).'.id']);
					
					$data[$key]['files'][$typeFile]['original'] = $obj->getFileInfo('img/empty.png', 'png', false, $file, $ext);
				}
			}
		}
	}
	
	public function getFileInfo($file, $ext, $exist=true, $filename=null, $extFilename=null)
	{
		  
		$icon = 'img/admin/file_type/'.(in_array($ext, array('png', 'jpg', 'gif')) ?'img' :$ext).'.gif';
		if ( !file_exists($icon) ){
			$icon = 'img/admin/file_type/file.gif';
		}
		$fullfile = $ext?"$file.$ext":$file;
		$mimetype = $ext?get_mime_by_extension($fullfile):"application/octet-stream";
		return array(
			'url'			=> base_url().$file,
			'urlComplete'	=> isset($_SERVER['HTTP_HOST']) ?'http://'.$_SERVER['HTTP_HOST'].base_url().$file :'',
			'file'			=> $filename!=null ?$filename :$file,
			'filesystem'	=>  FCPATH.$file,
			'size'			=> @filesize($file),
			'icon'			=> base_url().$icon,
			'type'			=> $mimetype,
			'ext'			=> $extFilename!=null ?$extFilename :$ext,
			'md5sum'		=> file_exists(FCPATH.$file.'.'.$ext) ? @md5_file(FCPATH.$file.'.'.$ext) : @md5_file(FCPATH.$file),
			'download'		=> site_url('home/download/'.@md5_file($file).'/'.$ext) . '?file='.urlencode($file).'&fileName=',
			'exist'			=> $exist
		);
	}
	
	/**
	 * Metodo save()
	 * 
	 * TODO - descrever o metodo
	 * 
	 * @access public
	 * 
	 * @param Array $data description
	 * @param Integer $id description
	 * 
	 * @return Integer description
	 */
	public function save($data, $id=null, $item='')
	{
		if ( $this->_cache )
			$this->db->cache_delete_all();
		
		$item = (string)$item;
		
		$dataSave = null;
		
		$isNew = $id==null;
		
		foreach ( $data as $key=>&$field )
		{
			if ( !is_array($field) )
			{
				$field = trim($field);
				$field = str_replace('�', '', $field);
			}
			
			if ( !isset($this->_attributes[$key]) )
				 continue;
			
			if ( preg_match("/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/", ($field), $res) )
			{
				$field = $res[3].'-'.$res[2].'-'.$res[1];
			}
			elseif ( preg_match("/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})\ ([0-9]{1,2}:[0-9]{1,2})$/", ($field), $res) )
				$field = $res[3].'-'.$res[2].'-'.$res[1].' '.$res[4].':00';
			elseif ( preg_match("/^[0-9\.]+,[0-9]+$/", $field) )
				$field = str_replace(',', '.', str_replace('.', '', $field));
		}
		
		unset($field);
		
		foreach ( $this->getAttributes() as $attr=>$field )
		{
			if ( isset($data[$attr]) )
				$dataSave[$field] = trim($data[$attr])!=''?$data[$attr]:null;
		}
		
		$res = false;
		
		if ( $dataSave != null )
		{
			if ( $id == null )
			{
				if ( $this->db->insert($this->_table, $dataSave) )
				{
					$id = $this->db->insert_id();
					$res = true;
				}
			}
			else
			{
				$this->db->where($this->_pk, $id);
				
				if ( $this->db->update($this->_table, $dataSave) )
				{
					$res = true;
				}
			}
		}
		
		if ( $res )
		{
			if ( isset($this->_files) )
			{
				foreach ( $this->_files as $key=>$file )
				{
					$tempKey = $item!='' ?$item.'/'.$key :$key;
					
					$tempFile = $this->getTempUploadDir($tempKey, $isNew ?'0' :$id) . $this->getTempFilename();
					
					$ext = '';
					if ( isset($data[$key.'Ext']) )
						$ext = $data[$key.'Ext'];
					
					$file = $this->getFilenameUploaded($key , $id, $ext);
					
					if ( file_exists($tempFile) )
					{
						$_dir = $this->getDirUploaded($key, $id);
						
						foreach ( array_diff(scandir($_dir), array('..', '.')) as $_file )
							@unlink($_dir.$_file);
						
						if ( @copy($tempFile, $file) )
							@unlink($tempFile);		
					}
						
				}
			}
			
			return $id;
		}
		
		return false;
	}
	
	public function getTempFilename()
	{
		return md5(session_id());
	}
	
	public function getDirUploaded($key, $id)
	{
		$dir = FCPATH.'files/'.$this->_getClass($this).'/'.$key.'/'.$id.'/';
		
		if ( !@is_dir($dir) )
			@mkdir($dir, 0777, true);
			
		return $dir;
	}
	public function getFilenameUploaded($key, $id, $ext)
	{
		$dir = $this->getDirUploaded($key, $id);
		
		return $dir.sha1($id).($ext!='' ?'.'.$ext :'');
	}
	
	public function getTempUploadDir($key, $id=null)
	{
		$dir = 'temp/'.$this->_getClass($this).'/'.$key.'/'.($id!=null ?$id :'0').'/';
		
		if ( !@is_dir($dir) )
			@mkdir($dir, 0777, true);
			
		return $dir;
	}
	
	public function delete($id)
	{
		$this->db->where($this->_pk, $id);
		$this->db->limit(1);
		
		return $this->db->delete($this->_table);
	}
	
	public function getPrefixField()
	{
		if ( preg_match("/[a-z0-9]{3}_/", $this->_pk, $res) )
			return $res[0];
			
		return null;
	}
	
	public function getEmpty()
	{
		$ret = array();
		
		foreach ( $this->_fields as $a )
			$ret[$a] = '';
			
		return $ret;
	}
	
	public function getOrdemMaxima()
	{
		$this->db->select_max($this->_attributes['ordem']);
		
		$rs = $this->db->get($this->_table);
		
		$row = $rs->row_array();
		
		return $row[$this->_attributes['ordem']];
	}
	
	public function getOrdemMinima()
	{
		$this->db->select_min($this->_attributes['ordem']);
		
		$rs = $this->db->get($this->_table);
		
		$row = $rs->row_array();
		
		return $row[$this->_attributes['ordem']];
	}
	
	public function trocaOrdem($id, $direcao)
	{
		// $direcao = sobe|desce
		$item = $this->getById($id);
		$itemTroca = $this->getByOrdem($item['ordem'] + ($direcao=='sobe' ?-1 :1));
		
		$z = $item['ordem'];
		$item['ordem'] = $itemTroca['ordem'];
		$itemTroca['ordem'] = $z;
		
		$this->save($item, $item['id']);
		$this->save($itemTroca, $itemTroca['id']);
		
		return true;
	}
	
	public function mudaOrdem($id, $posicao)
	{
		$item = $this->getById($id);
		$posicao_old = $item["ordem"];
		
		if($posicao_old > $posicao) {
			$sql = "UPDATE ".$this->_table." SET ".$this->_attributes['ordem']." = ".$this->_attributes['ordem']."+1
				WHERE ".$this->_attributes['ordem']." >= $posicao AND ".$this->_attributes['ordem']." < $posicao_old";	
		} else {
			$sql = "UPDATE ".$this->_table." SET ".$this->_attributes['ordem']." = ".$this->_attributes['ordem']."-1
				WHERE ".$this->_attributes['ordem']." <= $posicao AND ".$this->_attributes['ordem']." > $posicao_old";
		}
		
		$sql2 = "UPDATE ".$this->_table." SET ".$this->_attributes['ordem']." = ".$posicao." WHERE ".$this->_pk." = $id";
		
		$this->db->query($sql);
		$this->db->query($sql2);
		
		return true;
		
	}
	
	public function organizaOrdem($ordem, $direcao = '-1')
	{
		$sql = 'UPDATE ' . $this->_table . ' SET ' . $this->_attributes['ordem'] . ' = ' . $this->_attributes['ordem']  . ' '.$direcao.' WHERE ' . $this->_attributes['ordem'] . ' >= ?'; 
		return $this->db->query($sql, array($ordem));
	}
	
	public function getFiles()
	{
		return isset($this->_files) ?$this->_files :array();
	}
	
	public function hasFiles()
	{
		return isset($this->_files);
	}
}
?>