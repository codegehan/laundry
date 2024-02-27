<?php include ('../includes/header.php'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">View User</h1>
        <ol class="breadcrumb mb-4 mt-3">
            <li class="breadcrumb-item active"><a href="../home" class="text-decoration-none">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="./user" class="text-decoration-none">Users</a></li>
            <li class="breadcrumb-item">View User</li>
        </ol>
        <?php
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "SELECT * FROM `user` WHERE `user_id` = '$id' AND `user_type` != 'Customer' AND `user_status` != 'Archive'";
                $sql_run = mysqli_query($con, $sql);

                if(mysqli_num_rows($sql_run) > 0) {
                    foreach($sql_run as $row){
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>User info
                            <div class="float-end btn-disabled">
                                <a class="btn btn-primary" href="./user"><i class="fas fa-arrow-left"></i> Back</a>
                            </div>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="fname"><b>First Name</b></label>
                                <input type="text" class="form-control-plaintext" value="<?=$row['fname']?>" id="fname" disabled>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="mname"><b>Middle Name</b></label>
                                <input type="text" class="form-control-plaintext" value="<?=$row['mname']?>" id="mname" disabled>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="lname"><b>Last Name</b></label>
                                <input type="text" class="form-control-plaintext" value="<?=$row['lname']?>" id="lname" disabled>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="suffix"><b>Suffix</b></label>
                                <input type="text" class="form-control-plaintext" value="<?=$row['suffix']?>" id="suffix" disabled>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="gender"><b>Gender</b></label>
                                <input type="text" class="form-control-plaintext" value="<?=$row['gender']?>" id="gender" disabled>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="email"><b>Email</b></label>
                                <input type="text" class="form-control-plaintext" value="<?=$row['email']?>" id="email" disabled>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="phone"><b>Phone Number</b></label>
                                <input type="text" class="form-control-plaintext" value="<?=$row['phone']?>" id="phone" disabled>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="role"><b>Role</b></label>
                                <input type="text" class="form-control-plaintext" value="<?=$row['user_type']?>" id="role" disabled>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="status"><b>Status</b></label>
                                <input type="text" class="form-control-plaintext" value="<?=$row['user_status']?>" id="status" disabled>
                            </div>

                            <div class="col-md-9 mb-3">
                                <label for="address"><b>Address</b></label>
                                <textarea type="text" class="form-control-plaintext" rows="3" id="address" autocomplete="off" disabled><?=$row['address']?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } } else{ ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>User info</h4>
                        </div>
                        <div class="card-body">
                            <h4>No records found.</h4>
                        </div>
                    </div>
                </div>
            </div>
        <?php } } ?>
    </div>
</main>
<?php include ('../includes/bottom.php'); ?>