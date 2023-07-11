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
            <h1 class="m-0">Manage profile</h1>
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
        <?php
            $id = $_SESSION['id'];
            $query = mysqli_query($con,"SELECT * FROM usertable WHERE id='$id'");
            $data = mysqli_fetch_array($query);
        ?>
        <div class="row">
        <section class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Profile</h3>
                    <a class="btn btn-success float-right btn-sm" href="view-profile.php"><i class="fa fa-list"></i> Go Back</a>
                </div>
                <div class="card-body">
                <form method="post" action="controller.php" id="" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $data['id']?>">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="usertype"> Name</label>
                            <input type="text" name="name" value="<?= $data['name']?>" placeholder="Enter User Name" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="usertype"> Email</label>
                            <input type="email" name="email" value="<?= $data['email']?>" placeholder="abc@gmail.com" class="form-control" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="usertype"> Mobile No</label>
                            <input type="text" name="phone" value="<?= $data['phone']?>" placeholder="Enter User mobile" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="usertype"> Address</label>
                            <input type="text" name="address" value="<?= $data['address']?>" placeholder="Enter User address" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="gender"> Gender</label>
                            <select name="gender" id="gender" value="<?= $data['gender']?>" class="form-control">
                                <option value=""> Select Gender</option>
                                <option value="Male" <?php if($data['gender']=='Male'){ echo 'selected' ; } ?>> Male</option>
                                <option value="Female" <?php if($data['gender']=='Female'){ echo 'selected' ; } ?>>Female</option>
                            </select>
                        </div>
                        
                        <div class="form-group col-md-4">
                            <label for="image"> Image</label>
                            <input type="file" name="image" id="image" value="" class="form-control">
                            <input type="hidden" name="old_image" id="old_image" value="<?= $data['image']?>" class="form-control">
                        </div>
                        <div class="form-group col-md-2">
                        <?php if(($data['image'])!='') {?>
                            <img id="showImage" src="upload/<?php echo $data['image']; ?>" style="width: 150px;height: 160px; border:1px solid #000;">
                              <?php }else{?>
                                <img id="showImage" src="upload/no_image.jpg" style="width: 150px;height: 160px; border:1px solid #000;">
                              <?php }?>
                        </div>
                        <div class="form-group col-md-2" style="padding-top: 50px;">
                            <input type="submit" value="Update" name="edit_profile" class="btn btn-primary">
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