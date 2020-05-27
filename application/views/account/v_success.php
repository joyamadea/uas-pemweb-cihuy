<!DOCTYPE html>  
 <head>
   <meta charset="UTF-8">
   <title>
   		Notification
   </title>
   <?php echo $style; ?>
 </head>
 <body>
  <div class="container">
  
    <div class="alert alert-success mt-3" role="alert">
    
    <?php echo $message;?>
    </div>
         
        
    <p>Login <a href="<?php echo site_url('login'); ?>">here</a></p>
  </div>
   

    <?php echo $script; ?>
 </body>
 </html>