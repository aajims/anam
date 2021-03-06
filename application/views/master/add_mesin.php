<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Add Mesin
        </div>
        <div class="panel-body">
            <form method="post" action="<?php echo site_url(); ?>mesin/tambah" enctype="multipart/form-data" id="form">
                <div class="col-md-8 col-sm-8">
                    <div class="form-group">
                        <label>No Mesin</label>
                        <input type="text" name="no" class="form-control" placeholder="Input No Mesin" data-validation="required" >
                    </div>
                    <div class="form-group">
                        <label>Kapasitas</label>
                        <input type="text" name="kap" class="form-control" placeholder="Input kapasitas" data-validation="min-length" data-validation-length="10">
                    </div>
                    <div class="form-group">
                        <label>Jenis Mesin</label>
                        <select class="form-control" name="jenis" data-validation="required">
                            <option value=""> ---  Pilih Jenis Mesin --- </option>
                            <option value="Auto"> Auto </option>
                            <option value="Manual"> Manual </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Line Mesin</label>
                        <select class="form-control" name="line" data-validation="required">
                            <option value=""> ---  Pilih Line Mesin --- </option>
                            <option value="Element"> Element </option>
                            <option value="HD"> HD </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                        <a class="btn btn-danger" href="<?=site_url('mesin'); ?>">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

