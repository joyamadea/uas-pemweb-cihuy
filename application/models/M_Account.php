<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
 
  class M_account extends CI_Model{

       function daftar($data)
       {
            $this->db->insert('user',$data);
       }

       function login($email){
          $query = $this->db->get_where('user',array('email'=>$email));
 
         if($query->num_rows() == 1) {
             //ambil data user berdasar email
             return $query->result();

         }else{
               return false;
         }
          
       }
  }