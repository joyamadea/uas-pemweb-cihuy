<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <?php echo $style; ?>
    <style>
        ul#list li{
            display:inline;
            margin-right:7%;
        }
    </style>

</head>
<body>
    <?php echo $navbar; ?>
    
    <div class="container">
        
        <h3 style="color:black;margin-bottom:3%;">Shopping Cart</h3>

        
            
        <?php if($this->session->flashdata('delItem')){?>
        <div class="alert alert-danger mt-3" role="alert">
            <?php echo $this->session->flashdata('delItem'); ?>
        </div>
        <?php } ?>

        <div class="row">
        
        <?php if(!$this->carty->getTransId()){ ?>
            <div class="col">
                <img src="./assets/img/empty_cart.svg" style="width:35%;margin-bottom:3%;">
                <span style="font-size:20px;">It looks lonely here...</span><br>
                <a class="btn btn-primary btn-block" href="<?php echo base_url(); ?>">Let's order some food!</a>
            </div>

            <?php }else{ ?>
                
            <div class="col-lg-8 col-12">
            <?php foreach($cart as $c){?>
            <div class="row">
            
        
        
            <div class="col">
            <div class="card mb-3">   
                <div class="card-body">
                <div class="row align-items-center">
                        <div class="col">
                    <p class="card-title text-dark" style="font-weight:bold;">
                    <?php
                        foreach($food as $f){
                            if($f->foodID == $c->foodID){
                                echo $f->foodName;
                    ?>
                    </p>
                                
                    
                            Rp <?php echo number_format($f->price,0,',','.'); ?>
                            <?php echo $c->quantity; ?>x
                        </div>
                        <div class="col text-right">
                            <a href="<?php echo site_url('cart/deleteitem/').$c->foodID; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </div>
                    </div>

                    
                    
                    
                </div>
                <?php } }?>
                </div>  
            </div>
            </div>
            <?php } ?>
        </div>
        
        <!-- Order Summary -->
        <div class="col-lg-4 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-dark" style="font-weight:bold;">Order Summary</h5>
                    <hr>
                    <p class="card-text" style="justify-content:space-between;">Total <span class="ml-auto" style="font-weight:bold;text-align:right;">Rp <?php echo number_format($total,0,',','.');?></span></p>
                    <a href="<?php echo site_url('cart/check_out'); ?>" class="btn btn-primary btn-block">Check Out</a>
                </div>
            </div>
        </div>
        </div>
        <?php } ?>
    </div>
       
    <!-- <a href="https://www.freepik.com/free-photos-vectors/people">People vector created by pch.vector - www.freepik.com</a>               -->
    <?php echo $script; ?>
</body>
</html>