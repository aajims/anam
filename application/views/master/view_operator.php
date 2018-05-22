<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Tabel User
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
            <a class="btn btn-success" href="<?=site_url('operator/add');?>"><i class="fa fa-plus"></i> Add operator</a>
        </div>
        <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nik</th>
                    <th>Nama Lengkap</th>
                    <th>Telepon</th>
                    <th>Bagian</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach($operator as $row){ ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row->nik; ?></td>
                        <td><?php echo $row->nm_operator; ?></td>
                        <td><?php echo $row->no_telp; ?></td>
                        <td><?php echo $row->bagian; ?></td>
                        <td class="center">
                            <a class="btn btn-primary" href="<?=site_url('operator/edit/'. $row->id_operator); ?>" >
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a class="btn btn-danger" onclick="return confirm('Are you sure delete this data.....???')" href="<?=site_url('operator/delete/'. $row->id_operator); ?>" >
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


