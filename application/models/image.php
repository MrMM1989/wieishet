<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Image extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	/**
	 * Returns all categories in the database
	 */
	public function get_categories()
	{
		$query = $this->db->get('category');
		
		if ($query->num_rows()>0)
		{
			$result = array();
			
			foreach ($query->result() as $row)
			{
    			$result[] = array(
    					'id' => $row->category_id,
    					'name' => $row->category_name				
				);
			}
			
			return $result;
						
		}
		else
		{
			return FALSE;	
		}		
	}

	/**
	 * Returns all the normal questions for given category from the database
	 * 
	 * @Param int $category - The category id for loading the normal questions
	 */
	public function get_questions_category($category)
	{
		$query_data = array(
				'question_category_id' => $category,
				'question_0_normal_1_category' => FALSE								
		);	
		
		$this->db->select('question_id AS id, question_text AS vraag, question_validation_group AS val_group');
		$this->db->select('question_0_normal_1_category AS vraag_type, question_category_id AS cat_id');
		$this->db->from('question');
		$this->db->where($query_data);
			
		$query	=	$this->db->get();
		
		if ($query->num_rows()>0)
		{
			return $query->result();
		}
		else
		{
			return FALSE;			
		}
	}
}


/* End of file image.php */
/* Location: ./application/models/image.php */