<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Edit Plan Produksi
        </div>
        <div class="panel-body">
            <form method="post" action="<?php echo site_url(); ?>plan/update" enctype="multipart/form-data" id="form">
                <div class="col-md-8 col-sm-8">
                    <div class="form-group">
                        <label>No WCO</label>
                        <input type="hidden" name="id" value="<?=$car->id_plan; ?>">
                        <input type="text" name="wco" class="form-control" value="<?=$car->no_wco; ?>" placeholder="Input no wco" readonly >
                    </div>
                    <div class="form-group">
                        <label>No Dies</label>
                        <input type="text" name="dies" class="form-control" value="<?=$car->no_dies; ?>" placeholder="Input no dies" data-validation="required">
                    </div>
                    <div class="form-group">
                        <label>No Produk</label>
                        <input type="text" name="prod" class="form-control" value="<?=$car->no_produk; ?>" placeholder="Input no Produk" data-validation="required">
                    </div>
                    <div class="form-group">
                        <label>Qty Order</label>
                        <input type="text" name="qty" class="form-control" value="<?=$car->qty; ?>" placeholder="Input Qty Order" data-validation="required">
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

