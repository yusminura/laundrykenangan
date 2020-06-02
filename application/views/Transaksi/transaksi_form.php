<section class="content-header">
  <h1>
    Transaksi
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Tambah Data Transaksi</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="box">
    <div class="box-header">
      <h3 class="box-title"> <?=ucfirst($page)?> Data Transaksi</h3>
      <div class="pull-right">
        <a href="<?=site_url('transaksi')?>" class="btn btn-warning btn-flat">
          Kembali
        </a>    
      </div>
    </div>
    <div class="box-body">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
      <?php// echo validation_errors(); ?>
        <form action="<?=site_url('transaksi/proses')?>" method="post">
          <div class="form-group">
            <label>Nama Customer</label>
            <input type="hidden" name="id" value="<?=$row->id?>">
            <input type="text" name="name" value="<?=$row->nama_pelanggan?>" class="form-control" >
          </div>
          <div class="form-group">
            <label>Telepon</label>
            <input type="text" name="telepon" value="<?=$row->telepon?>" class="form-control">
          </div>
          <div class="form-group">
            <label>Paket</label>
            <select name="paket" class="form-control">
                <option value="">-Pilih-</option>
              <?php foreach($paket->result() as $key => $data) { ?>
                <option value="<?=$data->id?>"<?=$data->nama_paket == $row->id ? 'selected' : null ?>><?=$data->nama_paket?> <?=$data->harga?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label>Harga</label>
            <select name="harga" class="form-control">
                <option value="">-Pilih-</option>
              <?php foreach($harga->result() as $key => $data) { ?>
                <option value="<?=$data->harga?>" <?=$data->harga == $row->id ? "selected" : null ?>><?=$data->harga?> </option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label>Berat (kg)</label>
            <input type="number" min="1" max="100" name="berat" value="<?=$row->berat?>" class="form-control">
          </div>
          <div class="form-group">
            <label>Tanggal Ambil</label>
            <input type="date" name="tgl_ambil" value="<?=$row->tgl_ambil?>" class="form-control">
          </div>
          <div class="form-group">
            <button type="submit" name="<?=$page?>" onclick="return confirm('are you sure?')" class="btn btn-success btn-flat">Simpan</button>
            <button type="Reset" class="btn btn-flat">Reset</button>
          </div>
        </form>
      </div>
    </div>    
    </div>
      
  </div>

</section>