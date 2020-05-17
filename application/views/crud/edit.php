<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php echo $style; ?>

</head>
<body id="page-top">
    
    <div id="wrapper"/>
        <?php echo $sidebar; ?>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
                <?php echo $topbar; ?>
                <?php 
                    if($this->uri->segment(3) == "food"){
                        $linky=site_url('admin/food');
                        $text="Food Table";
                        $prod=$this->uri->segment(4);
                    }
                    else if($this->uri->segment(3) == "food_category"){
                        $linky=site_url('admin/food_category');
                        $text="Food Category Table";
                        $prod=$this->uri->segment(4);
                    }
                ?>

                
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit <?php echo $text;?></h1>
                        
                    </div>
                    <div class="mb-4">
                        
                        <a href="<?php echo $linky; ?>" class="text-primary"><?php echo $text; ?></a> / <span>ID <?php echo $prod; ?></span>
                    </div>
                    

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
                        </div>
                        <div class="card-body">

                        <?php if($this->uri->segment(3) == "food"){?>
                        <?php foreach($data as $d){?>
                        <!-- Food Table Edit Start -->
                        <?php echo form_open_multipart('admin/editFood');?>
                        <div class="form-group row">
                            <label for="foodName" class="col-sm-2 col-form-label">Food Name</label>
                            <div class="col-sm-10">
                            <input type="text"  class="form-control" name="foodName" id="foodName" value="<?php echo $d->foodName; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="foodCategory" class="col-sm-2 col-form-label">Food Category</label>
                            <div class="col-sm-10">
                            <select class="form-control" name="foodCategory" id="foodCategory">
                                <!-- Food Category Options -->
                                <?php foreach($cat as $c){?>
                                <option <?php if($d->foodCategory == $c->categoryID) echo "selected"?> value="<?php echo $c->categoryID; ?>"><?php echo $c->categoryName;?></option>
                                <?php } ?>
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="stock" class="col-sm-2 col-form-label">Stock</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" name="stock" id="stock" value="<?php echo $d->stock; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="photo" class="col-sm-2 col-form-label">Photo</label>
                            <div class="col-sm-10">
                            <input type="file" class="form-control-file" name="photo" id="photo">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="desc" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                            <textarea type="text" class="form-control" name="desc" id="desc" rows="3"><?php echo $d->desc; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-sm-2 col-form-label">Price</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" name="price" id="price" value="<?php echo $d->price; ?>">
                            </div>
                        </div>

                        <input type="hidden" name="link" value="admin/edit/food/<?php echo $d->foodID; ?>"/>
                        <input type="hidden" name="foodId" value="<?php echo $d->foodID;?>">
                        <input type="hidden" name="old_image" value="<?php echo $d->photoLink;?>">
                        <!-- Displaying errors -->
                        <div class="row">
                            <div class="col">
                                <div class="text-danger"><?php if($this->session->flashdata('failFood')){ echo $this->session->flashdata('failFood')['error'];
                                                                                                        echo $this->session->flashdata('failFood')['form']; } ?></div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <input class="btn btn-block btn-primary" type="submit" name="btnSubmit" value="Save Changes"/>
                        </div>
                        <?php echo form_close();?>
                        <!-- Food Table Edit End -->

                        <?php } ?>
                        <?php } else if($this->uri->segment(3) == "food_category"){ ?>
                        
                        <?php foreach($data as $d){?>
                        <!-- Food Table Edit Start -->
                        <?php echo form_open('admin/editFoodCategory');?>
                        <div class="form-group row">
                            <label for="id" class="col-sm-2 col-form-label">Category ID</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" name="id" id="id" value="<?php echo $d->categoryID; ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="categoryName" class="col-sm-2 col-form-label">Category Name</label>
                            <div class="col-sm-10">
                            <input type="text"  class="form-control" name="categoryName" id="categoryName" value="<?php echo $d->categoryName; ?>">
                            </div>
                            
                        </div>
                        <input type="hidden" name="link" value="admin/edit/food_category/<?php echo $d->categoryID; ?>"/>
                        <input type="hidden" name="categoryId" value="<?php echo $d->categoryID;?>">
                        <!-- Displaying errors -->
                        <div class="row">
                            <div class="col">
                                <div class="text-danger"><?php if($this->session->flashdata('fail')){ echo $this->session->flashdata('fail'); } ?></div>
                            </div>
                        </div>

                        <div class="row">
                            <input class="btn btn-block btn-primary" type="submit" name="btnSubmit" value="Save Changes"/>
                        </div>
                        <?php echo form_close();?>
                        <!-- Food Table Edit End -->
                        <?php } ?>

                        <?php } ?>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>

    <?php echo $script; ?>
</body>
</html>