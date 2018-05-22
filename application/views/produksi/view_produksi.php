<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Data Produksi
        </div>
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-info" role="alert">
                <span><?php echo $this->session->flashdata('success'); ?></span>
            </div>
        <?php elseif ($this->session->flashdata('edit')): ?>
            <div class="alert alert-info" role="alert">
                <span><?php echo $this->session->flashdata('edit'); ?></span>
            </div>
        <?php endif; ?>
        <div style="padding: 10px">
            <a class="btn btn-success" href="<?=site_url('produksi/add');?>"><i class="fa fa-plus"></i> Add Produksi</a>
        </div>
        <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Tgl Produksi</th>
                    <th>No WCO</th>
                    <th>Target</th>
                    <th>Waktu</th>
                    <th>waktu terpakai</th>
                    <th>Qty hasil</th>
                    <th>Efektif</th>
                    <th>Efesien</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach($produksi as $row){ ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo tgl_indo($row->tgl_produksi); ?></td>
                        <td><?php echo $row->no_wco; ?></td>
                        <td><?php echo $row->target; ?></td>
                        <td><?php echo $row->waktu; ?> Menit</td>
                        <td><?php echo $row->waktu_pakai; ?> Menit</td>
                        <td><?php echo $row->qty_hasil; ?></td>
                        <td><?php echo $row->efektifitas; ?> %</td>
                        <td><?php echo $row->efesiensi; ?> %</td>
                        <td class="center">
                            <a class="btn btn-default" href="<?=site_url('produksi/view/'. $row->id_produksi); ?>" >
                                <i class="fa fa-search"></i>
                            </a>
                            <a class="btn btn-primary" href="<?=site_url('produksi/edit/'. $row->id_produksi); ?>" >
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a class="btn btn-danger" onclick="return confirm('Are you sure delete this data.....???')" href="<?=site_url('produksi/delete/'. $row->id_produksi); ?>" >
                                <i class="fa fa-trash-o"></i>
                            </a>
                        </td>
                    </tr>
                    <?php $no++; }?>
                </tbody>
            </table>
        </div>
    </div>
</div>


