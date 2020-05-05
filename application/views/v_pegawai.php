  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data pegawai</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard')?>">Home</a></li>
              <li class="breadcrumb-item active">Data Pegawai</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
          </div>
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><a href="<?php echo base_url('pegawai/tambah_pegawai')?>"><button class="btn btn-block btn-outline-primary"><b><i class="fas fa-plus"></i> Tambah Data</b></button></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Alamat</th>
                  <th>Telepon</th>
                   <th colspan="2"><center>Aksi</center></th>
                </tr>
                </thead>
               
                <?php 
                  $no=1;
                  foreach($pegawai as $pegawai) : 
                ?>

                <tbody>
                <tr>
                  <td><?php echo $no++;                       ?></td>
                  <td><?php echo $pegawai->nama_pegawai       ?></td>
                  <td><?php echo $pegawai->user_pegawai       ?></td>
                  <td><?php echo $pegawai->alamat_pegawai     ?></td>
                  <td><?php echo $pegawai->telepon_pegawai    ?></td>
                 <td> <center><a href="<?= base_url('pegawai/ubah_pegawai') ?>?id=<?= $pegawai->id_pegawai ?>" class="btn btn-outline-warning"> Ubah </a></center></td>
                  <td><center><a href="<?= base_url('pegawai/hapus_pegawai') ?>?id=<?= $pegawai->id_pegawai ?>" class="btn btn-outline-danger"> Hapus </a></center></td>
                </tr>
                </tbody>
                <?php endforeach; ?> 
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->