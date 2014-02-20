<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 *  Home controller - index method - Homepage site
	 * 
	 * 	Maps to: 	- domain.com
	 * 				- domain.com/home
	 * 				- domain.com/home/index
	 * 				- domain.com/index.php
	 *  			- domain.com/index.php/home
	 * 				- domain.com/index.php/home/index	
	*/
	public function index()
	{
		$this->_load_views('game/play.php', 'Speel');
	}
	
	/**
	 * Loads the views
	 * 
	 * @param string $view - the view needed to be loaded in the page body
	 * @param string $title - the page title
	 */ 
	private function _load_views($view, $title)
	{
		$data = array (
			'title'=> $title
		);
		
		$this->load->view('header.php', $data);
		$this->load->view($view);
		$this->load->view('footer.php');
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */