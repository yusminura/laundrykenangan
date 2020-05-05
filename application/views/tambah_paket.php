  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Data paket</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard')?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('paket')?>">Data paket</a></li>
              <li class="breadcrumb-item active">Tambah Data paket</li>
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
               <form action="<?= base_url('paket/tambah_paket') ?>" method="post">
                  <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="jenis_paket">Jenis paket</label>
                        <input type="text" class="form-control <?= form_error('jenis') ? 'is-invalid':'' ?>" id="jenis" name="jenis" placeholder="Jenis paket" >
                    <div class="invalid-feedback">
                                    <?= form_error('jenis'); ?>
                    </div>
                    </div>

                    <div class="col-sm2">
                        <label for="harga_paket"> Harga Paket</label>
                        <input type="harga" class="form-control <?= form_error('harga') ? 'is-invalid':'' ?>" id="harga" name="harga" placeholder="harga" >
                    <div class="invalid-feedback">
                                    <?= form_error('harga'); ?>
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