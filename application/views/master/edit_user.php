<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Add User
        </div>
        <div class="panel-body">
            <form method="post" action="<?php echo site_url(); ?>user/update" enctype="multipart/form-data" id="form">
                <div class="col-md-8 col-sm-8">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="hidden" name="id" value="<?=$car->id_user; ?>">
                        <input type="text" name="username" class="form-control" value="<?=$car->username; ?>" placeholder="Input Username" data-validation="required" >
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="pass" class="form-control" placeholder="Kosongkan Jika tidak di rubah">
                    </div>
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" value="<?=$car->nama; ?>" placeholder="Input Nama Lengkap" data-validation="required" >
                    </div>
                    <div class="form-group">
                        <label>No Telepon</label>
                        <input type="text" name="telp" class="form-control" value="<?=$car->no_telp; ?>" placeholder="Input No Hanphone" data-validation="length" data-validation-length="10-12">
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <select name="level" class="form-control" >
                            <option value="<?=$car->level; ?>"><?=$car->level; ?></option>
                            <option value="">-- Pilih Level --</option>
                            <option value="Staff PPIC">Staff PPIC</option>
                            <option value="Staff Produksi">Staff Produksi</option>
                            <option value="Kepala Departemen">Kepala Departemen</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                        <a class="btn btn-danger" href="<?=site_url('user'); ?>">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

