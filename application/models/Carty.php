<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
 
  class Carty extends CI_Model{
    function insert($data){
        $partitioned = array(
            'custID'=>$data['custID'],
            'orderDate'=>$data['date'],
            'total'=>$data['total']
        );
        $this->db->insert('transaction',$partitioned);
       $query = $this->db->query('SELECT LAST_INSERT_ID() AS last_id');
       return $query->result();
    }

    function detail($data){
        $partitioned = array(
            'transID'=>$data['transID'],
            'foodID'=>$data['foodID'],
            'quantity'=>$data['quantity']

        );
        $this->db->insert('transactionDetail',$partitioned);
    }

    function updateTotal($data){
        $partitioned = array(
            'total'=>$data['total']
        );
        $this->db->where('transID',$data['transID']);
        $this->db->update('transaction',$partitioned);
        return true;
    }

    function getTransId(){
        $sesh = $this->session->userdata('id');
        $query = $this->db->query("SELECT transID, total FROM `transaction` WHERE `custID`='$sesh' AND `status`=0");
        if($query->num_rows()){
            return $query->result();
        }
        else{
            return false;
        }
    }

    function getTransactions(){
        $id = $this->session->userdata('id');
        $this->db->order_by('orderDate','desc');
        $query =  $this->db->get_where('transaction',array('custID'=>$id,'status'=>1));
        return $query->result();
    }

    function getItems($id){
        $query = $this->db->get_where('transactionDetail',array('transID'=>$id));
        return $query->result();
    }

    function getDetailItems(){
        $query = $this->db->get('transactionDetail');
        return $query->result();
    }

    function payMethod(){
        $query = $this->db->get('payment');
        return $query->result();
    }

    function finishTrans($data){
        $partitioned = array(
            'orderDate'=>$data['date'],
            'paymentType'=>$data['payment'],
            'status'=>1,
            'deliveryAddress'=>$data['delivAddress']
        );
        $this->db->where('transID',$data['transID']);
        $this->db->update('transaction',$partitioned);
        return true;
    }

    function decreaseStock($data){
        $foodID = $data['foodID'];
        $query = $this->db->query("SELECT `stock` FROM `food` WHERE `foodID`='$foodID'");
        $stock = $query->result()[0]->stock;
        $stock = (int)$stock - (int)$data['quantity'];
        $array = array('stock'=>$stock);
        $this->db->where('foodID',$foodID);
        $this->db->update('food',$array);
        return true;
    }

    function checkRow($id){
        $query = $this->db->get_where('transactionDetail',array('transID'=>$id));
        return $query->num_rows();
    }

    function deleteItem($data){
        $query = $this->db->get_where('transactionDetail',$data);
        $quant = $query->result()[0]->quantity;
        $foodID = $data['foodID'];
        $query2 = $this->db->query("SELECT `price` FROM `food` WHERE `foodID`='$foodID'");
        $price = $query2->result()[0]->price;

        $subtracted= (int)$quant * (int)$price;
        $trans = array('transID'=>$data['transID']);
        $query3 = $this->db->get_where('transaction',$trans);

        $prevTotal = $query3->result()[0]->total;
        $curTotal = (int)$prevTotal - (int)$subtracted;

        $thingy2 = array('transID'=>$data['transID'],'foodID'=>$data['foodID']);
        $this->db->where($trans);
        $this->db->update('transaction',array('total'=>$curTotal));

        $this->db->where($data);
        $this->db->delete('transactionDetail');

    }

    function deleteTrans($id){
        $this->db->where(array('transID'=>$id));
        $this->db->delete('transaction');
    }

    function rateFood($data){
        $this->db->where(array('foodID'=>$data['foodID'],'transID'=>$data['transId']));
        $this->db->update('transactionDetail',array('rated'=>$data['rating']));
        $foodID = $data['foodID'];
        $transID = $data['transId'];


        $query = $this->db->query("SELECT COUNT(*) AS counted, SUM(`rated`) AS total FROM `transactionDetail` WHERE `foodID`='$foodID' AND `rated` IS NOT NULL");
        $counted = $query->result()[0]->counted;
        $total = $query->result()[0]->total;

        $avg = (int)$total / (int)$counted;
        $this->db->where('foodID',$foodID);
        $this->db->update('food',array('rating'=>$avg));
        return true;
    }

  }