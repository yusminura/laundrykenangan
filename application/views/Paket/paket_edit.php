<section class="content-header">
  <h1>
    Jenis Paket
    <small>Data Paket</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Jenis Paket</a></li>
    <li class="active">Edit Data Paket</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="box">
  	<div class="box-header">
  		<h3 class="box-title"> Edit Data Paket</h3>
  		<div class="pull-right">
  			<a href="<?=site_url('paket')?>" class="btn btn-warning btn-flat">
  				Kembali
  			</a>		
  		</div>
  	</div>
  	<div class="box-body">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
			<?php// echo validation_errors(); ?>
				<form action="" method="post">
          <div class="form-group <?=form_error('fullname') ? 'has-error' : null ?>">
            <label>Harga *</label>
            <input type="hidden" name="id" value="<?=$row->id?>">
            <input type="text" name="fullname" value="<?=$this->input->post('fullname') ?? $row->nama_paket?>" class="form-control">
            <?=form_error('fullname')?>
          </div>
          <div class="form-group <?=form_error('harga') ? 'has-error' : null ?>">
            <label>Harga *</label>
            <input type="text" name="harga" value="<?=$this->input->post('harga') ?? $row->harga?>" class="form-control">
            <?=form_error('harga')?>
          </div>
					<div class="form-group">
						<button type="submit" class="btn btn-success btn-flat">Simpan</button>
						<button type="Reset" class="btn btn-flat">Reset</button>
					</div>
				</form>
			</div>
		</div>		
  	</div>
  		
  </div>

</section>