<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php echo $style; ?>
</head>
<body style="background:#fff2e1">
    <?php echo $navbar; ?>

    <div class="container">
        <div class="d-flex flex-column flex-lg-row">
        <img src="./assets/deliveryman.jpg" style="width:45%;">
        <p><span style="font-size:24px; font-weight:500;">Thank you for ordering!</span>
        <br>Please rate our food so we can provide the best experience for everyone</p>
        </div>
        
        <?php $index=0; ?>
        <?php foreach($cart as $c){?>
        <div class="card"><div class="card-body">
            <div class="row">
                <div class="col-5 col-lg-3">
                    <?php foreach($food as $f){if($f->foodID == $c->foodID){?>
                    <img src="<?php echo site_url('assets/uploads/files/').$f->photoLink; ?>" style="width:100%;">
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <span style="font-size:18px; font-weight:500;"><?php echo $f->foodName;}} ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                        <span id="rate<?php echo $index;?>"></span>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div></div>
        <?php echo form_open('rating/rating'); ?>
        <input type="hidden" id="stars<?php echo $index;?>" name="stars<?php echo $index;?>" value="0">
        
        <?php $index++; ?>
        
        
        <?php } ?>
        <input type="hidden" name="index" value="<?php echo $index-1;?>">
        <div class="mt-3" style="self-align:right;">
            <a class="btn btn-outline-secondary" href="<?php echo base_url();?>">Skip Rating</a>
            <input type="submit" value="Rate" class="btn btn-primary">
        </div>
        <?php echo form_close(); ?>
    </div>
    <!-- <a href="https://www.freepik.com/free-photos-vectors/design">Design vector created by freepik - www.freepik.com</a> -->
    <?php echo $script;?>
    <script>
       $(function(){
        <?php for($i=0;$i<$index;$i++){?>
        $("#rate<?php echo $i; ?>").rating({
            "click":function(e){
                document.getElementById("stars<?php echo $i;?>").value = e.stars;
            }
        });
        <?php } ?>
        });
    </script>

</body>
</html>