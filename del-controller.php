<?php
require_once('function/function.php');

// delete user part.  
$id = $_GET['del_id_user'];

$query = mysqli_query($con,"SELECT * FROM usertable WHERE id='$id'");
$data = mysqli_fetch_array($query);
unlink("upload/".$data['image']);

$delete = "DELETE FROM usertable WHERE id='$id'";
if(mysqli_query($con,$delete)){
    success("success","Delete User Successful.");
    header('Location:view-user.php');
}else{
    error("error","Opps! Delete User Faield!");
    header('Location:view-user.php');
}
?>