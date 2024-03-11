<?php
    include('db_conn.php');

    if(isset($_POST['btn_login'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $login_query = "SELECT * FROM account WHERE `email` = '$email' AND password = '$password' LIMIT 1";
        $login_query_run = mysqli_query($con, $login_query);

        if(mysqli_num_rows($login_query_run) > 0){
            $query = mysqli_query($con, "UPDATE account SET lastlogin = CURRENT_TIMESTAMP() WHERE `email` = '$email' AND password = '$password'");
            foreach($login_query_run as $data){
                $user_id = $data['user_id'];
                $full_name = $data['fname'].' '.$data['lname'];
                $role_as = $data['user_type'];
                $user_email = $data['email'];
            }

            $_SESSION['auth'] = true;
            $_SESSION['auth_role'] = "$role_as";
            $_SESSION['auth_user'] = [
                'user_id' =>$user_id,
                'user_name' =>$full_name,
                'user_email' =>$user_email,
            ];

            if( $_SESSION['auth_role'] == 'Admin' ){
                header("Location: " . base_url . "admin");
                exit(0);
            } else if ($_SESSION['auth_role'] == 'Staff') {
                header("Location: " . base_url . "admin");
                exit(0);
            }
        }
        else {
            $msg = "Invalid email and password";
            echo "<script>alert('$msg');</script>";
            echo "<script>window.location='" . base_url . "login';</script>";
            exit(0);
        }
    }
    else {
        $_SESSION['status'] = "You are not allowed to access this site";
        $_SESSION['status_code'] = "error";
        header("Location: " . base_url . "login");
        exit(0);
    }

?>