<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <?php echo $style;?>
</head>
<body>
    <?php echo $navbar; ?>
    <div class="container mt-5 mb-5">
        <?php if($this->session->flashdata('change')){?>
        <div class="alert alert-success mt-3" role="alert">
            <?php echo $this->session->flashdata('change'); ?>
        </div>
        <?php } ?>
        <div class="row">
            <div class="col-lg-4 col-12 text-center mb-3">
                <img class="img-profile" src="<?php echo site_url('assets/uploads/profile/').$this->session->userdata('pic'); ?>" style="width:340px;height:340px;object-fit:cover;">
                <a class="btn btn-primary btn-block mt-3" href="#" data-toggle="modal" data-target="#pictureModal">Change picture</a>
                *Allowed extension: png, jpg
            </div>
            <div class="col">
                <div class="row mb-3">
                    <div class="col">
                        <span class="text-dark" style="font-weight:500;">Change Bio Data</span>
                    </div class="col">
                </div>
                <div class="row mb-3">
                    <div class="col-3">
                        Name
                    </div>
                    <div class="col">
                    <span><?php echo $self->displayName; ?></span>&nbsp;&nbsp;&nbsp;<a href="#" data-toggle="modal" data-target="#nameModal" class="text-primary" style="text-decoration:none;font-size:14px;">Change</a>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-3">
                        Birth Date
                    </div>
                    <div class="col">
                    <?php echo date("d M Y", strtotime($self->birthDate)); ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <span class="text-dark" style="font-weight:500;">Contact Details</span>
                    </div class="col">
                </div>
                <div class="row mb-3">
                    <div class="col-3">
                        E-mail
                    </div>
                    <div class="col">
                    <?php echo $self->email; ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
    

    <?php echo $script; ?>

    <!-- Modal Profile Picture -->
    <div class="modal fade" id="pictureModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Change Profile Picture</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <?php echo form_open_multipart('profile/editPic');?>
            <div class="form-group row">
                <label for="photo" class="col-sm-2 col-form-label">Photo</label>
                <div class="col-sm-10">
                <input type="file" class="form-control-file" name="photo" id="photo">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <input type='submit' class="btn btn-primary" value='Submit'>
        </div>
        </div>
        <?php echo form_close();?>
    </div>
    </div>

    <!-- Modal Profile Picture -->
    <div class="modal fade" id="nameModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Change Display Name</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <?php echo form_open('profile/editName');?>
            <div class="form-group">
                <label for="name">Name</label>
                <div >
                <input type="text" class="form-control" name="name" id="name" value="<?php echo $self->displayName;?>">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <input type='submit' class="btn btn-primary" value='Submit'>
        </div>
        </div>
        <?php echo form_close();?>
    </div>
    </div>


</body>
</html>


