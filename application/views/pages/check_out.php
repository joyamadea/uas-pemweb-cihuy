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
        <h3 style="color:black;margin-bottom:3%;">Checkout</h3>

        
        <div class="row">
        
            <div class="col-lg-8 col-12">
            <div class="row mb-3">
                <div class="col">
                    <p style="font-weight:bold;" class="text-dark">Delivering To</p> <hr>
                    <p style="font-weight:bold;"><?php echo $this->session->userdata('name'); ?><br></p>
                    <?php echo form_open('cart/endTrans'); ?>

                    <div class="form-group">
                        <label for="delivAddress">Delivery Address:</label>
                        <input type="text" class="form-control" name="delivAddress">
                    </div>
                    
                    
                    <hr>
                </div>
            </div>
            <?php foreach($cart as $c){?>
            <div class="row">
            <div class="col">
            <div class="card mb-3">   
                <div class="card-body">
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
                <?php } }?>
                </div>  
            </div>
            </div>
            <?php } ?>
        </div>
        
        <div class="col-lg-4 col-12">
            <div class="card mb-5">
                <div class="card-body">
                    <h5 class="card-title text-dark" style="font-weight:bold;">Order Summary</h5>
                    <hr>
                    <p class="card-text" style="justify-content:space-between;">Total <span class="ml-auto" style="font-weight:bold;text-align:right;">Rp <?php echo number_format($total,0,',','.');?></span></p>
                    
                    <div class="form-group">
                        <label for="metode">Payment Method:</label>
                        <select class="form-control mb-3" name="metode">
                        <option value="">Pick a Method</option>
                            <?php foreach($payment as $p){ ?>
                            
                            <option value="<?php echo $p->paymentID; ?>"><?php echo $p->payment; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    

                    <input type="submit" class="btn btn-primary btn-block" value="Place Order">
                    <?php echo form_close(); ?>

                    
                </div>
            </div>
            <?php if($this->session->flashdata('checkoutFail')){?>
            <div class="alert alert-danger mt-3" role="alert">
                <?php echo $this->session->flashdata('checkoutFail'); ?>
            </div>
            <?php } ?>
        </div>
        </div>
    </div>
       
                            
    <?php echo $script; ?>
</body>
</html>