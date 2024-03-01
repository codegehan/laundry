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
        <h1 class="mt-4">Add Item</h1>
        <ol class="breadcrumb mb-4 mt-3">
            <li class="breadcrumb-item active"><a href="../home" class="text-decoration-none">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="./inventory" class="text-decoration-none">Inventory Management</a></li>
            <li class="breadcrumb-item">Add Item</li>
        </ol>
        <form id="myForm" action="inventory_code.php" method="post" autocomplete="off" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Inventory form
                                <div class="float-end btn-disabled">
                                    <button type="submit" id="submit-btn" class="btn btn-success" onclick="return validateForm()"><i class="fas fa-plus"></i> Add</button>
                                </div>
                                <div class="float-end btn-disabled mr-2">
                                    <a class="btn btn-primary" href="inventory.php"><i class="fas fa-arrow-left"></i> Back</a>
                                </div>
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <input type="text" class="form-control" value="<?=$userID?>" id="worker" hidden name="worker">
                                <div class="col-md-4 mb-3">
                                    <label for="itemcode" class="required">Item Code</label>
                                    <input type="text" class="form-control" style="display: inline;" name="itemcode" id="itemcode" required>
                                    <div id="itemcode-error"></div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="itemdescription" class="required">Item Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Item Name" name="itemdescription" id="itemdescription" required>
                                    <div id="itemdescription-error"></div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="minqty" class="required">Min Quantity</label>
                                    <input type="number" class="form-control" placeholder="Enter Quantity" min="1" name="minqty" id="minqty" required>
                                    <div id="minqty-error"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="category" class="required">Category</label>
                                    <select class="form-control" name="category" id="category" required>
                                        <option value="">-- Select category --</option>
                                        <?php
                                            $sql = "call categorylists()";
                                            $sql_run = mysqli_query($con, $sql);
                                            if(mysqli_num_rows($sql_run) > 0)
                                                foreach($sql_run as $row){ ?>
                                                <option value="<?=$row["categorylist"]?>" class="form-control"><?=$row["categorylist"]?></option>
                                            <?php  } ?> 
                                    </select>
                                    <div id="category-error"></div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="dateexpired" class="required">Date Expired</label>
                                    <input type="date" class="form-control" placeholder="Enter Inventory Name" name="dateexpired" id="dateexpired">
                                    <div id="dateexpired-error"></div>
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
                            <button type="submit" name="add_inventory" id="editButton" class="btn btn-success">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>

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
    function GenerateRandomCode(max) {
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        let result = '';
        const charactersLength = characters.length;
        for (let i = 0; i < max; i++) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
        return result;
    }

    document.getElementById('itemcode').value = GenerateRandomCode(10);
</script>
<?php include ('../includes/bottom.php'); ?>