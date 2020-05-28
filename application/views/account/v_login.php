<!DOCTYPE html>  
 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>
     Login
   </title>
   <?php echo $style; ?>
 </head>
 <body>

     <div class="container mt-5 mb-5">
          <div class="row">
               <div class="col">
                    <h2>Login Page</h2><hr>
               </div>
          </div>
          <?php echo form_open('login');?>
          <div class="row">
               <div class="col">
               <div class="form-group">
               <label for="email">Email</label>
          
               <input type="text" class="form-control" name="email" value="<?php echo set_value('email'); ?>"/>
          </div>
          <span class="text-danger"> <?php echo form_error('email'); ?> </span>
               </div>
          </div>
          <div class="row">
               <div class="col">
               <div class="form-group">
                    <label for="password">Password</label>
               
                    <input type="password" class="form-control" name="password" value="<?php echo set_value('password'); ?>"/>
               </div>
               <span class="text-danger"> <?php echo form_error('password'); ?> </span>
               </div>
          </div>
          <div class="row">
               <div class="col">
               
               <input type="submit" class="btn btn-primary mb-2" name="btnSubmit" value="Login" />
          
               </div>
          </div>
          
     
          <?php echo form_close();?>
         

          <?php
          if($this->session->flashdata('sukses')) {
               echo '<div class="alert alert-danger mt-3" role="alert">'.$this->session->flashdata('sukses').'</div>';
          }
          ?>
     
          <p>
               To go back to the main page, click <?php echo anchor(site_url(),'here'); ?>
          </p>
     </div>
      

      <?php echo $script; ?>
 </body>
 </html>