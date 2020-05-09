<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo $style; ?>
</head>
<body>

    <h1>Restaurant</h1>
    <div class="card-columns">            
    <?php 
		foreach($food as $f){ 
        ?>        
            <div class="card mb-5">
                <img class="card-img-top" alt="picture of product" src="<?php echo $f->photoLink ?>" width="200px">
                <div class="body m-3">
                    <p class="card-title"><b><?php echo $f->foodName ?></b></p>
                    <p class="card-text"><?php echo $f->desc ?></p>
                    <p class="card-text"><?php echo $f->price ?></p>
                </div>
            </div>
		<?php } ?>
    </div>


    <?php echo $script; ?>
</body>
</html>