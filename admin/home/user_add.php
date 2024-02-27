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
        <h1 class="mt-4">Add User</h1>
        <ol class="breadcrumb mb-4 mt-3">
            <li class="breadcrumb-item active"><a href="../home" class="text-decoration-none">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="./user" class="text-decoration-none">Users</a></li>
            <li class="breadcrumb-item">Add User</li>
        </ol>
        <form id="myForm" action="user_code.php" method="post" autocomplete="off" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>User form
                                <div class="float-end btn-disabled">
                                    <button type="submit" id="submit-btn" class="btn btn-success" onclick="return validateForm()"><i class="fas fa-plus"></i> Add</button>
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
                                    <input type="text" class="form-control" placeholder="Enter First Name" name="fname" id="fname" required>
                                    <div id="fname-error"></div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="mname">Middle Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Middle Name" name="mname" id="mname">
                                    <div id="mname-error"></div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="lname" class="required">Last Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Last Name" name="lname" id="lname" required>
                                    <div id="lname-error"></div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <label for="suffix" class="required">Suffix</label>
                                        <select class="form-control" name="suffix" id="suffix" required>
                                            <option value="" selected>Select Suffix</option>
                                            <option value=" ">None</option>
                                            <option value="Jr">Jr</option>
                                            <option value="Sr">Sr</option>
                                            <option value="I">I</option>
                                            <option value="II">II</option>
                                            <option value="III">III</option>
                                            <option value="IV">IV</option>
                                            <option value="V">V</option>
                                            <option value="VI">VI</option>
                                        </select>
                                        <div id="suffix-error"></div>
                                    </div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <label for="gender" class="required">Gender</label>
                                        <select class="form-control" name="gender" id="gender" required>
                                            <option value="" selected>Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                        <div id="gender-error"></div>
                                    </div>
                                </div>
    
                                <div class="col-md-3 mb-3">
                                    <label for="email" class="required">Email</label>
                                    <input type="email" class="form-control" placeholder="Enter Email" name="email" id="email" autocomplete="off" required>
                                    <div id="email-error"></div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="phone" class="required">Phone Number</label>
                                    <input type="text" class="form-control" placeholder="Enter Phone" name="phone" maxlength="11" minlength="11" id="phone" autocomplete="off" required>
                                    <div id="phone-error"></div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <label for="role" class="required">Role</label>
                                        <select class="form-control" name="role" id="role" required>
                                            <option value="" selected>Select Role</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Staff">Staff</option>
                                        </select>
                                        <div id="role-error"></div>
                                    </div>
                                </div>

                                <!-- Form Group (password)-->
                                <div class="col-md-3 mb-3">
                                    <label for="password" class="required">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password" id="password" required>
                                    <a href="javascript:void(0)" style="position: relative; top: -2rem; left: -8%; cursor: pointer; color: black;" onclick="togglePassword('password')">
                                        <span class="password-toggle float-end"><i class="fa fa-eye"></i> Show</span>
                                    </a>
                                    <div style="position: absolute" id="password-error"></div>
                                </div>

                                <!-- Form Group (confirm password)-->
                                <div class="col-md-3 mb-3">
                                    <label for="cpassword" class="required">Confirm Password</label>
                                    <!-- <a href="javascript:void(0)" class="password-toggle float-end text-decoration-none" onclick="togglePassword('password')">
                                        <i class="fa fa-eye"></i> Show
                                    </a> -->
                                    <input type="password" class="form-control" placeholder="Enter Confirm Password" name="cpassword" id="cpassword" required>
									<a href="javascript:void(0)" style="position: relative; top: -2rem; left: -8%; cursor: pointer; color: black;" onclick="togglePassword('cpassword')">
                                        <span class="password-toggle float-end"><i class="fa fa-eye"></i> Show</span>
                                    </a>
                                    <div style="position: absolute" id="cpassword-error"></div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="address" class="required">Address</label>
                                    <textarea type="text" class="form-control" placeholder="Enter Address" rows="3" name="address" id="address" autocomplete="off" required></textarea>
                                    <div id="address-error"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Add -->
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
                            Are you sure you want add?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            <button type="submit" name="add_user" id="editButton" class="btn btn-success">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>

<script type="text/javascript">
    function togglePassword(inputId) {
        const passwordInput = document.getElementById(inputId);

        if (passwordInput) {
            const passwordToggle = passwordInput.parentElement.querySelector('.password-toggle');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                if (passwordToggle) {
                    passwordToggle.innerHTML = '<i class="fa fa-eye-slash"></i> Hide';
                }
            } else {
                passwordInput.type = 'password';
                if (passwordToggle) {
                    passwordToggle.innerHTML = '<i class="fa fa-eye"></i> Show';
                }
            }
        }
    }
</script>

<script>
    $(document).ready(function() {
        // Add an event listener to the modal's submit button
        $(document).on('click', '#addButton', function() {
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