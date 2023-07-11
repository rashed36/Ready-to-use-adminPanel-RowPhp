<?php session_start();
ob_start();
require "../connection.php";
$email = "";
$name = "";
$errors = array();
    //if user click login button
    if(isset($_POST['login'])){
        $email=$_POST['email'];
        $password=($_POST['password']);
        $enctpassword=md5($password);
        $check_email = "SELECT * FROM usertable WHERE email = '$email'";
        $res = mysqli_query($con, $check_email);
        if(mysqli_num_rows($res) > 0){
            $sel="SELECT * FROM usertable WHERE email='$email' AND password='$enctpassword'";
            $query=mysqli_query($con,$sel);
            $data=mysqli_fetch_assoc($query);
            if(($data)){
                $_SESSION['id']=$data['id'];
                $_SESSION['name']=$data['name'];
                $_SESSION['email']=$data['email'];
                $_SESSION['role']=$data['role_id'];
                $_SESSION['image']=$data['image'];
                if(isset($_POST['remember_checkbox'])){
                    //set cookie
                    setcookie('emailcookie',$email,time()+86400);
                    setcookie('passwordcookie',$password,time()+86400); 
                    header('location: ../index.php');
                    }else{            
                        header('location: ../index.php');  
                        }
                header('location: ../index.php');
            }else{
                $errors['email'] = "Incorrect email or password!";
            }
        }else{
                $errors['email'] = "It's look like you're not yet a member! Ask To Admin Register a new membership.";
            }
    }
    
    //if user click continue button in forgot password form
    if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $check_email = "SELECT * FROM usertable WHERE email='$email'";
        $run_sql = mysqli_query($con, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE usertable SET code = $code WHERE email = '$email'";
            $run_query =  mysqli_query($con, $insert_code);
            if($run_query){
                $subject = "Password Reset Code";
                $message = "Your password reset code is $code";
                $sender = "From: rashed4pa@gmail.com";
                // if(mail($email, $subject, $message, $sender)){
                    $info = "We've sent a passwrod reset otp to your email - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    header('location: reset-code.php');
                    exit();
                // }else{
                //     $errors['otp-error'] = "Failed while sending code!";
                // }
            }else{
                $errors['db-error'] = "Something went wrong!";
            }
        }else{
            $errors['email'] = "This email address does not exist!";
        }
    }

    //if user click check reset otp button
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM usertable WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            header('location: new-password.php');
            exit();
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }else{
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $encpass=md5($_POST['password']);
            $update_pass = "UPDATE usertable SET code = $code, password = '$encpass' WHERE email = '$email'";
            $run_query = mysqli_query($con, $update_pass);
            if($run_query){
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: password-changed.php');
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }
    
   //if login now button click
    if(isset($_POST['login-now'])){
        header('Location: login.php');
    }
?>