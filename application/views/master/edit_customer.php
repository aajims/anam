<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Add User
        </div>
        <div class="panel-body">
            <form method="post" action="<?php echo site_url(); ?>customer/update" enctype="multipart/form-data" id="form">
                <div class="col-md-8 col-sm-8">
                    <div class="form-group">
                        <label>Nama Customer</label>
                        <input type="hidden" name="id" value="<?=$car->id_customer; ?>">
                        <input type="text" name="nama" class="form-control" value="<?=$car->nm_customer; ?>" placeholder="Input Nama Customer" data-validation="required" >
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="<?=$car->alamat; ?>" placeholder="Input alamat" data-validation="min-length" data-validation-length="10">
                    </div>
                    <div class="form-group">
                        <label>No Telepon</label>
                        <input type="text" name="telp" class="form-control" value="<?=$car->no_telp; ?>" placeholder="Input No Hanphone" data-validation="length" data-validation-length="10-12">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                        <a class="btn btn-danger" href="<?=site_url('operator'); ?>">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

