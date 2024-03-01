<?php
    if (!defined('DB_SERVER')){
        include ('../includes/authentication.php');
    }

    // Add inventory
    if(isset($_POST["add_inventory"])) {
        $worker = $_POST['worker'];
        $itemcode = $_POST['itemcode'];
        $itemdescription = $_POST['itemdescription'];
        $minqty = $_POST['minqty'];
        $category = $_POST['category'];
        $dateexpired = $_POST['dateexpired'];

        $jsonData = array(
            "worker"=> $worker,
            "itemcode"=> $itemcode,
            "itemdescription"=> $itemdescription,
            "minqty"=> $minqty,
            "category"=> $category,
            "dateexpired"=> $dateexpired,
        );

        $data = json_encode($jsonData);
        $query = "call additem('$data')";
        $query_run = mysqli_query($con, $query);

        if($query_run) {
            $_SESSION['status'] = "Inventory Updated successfully";
            $_SESSION['status_code'] = "success";
            header("Location: " . base_url . "admin/home/inventory");
            exit(0);
        } else {
            $_SESSION['status'] = "Inventory was not updated";
            $_SESSION['status_code'] = "error";
            header("Location: " . base_url . "admin/home/inventory");
            exit(0);
        }
    }

    // Add inventory
    if(isset($_POST["add_stocks"])) {
        $worker = $_POST['worker'];
        $itemcode = $_POST['itemcode'];
        $qty = $_POST['qty'];

        $jsonData = array(
            "worker"=> $worker,
            "itemcode"=> $itemcode,
            "qty"=> $qty,
        );

        $data = json_encode($jsonData);
        $query = "call addstocks('$data')";
        $query_run = mysqli_query($con, $query);

        if($query_run) {
            $_SESSION['status'] = "Inventory stocks updated!";
            $_SESSION['status_code'] = "success";
            header("Location: " . base_url . "admin/home/inventory");
            exit(0);
        } else {
            $_SESSION['status'] = "Inventory was not updated";
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