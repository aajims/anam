<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Add Plan Produksi
        </div>
        <div class="panel-body">
            <form method="post" action="<?php echo site_url(); ?>plan/tambah" enctype="multipart/form-data" id="form">
                <div class="col-md-8 col-sm-8">
                    <div class="form-group">
                        <label>No WCO</label>
                        <input type="text" name="wco" class="form-control" value="<?=$kodeunik; ?>" placeholder="Input no wco" readonly >
                    </div>
                    <div class="form-group">
                        <label>No Dies</label>
                        <input type="text" name="dies" class="form-control" placeholder="Input no dies" data-validation="required">
                    </div>
                    <div class="form-group">
                        <label>No Produk</label>
                        <input type="text" name="prod" class="form-control" placeholder="Input no Produk" data-validation="required">
                    </div>
                    <div class="form-group">
                        <label>Qty Order</label>
                        <input type="text" name="qty" class="form-control" placeholder="Input Qty Order" data-validation="required" >
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                        <a class="btn btn-danger" href="<?=site_url('plan'); ?>">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

