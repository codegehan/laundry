<?php 

    include ('../includes/header.php'); 

    if(isset($_POST["add_category_btn"])){
        $categoryName = $_POST["category"];
        $query = mysqli_query($con, "INSERT INTO category(categorydesc) VALUES('$categoryName')");
        if ($query){
            $_SESSION['status'] = "Category added!";
            $_SESSION['status_code'] = "success";
            echo "<script>window.location='" . base_url . "admin/home/tool_category';</script>";
            exit(0);
        }
    }

    if(isset($_POST["add_time_btn"])){
        $itemName = $_POST["tool_item"];
        $query = mysqli_query($con, "INSERT INTO items(itemdescription) VALUES('$itemName')");
        if ($query){
            $_SESSION['status'] = "Item added!";
            $_SESSION['status_code'] = "success";
            echo "<script>window.location='" . base_url . "admin/home/tool_item';</script>";
            exit(0);
        }
    }

    if(isset($_POST["add_rate_btn"])){
        $rateCode = $_POST["ratecode"];
        $ratePrice = $_POST["rateprice"];
        $rateDesc = $_POST["ratedesc"];
        $rateType = $_POST["ratetype"];
        $rateSeq = $_POST["ratesequence"];
        $query = mysqli_query($con, "INSERT INTO laundryrate(laundryratecode,rate,description,ratetype,ratetypevalue) VALUES('$rateCode','$ratePrice','$rateDesc','$rateType','$rateSeq')");
        if ($query){
            $_SESSION['status'] = "Laundry rate added!";
            $_SESSION['status_code'] = "success";
            echo "<script>window.location='" . base_url . "admin/home/tool_rate';</script>";
            exit(0);
        }
    }

?>
