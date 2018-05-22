<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Add User
        </div>
        <div class="panel-body">
            <form method="post" action="<?php echo site_url(); ?>user/tambah" enctype="multipart/form-data" id="form">
                <div class="col-md-8 col-sm-8">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control"  placeholder="Input Username" data-validation="required" >
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="pass" class="form-control" placeholder="Input Password Min 6 Character" data-validation="length" data-validation-length="6-12">
                    </div>
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" placeholder="Input Nama Lengkap" data-validation="required">
                    </div>
                    <div class="form-group">
                        <label>No Telepon</label>
                        <input type="text" name="telp" class="form-control" placeholder="Input No Hanphone" data-validation="length" data-validation-length="10-12">
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <select name="level" class="form-control" data-validation="required">
                            <option value="">-- Pilih Level --</option>
                            <option value="admin">Staff Admin</option>
                            <option value="staff">Staff Produksi</option>
                            <option value="kepala">Kepala Departemen</option>
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

