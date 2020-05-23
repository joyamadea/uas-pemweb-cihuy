<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 ?><!DOCTYPE html>  
 <head>
   <meta charset="UTF-8">
   <title>
     Foody Register
   </title>
 </head>
 <body>
     <h2>Pendaftaran Akun</h2>
 
     <?php echo form_open('register');?> 
     <p>Display Name:</p>
     <p>
     <input type="text" name="displayName" value="<?php echo set_value('displayName'); ?>"/> 
     </p>
     <p> <?php echo form_error('displayName'); ?> </p>

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
 
     <p>Password Confirm:</p>
     <p>
     <input type="password" name="password_conf" value="<?php echo set_value('password_conf'); ?>"/>
     </p>
     <p> <?php echo form_error('password_conf'); ?> </p>
 
     <p>Birth Date:</p>
     <p>
     <input type="date" name="birthDate" value="<?php echo set_value('birthDate'); ?>"/>
     </p>
     <p> <?php echo form_error('birthDate'); ?> </p>

     <p>
     <input type="submit" name="btnSubmit" value="Daftar" />
     </p>
 
     <?php echo form_close();?>
 
     <p>
     Kembali ke beranda, Silakan klik <?php echo anchor(site_url(),'di sini..'); ?>
     </p>
 </body>
 </html>