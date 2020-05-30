<?php 

class Setup extends CI_Model{
	function show_data(){
        $query = $this->db->get_where('food',array('status'=>'enabled'));
		return $query->result();
	}

	function category(){
		$query = $this->db->get_where('foodcategory',array('status'=>'enabled'));
		return $query->result();
	}

	function user(){
		$query = $this->db->get_where('user',array('role'=>'user'));
		return $query->result();
	}

	function getProd($id,$table){
		if($table == 'food'){
			$query = $this->db->query("SELECT * FROM $table WHERE `foodID`=$id");
		}
		else if($table == 'food_category'){
			$query = $this->db->query("SELECT * FROM `foodcategory` WHERE `categoryID`=$id");
		}
		return $query->result();
		
	}

	function addFood($add){
		$this->db->insert('food',$add);
		return true;
	}

	function addCategory($add){
		$this->db->insert('foodcategory',$add);
		return true;
	}

	function delete($del){
		$id = $del['id'];
		$table = $del['table'];

		if($table == 'food'){
			$this->db->where('foodID',$id);
			$this->db->update($table,array('status'=>'disabled'));
		}
		else{
			$this->db->where('categoryID',$id);
			$this->db->update('foodcategory',array('status'=>'disabled'));
		}

		return true;
		
	}

	function editCategory($edit){
		$this->db->where('categoryID', $edit['id']);
		$this->db->update('foodcategory', array('categoryName' => $edit['name']));
		return true;
	}

	function editFood($edit){
		$this->db->where('foodID',$edit['id']);
		$this->db->update('food',array('foodName' => $edit['name'],
						'foodcategory' => $edit['category'],
						'stock' => $edit['stock'],
						'photoLink' => $edit['photo'],
						'desc' => $edit['desc'],
						'price' => $edit['price']));
		return true;
	}

}