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
            <h1 class="m-0">Manage Profile</h1>
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
                        <?php
                          $id = $_SESSION['id'];
                          $query = mysqli_query($con,"SELECT * FROM usertable NATURAL JOIN user_role WHERE id='$id'");
                          $data = mysqli_fetch_array($query);
                        ?>
                            <div class="card-body box-profile">
                            <div class="text-center">
                              <?php if(($data['image'])!='') {?>
                                <img class="profile-user-img img-fluid img-circle" src="upload/<?php echo $data['image']; ?>" alt="User profile picture">
                              <?php }else{?>
                                <img class="profile-user-img img-fluid img-circle" src="assets/dist/img/avatar4.png" alt="User profile picture">
                              <?php }?>
                            </div>
                            <h3 class="profile-username text-center"><?php echo $data['name'];?></h3>
            
                            <p class="text-muted text-center"><?php echo $data['role_name'];?></p>
            
                           <table width="100%" class="table table-bordered">
                               <tbody>
                                   <tr>
                                       <td>Mobile No</td>
                                       <td><?php echo $data['phone'];?></td>
                                   </tr>
                                   <tr>
                                        <td>Email</td>
                                        <td><?php echo $data['email'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td><?php echo $data['gender'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td><?php echo $data['address'];?></td>
                                    </tr>

                               </tbody>
                           </table>
                           <br>
                            <a href="edit-profile.php" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
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