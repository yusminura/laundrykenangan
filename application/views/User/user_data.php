<section class="content-header">
  <h1>
    User
    <small>Data User</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Kelola User</a></li>
    <li class="active">User</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box">
  	<div class="box-header">
  		<h3 class="box-title">Data User</h3>
  		<div class="pull-right">
  			<a href="<?=site_url('user/add')?>" class="btn btn-primary btn-flat">
  				Tambah
  			</a>		
  		</div>
  	</div>
  	<div class="box-body table-responsive">
  		<table class="table table-bordered table-striped" id="table1">
  			<thead>
  				<tr>
  					<th>No</th>
  					<th>Username</th>
  					<th>Name</th>
  					<th>Address</th>
  					<th>Telepon</th>
            <th>Level</th>
  					<th>Action</th>
  				</tr>
  			</thead>
  			<tbody>
  				<?php 
  				$no = 1;
  				foreach($row->result() as $key => $data) {?>
  				<tr>
  					<td><?= $no++ ?></td>
  					<td><?= $data->username ?></td>
  					<td><?= $data->name ?></td>
  					<td><?= $data->address ?></td>
  					<td><?= $data->telepon ?></td>
            <td><?= $data->level == 1 ? "Admin" : "Pegawai" ?></td>
  					<td class="text-center" width="160px">
              <form action="<?=site_url('user/delete')?>" method="post">
    						<a href="<?=site_url('user/edit/'.$data->id_user)?>" class="btn btn-warning btn-flat btn-s">
    							<i class="fa fa-pencil"></i>
    						</a>
                <input type="hidden" name="id_user" value="<?=$data->id_user?>">
      					<button onclick="return confirm('are you sure?')" class="btn btn-danger btn-flat btn-s">
      							<i class="fa fa-trash"></i>
      					</button>
              </form>
  					</td>
  				</tr>
  			<?php } ?>
  			</tbody>
  		</table> 		
  	</div>
  		
  </div>

</section>