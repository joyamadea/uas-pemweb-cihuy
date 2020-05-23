<?php 

class Stats extends CI_Model{
	function daily_data($month){
        $query = $this->db->query("SELECT `orderDate` , SUM(total) AS 'total' FROM `transaction`  WHERE `status` = 1 GROUP BY orderDate LIMIT 30");
		return $query->result();
	}

	function monthlySales($month){
		$query = $this->db->query("SELECT COUNT(*) AS counted, `orderDate` AS dated, SUM(total) AS total FROM `transaction` WHERE MONTH(orderDate) = $month AND `status` = 1 GROUP BY MONTH(orderDate) ");
		return $query->result();
	}

	function sum(){
		$query = $this->db->query("SELECT SUM(`total`) AS 'total' FROM `transaction`  WHERE `status` = 1");
		return $query->result();
	}

	function users(){
		$query = $this->db->query("SELECT COUNT(*) AS 'total' FROM `user` WHERE `role`='user'");
		return $query->result();
	}

	

	function overallRating(){
		$query = $this->db->query("SELECT COUNT(*) AS counted, SUM(rating) AS total FROM `food` WHERE `rating` != 0");
		$overall = (int)$query->result()[0]->total / (int)$query->result()[0]->counted;
		return $overall;
	}
}

?>