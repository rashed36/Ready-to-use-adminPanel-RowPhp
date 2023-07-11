<?php require_once "controllerUserData.php"; ?>
<?php 
  $email = $_SESSION['email'];
  if($email == false){
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Create a New Password</title>

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
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="forgot-password.php" class="h2"><b>New Password</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg"></p>
      <form action="new-password.php" method="post" id="myFrom" autocomplete="off">
      <?php include('errors.php'); ?>
        <div class="form-group input-group mb-3">
            <input class="form-control" type="password" id="password" name="password" placeholder="Create new password">
        </div>
        <div class="form-group input-group mb-3">
            <input class="form-control" type="password" name="cpassword" placeholder="Confirm your password">
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" name="change-password" class="btn btn-primary btn-block">Change</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- <p class="mt-3 mb-1">
        <a href="login.php">Login</a>
      </p> -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<!-- /.validation -->
<script type="text/javascript">
$(document).ready(function () {
  $('#myFrom').validate({
    rules: {
        password: {
        required: true,
        minlength: 6
      },
      cpassword: {
        required: true,
        equalTo: '#password'
      }
    },
    messages: {
        password: {
        required: "Please enter password",
        minlength: "Password will be minimum 6 characters or numbers",
      },
      password2: {
        required: "Please enter confirm password",
        equalTo: "Confirm password dos't match",
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
