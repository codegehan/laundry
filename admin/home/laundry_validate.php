<?php
if (!defined('DB_SERVER')){
    include ('../includes/authentication.php');
}


if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $worker = $_GET['worker'];

    $sql = "CALL markdone('$id','$worker')";
    $sql_run = mysqli_query($con, $sql);
    if($sql_run) {
        $_SESSION['status'] = "Laundry updated!";
        $_SESSION['status_code'] = "success";
        header("Location: " . base_url . "admin/home/laundry");
        exit(0);
    } else {
        $_SESSION['status'] = "Error updating laundry";
        $_SESSION['status_code'] = "error";
        header("Location: " . base_url . "admin/home/laundry");
        exit(0);
    }
}
?>