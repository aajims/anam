<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Laporan Plan Produksi
        </div>
        <div class="panel-body">
            <?php echo form_open('produksi/laporan', array('id' => 'FormLaporan')); ?>
            <strong>Periode :</strong> <input type="text" class="datepicker" id="tanggal_dari" name="from" > s/d
            <input type="text" class="datepicker" value="<?php echo date('Y-m-d') ?>" id="tanggal_sampai" name="to">&nbsp;&nbsp;
            <button class="btn btn-primary btn-sm" type="submit" id="submit" name="submit">Tampilkan</button>
            <?php echo form_close(); ?>
            <br />
            <div id='result'></div>

            <script type="text/javascript">

                $(document).ready(function(){

                    $('#FormLaporan').submit(function(e){
                        e.preventDefault();

                        var TanggalDari = $('#tanggal_dari').val();
                        var TanggalSampai = $('#tanggal_sampai').val();

                        if(TanggalDari == '' || TanggalSampai == '')
                        {
                            $('.modal-dialog').removeClass('modal-lg');
                            $('.modal-dialog').addClass('modal-sm');
                            $('#ModalHeader').html('Oops !');
                            $('#ModalContent').html("Tanggal harus diisi !");
                            $('#ModalFooter').html("<button type='button' class='btn btn-primary' data-dismiss='modal' autofocus>Ok, Saya Mengerti</button>");
                            $('#ModalGue').modal('show');
                        }
                        else
                        {
                            var URL = "<?php echo site_url('plan/aksi_laporan'); ?>/" + TanggalDari + "/" + TanggalSampai;
                            $('#result').load(URL);
                        }
                    });
                });
            </script>
        </div>
    </div>
</div>
