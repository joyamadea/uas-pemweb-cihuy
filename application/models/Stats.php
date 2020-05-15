<?php 

class Stats extends CI_Model{
	function daily_data(){
        $query = $this->db->query("SELECT `orderDate`, SUM(`total`) AS 'total' FROM `transaction`  WHERE `status` = 1 GROUP BY `orderDate`");
		return $query->result();
	}
}

?>