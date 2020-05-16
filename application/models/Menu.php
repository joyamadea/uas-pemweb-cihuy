<?php 

class Menu extends CI_Model{
	function show_data(){
		return $this->db->get('food');
	}	
	public function getDataWhere($field, $search)
	{
		$query = $this->db->like($field, $search)->get('food');
		return $query->result();
	}

	public function getDataOf($input)
	{
		if(strlen($input)<5){
			$query = $this->db->query("SELECT * FROM food WHERE foodCategory=$input");
		}
		else $query = $this->db->query("SELECT * FROM food WHERE price$input");
		return $query->result(); 
	}

    function getAllCategory()
    {
        $query = $this->db->query('SELECT * FROM foodCategory');
        return $query->result();
	}
	
	public function sortData($field)
	{
		$query = $this->db->order_by($field)->get('food');
		return $query->result();
	}

	function detail_prod($id){
		$query = $this->db->query("SELECT * FROM `food` WHERE `foodID`=$id");
		return $query->result();
	}
}