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
}


/* End of file image.php */
/* Location: ./application/models/image.php */