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
    <?php foreach($details as $d){?>
    
        
    <div class="container mt-5 mb-5">
    <div class="mb-3">
        <a href="<?php echo base_url();?>">Home</a>&nbsp;/&nbsp;<?php echo $d->foodName;?>
    </div>
    <?php if($this->session->flashdata('prodSuccess')){?>
        <div class="alert alert-success mt-3" role="alert">
            <?php echo $this->session->flashdata('prodSuccess'); ?>
        </div>
        <?php } ?>

        <?php if($this->session->flashdata('prodFail')){?>
        <div class="alert alert-danger mt-3" role="alert">
            <?php echo $this->session->flashdata('prodFail'); ?>
        </div>
        <?php } ?>
    
        <div class=" d-flex flex-column flex-lg-row">
            <div>
                <img alt="picture of product" src="<?php echo site_url('assets/uploads/files/').$d->photoLink; ?>" width="80%">
            </div>
            <div class="mt-3 mt-lg-0">
                <!-- Name of Product -->
                <h3 style="color:black;font-weight:500;"><?php echo $d->foodName; ?></h3>

                <!-- Rating -->
                <p>
                <?php 
                    if($d->rating == 0){
                        echo "Unrated";
                    }else{
                        for($i=0;$i<5;$i++){
                            echo '<i class="fas fa-star"></i>';
                        }
                    }
                    // for($i=0;$i<5;$i++){
                    //             echo '<i class="fas fa-star" style="color:#FFD300;"></i>';
                    //         }
                    
                ?>
                
                </p>
                <hr>
                
                <!-- Price -->
                <p>Rp. <?php echo $d->price; ?></p>
                <!-- Button for adding and subtracting quantity of product -->
                <?php echo form_open('cart/add'); ?>
                <div class="input-group">
                    <div class="input-group-append">
                        <input type="button" value="-" class="btn btn-outline-secondary" id="countDown" onclick="down();">
                    </div>
                        <input type="text" size="3" style="text-align: center" name="quantity" maxlength="3" id="productValue" value="0"/>
                    <div class="input-group-append">
                        <input type="button" value="+" class="btn btn-outline-secondary" id="counterUp" onclick="up();">
                    </div>

                    
                </div>
                <small class="mb-3">Stock left: <?php echo $d->stock; ?></small>

                
                <!-- Maximum number of stock -->
                <input type="hidden" value="<?php echo $d->stock; ?>" id="maxNumProd"/>   
                <input type="hidden" value="<?php echo $d->foodID;?>" name="foodID"/>


                <!-- Product Description -->
                <i><p class="mt-3"><?php echo $d->desc; ?></p></i>

                <!-- Add to cart -->
                <input type="submit" class="btn btn-primary" name="addtocart" value="Add to Cart">
                <?php echo form_close();?>

            </div>
        </div>
        
        <?php }?>
        

    </div>
    <script>
        
        var val=1;

        function up(){
            var actVal=document.getElementById("productValue").value;
            var maxNumProd=document.getElementById("maxNumProd").value;
            if(actVal == "1" || actVal == val){
                val++;
                if(val > maxNumProd){
                    document.getElementById("productValue").value=maxNumProd;
                    val=maxNumProd;
                }
                else{
                    document.getElementById("productValue").value=val;
                }
                
            }
            else{
                var hi=document.getElementById("productValue").value;
                hi++;
                if(hi > maxNumProd){
                    document.getElementById("productValue").value=maxNumProd;
                    hi=maxNumProd;
                }
                else{
                    document.getElementById("productValue").value=hi;
                }
                
                val=hi;
            }     
        }

        function down(){
            var actVal=document.getElementById("productValue").value;
            if(actVal == "1" || actVal == val){
                val--;
                if(val < 1){
                    document.getElementById("productValue").value=1;
                    val=1;
                }
                else{
                    document.getElementById("productValue").value=val;
                }
                
            }
            else{
                var hi=document.getElementById("productValue").value;
                hi--;
                if(hi < 1){
                    document.getElementById("productValue").value=1;
                    hi=1;
                }
                else{
                    document.getElementById("productValue").value=hi;
                }
                
                val=hi;
            }    
        }
    </script>
    <?php echo $script; ?>
</body>
</html>