<?php echo form_open_multipart('profile/editprofile');?>
    <div class="form-group row">
        <label for="photo" class="col-sm-2 col-form-label">Photo</label>
        <div class="col-sm-10">
        <input type="file" class="form-control-file" name="photo" id="photo">
        </div>
    </div>

    <input type='submit' value='submit'>

<?php echo form_close();?>
