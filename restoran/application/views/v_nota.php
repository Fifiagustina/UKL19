<div class="panel">
	<div class="panel-heading">
		<h3 class="panel-title">Laporan</h3>
	</div>
	<div class="panel-body">
		<table class="table" id="tabel">
			<thead>
				<tr>
					<th>Id Order</th>
					<th>No Meja</th>
					<th>Total bayar</th>
				</tr>
			</thead>
				<tbody>
					<?php
					 foreach ($data_nota as $dt_not) {
					 	echo'<tr>
					 		<td>'.$dt_not->id_detail_order.'</td>
					 		<td>'.$dt_not->no_meja.'</td>
					 		<td>'.$dt_not->total_bayar.'</td>
					 	';
					 }
					 ?>
				</tbody>
		</table>
	</div>
</div>

<script>
	window.print();
</script>