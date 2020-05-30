<?php 

class Stats extends CI_Model{
	function daily_data($month){
        $query = $this->db->query("SELECT `orderDate` , SUM(total) AS 'total' FROM `transaction`  WHERE `status` = 1 GROUP BY orderDate LIMIT 30");
		return $query->result();
	}

	function monthlySales($month){
		$query = $this->db->query("SELECT COUNT(*) AS counted, `orderDate` AS dated, SUM(total) AS total FROM `transaction` WHERE MONTH(orderDate) = $month AND `status` = 1 GROUP BY MONTH(orderDate) ");
		if($query->num_rows() > 0 ){
			return $query->result();
		}
		else{
			return false;
		}
		
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
		if($query->result()[0]->counted > 0){
			$overall = (int)$query->result()[0]->total / (int)$query->result()[0]->counted;
			return $overall;
		}
		else{
			return false;
		}
		
	}

	function payment(){
		$query = $this->db->query("SELECT p.`payment` AS payment, COUNT(t.paymentType) AS counted FROM `transaction` as t, `payment` as p WHERE t.paymentType = p.paymentID AND `status`=1 GROUP BY t.`paymentType`");
		return $query->result();
	}

	function best(){
		$query = $this->db->query("SELECT f.foodName AS 'name', f.photoLink as 'photoLink', f.rating as 'rating', SUM(t.quantity) AS quantity FROM transactiondetail as t, food as f WHERE f.foodID = t.foodID GROUP BY t.foodID ORDER BY `quantity` DESC LIMIT 1");
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
		
	}
}

?>