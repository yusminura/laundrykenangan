<section class="content-header">
  <h1>
    Laporan transaksi
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Laporan transaksi</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="box">
  	<div class="box-header">
  		<h3 class="box-title">Filter Laporan Transaksi</h3>
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
	  	</form>
  	</div>  		
  </div>
</section>