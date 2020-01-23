<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class DensidadeUtil {
		
	public function getListaDensidade($listKeyWord, $textoConteudo){
		
		$listaDensidade = array();
		$linha = 1;
	
		foreach ($listKeyWord as $keyWord){
				
			// pega a densidade de cada palavra-chave
			$densidade = substr_count(strtolower($textoConteudo['txt_conteudo']), strtolower($keyWord['kwp_keyWord']));
				
			if($densidade > 0){
		
				$listaDensidade[$linha] = DensidadeUtil::getCadaDensidade($keyWord, $textoConteudo, $densidade);
				$linha++;
			}
				
		}
		
		return $listaDensidade;		
	}
	
	public function getCadaDensidade($keyWord, $textoConteudo, $densidade)
	{
		return array(
					"den_txt_id" 		=> $textoConteudo['txt_id'],
					"den_kwp_id" 		=> $keyWord['kwp_id'],
					"den_quantidade" 	=> $densidade
			);
	}
	
}
