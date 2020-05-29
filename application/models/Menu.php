<?php 

class Menu extends CI_Model{
	function show_data(){
		return $this->db->get_where('food', array('status' => 'enabled'));
	}	
	public function getDataWhere($field, $search)
	{
		if($field=="foodCategory"){
			$query = $this->db->get_where('foodCategory',array('categoryName' => $search));
			foreach ($query->result() as $row){
				$search = $row->categoryID;
			}
		}

		$query = $this->db->like($field, $search)->get('food');
		return $query->result();
	}

	public function getPrice($id){
		$query = $this->db->query("SELECT price FROM `food` WHERE `foodID`=$id");
		return $query->result();
	}

	public function getFood(){
		$query = $this->db->query("SELECT foodID, foodName, price, photoLink FROM `food`");
		return $query->result();
	}

	public function getProdRating($id){
		$query = $this->db->query("SELECT COUNT(rated) AS counted FROM `transactionDetail` WHERE `foodID`='$id'");
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