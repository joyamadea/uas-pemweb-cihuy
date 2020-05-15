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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="<?php echo base_url(); ?>">Eateris</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
                <a class="nav-link" href="#">Statistics</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Setup
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?php echo site_url('admin/setup/food'); ?>">Food</a>
                <a class="dropdown-item" href="<?php echo site_url('admin/setup/food_category'); ?>">Food Category</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Logout</a>
            </li>
        </ul>
    </nav>

    <div class="input-group mb-3">
        <div class="input-group-append">
            <input type="button" value="-" class="btn btn-outline-secondary" id="countDown" onclick="down();">
        </div>
            <input type="text" size="3" style="text-align: center" maxlength="3" id="productValue" value="0"/>
        <div class="input-group-append">
            <input type="button" value="+" class="btn btn-outline-secondary" id="counterUp" onclick="up();">
        </div>
    </div>
        <input type="hidden" value="20" id="maxNumProd"/>
    <script>
        
        var val=0;

        function up(){
            var actVal=document.getElementById("productValue").value;
            var maxNumProd=document.getElementById("maxNumProd").value;
            if(actVal == "0" || actVal == val){
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
            if(actVal == "0" || actVal == val){
                val--;
                if(val < 0){
                    document.getElementById("productValue").value=0;
                    val=0;
                }
                else{
                    document.getElementById("productValue").value=val;
                }
                
            }
            else{
                var hi=document.getElementById("productValue").value;
                hi--;
                if(hi < 0){
                    document.getElementById("productValue").value=0;
                    hi=0;
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