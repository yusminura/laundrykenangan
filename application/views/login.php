<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a ><b>Login</b>Page</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <?php echo $this->session->flashdata('message')?>
      <form class="user" method="post" action="<?php echo base_url('auth/login')?>">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username">
          <?php echo form_error('username','<div class="text-danger small ml-2">','</div>');?>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <?php echo form_error('password','<div class="text-danger small ml-2">','</div>');?>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
</html>