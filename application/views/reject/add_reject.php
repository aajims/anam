
<script type='text/javascript'>
    var site = "<?php echo site_url();?>";
    $(function(){
        $('.form-control1').autocomplete({
            serviceUrl: site+'/reject/search',
            // fungsi ini akan dijalankan ketika user memilih salah satu hasil request
            onSelect: function (suggestion) {
                $('#wco').val(''+suggestion.wco);
                $('#tgl').val(''+suggestion.tgl);
            }
        });
    });
</script>
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Add Reject Produksi
        </div>
        <div class="panel-body">
            <form method="post" action="<?php echo site_url(); ?>reject/tambah" enctype="multipart/form-data" id="form">
                <div class="col-md-8 col-sm-8">
                    <div class="form-group">
                        <label>No WCO</label>
                        <input type="text" name="wco" id="wco" class="form-control1" placeholder="Input no wco" >
                    </div>
                    <div class="form-group">
                        <label>Tgl Produksi</label>
                        <input type="text" name="tgl" id="tgl" class="form-control" readonly >
                    </div>
                    <div class="form-group">
                        <label>Jenis Reject</label>
                        <select class="form-control" name="jenis">
                            <option value=""> --- Pilih Jenis --- </option>
                            <option value="Sumbing">Sumbing</option>
                            <option value="Penyok">Penyok</option>
                            <option value="Pecah">Pecah</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Qty Reject</label>
                        <input type="text" name="qty" class="form-control" placeholder="Input Qty Order" data-validation="required" >
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

