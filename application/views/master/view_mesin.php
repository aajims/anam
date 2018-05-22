<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Tabel Mesin
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
            <a class="btn btn-success" href="<?=site_url('mesin/add');?>"><i class="fa fa-plus"></i> Add Mesin</a>
        </div>
        <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr>
                    <th>No</th>
                    <th>No Mesin</th>
                    <th>Kapasitas</th>
                    <th>Jenis</th>
                    <th>Line</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach($mesin as $row){ ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row->no_mesin; ?></td>
                        <td><?php echo $row->kapasitas; ?></td>
                        <td><?php echo $row->jenis_mesin; ?></td>
                        <td><?php echo $row->line; ?></td>
                        <td class="center">
                            <a class="btn btn-primary" href="<?=site_url('mesin/edit/'. $row->id_mesin); ?>" >
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a class="btn btn-danger" onclick="return confirm('Are you sure delete this data.....???')" href="<?=site_url('mesin/delete/'. $row->id_mesin); ?>" >
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


