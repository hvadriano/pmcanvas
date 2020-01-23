<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class UploadUtil {
	
	public function uploadFile($data){
	
		$config['upload_path'] = './uploads/';
		$config['file_name'] = $data['file_name'];
		$config['allowed_types'] = 'csv';
		$config['max_size']	= 10000;
		$config['remove_spaces'] = TRUE;
	
		$this->load->library('upload', $config);
	
		if ( ! $this->upload->do_upload())
		{
			$data['error'] = $this->upload->display_errors();
			return null;	
		}
		else
		{
			return $this->upload->data(); 
		}
		
	}
	
	public function getListaArquivo($data)
	{
		$this->load->helper('file'); //carrega o helper file, que é o responsável por trabalharmos com arquivos
		
		$arquivo = fopen($data['upload_data']['full_path'], "r"); //aqui, abrimos o arquivo em modo leitura através da função fopen. Repare que em $data['upload_data']['full_path'] é que está o caminho completo ao arquivo.
		
		//variáveis de controle -------
 		$linha = 1;
 		$listaArquivo = array();
		//-----------------------------
 		
		while (($dataFile = fgetcsv($arquivo, 1000, ";")) !== FALSE) { //este while vai percorrer o arquivo aberto linha por linha e a cada linha lida, executa o código abaixo
				
			if ($linha++ == 1) //este IF tem como função pular a primeira linha do arquivo .CSV, pois ali constam os nomes dos campos, que não nos interessam.
				continue;
		
			$listaArquivo[$linha] = UploadUtil::getLinhaArquivo($dataFile);
		
		}
		
		fclose ($arquivo); //fechamos o arquivo para liberar a memória.
		
		unlink($data['upload_data']['full_path']); // para remover o arquivo do diretório onde estava salvo
		
		return $listaArquivo;
	}
	
	private function getLinhaArquivo($dataFile)
	{

		return array(
					"kwp_keyWord" 		=> utf8_encode($dataFile[1]),
					"kwp_avg" 			=> $dataFile[3],
					"kwp_competition" 	=> str_replace(",",".", $dataFile[4]),
					"kwp_bid" 			=> str_replace(",",".", $dataFile[5])
			);
	}
	
}
