<?php if($prod->num_rows() > 0) { ?>

	<table class='table table-bordered'>
		<thead>
			<tr>
			 <th>No</th>
                <th>Tgl Produksi</th>
                <th>No WCO</th>
                <th>Produk</th>
                <th>Mesin</th>
                <th>Operator</th>
                <th>Target</th>
                <th>Waktu</th>
                <th>Downtime</th>
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
						<td>".$row->no_produk."</td>
						<td>".$row->no_mesin."</td>
						<td>".$row->nm_operator."</td>
						<td>".number_format($row->target)."</td>
						<td>".number_format($row->waktu)."</td>
						<td>".number_format($row->downtime)."</td>	
					</tr>
				";
				$no++;
			}

			?>
		</tbody>
	</table>

	<p>


	</p>
	<br />
<?php } ?>

<?php if($prod->num_rows() == 0) { ?>
<div class='alert alert-info'>
Data dari tanggal <b><?php echo $from; ?></b> sampai tanggal <b><?php echo $to; ?></b> tidak ditemukan
</div>
<br />
<?php } ?>
                    