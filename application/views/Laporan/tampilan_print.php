
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: Laporan Pemasukan Harian Laundry ::.</title>
<style type="text/css">

#judul {
 width:100%;
 margin-bottom:20px;
 text-align:center;
}

.gradeX {
	 text-align:center;
}

.gradey {
	  margin-left:20px;
}


</style>
<link href="../css/style.default.css" rel="stylesheet" type="text/css" />
<div id='contentwrapper' class='contentwrapper'>
<div id="judul">
<br />
<br />
<font size="+2">LAPORAN LAUNDRY KENANGAN </font><br />
Rungkut Asri BArat 1B no.3 <br />
Hp.  089527734416 Email : lkenangan@gmail.com

<table>
<tr>
	<td>Dari Tanggal</td>
	<td>:</td>
	<td><?php echo date('d-M-Y',strtotime($_GET['dari']));?></td>
</tr>
<tr>
	<td>Sampai Tanggal</td>
	<td>:</td>
	<td><?php echo date('d-M-Y',strtotime($_GET['sampai']));?></td>
</tr>
</table>
<hr color="#eee" />   </div>


	  <table border="1" cellpadding='0' cellspacing='0' border='0' class='stdtable' id='dyntable2'>
	  <colgroup>
	  <col class='con0' style='width: 4%' />
	  <col class='con1' />
	  <col class='con0' />
	  <col class='con1' />
	  <col class='con0' />
	  </colgroup>
		  <thead>
	            <tr>
	            <th>No</th>
	            <th>Tgl. Transaksi</th>
	            <th>Customer</th>
	            <th>Paket</th>
	            <th>Berat (kg)</th>
	            <th>Harga</th>
	            <th>Status Order</th>
	            <th>Total</th>
	            </tr>
	        </thead>
	        <?php 
	  				$no = 1;
	  				foreach($laporan as $data) {?>
	        <tbody>
	        	<tr class='.gradey' >		        
			        <td>ORD-<?= $data->id ?></td>
			        <td><?= $data->tgl_transaksi ?></td>
		            <td><?= $data->nama_pelanggan ?></td>
		            <td><?= $data->nama_paket ?></td>
		            <td><?= $data->berat ?></td>
		            <td><?= $data->harga ?></td>
					<td><?= $data->status ?></td>
					<td><?= $data->subtotal ?></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	  </div></div> 
</body>
<script type="text/javascript">
  window.print();
</script>

</html>

