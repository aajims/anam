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
            <a class="btn btn-success" href="<?=site_url('reject/add');?>"><i class="fa fa-plus"></i> Add Reject</a>
        </div>
        <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Tgl Produksi</th>
                    <th>No WCO</th>
                    <th>Jenis Reject</th>
                    <th>Qty </th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach($reject as $row){ ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo tgl_indo($row->tgl_produksi); ?></td>
                        <td><?php echo $row->no_wco; ?></td>
                        <td><?php echo $row->jenis_reject; ?></td>
                        <td><?php echo $row->qty; ?></td>
                        <td class="center">
                            <a class="btn btn-primary" href="<?=site_url('reject/edit/'. $row->id_reject); ?>" >
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a class="btn btn-danger" onclick="return confirm('Are you sure delete this data.....???')" href="<?=site_url('reject/delete/'. $row->id_reject); ?>" >
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


