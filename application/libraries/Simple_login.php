<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Simple_login {
 
     // SET SUPER GLOBAL
     var $CI = NULL;
 
     /**
      * Class constructor
      *
      * @return   void
      */
     public function __construct() {
         $this->CI =& get_instance();
     }
 
     /*
     * cek email dan password pada table user, jika ada set session berdasar data user dari
     * table user.
     * @param string email dari input form
     * @param string password dari input form
     */

     public function login($email, $password) {
         
         //cek email dan password
         $query = $this->CI->db->get_where('user',array('email'=>$email,'password' => $password));
 
         if($query->num_rows() == 1) {
             //ambil data user berdasar email
             $row  = $this->CI->db->query('SELECT custID FROM user where email = "'.$email.'"');
             $admin= $row->row();
             $id   = $admin->custID;
 
            if(password_verify($password, $row["password"]))  
                {  
                    //set session user
                    $this->CI->session->set_userdata('email', $email);
                    $this->CI->session->set_userdata('id_login', uniqid(rand()));
                    $this->CI->session->set_userdata('id', $id);
                    //redirect ke halaman dashboard
                    redirect(site_url('dashboard'));
                } 


         }else{
 
             //jika tidak ada, set notifikasi dalam flashdata.
             $this->CI->session->set_flashdata('sukses','email atau password anda salah, silakan coba lagi.. ');
 
             //redirect ke halaman login
             redirect(site_url('login'));
         }
          return false;
      }
     
     /**
      * Cek session login, jika tidak ada, set notifikasi dalam flashdata, lalu dialihkan ke halaman
      * login
      */
     public function cek_login() {
 
         //cek session email
         if($this->CI->session->userdata('email') == '') {
 
             //set notifikasi
             $this->CI->session->set_flashdata('sukses','Anda belum login');
 
             //alihkan ke halaman login
             redirect(site_url('login'));
         }
     }
 
     /**
      * Hapus session, lalu set notifikasi kemudian di alihkan
      * ke halaman login
      */
     public function logout() {
         $this->CI->session->unset_userdata('email');
         $this->CI->session->unset_userdata('id_login');
         $this->CI->session->unset_userdata('id');
         $this->CI->session->set_flashdata('sukses','Anda berhasil logout');
         redirect(site_url('login'));
     }
 }