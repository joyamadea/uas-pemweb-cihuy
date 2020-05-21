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

    function dummy(){
        $query = $this->db->query('SELECT LAST_INSERT_ID() AS last_id');
        return $query->result();
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

    function getItems($id){
        $query = $this->db->get_where('transactionDetail',array('transID'=>$id));
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

  }