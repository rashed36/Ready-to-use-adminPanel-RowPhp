<?php session_start();
ob_start();
//database Connection
require_once('connection.php');
//Navber Section
function get_header(){
    require_once('includes/header.php');
}
// sideber section
function get_sideber(){
    require_once('includes/sideber.php');
}
//footer section
function get_footer(){
    require_once('includes/footer.php');
}
//User Online
function user_online(){
    require_once('user_online.php');
}
//find id by get login function
function getLogGID(){
    return $_SESSION['id']? true:false;
}
// check Login Function
function needLogged(){
    $check=getLogGID();
    if(!$check){
        header('Location:auth/login.php');
    }
}
//Flash error Message 
function error($name, $text = '') {
    if(isset($_SESSION[$name])){
        $error = $_SESSION[$name];
        unset($_SESSION[$name]);
        return $error;
    }else{
        $_SESSION[$name] = $text;
    }
    return '';
}
//Flash Success Message 
function success($name, $text = '') {
    if(isset($_SESSION[$name])){
        $success = $_SESSION[$name];
        unset($_SESSION[$name]);
        return $success;
    }else{
        $_SESSION[$name] = $text;
    }
    return '';
}
//Flash Info Message 
function info($name, $text = '') {
    if(isset($_SESSION[$name])){
        $info = $_SESSION[$name];
        unset($_SESSION[$name]);
        return $info;
    }else{
        $_SESSION[$name] = $text;
    }
    return '';
}

?>
