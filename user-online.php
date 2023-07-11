<?php
        $session = session_id();
        $time = time();
        $time_out_in_secend = 10;
        $time_out = $time - $time_out_in_secend;

        $query = "SELECT * FROM user_online WHERE session = '$session'";
        $send_query = mysqli_query($con, $query);
        $count = mysqli_num_rows($send_query);

        if($count == NULL) {
        mysqli_query($con,"INSERT INTO user_online(session, time) VALUES('$session', '$time')");
        }else{
        mysqli_query($con,"UPDATE user_online SET time = '$time' WHERE session = '$session'");
        }
        $user_online = mysqli_query($con,"SELECT * FROM user_online WHERE time > '$time_out'");
        $count_user = mysqli_num_rows($user_online);
    ?>