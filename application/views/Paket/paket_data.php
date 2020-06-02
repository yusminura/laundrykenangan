<section class="content-header">
  <h1>
    Jenis Paket
    <small>Data Paket</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Jenis Paket</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="box">
  	<div class="box-header">
  		<h3 class="box-title">Data Paket</h3>
  		<div class="pull-right">
  			<a href="<?=site_url('paket/add')?>" class="btn btn-primary btn-flat">
  				Tambah
  			</a>		
  		</div>
  	</div>
  	<div class="box-body table-responsive">
  		<table class="table table-bordered table-striped" id="table1">
  			<thead>
  				<tr>
  					<th>No</th>
  					<th>Nama Paket</th>
  					<th>Harga</th>
  					<th>Action</th>
  				</tr>
  			</thead>
  			<tbody>
  				<?php 
  				$no = 1;
  				foreach($row->result() as $key => $data) {?>
  				<tr>
  					<td><?= $no++ ?></td>
  					<td><?= $data->nama_paket ?></td>
  					<td><?= $data->harga ?></td>
  					<td class="text-center" width="160px">
                <a href="<?=site_url('paket/edit/'.$data->id)?>" class="btn btn-warning btn-flat btn-s">
                  <i class="fa fa-pencil"></i>
                </a>
                <a href="<?=site_url('paket/delete/'.$data->id)?>" onclick="return confirm('are you sure?')" class="btn btn-danger btn-flat btn-s">
                  <i class="fa fa-trash"></i>
                </a>
  					</td>
  				</tr>
  			<?php } ?>
  			</tbody>
  		</table> 		
  	</div>
  		
  </div>

</section>