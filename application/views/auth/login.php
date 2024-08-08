<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="<?PHP echo config_item("assets_url"); ?>/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?PHP echo config_item("assets_url"); ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?PHP echo config_item("assets_url"); ?>/dist/css/adminlte.min.css">

  <script type="text/javascript" src="<?PHP echo config_item("assets_url"); ?>/plugins/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="<?PHP echo config_item("assets_url"); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="<?PHP echo config_item("assets_url"); ?>/dist/js/adminlte.min.js"></script>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <p><b>BSRU</b>LAB</p>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">ลงชื่อเข้าใช้งาน
        </p>

        <form action="" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="อีเมล/รหัสประจำตัว">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="material-icons">person</span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="รหัสผ่าน">
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
        <!-- /.social-auth-links -->

        <p class="mb-1">
          <a href="forgot-password.html">ลืมรหัสผ่าน</a>
        </p>
        <p class="mb-0">
          <a href="register.html" class="text-center">สมัครสมาสิก</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->
</body>

</html>