<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Edit Plan Produksi
        </div>
        <div class="panel-body">
            <form method="post" action="<?php echo site_url(); ?>reject/update" enctype="multipart/form-data" id="form">
                <div class="col-md-8 col-sm-8">
                    <div class="form-group">
                        <label>No WCO</label>
                        <input type="hidden" name="id" value="<?=$car->id_reject; ?>">
                        <input type="text" name="wco" class="form-control" value="<?=$car->no_wco; ?>" placeholder="Input no wco" readonly >
                    </div>
                    <div class="form-group">
                        <label>Tgl Produksi</label>
                        <input type="text" name="tgl" id="tgl" class="form-control1" value="<?=$car->tgl_produksi; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Jenis Reject</label>
                        <select class="form-control" name="jenis">
                            <option value="<?=$car->jenis_reject; ?>"><?=$car->jenis_reject; ?></option>
                            <option value=""> --- Pilih Jenis --- </option>
                            <option value="Sumbing">Sumbing</option>
                            <option value="Penyok">Penyok</option>
                            <option value="Pecah">Pecah</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Qty Order</label>
                        <input type="text" name="qty" class="form-control" value="<?=$car->qty; ?>" placeholder="Input Qty Order" data-validation="required">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                        <a class="btn btn-danger" href="<?=site_url('reject'); ?>">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

