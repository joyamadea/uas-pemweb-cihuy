<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

        
        <div class="row">
        
            <div class="col-lg-8 col-12">
            <?php foreach($cart as $c){?>
            <div class="row">
            <div class="col">
            <div class="card mb-3">   
                <div class="card-body">
                    <h5 class="card-title text-dark">
                    <?php
                        foreach($food as $f){
                            if($f->foodID == $c->foodID){
                                echo $f->foodName;
                            
                        
                    ?>
                    </h5>
                
                    Rp. <?php echo number_format($f->price,0,',','.'); ?>
                    <?php echo $c->quantity; ?>
                    <a href="" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                    
                </div>
                <?php } }?>
                </div>  
            </div>
            </div>
            <?php } ?>
        </div>
        
        <div class="col-lg-4 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-dark" style="font-weight:bold;">Order Summary</h5>
                    <hr>
                    <p class="card-text" style="justify-content:space-between;">Total <span class="ml-auto" style="font-weight:bold;text-align:right;">Rp. <?php echo number_format($total,0,',','.');?></span></p>
                    <a href="<?php echo site_url('cart/check_out'); ?>" class="btn btn-primary btn-block">Check Out</a>
                </div>
            </div>
        </div>
        </div>
    </div>
       
                            
    <?php echo $script; ?>
</body>
</html>