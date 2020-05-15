<?php 

class Menu extends CI_Model{
	function show_data(){
		return $this->db->get('food');
	}

	function detail_prod($id){
		$query = $this->db->query("SELECT * FROM `food` WHERE `foodID`=$id");
		return $query->result();
	}
}