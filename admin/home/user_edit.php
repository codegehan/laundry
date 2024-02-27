<?php include ('../includes/header.php'); ?>
<head>
    <!-- Select2 CSS and JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
</head>
<style type="text/css">
    #datatablesSimple th:nth-child(7) {
        width: 15% !important;
    }
</style>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit User</h1>
        <ol class="breadcrumb mb-4 mt-3">
            <li class="breadcrumb-item active"><a href="../home" class="text-decoration-none">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="./user" class="text-decoration-none">Users</a></li>
            <li class="breadcrumb-item">Edit User</li>
        </ol>
        <?php
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "SELECT * FROM `user` WHERE `user_id` = '$id' AND `user_type` != 'Customer' AND `user_status` != 'Archive'";
                $sql_run = mysqli_query($con, $sql);

                if(mysqli_num_rows($sql_run) > 0) {
                    foreach($sql_run as $row){
        ?>
        <form id="myForm" action="user_code.php" method="post" autocomplete="off" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>User form
                                <div class="float-end btn-disabled">
                                    <button type="submit" class="btn btn-success" id="submit-btn" onclick="return validateForm()"><i class="fas fa-save"></i> Save</button>
                                    <input type="hidden" name="user_id" value="<?=$row['user_id']?>">
                                </div>
                                <div class="float-end btn-disabled mr-2">
                                    <a class="btn btn-primary" href="./user"><i class="fas fa-arrow-left"></i> Back</a>
                                </div>
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="fname" class="required">First Name</label>
                                    <input type="text" class="form-control" placeholder="Enter First Name" name="fname" id="fname" value="<?=$row['fname']?>" required>
                                    <div id="fname-error"></div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="mname">Middle Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Middle Name" name="mname" id="mname" value="<?=$row['mname']?>">
                                    <div id="mname-error"></div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="lname" class="required">Last Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Last Name" name="lname" id="lname" value="<?=$row['lname']?>" required>
                                    <div id="lname-error"></div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <label for="suffix" class="required">Suffix</label>
                                        <select class="form-control" id="suffix" name="suffix" required>
                                            <option value="" selected>Select Suffix</option>
                                            <option value=" " <?= isset($row['suffix']) && $row['suffix'] == ' ' ? 'selected' : '' ?>>None</option>
                                            <option value="Jr" <?= isset($row['suffix']) && $row['suffix'] == 'Jr' ? 'selected' : '' ?>>Jr</option>
                                            <option value="Sr" <?= isset($row['suffix']) && $row['suffix'] == 'Sr' ? 'selected' : '' ?>>Sr</option>
                                            <option value="I" <?= isset($row['suffix']) && $row['suffix'] == 'I' ? 'selected' : '' ?>>I</option>
                                            <option value="II" <?= isset($row['suffix']) && $row['suffix'] == 'II' ? 'selected' : '' ?>>II</option>
                                            <option value="III" <?= isset($row['suffix']) && $row['suffix'] == 'III' ? 'selected' : '' ?>>III</option>
                                            <option value="IV" <?= isset($row['suffix']) && $row['suffix'] == 'IV' ? 'selected' : '' ?>>IV</option>
                                            <option value="V" <?= isset($row['suffix']) && $row['suffix'] == 'V' ? 'selected' : '' ?>>V</option>
                                            <option value="VI" <?= isset($row['suffix']) && $row['suffix'] == 'VI' ? 'selected' : '' ?>>VI</option>
                                        </select>
                                        <div id="suffix-error"></div>
                                    </div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <label for="gender" class="required">Gender</label>
                                        <select class="form-control" name="gender" id="gender" required>
                                            <option value="" selected>Select Gender</option>
                                            <option value="Male" <?= isset($row['gender']) && $row['gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
                                            <option value="Female" <?= isset($row['gender']) && $row['gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
                                        </select>
                                        <div id="gender-error"></div>
                                    </div>
                                </div>
    
                                <div class="col-md-3 mb-3">
                                    <label for="email" class="required">Email</label>
                                    <input type="email" class="form-control" placeholder="Enter Email" name="email" id="email" value="<?=$row['email']?>" required>
                                    <div id="email-error"></div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="phone" class="required">Phone Number</label>
                                    <input type="text" class="form-control" placeholder="Enter Phone" name="phone" maxlength="11" id="phone" value="<?=$row['phone']?>" required>
                                    <div id="phone-error"></div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <label for="role" class="required">Role</label>
                                        <select class="form-control" name="role" id="role" required>
                                            <option value="" selected>Select Role</option>
                                            <option value="Admin" <?= isset($row['user_type']) && $row['user_type'] == 'Admin' ? 'selected' : '' ?>>Admin</option>
                                            <option value="Staff" <?= isset($row['user_type']) && $row['user_type'] == 'Staff' ? 'selected' : '' ?>>Staff</option>
                                            <option value="Renter" <?= isset($row['user_type']) && $row['user_type'] == 'Renter' ? 'selected' : '' ?>>Rentee</option>
                                        </select>
                                        <div id="role-error"></div>
                                    </div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <label for="status" class="required">Status</label>
                                        <select class="form-control" name="status" id="status" required>
                                            <option value="" selected>Select Status</option>
                                            <option value="Active" <?= isset($row['user_status']) && $row['user_status'] == 'Active' ? 'selected' : '' ?>>Active</option>
                                            <option value="Inactive" <?= isset($row['user_status']) && $row['user_status'] == 'Inactive' ? 'selected' : '' ?>>Inactive</option>
                                        </select>
                                        <div id="status-error"></div>
                                    </div>
                                </div>

                                <div class="col-md-9 mb-3">
                                    <label for="address" class="required">Address</label>
                                    <textarea type="text" class="form-control" placeholder="Enter Address" rows="3" name="address" id="address" autocomplete="off" required><?=$row['address']?></textarea>
                                    <div id="address-error"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Edit -->
            <div class="modal fade" id="Modal_save" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Save changes</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want save?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            <button type="submit" name="edit_user" id="editButton" class="btn btn-success">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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

<script>
    $(document).ready(function() {
        // Add an event listener to the modal's submit button
        $(document).on('click', '#editButton', function() {
            // Set the form's checkValidity to true
            document.getElementById("myForm").checkValidity = function() {
                return true;
            };

            // Submit the form
            $('#myForm').submit();
        });
    });

    function validateForm() {
        var form = document.getElementById("myForm");
        if (form.checkValidity()) {
            // If the form is valid, show the modal
            $('#Modal_save').modal('show');
            return false; // Prevent the form from being submitted immediately
        } else {
            return true; // Allow the form to be submitted and display the browser's error messages
        }
    }
</script>

<?php include ('../includes/bottom.php'); ?>