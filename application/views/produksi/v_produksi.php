
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            View Data Produksi
        </div>
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
                    </select>
                </div>
                <div class="form-group">
                    <label>Nama Operator</label>
                    <select class="form-control" name="opr" data-validation="required">
                        <option value="<?=$raw->id_operator; ?>"><?=$raw->nm_operator; ?></option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Target</label>
                    <input type="text" name="target" class="form-control" value="<?=$raw->target; ?>" placeholder="Input jumlah target">
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
                    <label>Tgl Produksi</label>
                    <input type="text" name="reject" class="form-control" value="<?=$raw->tgl_produksi; ?>" placeholder="Input jumlah reject">
                </div>
                <div class="form-group">
                    <?php
                    $sess_level = $this->session->userdata('level');
                    if ($sess_level == "admin") { ?>
                    <a class="btn btn-danger" href="<?=site_url('produksi/views'); ?>">Back</a>
                    <?php } else { ?>
                    <a class="btn btn-danger" href="<?=site_url('produksi'); ?>">Back</a>
                    <?php ;} ?>
                </div>
            </div>
        </div>
    </div>
</div>

