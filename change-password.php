<?php
require_once('function/function.php');
require_once('user-online.php'); 
needLogged();
get_header();
get_sideber();
?>
<!-- Main Content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Change Password</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">User Online : <a href="#"><?php echo $count_user; ?></a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
       
          <div class="row">
                <section class="col-md-4 offset-md-4">
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                            <div class="text-center">
                                <h1 class="m-0">Change Password</h1>
                            </div>
                            <hr>
                            <form action="controller.php" method="POST" id="valChangePass">
                            <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
                                <div class="form-group col-md-12">
                                    <label for="old_password">Old Password</label>
                                    <input type="password" name="old_password" id="old_password" placeholder="Enter Old Password" class="form-control">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="new_password">New Password</label>
                                    <input type="password" id="new_password" name="new_password" placeholder="Enter New Password" class="form-control">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="confm_password"> Confirm Password</label>
                                    <input type="password" name="confm_password" id="confm_password" placeholder="Confirm Password" class="form-control">
                                </div>
                
                            <br>
                                
                                <input class="btn btn-primary btn-block" type="submit" value="Change Password" name="chg_pass" class="btn btn-primary">
                            </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                </section>
          </div>
        </div>
      </section>
  </div>
<!-- /.content-wrapper -->
<!-- Main Content -->
<?php get_footer() ?>