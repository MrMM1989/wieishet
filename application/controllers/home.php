<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->model('Image','', TRUE);    
	}

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
		$this->_load_views('game/play.php', 'Speel', array());
	}
	
	
	/**
	 *  Home controller - upload method - Uploadpage site
	 * 
	 *  Maps to: 	- domain.com/home/upload
	 * 				- domain.com/index.php/home/upload
	 */	
	public function upload()
	{
		$categories = $this->Image->get_categories();
		
		
		$this->_load_views('upload/upload.php', 'Upload foto', $categories);
	}
	
	
	/**
	 * Loads the views
	 * 
	 * @param string $view - the view needed to be loaded in the page body
	 * @param string $title - the page title
	 * @param array $info - aditional data for the page
	 */ 
	private function _load_views($view, $title, $info)
	{
		$data = array (
			'title'=> $title,
			'info' => $info
		);
		
		
		$this->load->view('header.php', $data);
		$this->load->view($view);
		$this->load->view('footer.php');
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */