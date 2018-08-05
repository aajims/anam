<script type='text/javascript'>
    var site = "<?php echo site_url();?>";
    $(function(){
        $('.form-control1').autocomplete({
            serviceUrl: site+'/produksi/search',
            // fungsi ini akan dijalankan ketika user memilih salah satu hasil request
            onSelect: function (suggestion) {
                $('#dies').val(''+suggestion.dies);
                $('#produk').val(''+suggestion.produk);
                $('#qty').val(''+suggestion.qty);
            }
        });
    });
    var sitee = "<?php echo site_url();?>";
    $(function(){
        $('.form-control1').autocomplete({
            serviceUrl: sitee+'/produksi/search_mesin',
            // fungsi ini akan dijalankan ketika user memilih salah satu hasil request
            onSelect: function (suggestion) {
                $('#id_mesin').val(''+suggestion.mesin);
                $('#kapasitas').val(''+suggestion.kapasitas);
            }
        });
    });
</script>
<script>
    function getkapasitas(id) {
        if(id != null)
        {
            $.ajax({
                url: "<?php echo site_url('produksi/get_kapasitas');?>",
                type: 'GET',
                dataType: 'json',
                data: {id: id},
                success: function(data) {
                    $("#kapasitas").val(data.kapasitas);
                }
            });
        }
    }
    function sum() {
        var jumlah = document.getElementById('jam').value;
        var downtime = document.getElementById('time').value;
        var result = parseInt(jumlah) - parseInt(downtime);
        var jam = (parseInt(jumlah) - parseInt(downtime)) / 60;
        if (!isNaN(result)) {
            document.getElementById('pakai').value = result;
        }
        var pakai = document.getElementById('pakai').value;
        var efektif = (parseInt(pakai) / parseInt(jumlah)) * 100;
        if (!isNaN(efektif)) {
            document.getElementById('efek').value = efektif;
        }

        var kapasitas = document.getElementById('kapasitas').value;
        var target = parseInt(jam) * parseInt(kapasitas);
        if (!isNaN(target)) {
            document.getElementById('target').value = target;
        }

        var hasil = document.getElementById('hasil').value;
//        var target = document.getElementById('target').value;
        var qty = document.getElementById('qty').value;
        var efesien = (parseInt(hasil) / parseInt(qty)) * 100;
        if (!isNaN(efesien)) {
            document.getElementById('efesien').value = efesien;
        }
        if (hasil > qty) {
            alert ('Jumlah hasil tidak bisa melebihi Order');
        } else {
            return true;
        }
    }
</script>
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Add Produksi
        </div>
        <form method="post" action="<?php echo site_url(); ?>produksi/tambah" enctype="multipart/form-data" id="form">
            <div class="panel-body">
                <div class="col-sm-6 col-sm-6">
                    <div class="form-group">
                        <label>No WCO</label>
                        <input type="text" name="wco" class="form-control1" placeholder="Input no wco" data-validation="required">
                    </div>
                    <div class="form-group">
                        <label>No Dies</label>
                        <input type="text" name="dies" id="dies" class="form-control" placeholder="Input no dies" readonly>
                    </div>
                    <div class="form-group">
                        <label>No Produk</label>
                        <input type="text" name="prod" id="produk" class="form-control" placeholder="Input no Produk" readonly>
                    </div>
                    <div class="form-group">
                        <label>Qty Order</label>
                        <input type="text" name="qty" id="qty" class="form-control" placeholder="Input Qty Order" readonly>
                    </div>
                    <div class="form-group">
                        <label>No Mesin</label>
                        <select class="form-control" name="id_mesin" data-validation="required" onchange="getkapasitas(this.value)">
                            <option value=""> ---  Pilih Mesin --- </option>
                            <?php foreach ($mesin as $row){ ?>
                                <option class="form-control" value="<?php echo $row->id_mesin; ?>"><?php echo $row->no_mesin; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kapasitas Mesin</label>
                        <input type="text" name="kapasitas" id="kapasitas" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama Operator</label>
                        <select class="form-control" name="opr" data-validation="required">
                            <option value=""> ---  Pilih Operator --- </option>
                            <?php foreach ($operator as $row){ ?>
                                <option class="form-control" value="<?php echo $row->id_operator; ?>"><?php echo $row->nm_operator; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6">
                    <label>Waktu Produksi(Menit)</label>
                    <div class="form-group input-group">
                        <input type="text" name="jam" id="jam" class="form-control" onkeyup="sum()" placeholder="Input jumlah Menit" data-validation="required">
                        <span class="input-group-addon"> Menit</span>
                    </div>
                    <label>Downtime(Menit)</label>
                    <div class="form-group input-group">
                        <input type="text" name="time" id="time" class="form-control" onkeyup="sum()" placeholder="Input jumlah downtime" data-validation="required">
                        <span class="input-group-addon"> Menit</span>
                    </div>
                    <label>Waktu Pakai(Menit)</label>
                    <div class="form-group input-group">
                        <input type="text" name="pakai" id="pakai" class="form-control" onkeyup="sum()" readonly>
                        <span class="input-group-addon"> Menit</span>
                    </div>
                    <div class="form-group">
                        <label>Qty hasil</label>
                        <input type="text" name="hasil" id="hasil" class="form-control" onkeyup="sum()" placeholder="Input Hasil" data-validation="required">
                    </div>
                    <div class="form-group">
                        <label>Target Produksi</label>
                        <input type="text" name="target" id="target" class="form-control" placeholder="Input jumlah target" readonly>
                    </div>
                    <label>Efektifitas Mesin(%)</label>
                    <div class="form-group input-group">
                        <input type="text" name="efek" id="efek" class="form-control" readonly>
                        <span class="input-group-addon"> %</span>
                    </div>
                    <label>Efesiensi Mesin(%)</label>
                    <div class="form-group input-group">
                        <input type="text" name="efesien" id="efesien" class="form-control" readonly>
                        <span class="input-group-addon"> %</span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                        <a class="btn btn-danger" href="<?=site_url('produksi'); ?>">Back</a>
                    </div>
                </div>
            </div>
         </form>
    </div>
</div>

