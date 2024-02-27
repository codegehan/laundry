<?php
    if (!defined('DB_SERVER')){
        include ('../includes/authentication.php');
        // DB connection parameters
        $host = DB_SERVER;
        $user = DB_USERNAME;
        $password = DB_PASSWORD;
        $db = DB_NAME;
        $dsn = "mysql:host=$host;dbname=$db;charset=UTF8";
        $user_date = date;
        $curr_user_id = $_SESSION['auth_user']['user_id'];
        try{
           $conn = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        } catch (PDOException $e){
           echo $e->getMessage();
        }
        // PHP Mailer
        include ("../../assets/vendor/PHPMailer/PHPMailerAutoload.php");
        include ("../../assets/vendor/PHPMailer/class.phpmailer.php");
        include ("../../assets/vendor/PHPMailer/class.smtp.php");
    }

    // Add inventory
    if(isset($_POST["add_inventory"])) {
        $inv_name = $_POST['inv_name'];
        $inv_qty = $_POST['inv_qty'];
        $inv_avail = $_POST['inv_qty'];
        $inv_status = $_POST['inv_status'];

        $query = "INSERT INTO `inventory`(`inv_name`, `inv_qty`, `inv_avail`, `inv_status`) VALUES ('$inv_name','$inv_qty','$inv_avail','$inv_status')";
        $query_run = mysqli_query($con, $query);

        if($query_run) {
            $_SESSION['status'] = "Inventory added successfully";
            $_SESSION['status_code'] = "success";
            header("Location: " . base_url . "admin/home/inventory");
            exit(0);
        } else {
            $_SESSION['status'] = "Inventory was not added";
            $_SESSION['status_code'] = "error";
            header("Location: " . base_url . "admin/home/inventory");
            exit(0);
        }
    }

    // Edit inventory
    if(isset($_POST["edit_inventory"])) {
        $inv_id = $_POST["inv_id"];
        $inv_name = $_POST['inv_name'];
        $inv_qty = $_POST['inv_qty'];
        $inv_avail = $_POST['inv_qty'];
        $inv_status = $_POST['inv_status'];

        $query = "UPDATE `inventory` SET `inv_name`='$inv_name',`inv_qty`='$inv_qty',`inv_avail`='$inv_avail',`inv_status`='$inv_status' WHERE `inv_id`='$inv_id'";
        $query_run = mysqli_query($con, $query);

        if($query_run) {
            $_SESSION['status'] = "Inventory updated successfully";
            $_SESSION['status_code'] = "success";
            header("Location: " . base_url . "admin/home/inventory");
            exit(0);
        } else {
            $_SESSION['status'] = "Inventory was not update";
            $_SESSION['status_code'] = "error";
            header("Location: " . base_url . "admin/home/inventory");
            exit(0);
        }
    }

    // Delete inventory
    if(isset($_POST['delete_inventory'])) {
        $inv_id= $_POST['inv_id'];
        $query = "UPDATE `inventory` SET `inv_status` = 'Archive' WHERE inv_id = $inv_id ";
        $query_run = mysqli_query($con, $query);

        if($query_run) {
            $_SESSION['status'] = "Inventory deleted successfully";
            $_SESSION['status_code'] = "success";
            header("Location: " . base_url . "admin/home/inventory");
            exit(0);
        } else {
            $_SESSION['status'] = "Inventory was not delete";
            $_SESSION['status_code'] = "error";
            header("Location: " . base_url . "admin/home/inventory");
            exit(0);
        } 
    }
?>