<section class="content-header">
  <h1>
    Customer
    <small>Customer</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Customer</a></li>
    <li class="active"><?=ucfirst($page)?> Customer</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="box">
  	<div class="box-header">
  		<h3 class="box-title"> <?=ucfirst($page)?> Customer</h3>
  		<div class="pull-right">
  			<a href="<?=site_url('customer')?>" class="btn btn-warning btn-flat">
  				Kembali
  			</a>		
  		</div>
  	</div>
  	<div class="box-body">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
			<?php// echo validation_errors(); ?>
				<form action="<?=site_url('customer/proses')?>" method="post">
					<div class="form-group">
						<label>Nama *</label>
						<input type="hidden" name="id" value="<?=$row->id?>">
						<input type="text" name="name" value="<?=$row->name?>" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Alamat *</label>
						<textarea name="address" class="form-control" required><?=$row->address?></textarea>
					</div>
					<div class="form-group">
						<label>No. Telepon *</label>
						<input type="text" name="telepon" value="<?=$row->telepon?>" class="form-control" required>
					</div>
					<div class="form-group">
						<button type="submit" name="<?=$page?>" class="btn btn-success btn-flat" required>Simpan</button>
						<button type="Reset" class="btn btn-flat">Reset</button>
					</div>
				</form>
			</div>
		</div>		
  	</div>
  		
  </div>

</section>