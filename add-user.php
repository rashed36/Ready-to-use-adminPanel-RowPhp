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
            <h1 class="m-0">Manage User</h1>
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
        <section class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Add User</h3>
                    <a class="btn btn-success float-right btn-sm" href="view-user.php"><i class="fa fa-list"></i> User List</a>
                </div>
                <div class="card-body">
                <form method="post" action="controller.php" id="val_user">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="usertype">User Role</label>
                                <select name="usertype" id="usertype" value="" class="form-control">
                                    <option value=""> Select Role</option>
                                        <?php
                                            $select="SELECT * FROM user_role ORDER BY role_id";
                                            $query=mysqli_query($con,$select);
                                            while($data=mysqli_fetch_assoc($query)){
                                        ?>
                                            <option value="<?= $data['role_id']; ?>"> <?= $data['role_name']; ?> </option>
                                        <?php } ?>
                                </select>
                        </div>
                         <div class="form-group col-md-4">
                            <label for="usertype"> Name</label>
                            <input type="text" name="name" value="" placeholder="Enter User Name" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="usertype"> Email</label>
                            <input type="email" name="email" value="" placeholder="abc@gmail.com" class="form-control">
                            
                        </div>
                        <div class="form-group col-md-4">
                            <label for="usertype"> Password</label>
                            <input type="password" id="password" name="password" placeholder="Enter Password" class="form-control">
                        </div>
                         <div class="form-group col-md-4">
                            <label for="usertype"> Confirm Password</label>
                            <input type="password" name="password2" placeholder="Confirm Password " class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="submit" name="add_user" value="Submit" class="btn btn-primary">
                        </div>
                    </div>
                </form>
              </div>
            </div>
        </section>
         
        </div>
      </div>
    </section>
  </div>
<!-- /.content-wrapper -->
<!-- Main Content -->
<?php get_footer() ?>