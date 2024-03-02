<?php
    if (!defined('DB_SERVER')){
        include ('../includes/authentication.php');
    }
    $inputJSON = file_get_contents('php://input');
    $result = array();

    // Add Laundry
    $jsonData = json_decode($inputJSON);
    if (isset($jsonData)) {
        $totalAmount = $jsonData->totalAmount;
        $amountEntered = $jsonData->amountEntered;

        if ($amountEntered < $totalAmount) {
            $result['message'] = "Payment entered must be valid";
            $result['status'] = "error";
        } else {
            $query = "call insertdetails('$inputJSON')";
            $query_run = mysqli_query($con, $query);
            if($query_run) {
                $result['message'] = "Laundry Added";
                $result['status'] = "success";
            } else {
                $result['message'] = "Error adding laundry";
                $result['status'] = "error";
            }
        }
    }

    echo json_encode($result);
?>