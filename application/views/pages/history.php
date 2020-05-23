<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php echo $style; ?>

</head>
<body>
    <?php echo $navbar; ?>
    <div class="container">
        <h3 style="color:black;margin-bottom:3%;">Transaction History</h3>
        <?php foreach($trans as $t){?>
            <div class="card mb-5">
                <div class="card-body">
                Delivered on <?php echo date("d M Y", strtotime($t->orderDate)); ?>
                <hr>
                    <?php foreach($detail as $d){?>
                    <?php if($d->transID == $t->transID){?>
                    <?php foreach($food as $f){?>
                    <?php if($d->foodID == $f->foodID){?>

                        <div class="row">
                            <div class="col">
                                <?php echo $f->foodName; ?><br>
                                Rp <?php echo number_format($f->price,0,',','.'); ?>
                                <?php echo $d->quantity; ?>x
                                
                            
                                
                            </div>
                            <div class="col">
                                
                                
                                Total Product Price<br>
                                Rp <?php echo number_format((int)$f->price*(int)$d->quantity,0,',','.');?>
                            </div>
                        </div>
                        <hr>
                        

                    <?php } ?>
                    <?php } ?>
                    <?php } ?>
                    <?php } ?>
                    Total Price Rp <?php echo number_format($t->total,0,',','.'); ?>
                                
                </div>
            </div>
        <?php } ?>


    </div>

    <?php echo $script; ?>
</body>
</html>