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
    <?php foreach($details as $d){?>

    
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col">
                <img alt="picture of product" src="<?php echo site_url('assets/uploads/files/').$d->photoLink; ?>" width="80%">
            </div>
            <div class="col">
                <!-- Name of Product -->
                <h3><?php echo $d->foodName; ?></h3>
                <!-- Rating -->

                <!-- Price -->
                <p>Rp. <?php echo $d->price; ?></p>
                <!-- Button for adding and subtracting quantity of product -->
                <div class="input-group">
                    <div class="input-group-append">
                        <input type="button" value="-" class="btn btn-outline-secondary" id="countDown" onclick="down();">
                    </div>
                        <input type="text" size="3" style="text-align: center" maxlength="3" id="productValue" value="1"/>
                    <div class="input-group-append">
                        <input type="button" value="+" class="btn btn-outline-secondary" id="counterUp" onclick="up();">
                    </div>

                    
                </div>
                <small class="mb-3">Stock left: <?php echo $d->stock; ?></small>

                
                <!-- Maximum number of stock -->
                <input type="hidden" value="<?php echo $d->stock; ?>" id="maxNumProd"/>    

                <!-- Product Description -->
                <i><p class="mt-3"><?php echo $d->desc; ?></p></i>
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