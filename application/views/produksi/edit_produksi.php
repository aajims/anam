<script>
    function sum() {
        var jumlah = document.getElementById('jam').value;
        var downtime = document.getElementById('time').value;
        var result = parseInt(jumlah) - parseInt(downtime);
        if (!isNaN(result)) {
            document.getElementById('pakai').value = result;
        }
        var pakai = document.getElementById('pakai').value;
        var efektif = parseInt(pakai) / parseInt(jumlah) * 100;
        if (!isNaN(efektif)) {
            document.getElementById('efek').value = efektif;
        }
        var qty = document.getElementById('hasil').value;
        var target = document.getElementById('target').value;
        var efesien = parseInt(qty) / parseInt(target) * 100;
        if (!isNaN(efesien)) {
            document.getElementById('efesien').value = efesien;
        }
    }
</script>
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Edit Data Produksi
        </div>
        <form method="post" action="<?php echo site_url(); ?>produksi/update" enctype="multipart/form-data" id="form">
            <div class="panel-body">
                <div class="col-sm-6 col-sm-6">
                    <div class="form-group">
                        <label>No WCO</label>
                        <input type="hidden" name="id" value="<?=$raw->id_produksi; ?>">
                        <input type="text" name="wco" class="form-control1" value="<?=$raw->no_wco; ?>" placeholder="Input no wco" readonly>
                    </div>
                    <div class="form-group">
                        <label>No Dies</label>
                        <input type="text" name="dies" id="dies" class="form-control" value="<?=$raw->no_dies; ?>" placeholder="Input no dies" readonly>
                    </div>
                    <div class="form-group">
                        <label>No Produk</label>
                        <input type="text" name="prod" id="produk" value="<?=$raw->no_produk; ?>" class="form-control" placeholder="Input no Produk" readonly>
                    </div>
                    <div class="form-group">
                        <label>Qty Order</label>
                        <input type="text" name="qty" id="qty" value="<?=$raw->qty; ?>" class="form-control" placeholder="Input Qty Order" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama Mesin</label>
                        <select class="form-control" name="mesin" data-validation="required">
                            <option value="<?=$raw->id_mesin; ?>"><?=$raw->no_mesin; ?></option>
                            <option value=""> ---  Pilih Mesin --- </option>
                            <?php foreach ($mesin as $row){ ?>
                                <option class="form-control" value="<?php echo $row->id_mesin; ?>"><?php echo $row->no_mesin; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Operator</label>
                        <select class="form-control" name="opr" data-validation="required">
                            <option value="<?=$raw->id_operator; ?>"><?=$raw->nm_operator; ?></option>
                            <option value=""> ---  Pilih Operator --- </option>
                            <?php foreach ($operator as $row){ ?>
                                <option class="form-control" value="<?php echo $row->id_operator; ?>"><?php echo $row->nm_operator; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Target</label>
                        <input type="text" name="target" id="target" class="form-control" value="<?=$raw->target; ?>" placeholder="Input jumlah target" data-validation="required">
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <label>Waktu Produksi(Menit)</label>
                    <div class="form-group input-group">
                        <input type="text" name="jam" id="jam" class="form-control" onkeyup="sum()" value="<?=$raw->waktu; ?>" placeholder="Input jumlah Menit" data-validation="required">
                        <span class="input-group-addon"> Menit</span>
                    </div>
                    <label>Downtime(Menit)</label>
                    <div class="form-group input-group">
                        <input type="text" name="time" id="time" class="form-control" onkeyup="sum()" value="<?=$raw->downtime; ?>" placeholder="Input jumlah downtime" data-validation="required">
                        <span class="input-group-addon"> Menit</span>
                    </div>
                    <label>Waktu Pakai(Menit)</label>
                    <div class="form-group input-group">
                        <input type="text" name="pakai" id="pakai" class="form-control" onkeyup="sum()" value="<?=$raw->waktu_pakai; ?>" readonly>
                        <span class="input-group-addon"> Menit</span>
                    </div>
                    <div class="form-group">
                        <label>Qty hasil</label>
                        <input type="text" name="hasil" id="hasil" class="form-control" onkeyup="sum()" value="<?=$raw->qty_hasil; ?>" placeholder="Input Hasil" data-validation="required">
                    </div>
                    <label>Efektifitas Mesin(%)</label>
                    <div class="form-group input-group">
                        <input type="text" name="efek" id="efek" class="form-control" value="<?=$raw->efektifitas; ?>" readonly>
                        <span class="input-group-addon"> %</span>
                    </div>
                    <label>Efektifitas Mesin(%)</label>
                    <div class="form-group input-group">
                        <input type="text" name="efesien" id="efesien" class="form-control" value="<?=$raw->efesiensi; ?>" readonly>
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

