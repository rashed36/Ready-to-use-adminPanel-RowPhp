<?php
require_once('function/function.php');
// Add User part.
if(isset($_POST['add_user'])){
    $usertype = $_POST['usertype'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = md5($_POST['password2']);
    $email_check = "SELECT * FROM usertable WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);
    if(mysqli_num_rows($res) > 0){
        error("error","Email that you have entered is already exist!");
        header('Location:add-user.php');
    }else{
            $insert="INSERT INTO usertable(name,email,password,role_id)
            VALUES('$name','$email','$password2','$usertype')";
            if(mysqli_query($con,$insert)){
                success("success","New User Created Successfully.");
                header('Location:add-user.php');
            }
            else{
                error("error","Opps! User Registration Faield!");
                header('Location:add-user.php');
                
            }
        }
    }  
// edit user part.  
if(isset($_POST['edit_user'])){
    $e_id = $_POST['e_id'];
    $name=$_POST['name'];
    $usertype=$_POST['usertype'];
    $update = "UPDATE usertable SET name='$name', role_id='$usertype' WHERE id='$e_id'";
    if(mysqli_query($con,$update)){
        success("success","User Update Successfully."); 
        header('Location:view-user.php');
    }
    else{
        error("error","Opps! User update Faield!");
        header('Location:view-user.php');
    }
}

//edit Profile part.
if(isset($_POST['edit_profile'])){
    $id = $_POST['id'];
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $gender=$_POST['gender'];
    $old_image=$_POST['old_image'];
    $image=$_FILES['image'];
    $imageName='';
    if($image['name']!=''){
        
        $imageName='user-'.time().'-'.rand(100000,9999999999).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
        $update = "UPDATE usertable SET name='$name', phone='$phone', address='$address', gender='$gender', image='$imageName'  WHERE id='$id'";
        $query = mysqli_query($con,$update);
        unlink("upload/".$old_image);
    }else{
            $imageName = $old_image;
            $update = "UPDATE usertable SET name='$name', phone='$phone', address='$address', gender='$gender', image='$imageName'  WHERE id='$id'";
            $query = mysqli_query($con,$update);
        }
            if($query){
                if($image != ''){
                    move_uploaded_file($image['tmp_name'],'upload/'.$imageName);
                }
                success("success","Profile Update Successfully."); 
                header('Location:view-profile.php');
            }else{
            error("error","Opps! Update User Faield!");
            header('Location:edit-profile.php');
            }
}

// Change User Password part.
if(isset($_POST['chg_pass'])){
    $id = $_POST['id'];
    $old_password = md5($_POST['old_password']);
    $new_password = $_POST['new_password'];
    $confm_password = md5($_POST['confm_password']);

    $pass_check = "SELECT * FROM usertable WHERE id='$id' AND password='$old_password'";
    $query=mysqli_query($con,$pass_check);
    $data=mysqli_fetch_assoc($query);
            if(($data)){
                $update_pass="UPDATE usertable SET password='$confm_password' WHERE id='$id'";
                $query=mysqli_query($con,$update_pass);
                success("success","Password Changed Successfully.");
                header('Location:change-password.php');
            }else{
                error("error","Opps! You Entered Wrong Password!");
                header('Location:change-password.php');
            }
    }  
?>
