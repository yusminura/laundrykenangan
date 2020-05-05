  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Data Pegawai</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard')?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('pegawai')?>">Data Pegawai</a></li>
              <li class="breadcrumb-item active">Tambah Data Pegawai</li>
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
          <!-- left column -->
   
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form action="<?= base_url('pegawai/tambah_pegawai') ?>" method="post">
                  <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="nama_pegawai">Nama Pegawai</label>
                        <input type="text" class="form-control <?= form_error('nama') ? 'is-invalid':'' ?>" id="nama" name="nama" placeholder="Nama Pegawai" >
                    <div class="invalid-feedback">
                                    <?= form_error('nama'); ?>
                    </div>
                    </div>

                    <div class="col-sm2">
                        <label for="username"> Username</label>
                        <input type="username" class="form-control <?= form_error('username') ? 'is-invalid':'' ?>" id="username" name="username" placeholder="Username" >
                    <div class="invalid-feedback">
                                    <?= form_error('username'); ?>
                    </div>
                    </div>

                    <div class="col-sm-2">
                        <label for="alamat">Alamat</label>
                        <input type="alamat" class="form-control <?= form_error('alamat') ? 'is-invalid':'' ?>" id="alamat" name="alamat" placeholder="Alamat Pegawai" >
                    <div class="invalid-feedback">
                                    <?= form_error('alamat'); ?>
                    </div>
                    </div>

                    <div class="col-sm-2">
                        <label for="Telepon Pegawai">Telepon </label>
                        <input type="telepon" class="form-control <?= form_error('telepon') ? 'is-invalid':'' ?>" id="telepon" name="telepon" placeholder="telepon" >
                    <div class="invalid-feedback">
                                    <?= form_error('telepon'); ?>
                    </div>
                    </div>


                    
                    <div>
                      <br>
                    
                      <button type="submit" class="btn btn-primary">Submit</button>
  
                </br>
                </div>
                  </div>
                     </form>
            </div>
            <!-- /.card -->
          </div>

          <!--/.col (left) -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->