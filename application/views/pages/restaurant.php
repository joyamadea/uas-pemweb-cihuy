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

    <h1 align="center">Restaurant</h1>
    

    <div class="container mt-5">
        <div class="row">
            <form class="form-inline col-5" action="<?php echo base_url(); ?>" method="post">
                <select class="form-control" name="field">
                    <option selected="selected" disabled="disabled" value="">Search By</option>
                    <option value="foodName">Food Name</option>
                    <option value="foodCategory">Category</option>
                </select>
                <input class="form-control" type="text" name="searchInput" value="" placeholder="Search...">
                <input class="btn" type="submit" name="search" value="Go">
            </form>

            <form class="form-inline col-3" action="<?php echo base_url(); ?>" method="post">
                <select class="form-control" name="fieldFilter">
                    <option selected="selected" disabled="disabled" value="">Filter By</option>
                    <?php 
                        foreach($category as $row)
                        { 
                        echo '<option value="'.$row->categoryID.'">'.$row->categoryName.'</option>';
                        }
                    ?>
                    <option value="<50000">Under Rp. 50.000</option>
                    <option value="<150000">Under Rp. 150.000</option>
                    <option value=">250000">Above Rp. 250.000</option>
                </select>
                <input class="btn" type="submit" name="filter" value="Go">
            </form>


            <form class="form-inline col-4" action="<?php echo base_url();?>" method="post">
                <select class="form-control" name="fieldSort">
                    <option selected="selected" disabled="disabled" value="">Sort by</option>
                    <option value="price asc">Price Ascending</option>
                    <option value="price desc">Price Descending</option>
                    <option value="foodName asc">Food Name Ascending</option>
                    <option value="foodName desc">Food Name Descending</option>
                    <option value="stock asc">Stock Ascending</option>
                    <option value="stock desc">Stock Descending</option>
                </select>
                <input class="btn" type="submit" name="sort" value="Go">
            </form>
        </div>
    </div>

    <div class="container mt-5">
        <div class="card-columns">            
        <?php 
		    foreach($food as $f){ 
            ?>        
                <a href="<?php echo site_url('restaurant/product/'.$f->foodID);?>">
                <div class="card mb-5">
                    <img class="card-img-top" alt="picture of product" src="<?php echo site_url('assets/uploads/files/').$f->photoLink; ?>" width="200px">
                    <div class="body m-3">
                        <p class="card-title"><b><?php echo $f->foodName ?></b></p>
                        <p class="card-text"><?php echo $f->desc ?></p>
                        <p class="card-text"><?php echo 'Rp. '.$f->price ?></p>
                    </div>
                </div>
                </a>
		    <?php } ?>
        </div>
    </div>

    <?php echo $script; ?>
</body>
</html>