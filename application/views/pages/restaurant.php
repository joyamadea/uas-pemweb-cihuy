<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo $style; ?>
    <style>
        /* unvisited link */
        a:link {
        color: black;
        }

        /* visited link */
        a:visited {
        color: black;
        }

        /* mouse over link */
        a:hover {
        color: black;
        }
    </style>
</head>
<body>
    <?php echo $navbar; ?>
    

    <div class="container mt-5">
        <div class="row">
            

            <form class="form-inline col-lg-2 col-5" action="<?php echo site_url('restaurant/filter'); ?>" method="post" id="fieldFilter">
                <select class="form-control" name="fieldFilter" onchange="this.form.submit();">
                    <option selected="selected" disabled="disabled" value="" >Filter By</option>
                    <?php 
                        foreach($category as $row)
                        { ?>
                            
                            <option value="<?php echo $row->categoryID; ?>" <?php if (!empty($this->input->post('fieldFilter')) && $this->input->post('fieldFilter') == $row->categoryID) echo "selected";?>><?php echo $row->categoryName;?></option>';
                        <?php }?>
                    ?>
                    <option <?php if (!empty($this->input->post('fieldFilter')) && $this->input->post('fieldFilter') == '<50000') echo "selected";?> value="<50000">Under Rp. 50.000</option>
                    <option <?php if (!empty($this->input->post('fieldFilter')) && $this->input->post('fieldFilter') == '<150000') echo "selected";?> value="<150000">Under Rp. 150.000</option>
                    <option <?php if (!empty($this->input->post('fieldFilter')) && $this->input->post('fieldFilter') == '>250000') echo "selected";?> value=">250000">Above Rp. 250.000</option>
                </select>
            </form>


            <form class="form-inline col-lg-4 col-5" action="<?php echo site_url('restaurant/filter');?>" method="post">
                <select class="form-control" name="fieldSort" onchange="this.form.submit();">
                    <option selected="selected" disabled="disabled" value="">Sort by</option>
                    <option <?php if (!empty($this->input->post('fieldSort')) && $this->input->post('fieldSort') == 'price asc') echo "selected";?> value="price asc">Price Ascending</option>
                    <option <?php if (!empty($this->input->post('fieldSort')) && $this->input->post('fieldSort') == 'price desc') echo "selected";?> value="price desc">Price Descending</option>
                    <option <?php if (!empty($this->input->post('fieldSort')) && $this->input->post('fieldSort') == 'foodName asc') echo "selected";?> value="foodName asc">A-Z</option>
                    <option <?php if (!empty($this->input->post('fieldSort')) && $this->input->post('fieldSort') == 'foodName descc') echo "selected";?> value="foodName desc">Z-A</option>
                </select>
            </form>
        </div>
    </div>

    <div class="container mt-5">
                    
        <?php 
            if(!empty($food)){ 
                if(!empty($_SESSION['search'])){?>
                <h4> Result found for <?php echo $_SESSION['search']; unset($_SESSION['search']);}?></h4>
                <div class="card-columns">
                <?php foreach($food as $f){ 
                    ?>        
                        <a href="<?php echo site_url('restaurant/product/'.$f->foodID);?>">
                        <div class="card mb-5">
                            <img class="card-img-top" alt="picture of product" src="<?php echo site_url('assets/uploads/files/').$f->photoLink; ?>" width="200px">
                            <div class="body m-3">
                                <p class="card-title"><b><?php echo $f->foodName ?></b></p>
                                <p class="card-text"><?php echo $f->desc ?></p>
                                <p class="card-text"><?php echo 'Rp. '.number_format($f->price,0,',','.') ?></p>
                            </div>
                        </div>
                        </a>
                    <?php }
                    }
            else {?><h4> Result not found for <?php echo $_SESSION['search']; unset($_SESSION['search']);?></h4><?php } ?>
        </div>
    </div>

    <?php echo $script; ?>
</body>
</html>