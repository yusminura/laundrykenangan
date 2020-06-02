    <section class="content-header">
      <h1>
        Dashboard
        <small>Lanudry Kenangan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

            <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $count_baru?></h3>

              <p>Penghasilan hari ini</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $count_pegawai?></h3>

              <p>Total Pegawai</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $countdaily?></h3>

              <p>Transaksi hari ini</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $counttransaksi ?></h3>

              <p>Total Transaksi</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
<h5 class=" box-title"><i class='fa fa-clock-o'></i>Recent Order</h5>
    <div class="box-body table-responsive">
      <table class="table table-bordered table-striped" id="table1">
        <thead>
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama Pelanggan</th>
            <th>Total</th>
            <th>Paket</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $no = 1;
          foreach($recent as $data) {?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= $data->tgl_transaksi ?></td>
            <td><?= $data->nama_pelanggan ?></td>
            <td><?= $data->nama_paket ?></td>
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
    </section>