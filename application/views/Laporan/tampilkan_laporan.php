<section class="content-header">
  <h1>
    Laporan transaksi
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active mb-3">Laporan transaksi</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="box">
  	<div class="box-header">
	  	<form method="POST" action="<?php echo base_url('laporan')?>">
	  		<div class="form-group col-md-6">
	  			<label>Dari Tanggal</label>
	  			<input type="date" name="dari" class="form-control">
	  			<?php echo form_error('dari', '<span class="text-small text-danger">','</span>')?>
	  		</div>
	   		<div class="form-group col-md-6">
	  			<label>Sampai Tanggal</label>
	  			<input type="date" name="sampai" class="form-control">
	  			<?php echo form_error('sampai', '<span class="text-small text-danger">','</span>')?>
	  		</div>
	  		<button type="submit" class="btn btn-sm btn-primary">Tampilkan Data</button>
	  	</form><hr>

	  	<div class="btn-group">
	  		<a class="btn btn-s btn-success" target="_blank" href="<?php echo base_url(). 'laporan/print/?dari='.set_value('dari').'&sampai='.set_value('sampai') ?>"><i class="fa fa-print"></i>Print</a>
	  	</div>
  	</div>  		
  </div>
   	<div class="box-body table-responsive">
  		<table class="table table-bordered table-striped" id="table1">
  			<thead>
  				<tr>
  					<th>No</th>
            		<th>Tanggal</th>
  					   <th>Nama Pelanggan</th>
          			<th>Status</th>
           			<th>Total</th>
  				</tr>
  			</thead>
  			<tbody>
  				<?php 
  				$no = 1;
  				foreach($laporan as $data) {?>
  				<tr>
  					<td><?= $no++ ?></td>
  					<td><?= $data->tgl_transaksi ?></td>
		            <td><?= $data->nama_pelanggan ?></td>
		            <td><?= $data->status ?></td>
		            <td><?= $data->subtotal ?></td>
  				</tr>
  			<?php } ?>
  			</tbody>
  		</table> 		
  	</div>
</section>