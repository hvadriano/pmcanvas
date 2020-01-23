<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class TemplateAdmin {
    function show($view, $data = array())
    {
        // Get current CI Instance
        $CI = & get_instance();
 
        // Load template views
        $CI->load->view('admin/template/header', $data);
        //$CI->load->view('admin/template/menu', $data);
        $CI->load->view($view, $data);
        $CI->load->view('admin/template/footer', $data);
    }
	
	//O método menu vai carregar a visão menu do diretório template, enviando o parâmetro view como uma variável.
	function menu($view)
	{
		// Get current CI Instance
		$CI = & get_instance();
	 
		// Load menu template
		$CI->load->view('admin/template/menu', array('view' => $view));
	}
	
	//Esse método vai percorrer o array com todas as tarefas de cada fase e vai carregar um novo arquivo de template para cada uma das tarefas
	function tasks($project, $tasks)
	{
		// Get current CI Instance
		$CI = & get_instance();
				 
		$i = 0;
		foreach ($tasks as $task) {
			$i++;
			// Load menu template
			$CI->load->view('admin/template/single_task', array('i' => $i, 'project' => $project, 'task' => $task));
		}
	}
 
}
 
/* End of file TemplateAdmin.php */