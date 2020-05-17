<?php 

class Setup extends CI_Model{
	function show_data(){
        $query = $this->db->get('food');
		return $query->result();
	}

	function category(){
		$query = $this->db->get('foodCategory');
		return $query->result();
	}

	function user(){
		$query = $this->db->get('user');
		return $query->result();
	}
	function getProd($id,$table){
		if($table == 'food'){
			$query = $this->db->query("SELECT * FROM $table WHERE `foodID`=$id");
		}
		else if($table == 'food_category'){
			$query = $this->db->query("SELECT * FROM `foodCategory` WHERE `categoryID`=$id");
		}
		return $query->result();
		
	}

	function addFood($add){
		$this->db->insert('food',$add);
		return true;
	}

	function addCategory($add){
		$this->db->insert('foodCategory',$add);
		return true;
	}

	function editCategory($edit){
		$this->db->where('categoryID', $edit['id']);
		$this->db->update('foodCategory', array('categoryName' => $edit['name']));
		return true;
	}

	function editFood($edit){
		$this->db->where('foodID',$edit['id']);
		$this->db->update('food',array('foodName' => $edit['name'],
						'foodCategory' => $edit['category'],
						'stock' => $edit['stock'],
						'photoLink' => $edit['photo'],
						'desc' => $edit['desc'],
						'price' => $edit['price']));
		return true;
	}

}