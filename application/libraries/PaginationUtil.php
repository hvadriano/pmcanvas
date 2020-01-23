<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class PaginationUtil {
		
	public function pagination($count, $path, $limit){
		
		$totalRows = $count;
		
		$this->load->library('pagination');
		$config['base_url'] 	= base_url().$path;
		$config['total_rows'] 	= $totalRows;
		$config['per_page'] 	= $limit;
		$config['uri_segment'] 	= 4; // índice vindo no URL
		$config['num_links'] 	= 3;
		$config['first_link'] 	= 'PRIMEIRO';
		$config['last_link'] 	= '&Uacute;LTIMO';
		$config['next_link'] 	= 'Pr&oacute;x.';
		$config['prev_link'] 	= 'Ant.';
		
		$this->pagination->initialize($config);
		
		$res['totalRows'] = $totalRows;
		$res['pageLinks'] = $this->pagination->create_links();
		
		return $res;
	}
	
}
