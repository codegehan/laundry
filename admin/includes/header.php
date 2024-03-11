<?php include ('authentication.php'); ?>
<?php 

$message = "";
    $stockCheck = "SELECT itemdescription FROM inventory WHERE qty < minqty";
    $stockCheck_run = mysqli_query($con, $stockCheck);
    while($stockRow = mysqli_fetch_assoc($stockCheck_run)) {
        $message .= strtoupper($stockRow["itemdescription"]) . " ";
        $_SESSION['status'] = "Items are running out of stock! -" . $message;
        $_SESSION['status_code'] = "warning";
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
        <title>Alma Laundry Management System - Admin Dashboard</title>
        <!-- Favicons -->
        <link rel="shortcut icon" href="<?php echo base_url ?>assets/files/system/system_logo.jpg" type="image/x-icon">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url ?>assets/files/system/system_logo.jpg">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url ?>assets/files/system/system_logo.jpg">
        <link rel="icon" href="../../assets/img/icon.png" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="<?php echo base_url ?>assets/css/styles.css" rel="stylesheet" />
        <link href="<?php echo base_url ?>assets/css/custom.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Include Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <!-- Modal and Select2 -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- GlightBox -->
        <link href="<?php echo base_url ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    </head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');
        *{
            font-family: "Poppins", sans-serif;
            
        }
        body {
            font-size: 12px;
        }
    </style>
    <body class="sb-nav-fixed" style="background-image: url('../../assets/files/system/background.jpg'); background-size: cover;">
        <?php
            include('topbar.php');
            include('sidebar.php');
            include ('../../message.php');
        ?>