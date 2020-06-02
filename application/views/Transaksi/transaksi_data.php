<section class="content-header">
  <h1>
    Jenis transaksi
    <small>Data transaksi</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Jenis transaksi</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="box">
  	<div class="box-header">
  		<h3 class="box-title">Data transaksi</h3>
  		<div class="pull-right">
  			<a href="<?=site_url('transaksi/add')?>" class="btn btn-primary btn-flat">
  				Tambah
  			</a>		
  		</div>
  	</div>
  	<div class="box-body table-responsive">
  		<table class="table table-bordered table-striped" id="table1">
  			<thead>
  				<tr>
  					<th>No</th>
            <th>Tanggal</th>
  					<th>Nama Pelanggan</th>
            <th>Nama Paket</th>
            <th>Berat</th>
            <th>Harga</th>
            <th>Total</th>
  					<th>Action</th>
  				</tr>
  			</thead>
  			<tbody>
  				<?php 
  				$no = 1;
  				foreach($transaksi as $data) {?>
  				<tr>
  					<td><?= $no++ ?></td>
  					<td><?= $data->tgl_transaksi ?></td>
            <td><?= $data->nama_pelanggan ?></td>
            <td><?= $data->nama_paket ?></td>
            <td><?= $data->berat ?></td>
            <td><?= $data->harga ?></td>
            <td><?= $data->subtotal ?></td>
  					<td class="text-center" width="160px">
                <a href="<?=site_url('transaksi/delete/'.$data->id)?>" onclick="return confirm('are you sure?')" class="btn btn-danger btn-flat btn-s">
                  <i class="fa fa-trash"></i>
                </a>
                <a href="<?php echo base_url('transaksi/cetak/'.$data->id)?>" class="btn btn-success btn-flat btn-s">
                  <i class="">Cetak</i>
                </a>
  					</td>
  				</tr>
  			<?php } ?>
  			</tbody>
  		</table> 		
  	</div>
  		
  </div>

</section>