<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Tabel Customer
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
            <a class="btn btn-success" href="<?=site_url('customer/add');?>"><i class="fa fa-plus"></i> Add Customer</a>
        </div>
        <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Customer</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach($customer as $row){ ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row->nm_customer; ?></td>
                        <td><?php echo $row->alamat; ?></td>
                        <td><?php echo $row->no_telp; ?></td>
                        <td class="center">
                            <a class="btn btn-primary" href="<?=site_url('customer/edit/'. $row->id_customer); ?>" >
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a class="btn btn-danger" onclick="return confirm('Are you sure delete this data.....???')" href="<?=site_url('customer/delete/'. $row->id_customer); ?>" >
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


