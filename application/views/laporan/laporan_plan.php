<?php if($prod->num_rows() > 0) { ?>

	<table class='table table-bordered'>
		<thead>
			<tr>
			 <th>No</th>
                <th>Tgl Produksi</th>
                <th>No WCO</th>
                <th>Jenis Reject</th>
                <th>Qty</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			foreach($prod->result() as $row)
			{
				echo "
					<tr>
						<td>".$no."</td>
						<td>".tgl_indo($row->tgl_produksi)."</td>
						<td>".$row->no_wco."</td>
						<td>".$row->jenis_reject."</td>
						<td>".$row->qty."</td>						
					</tr>
				";
				$no++;
			}

			?>
		</tbody>
	</table>

	<p>
		<?php
		$from 	= date('Y-m-d', strtotime($from));
		$to		= date('Y-m-d', strtotime($to));
		?>
		<a href="<?php echo site_url('reject/laporan_prod_pdf/'.$from.'/'.$to); ?>" target='blank' class='btn btn-default'><img width="45" height="45" src="<?php echo base_url(); ?>assets/img/pdf.jpg"> Export ke PDF</a>
	</p>
	<br />
<?php } ?>

<?php if($prod->num_rows() == 0) { ?>
<div class='alert alert-info'>
Data dari tanggal <b><?php echo $from; ?></b> sampai tanggal <b><?php echo $to; ?></b> tidak ditemukan
</div>
<br />
<?php } ?>
                    