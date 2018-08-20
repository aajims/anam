<?php if($prod->num_rows() > 0) { ?>

	<table class='table table-bordered'>
		<thead>
			<tr>
			 <th>No</th>
                <th>Tgl Plan</th>
                <th>No WCO</th>
                <th>No DIES</th>
                <th>No Produk</th>
                <th>Qty</th>
                <th>Keterangan</th>
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
						<td>".tgl_indo($row->tgl_plan)."</td>
						<td>".$row->no_wco."</td>
						<td>".$row->no_dies."</td>
						<td>".$row->no_produk."</td>
						<td>".$row->qty."</td>
						<td>".$row->keterangan."</td>						
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
		<a href="<?php echo site_url('plan/laporan_prod/'.$from.'/'.$to); ?>" target='blank' class='btn btn-default'><img width="45" height="45" src="<?php echo base_url(); ?>assets/img/pdf.jpg"> Export ke PDF</a>
	</p>
	<br />
<?php } ?>

<?php if($prod->num_rows() == 0) { ?>
<div class='alert alert-info'>
Data dari tanggal <b><?php echo $from; ?></b> sampai tanggal <b><?php echo $to; ?></b> tidak ditemukan
</div>
<br />
<?php } ?>
                    