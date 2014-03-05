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
	 * Method for getting the questions for given category
	 * 
	 * 
	 */
	 public function question_category()
	 {		
	 	if($this->input->post('category'))
		{
			$category = $this->input->post('category');
			$questions = $this->Image->get_questions_category($category);
			
			echo json_encode($questions);
		}
		else
		{
			redirect('/home/upload');	
		}
	 }	
	
	
	/**
	 *  Home controller - upload method - Uploadpage site
	 * 
	 *  Maps to: 	- domain.com/home/upload
	 * 				- domain.com/index.php/home/upload
	 */	
	public function upload()
	{
		if ($this->input->post('submit'))
		{
			//Form fields
			$category = $this->input->post('category');
			$form_properties = $this->input->post('hidden');
			
			$form_properties = json_decode($form_properties);
			
			//field for checking if form fields are valid or not
			$isValid = TRUE; 
			
			//field with data from database
			$questions = $this->Image->get_questions_category($category);
			
			//Validated properties, ready to be inserted into the database
			$val_properties = array();
			
			//Validation variables
			$prev_val_group = '';
			$counter_true = 0;
			$counter_val_group = 0;
			
			echo '<p>';
			var_dump($form_properties);
			echo '</p>';
			
			for ($i=0; $i < count($questions); $i++) 
			{
								
				 if ($questions[$i]->id === $form_properties[$i]->id)
				 {
				 	$temp_id = $form_properties[$i]->id;
				 	$temp_value = $form_properties[$i]->value;
					$val_group = $questions[$i]->val_group;
					
					if($i === 0)
					{
						$prev_val_group = $val_group;	
					}
					
					if($prev_val_group === $val_group)
					{
						if ($temp_value)
						{
							$counter_true++;
							$temp_property = array (
							
								'id' => $temp_id,
								'value' => TRUE																							
							);
							$val_properties[] = $temp_property;							
						}
						else
						{
							$temp_property = array (
							
								'id' => $temp_id,
								'value' => FALSE																							
							);
							$val_properties[] = $temp_property;		
						}
						
						$counter_val_group++;
						
						if ($i ===  count($questions)-1 )
						{
							if (($counter_true !== 1)&&($counter_val_group !== 1))
							{
								$isValid = FALSE;
								break;
							}
						}
					}
					else
					{
						if (($counter_true !== 1)&&($counter_val_group !== 1))
						{
							$isValid = FALSE;
							break;
						}
						else 
						{
							$counter_true = 0;
							$counter_val_group = 0;
							
							if ($temp_value)
							{
								$counter_true++;
								$temp_property = array (
								
									'id' => $temp_id,
									'value' => TRUE																							
								);
								$val_properties[] = $temp_property;							
							}
							else
							{
								$temp_property = array (
								
									'id' => $temp_id,
									'value' => FALSE																							
								);
								$val_properties[] = $temp_property;		
							}							
							
							$prev_val_group = $val_group;
							$counter_val_group++; 
							
							if ($i ===  count($questions)-1 )
							{
								if (($counter_true !== 1)&&($counter_val_group !== 1))
								{
									$isValid = FALSE;
									break;
								}
							}							
						}
					}
					
				 }
				 else
				 {
					$isValid = 	FALSE;	 
				 }	
				 
				 
				echo '<p>';
				var_dump($val_properties);
				echo '</p>';
			}
		
			//var_dump(current($questions)->vraag);
			
		}
		else 
		{			
			$categories = $this->Image->get_categories();		
		
			$this->_load_views('upload/upload.php', 'Upload foto', $categories);
			
		}		
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