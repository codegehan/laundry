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
        <h1 class="mt-4">Edit Inventory</h1>
        <ol class="breadcrumb mb-4 mt-3">
            <li class="breadcrumb-item active"><a href="../home" class="text-decoration-none">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="./inventory" class="text-decoration-none">Inventory Mangement</a></li>
            <li class="breadcrumb-item">Edit Inventory</li>
        </ol>
        <?php
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
    
            // Execute the first query and fetch all results
            $sql = "CALL itemdetail('$id')";
            $sql_run = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($sql_run);
        ?>
        <form id="myForm" action="inventory_code.php" method="post" autocomplete="off" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Inventory form
                                <div class="float-end btn-disabled">
                                    <button type="submit" class="btn btn-success" id="submit-btn" onclick="return validateForm()"><i class="fas fa-save"></i> Save</button>
                                    <input type="hidden" name="inv_id" value="<?=$row['inv_id']?>">
                                </div>
                                <div class="float-end btn-disabled mr-2">
                                    <a class="btn btn-primary" href="./inventory"><i class="fas fa-arrow-left"></i> Back</a>
                                </div>
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="itemcode" class="required">Item Code</label>
                                    <input type="text" class="form-control"  name="itemcode" id="itemcode" value="<?=$row['itemcode']?>" required>
                                    <div id="itemcode-error"></div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="itemdescription" class="required">Item Name</label>
                                    <input type="text" class="form-control" min="1" name="itemdescription" id="itemdescription" value="<?=$row['itemdescription']?>" required>
                                    <div id="itemdescription-error"></div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="minqty" class="required">Min Quantity</label>
                                    <input type="number" class="form-control" min="1" name="minqty" id="minqty" value="<?=$row['minqty']?>" required>
                                    <div id="minqty-error"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="dateexpired" class="required">Date Expired</label>
                                    <input type="date" class="form-control" placeholder="Enter Quantity" min="1" name="dateexpired" id="dateexpired" value="<?=$row['dateexpired']?>" required>
                                    <div id="dateexpired-error"></div>
                                </div>
                                
                                <div class="col-md-4 mb-3">
                                    <label for="category" class="required">Category</label>
                                    <select class="form-control" name ="category" id="category" required>
                                    <option value="<?=$row['category']?>"><?=$row['category']?></option>
                                    <?php
                                        mysqli_next_result($con);
                                        $sqlquery = "CALL categorylists()";
                                        $sqlresult = mysqli_query($con, $sqlquery);
                                            while ($rowcat = mysqli_fetch_assoc($sqlresult)) {
                                                
                                                echo "<option value='" . $rowcat["categorylist"] . "'>" . $rowcat["categorylist"] . "</option>";
                                            }
                                        }
                                    ?>
                                    </select>
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