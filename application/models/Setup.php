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

}