<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Form</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
   <!-- jQuery -->
  <script src="../assets/plugins/jquery/jquery.min.js"></script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="login.php" class="h2"><b>Login</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="login.php" method="post" id="myFrom">
      <?php
        if(count($errors) > 0){
      ?>
        <div class="alert alert-danger text-center">
      <?php
        foreach($errors as $showerror){
           echo $showerror;
        }
      ?>
        </div>
      <?php } ?>
        <div class="form-group input-group mb-3">
          <input type="email" name="email" value="<?php if(isset($_COOKIE['emailcookie'])){ echo $_COOKIE['emailcookie'];} ?>" class="form-control" placeholder="User Name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="form-group input-group mb-3">
          <input type="password" name="password" value="<?php if(isset($_COOKIE['passwordcookie'])){ echo $_COOKIE['passwordcookie'];} ?>" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember_checkbox">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1">
        <a href="forgot-password.php">I forgot my password</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>

<!-- /.validation -->
<script type="text/javascript">
$(document).ready(function () {
  $('#myFrom').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 6
      }
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a <em>vaild</em> email address",
      },
      password: {
        required: "Please enter password",
        minlength: "Password will be minimum 6 characters or numbers",
      } 
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
<!-- Jquery Validation -->
<script src="../assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../assets/plugins/jquery-validation/additional-methods.min.js"></script>
</body>
</html>
