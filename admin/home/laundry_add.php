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
    .garments-input{
        max-width: 100px;
        margin: auto;
    }
    .garments-input, .btn-inline{
        display: inline-block;
    }
    .btn-inline{
        padding: 5px 8px;
        margin-bottom: 6px;
    }
    .receipt-list label{
        display: inline-block;
    }
    .receipt-list input{
        width: 75%;
        display: inline-block;
    }
    .btn-size{
        width: 150px;
    }
    .receipt-list .row{
        margin-bottom: 5px;
    }
</style>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Add laundry</h1>
        <ol class="breadcrumb mb-4 mt-3">
            <li class="breadcrumb-item active"><a href="../home" class="text-decoration-none">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="./laundry" class="text-decoration-none">Laundy Management</a></li>
            <li class="breadcrumb-item">Add Laundry</li>
        </ol>
        <form id="myForm" action="laundry_code.php" method="post" autocomplete="off" enctype="multipart/form-data" class="mb-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Laundry form
                                <div class="float-end btn-disabled mr-2">
                                    <a class="btn btn-primary" href="./laundry"><i class="fas fa-arrow-left"></i> Back</a>
                                </div>
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="transaction-code" class="required">Transaction Code</label>
                                    <input type="text" class="form-control" name="transaction-code" id="transaction-code" disabled>
                                    <div id="transaction-code-error"></div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="pickup_date" class="required">Transaction Date</label>
                                    <input type="date" value="<?=date('Y-m-d')?>" class="form-control" required>
                                    <div id="inv_qty-error"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="inv_name" class="required">Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Laundry Name" name="inv_name" id="inv_name" required>
                                    <div id="inv_name-error"></div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="pickup_date" class="required">Pickup Date</label>
                                    <input type="date" class="form-control" name="pickup_date" id="pickup_date" required>
                                    <div id="inv_qty-error"></div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <label for="pickup_time" class="required">Pickup Type</label>
                                        <input type="time" class="form-control" name="pickup_time" id="pickup_time" required>
                                        <div id="inv_status-error"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table text-center table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Items</th>
                                                <th>Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $sql = "SELECT * FROM items";
                                                $sql_run = mysqli_query($con, $sql);
                                                
                                                if(mysqli_num_rows($sql_run) > 0) {
                                                    foreach($sql_run as $row){ ?>
                                                        <tr>
                                                            <td><?=strtoupper($row['itemdescription'])?></td>
                                                            <td>
                                                                <input type="number" value="0" min="0" class="form-control garments-input" id="btn-quantity-<?=$row["itemcode"]?>" onclick="AddItemQuantity('<?=$row['itemcode']?>">
                                                                <a type="buton" class="btn btn-success btn-inline" id="btn-add-<?=$row["itemcode"]?>" onclick="AddItemQuantity('<?=$row['itemcode']?>')"><i class="fa-solid fa-plus"></i></a>
                                                                <a type="buton" class="btn btn-warning btn-inline" id="btn-minus-<?=$row["itemcode"]?>" onclick="MinusItemQuantity('<?=$row['itemcode']?>')"><i class="fa-solid fa-minus"></i></a>
                                                            </td>
                                                        </tr>
                                                <?php  }
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-md-6 mb-3 receipt-list">
                                    <div class="row">
                                        <div class="col-6 text-start">
                                            <label>Assigned Staff</label>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" value="Admin" disabled>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 text-start">
                                            <label>Laundry Rate</label>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 text-start">
                                            <label>Additional Service</label>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 text-start">
                                            <label>Weight (kg.)</label>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 text-start">
                                            <label>Description</label>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 text-start">
                                            <label>Laundry Amount</label>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 text-start">
                                            <label>Additional Fee</label>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <br>
                                    <br>
                                    
                                    <div class="row">
                                        <div class="col-6 text-start">
                                            <label>Total Amount</label>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" value="0.00" disabled>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6 text-start">
                                            <label>Payment Method</label>
                                        </div>
                                        <div class="col-6">
                                            <select name="payment-method" id="payment-method" class="form-control w-75">
                                            <option value="#" class="form-control"></option>
                                                <?php 
                                                    $sql = "SELECT * FROM payment";
                                                    $sql_run = mysqli_query($con, $sql);
                                                    if(mysqli_num_rows($sql_run) > 0)
                                                        foreach($sql_run as $row){ ?>
                                                            <option value="<?=$row["paymentdescription"]?>" class="form-control"><?=strtoupper($row["paymentdescription"])?></option>
                                                <?php  } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 text-start">
                                            <label>Amount Tendered</label>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" value="0.00">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 text-start">
                                            <label>Change</label>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" value="0.00" disabled>
                                        </div>
                                    </div>

                                    <br>
                                    <br>
                                    <br>

                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <button type="button" class="btn btn-primary btn-size"><i class="fa-solid fa-download"></i> Place Laundry</button>
                                            <button type="button" class="btn btn-danger btn-size"><i class="fa-solid fa-print"></i> Print</button>
                                            <button type="button" class="btn btn-secondary btn-size"><i class="fa-solid fa-rotate-right"></i> Reset</button>
                                        </div>
                                    </div>

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
                            <button type="submit" name="add_laundry" id="editButton" class="btn btn-success">Yes</button>
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


    function AddItemQuantity(itemcode)
    {
        var addinput = document.getElementById('btn-quantity-'+itemcode);
        addinput.value = parseInt(addinput.value) + 1;
    }
    function MinusItemQuantity(itemcode)
    {
        var addinput = document.getElementById('btn-quantity-'+itemcode);
        if (addinput.value < 1)
        {
            return;
        } else {
            addinput.value = parseInt(addinput.value) - 1;
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

    document.getElementById('transaction-code').value = GenerateRandomCode(20);
</script>
<?php include ('../includes/bottom.php'); ?>