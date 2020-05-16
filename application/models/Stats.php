<?php 

class Stats extends CI_Model{
	function daily_data(){
        $query = $this->db->query("SELECT `orderDate`, SUM(`total`) AS 'total' FROM `transaction`  WHERE `status` = 1 GROUP BY `orderDate`");
		return $query->result();
	}

	function sum(){
		$query = $this->db->query("SELECT SUM(`total`) AS 'total' FROM `transaction`  WHERE `status` = 1");
		return $query->result();
	}

	function users(){
		$query = $this->db->query("SELECT COUNT(*) AS 'total' FROM `user`");
		return $query->result();
	}
}

?>