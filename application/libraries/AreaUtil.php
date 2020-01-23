<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class AreaUtil {
	
    public function getAreas()
    {
    	
    	$this->load->model('cardmodel', '', true);
    	
    	$cardArea[ 'cards_area_1' ] = $this->cardmodel->getByArea( 1 );
    	
    	
    	return $cardArea;
    	
    }
	

}
 