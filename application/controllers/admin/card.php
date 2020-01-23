<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Card extends CI_Controller {
	
	protected $_msg = array(
			'1'	=> "Acesso Negado!",
			'2'	=> "Sua URI apresentou erros!",
			'3'	=> "N&atilde;o existente em nossa Base de Dados!"
	);
	
	// contrutor
	function Card(){
		
		parent::__construct();
		
		$this->load->library('AreaUtil');
		
		if(!$this->session->userdata('logged'))
			redirect('admin/login');
		
	}
	
	public function index( $msg = FALSE, $projetoId = FALSE )
	{
		if($msg && isset($this->_msg[$msg])) $data['mensagem'] = $this->_msg[$msg];
	
		$result = $this->session->userdata('result');
		$data['result'] = $result;
	
		$data['usuario'] = $result['usuario'];
	
	
		$data['page_title']  = "Home Sistema Administrador";
		$data['content'] = "Sistema Administrador do PM Canvas.";
	
		if(isset($result['temPermissao'])) $data['temPermissao'] = $result['temPermissao'];
		
		if ( $projetoId ) {

			// adicionando o mapa contendo os cards de cada área -----------------
			$this->load->model('cardmodel', '', true);
			$data[ 'cards']['_justificativas' ] = $this->cardmodel->getByArea( 1, $projetoId );
			$data[ 'cards']['_objetivos' ] 		= $this->cardmodel->getByArea( 2, $projetoId );
			$data[ 'cards']['_beneficios' ] 	= $this->cardmodel->getByArea( 3, $projetoId );
			$data[ 'cards']['_produto' ] 		= $this->cardmodel->getByArea( 4, $projetoId );
			$data[ 'cards']['_requisitos' ] 	= $this->cardmodel->getByArea( 5, $projetoId );
			$data[ 'cards']['_stakeholders' ] 	= $this->cardmodel->getByArea( 6, $projetoId );
			$data[ 'cards']['_equipe' ] 		= $this->cardmodel->getByArea( 7, $projetoId );
			$data[ 'cards']['_premissas' ] 		= $this->cardmodel->getByArea( 8, $projetoId );
			$data[ 'cards']['_grupoentregas'] 	= $this->cardmodel->getByArea( 9, $projetoId );
			$data[ 'cards']['_restricoes' ] 	= $this->cardmodel->getByArea( 10, $projetoId );
			$data[ 'cards']['_riscos' ] 		= $this->cardmodel->getByArea( 11, $projetoId );
			$data[ 'cards']['_linhatempo' ] 	= $this->cardmodel->getByArea( 12, $projetoId );
			$data[ 'cards']['_custos' ] 		= $this->cardmodel->getByArea( 13, $projetoId );
			
			$data[ 'projetoId' ] = $projetoId;
			// -------------------------------------------------------------------
			
		}
	
		// Load View
		$this->templateadmin->show('admin/home', $data);
	}
	
	public function salvar()
	{
		$result = $this->session->userdata('result');
		
		$dados = $_POST;
		
		$this->load->model( 'cardmodel', '', true );
		
		$dados[ 'autor' ] = $result[ 'usuario' ][ 'usu_nome' ];
		
		$card = array();
		
		if( isset( $dados[ 'id' ] ) && $dados[ 'id' ] != 0 ) {
			
			$card = $this->cardmodel->update( $dados[ 'id' ], $dados );
			$card = $this->cardmodel->get( $dados[ 'id' ] );
			
			$card[ 'action' ] = "UPDATE";
			
		} else {
			
			$ordem = $this->cardmodel->getOrdemByArea( $dados, $dados[ 'projeto_fk' ] );
			$dados[ 'ordem' ] = $ordem[ 'ordem' ] + 1;
			$idCard = $this->cardmodel->create( $dados );
			$card = $this->cardmodel->get( $idCard );
			
			$card[ 'action' ] = "CREATE";
		}
		
		die( json_encode( $card ) );
	}
	
	public function drag()
	{
		$cards = isset($_POST['card']) ? $_POST['card'] : array();
		
		$destino = isset($_POST['destino']) ? $_POST['destino'] : null;
		
		$this->load->model( 'cardmodel', '', true );
		
		$dados = $this->cardmodel->atualizarCardsByDestino( $cards, $destino );
		
		die( json_encode( $dados ) );
	}
	
	public function editar()
	{
		$dados = $_POST;
		
		$cardId = $dados[ 'cardId' ];
		
		$this->load->model( 'cardmodel', '', true );
		
		$dados = $this->cardmodel->get( $cardId );
		
		$dados[ 'action' ] = 'EDITAR';
		
		die( json_encode( $dados ) );
	}
	
	public function excluir()
	{
		$dados = $_POST;
	
		$cardId = $dados[ 'cardId' ];
	
		$this->load->model( 'cardmodel', '', true );
	
		$dados = $this->cardmodel->delete( $cardId );
	
		$dados[ 'action' ] = 'EXCLUIR';
	
		die( json_encode( $dados ) );
	}
	
	public function link()
	{
		$dados = $_POST;
		
		$projetoId = $dados[ 'projetoId' ];
		
		$this->load->model( 'cardmodel', '', true );
		$this->load->model( 'linkmodel', '', true );
		$cards = $this->cardmodel->getDiferenteDe( $dados[ 'cardDe' ], $projetoId );
		$card = $this->cardmodel->get( $dados[ 'cardDe' ] );
		
		$dados[ 'action' ] 		= 'LINK';
		$dados[ 'cards' ] 		= $cards;
		$dados[ 'card' ] 		= $card;
		$dados[ 'array_areas' ] = $this->cardmodel->get_array_cards_by_areas();
		
		$dados[ 'link' ]		= $this->linkmodel->getLinkByCardDe( $dados[ 'cardDe' ], $projetoId );
		
		die( json_encode( $dados ) ); // $this->session->all_userdata()
	}
	
	public function check () {

		$dados = $_POST;
		
		$this->load->model( 'linkmodel', '', true );
		
		if( $dados[ 'check' ] == "true" ) { // linkando true
			
			$linkId = $this->linkmodel->create( $dados );
			$dados[ 'linkId' ] = $linkId;
			$dados[ 'action' ] = "CREATE";
			
		} else {
			
			$this->linkmodel->delete( $dados );
			$dados[ 'action' ] = "UPDATE";
		}
		
		die( json_encode( $dados ) );
	}
	
}