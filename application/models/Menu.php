<?php 

class Menu extends CI_Model{
	function show_data(){
		return $this->db->get('food');
	}
}