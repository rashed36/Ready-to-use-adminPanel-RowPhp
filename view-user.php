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
                            <h3>User List</h3>
                            <a class="btn btn-success float-right btn-sm" href="add-user.php"><i
                                    class="fa fa-plus-circle"></i> Add User</a>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $select="SELECT * FROM usertable NATURAL JOIN user_role ORDER BY id DESC";
                                    $query=mysqli_query($con,$select);
                                    $i=1;
                                    while($data=mysqli_fetch_assoc($query)){
                                ?>
                                    <tr>
                                        <td><?php $check=$i++;if($check<10){echo "0".$check;}else{echo $check; }?></td>
                                        <td>
                                            <?php if($data['image']!='') {?>
                                            <img style="height:50px; max-width:80px;" class="img-thumbnail"
                                                src="upload/<?= $data['image']; ?>" alt="">
                                            <?php }else{?>
                                            <img style="height:50px; max-width:80px;" class="img-thumbnail"
                                                src="upload/no_image.jpg" alt="">
                                            <?php }?>
                                        </td>
                                        <td><?= $data['name']; ?></td>
                                        <td><?= $data['email']; ?></td>
                                        <td><?= $data['role_name']; ?></td>
                                        <td>
                                            <a title="Edit" class="btn btn-sm btn-primary"
                                                href="edit-user.php?id=<?php echo $data['id']; ?>"><i class="fa fa-edit"></i></a>
                                            <a title="Delete" id="delete" class="btn btn-sm btn-danger"
                                                href="del-controller.php?del_id_user=<?php echo $data['id']; ?>"><i
                                                    class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
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