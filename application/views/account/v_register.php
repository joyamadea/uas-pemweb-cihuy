<!DOCTYPE html>  
 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>
     Register
   </title>
   <?php echo $style; ?>
 </head>
 <body>
      <div class="container mt-5 mb-5">
        <h2>Register Page</h2><hr>
        <?php echo form_open('register');?> 
        <div class="form-group">
          <label for="displayName">Display Name</label>
          <input type="text" name="displayName" class="form-control" value="<?php echo set_value('displayName'); ?>"/> 
          
        </div>
        <span class="text-danger"> <?php echo form_error('displayName'); ?> </span>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" name="email" class="form-control" value="<?php echo set_value('email'); ?>"/> 
          
        </div>
        <span class="text-danger"> <?php echo form_error('email'); ?> </span>

        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" class="form-control" value="<?php echo set_value('password'); ?>"/> 
          
        </div>
        <span class="text-danger"> <?php echo form_error('password'); ?> </span>

        <div class="form-group">
          <label for="password_conf">Confirm Password</label>
          <input type="password" name="password_conf" class="form-control" value="<?php echo set_value('password_conf'); ?>"/> 
          
        </div>
        <span class="text-danger"> <?php echo form_error('password_conf'); ?> </span>

        <div class="form-group">
          <label for="birthDate">Birth Date</label>
          <input type="date" name="birthDate" class="form-control" value="<?php echo set_value('birthDate'); ?>"/> 
          
        </div>
        <span class="text-danger"> <?php echo form_error('birthDate'); ?> </span>

        <input type="submit" class="btn btn-primary mb-2" name="btnSubmit" value="Register" />

        <?php echo form_close();?>

        To go back to the main page, click <?php echo anchor(site_url(),'here'); ?>
      </div>


     <?php echo $script; ?>
 </body>
 </html>