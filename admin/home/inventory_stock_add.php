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
        <h1 class="mt-4">Add Stocks</h1>
        <ol class="breadcrumb mb-4 mt-3">
            <li class="breadcrumb-item active"><a href="../home" class="text-decoration-none">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="./inventory" class="text-decoration-none">Inventory Management</a></li>
            <li class="breadcrumb-item">Add Stocks</li>
        </ol>
        <form id="myForm" action="inventory_code.php" method="post" autocomplete="off" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Stocks form
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
                                <input type="text" value="<?=$userID?>" name="worker" hidden>
                                <div class="col-md-4 mb-3">
                                    <label for="itemcode" class="required">Item Name</label>
                                    <select name="itemcode" class="form-control" id="itemcode">
                                        <option value="">-- Select item --</option>
                                        <?php 
                                            $sql = mysqli_query($con, "call itemslist()");
                                            while ($row = mysqli_fetch_assoc($sql)) {
                                                echo "<option value='" . $row["itemcode"] . "'>" . strtoupper($row["itemdescription"]) . "</option>";
                                            }
                                            
                                        ?>
                                    </select>
                                    <div id="itemcode-error"></div>
                                </div>

                                <div class="col-md-2 mb-3">
                                    <label for="qty" class="required">Quantity</label>
                                    <input type="number" class="form-control" placeholder="Enter Quantity" min="1" name="qty" id="qty" required>
                                    <div id="qty-error"></div>
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
                            <button type="submit" name="add_stocks" id="editButton" class="btn btn-success">Yes</button>
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
</script>
<?php include ('../includes/bottom.php'); ?>