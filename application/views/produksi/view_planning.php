<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Tabel Produksi
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

        </div>
        <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr>
                    <th>No</th>
                    <th>No WCO</th>
                    <th>No DIES</th>
                    <th>No Produk</th>
                    <th>Qty Order</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach($plan as $row){ ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row->no_wco; ?></td>
                        <td><?php echo $row->no_dies; ?></td>
                        <td><?php echo $row->no_produk; ?></td>
                        <td><?php echo $row->qty; ?></td>
                    </tr>
                    <?php $no++; }?>
                </tbody>
            </table>
        </div>
    </div>
</div>


