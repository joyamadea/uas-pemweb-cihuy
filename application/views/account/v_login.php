<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 ?><!DOCTYPE html>  
 <head>
   <meta charset="UTF-8">
   <title>
     Foody Login
   </title>
 </head>
 <body>
      <h2>Halaman Login</h2>
      <?php
   // Notif
      if($this->session->flashdata('sukses')) {
           echo '<p class="warning" style="margin: 10px 20px;">'.$this->session->flashdata('sukses').'</p>';
      }
      ?>
 
      <?php echo form_open('login');?>
      <p>Email:</p>
      <p>
           <input type="text" name="email" value="<?php echo set_value('email'); ?>"/>
      </p>
      <p> <?php echo form_error('email'); ?> </p>
 
      <p>Password:</p>
      <p>
           <input type="password" name="password" value="<?php echo set_value('password'); ?>"/>
      </p>
      <p> <?php echo form_error('password'); ?> </p>
 
      <p>
           <input type="submit" name="btnSubmit" value="Login" />
      </p>
 
      <?php echo form_close();?>
 
      <p>
           Kembali ke beranda, Silakan klik <?php echo anchor(site_url(),'di sini..'); ?>
      </p>
 </body>
 </html>