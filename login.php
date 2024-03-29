<?php
    include ('db_conn.php');
    if(isset($_SESSION['auth'])){
        if ($_SESSION['auth_role'] == "Admin"){
            if(!isset($_SESSION['status'])){
            $_SESSION['status'] = "You are already logged in";
            $_SESSION['status_code'] = "error";
            }
            header("Location: " . base_url . "admin");
            exit(0);
        }
        else if ($_SESSION['auth_role'] == "Staff"){
            if(!isset($_SESSION['status'])){
            $_SESSION['status'] = "You are already logged in";
            $_SESSION['status_code'] = "error";
            }
            header("Location: " . base_url . "admin");
            exit(0);
        }
    } 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login | Alma Laundry Management System</title>
        <!-- Favicons -->
        <link rel="shortcut icon" href="assets/files/system/system_logo.jpg" type="image/x-icon">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url ?>assets/files/system/system_logo.jpg">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url ?>assets/files/system/system_logo.jpg">
        <link rel="icon" href="assets/img/icon.png" type="image/x-icon">
        <link href="assets/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <!-- Include Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    </head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');
        *{
            animation: fade-in 1s ease-in-out forwards;
            font-family: "Poppins", sans-serif;
            font-weight: 500;
            font-style: normal;
        }
        #login-logo{
            animation: swipe 2.5s ease-in-out forwards;
        }
        @keyframes fade-in{
            from{
                opacity: 0;
            } to {
                opacity: 1;
            }
        }
        @keyframes swipe{
            from{
                opacity: 0;
                transform: translateX(-300px);
            } to {
                transform: translateX(0);
                opacity: 1;
            }
        }
    </style>
    <body class="bg-primary" style="background-image: url('assets/files/system/background.jpg'); background-repeat: no-repeat; background-size: cover;">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row d-flex align-items-center justify-content-center" style="min-height: 100vh;">
                            <div class="col-lg-6">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header" style="background-color: #95b9b9;">
                                        <h4 class="text-center my-4"><strong>ALMA LAUNDRY MANAGEMENT SYSTEM</strong></h4>
                                        <div style="widht: 100%;" class="text-center" id="login-logo">
                                            <img src="assets/files/system/loginlogo.png" style="width: 20%;" alt="Login Logo">
                                        </div>
                                    </div>
                                    <!-- <div class="d-none" style="text-align: center;">
                                        <img class="zoom img-fluid img-bordered-sm" src="<?php echo base_url ?>assets/files/system/system_logo.jpg" alt="image" style="max-width: 160px; object-fit: cover;">
                                    </div> -->
                                    <div class="card-body">
                                        <form action="logincode.php" method="POST">
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control" id="email" name="email" autocomplete="on">
                                                <label for="email">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="password" class="form-control" id="password" name="password">
                                                <label for="password">Password</label>
                                                <a href="javascript:void(0)"  style="position: relative; top: -2.5rem; left: -3%; cursor: pointer; color: black;">
                                                    <span class="password-toggle float-end"><i class="fa fa-eye"></i> Show</span>
                                                </a>
                                            </div>
                                            <!-- <small>By clicking login, you agree to the <a class="text-decoration-none" href="javascript:void(0);" data-toggle="modal" data-target="#System_Terms">terms</a> and <a class="text-decoration-none" href="javascript:void(0);" data-toggle="modal" data-target="#System_Privacy">privacy policy</a>.</small> -->
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="forgot.php">Forgot Password?</a>
                                                <button type="submit" name="btn_login" class="btn btn-primary">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url ?>assets/js/scripts.js"></script>
        <script src="<?php echo base_url ?>assets/js/sweetalert.js"></script>
        <!-- Show password login JavaScript -->
        <script src="<?php echo base_url ?>assets/js/show-password-login.js"></script>
        <?php include ('message.php'); ?>
    </body>
</html>
