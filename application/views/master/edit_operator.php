<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Add User
        </div>
        <div class="panel-body">
            <form method="post" action="<?php echo site_url(); ?>operator/update" enctype="multipart/form-data" id="form">
                <div class="col-md-8 col-sm-8">
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="hidden" name="id" value="<?=$car->id_operator; ?>">
                        <input type="text" name="nik" class="form-control" value="<?=$car->nik; ?>" placeholder="Input NIK" data-validation="required" >
                    </div>
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" value="<?=$car->nm_operator; ?>" placeholder="Input Nama Lengkap" data-validation="required" >
                    </div>
                    <div class="form-group">
                        <label>No Telepon</label>
                        <input type="text" name="telp" class="form-control" value="<?=$car->no_telp; ?>" placeholder="Input No Hanphone" data-validation="length" data-validation-length="10-12">
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <select name="bag" class="form-control" >
                            <option value="<?=$car->bagian; ?>"><?=$car->bagian; ?></option>
                            <option value="">-- Pilih Bagian --</option>
                            <option value="Proses">Proses</option>
                            <option value="Produksi">Produksi</option>
                            <option value="Finishing">Finishing</option>
                        </select>
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

