<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class PalavraChave {
		
	/**
	 * 21/07/2014
	 * 
	 * método que faz a atualização da densidade de KWP do conteúdo de texto do plano de conteúdo
	 * 
	 * @param unknown $id
	 */
	public function analizarPlanoConteudo($id)
	{
		
		$planoConteudo = $this->planoconteudomodel->get($id);
		$textoConteudo = $this->textoconteudomodel->getByPlano($id);
		$listKeyWord = $this->keyWordplannermodel->getByPlano($id);
		
		// apago a lista de densidade para este TextoConteúdo, caso haja
		$this->densidademodel->deleteByTextoConteudo($textoConteudo['txt_id']);
		
		// obtenho uma lista de cada palavra chave e sua densidade,
		$listaDensidade = DensidadeUtil::getListaDensidade($listKeyWord, $textoConteudo);
		// salvo a lista de densidade no banco
		$this->densidademodel->createByList($listaDensidade);

	}
	
	/**
	 * 21/07/2014
	 * 
	 * método que faz a atualização da densidade de KWP do conteúdo de texto do concorrente
	 * @param unknown $id
	 */
	public function analizarConcorrenteConteudo($id)
	{
	
		$concorrenteConteudo = $this->concorrenteconteudomodel->get($id);
		$textoConteudo = $this->textoconteudomodel->getByPlano($concorrenteConteudo['cnc_id']);
		$listKeyWord = $this->keyWordplannermodel->getByPlano($concorrenteConteudo['cnc_plc_id']);
	
		// apago a lista de densidade para este TextoConteúdo, caso haja
		$this->densidademodel->deleteByTextoConteudo($textoConteudo['txt_id']);
	
		// obtenho uma lista de cada palavra chave e sua densidade,
		$listaDensidade = DensidadeUtil::getListaDensidade($listKeyWord, $textoConteudo);
		// salvo a lista de densidade no banco
		$this->densidademodel->createByList($listaDensidade);
	
	}
	
}
