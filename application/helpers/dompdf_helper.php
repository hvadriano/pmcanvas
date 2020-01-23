<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function pdf_create($html, $filename = '', $stream = TRUE) {
    require_once("dompdf/dompdf_config.inc.php");

    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->render();
    if ($stream) {
        $dompdf->stream($filename . ".pdf");
    } else {
        return $dompdf->output();
    }
}

function salvar($html, $titulo, $tipo = "P") {
	require_once("dompdf/dompdf_config.inc.php");
	$dompdf = new DOMPDF();
	if ($tipo == "L") {
		$dompdf->set_paper("legal", "landscape"); // Altera o papel para modo paisagem.
	}
	$dompdf->load_html($html); // Carrega o HTML para a classe.
	$dompdf->render();
	$pdf = $dompdf->output(); // Cria o pdf
	$arquivo = "arquivos/".$titulo . ".pdf"; // Caminho onde será salvo o arquivo.
	if (file_put_contents($arquivo,$pdf)) { //Tenta salvar o pdf gerado
		return true; // Salvo com sucesso.
	} else {
		return false; // Erro ao salvar o arquivo
	}
}