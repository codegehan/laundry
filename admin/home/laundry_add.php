<?php include ('../includes/header.php'); ?>
<?php 
    $sql = "SELECT * FROM account WHERE user_id = $userID";
    $sql_run = $con->query($sql);
    $row = $sql_run->fetch_assoc();
    $userloggedin = $row["fname"];
?>
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
        <!-- <form id="myForm" action="laundry_code.php" method="post" autocomplete="off" enctype="multipart/form-data" class="mb-4"> -->
        <form id="laundry-form" class="mb-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Laundry form
                                <div class="float-end btn-disabled mr-2">
                                    <a class="btn btn-primary btn-sm" href="./laundry"><i class="fas fa-arrow-left"></i> Back</a>
                                </div>
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="transaction-code" class="required">Transaction Code</label>
                                    <input type="text" class="form-control" name="transaction-code" id="transaction-code" disabled>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="transaction-date" class="required">Transaction Date</label>
                                    <input type="date" value="<?=date('Y-m-d')?>" id="transaction-date" class="form-control" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="customer-name" class="required">Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Laundry Name" name="customer-name" id="customer-name" style="text-transform: uppercase;" required>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="pickup-ate" class="required">Pickup Date</label>
                                    <input type="date" class="form-control" name="pickup-date" id="pickup-date" required>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <label for="pickup-time" class="required">Pickup Type</label>
                                        <input type="time" class="form-control" name="pickup-time" id="pickup-time" required>
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
                                        <tbody id="items-body">
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
                                            <input type="text" class="form-control" id="worker" value="<?=strtoupper($userloggedin)?>" disabled>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 text-start">
                                            <label>Laundry Rate</label>
                                        </div>
                                        <div class="col-6">
                                            <select name="laundry-rate" id="laundry-rate" class="form-control w-75">
                                                <?php 
                                                    $sql = "SELECT * FROM laundryrate WHERE ratetypevalue = 1";
                                                    $sql_run = mysqli_query($con, $sql);
                                                    if(mysqli_num_rows($sql_run) > 0)
                                                        foreach($sql_run as $row){ ?>
                                                            <option value="<?=$row["rate"]?>" class="form-control"><?=strtoupper($row["description"])?></option>
                                                <?php  } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 text-start">
                                            <label>Additional Service</label>
                                        </div>
                                        <div class="col-6">
                                            <select name="addtional-rate" id="addtional-rate" class="form-control w-75">
                                            <option value="0.00" class="form-control"></option>
                                                <?php
                                                    $sql = "SELECT * FROM laundryrate WHERE ratetypevalue = 0";
                                                    $sql_run = mysqli_query($con, $sql);
                                                    if(mysqli_num_rows($sql_run) > 0)
                                                        foreach($sql_run as $row){ ?>
                                                            <option value="<?=$row["rate"]?>" class="form-control"><?=strtoupper($row["description"])?></option>
                                                <?php  } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 text-start">
                                            <label>Weight (kg.)</label>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" onchange="CalculatePayment()" id="weight-value" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 text-start">
                                            <label>Remarks</label>
                                        </div>
                                        <div class="col-6">
                                            <textarea type="text" id="remarks" class="form-control w-75 text-uppercase" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 text-start">
                                            <label>Laundry Amount</label>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" id="laundry-amount" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 text-start">
                                            <label>Additional Fee</label>
                                        </div>
                                        <div class="col-6">
                                        <input type="text" id="additional-fee"class="form-control" disabled>
                                        </div>
                                    </div>
                                    
                                    <br>
                                    <br>
                                    
                                    <div class="row">
                                        <div class="col-6 text-start">
                                            <label>Total Amount</label>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" id="total-amount" class="form-control" value="0.00" disabled>
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
                                            <input type="text" class="form-control" id="amount-tendered" onchange="CalculateForChange()" value="0.00">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 text-start">
                                            <label>Change</label>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" id="amount-change" value="0.00" disabled>
                                        </div>
                                    </div>
                                    <br>
                                    <div>
                                        <strong><h3 class="text-center mb-4" id="laundrymessage"></h3></strong>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <button type="button" class="btn btn-primary btn-size btn-sm" onclick="PlaceLaundry()"><i class="fa-solid fa-download"></i> Place Laundry</button>
                                            <button type="button" class="btn btn-secondary btn-size btn-sm" onclick="ResetLaundryForm()"><i class="fa-solid fa-rotate-right"></i> Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                                        
                        </div>
                    </div>
                </div>
            </div>
            <!-- <button type="submit" name="add_laundry" id="editButton" class="btn btn-success" hidden>Yes</button> -->
        </form>
    </div>
</main>
<?php include "../../message.php";?>
<script>
    var form = document.getElementById('laundry-form');
    form.addEventListener('keydown', function(event) {
        if (event.keyCode === 13) { event.preventDefault(); }
    });
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
        const characters = '0123456789';
        let result = '';
        const charactersLength = characters.length;
        for (let i = 0; i < max; i++) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
        return result;
    }

    document.getElementById('transaction-code').value = GenerateRandomCode(2);

    function CalculatePayment()
    {
        var weight = document.getElementById("weight-value").value;
        var laundryAmount = document.getElementById("laundry-amount");
        var laundryRate = document.getElementById("laundry-rate").value;
        var additionalFee = document.getElementById("additional-fee");
        var totalAmount = document.getElementById("total-amount");
        var additionalAmount = document.getElementById("addtional-rate").value;
        var priceConversion = parseFloat(laundryRate) / 1000;
        var laundry_Amount = parseFloat(weight) * 1000 * priceConversion;
        laundryAmount.value = laundry_Amount;
        var additional_Fee = parseFloat(additionalAmount);
        additionalFee.value = additional_Fee
        var total = parseFloat(laundry_Amount) + parseFloat(additional_Fee);
        totalAmount.value = total.toFixed(2);
        CalculateForChange();
    }

    function CalculateForChange()
    {
        var amounttendered = document.getElementById("amount-tendered").value;
        var amountchange = document.getElementById("amount-change");
        var totalAmount = document.getElementById("total-amount").value;
        var total = parseFloat(amounttendered) - parseFloat(totalAmount);
        amountchange.value = total.toFixed(2);
    }
    function PlaceLaundry()
    {
        var transCode = document.getElementById('transaction-code');
        var transDate = document.getElementById('transaction-date');
        var customerName = document.getElementById('customer-name');
        var pickupDate = document.getElementById('pickup-date');
        var pickupTime = document.getElementById('pickup-time');
        var worker = document.getElementById('worker');
        var rate = document.getElementById('laundry-rate');
        var additional = document.getElementById('addtional-rate');
        var weight = document.getElementById('weight-value');
        var remarks = document.getElementById('remarks');
        var laundryAmount = document.getElementById('laundry-amount');
        var additionalFee = document.getElementById('additional-fee');
        var totalAmount = document.getElementById('total-amount');
        var paymentMethod = document.getElementById('payment-method');
        var amountEntered = document.getElementById('amount-tendered');
        var change = document.getElementById('amount-change');
        var tableBody = document.getElementById('items-body');
        var items = [];
        for (var i = 0; i < tableBody.rows.length; i++) {
            var cells = tableBody.rows[i].cells;
            var key = cells[0].innerText.trim();
            var value = cells[1].querySelector('input').value;
            items.push({ item: key, quantity: value });
        }

        if (customerName.value === "" || pickupDate.value === "" || pickupTime.value === "" || weight.value === "" || paymentMethod.value === "#" || amountEntered.value === "") {
            $('#laundrymessage').text("Please fill all required fields!");
            $('#laundrymessage').css('color', 'red');
            setTimeout(() => {
                $('#laundrymessage').text("");
            }, 3000);
            return;
        }
        var jsonData = {
            transCode: transCode.value,
            transDate : transDate.value,
            customerName : customerName.value,
            pickupDate : pickupDate.value, 
            pickupTime : pickupTime.value,
            worker : worker.value,
            rate : rate.value,
            additional : additional.value,
            weight : weight.value,
            remarks : remarks.value,
            laundryAmount : laundryAmount.value,
            additionalFee : additionalFee.value,
            totalAmount : totalAmount.value,
            paymentMethod : paymentMethod.value,
            amountEntered : amountEntered.value,
            change : change.value,
            items : items,
        }
        $.ajax({
           url: "./laundry_code.php",
           type: "POST",
           contentType: "application/json",
           data: JSON.stringify(jsonData),
           success: function (response) {
            // TO PRINT RECEIPT
            //PrintReceipt(jsonData);
            var result = JSON.parse(response);
            
            $('#laundrymessage').text(result.message);

            if (result.status === "error") {
                $('#laundrymessage').css('color', 'red');
            } else {
                $('#laundrymessage').css('color', 'green');
                $('#laundry-form')[0].reset();
                setTimeout(() => {
                    PrintReceipt(jsonData);
                }, 2500);
            }

            setTimeout(function() {
                $('#laundrymessage').text('');
            }, 3000);
           },   
           error: function(xhr, status, error) {
            console.error("Request Failed: ", error);
           } 
        });
    }
    function ResetLaundryForm(){
        $('#laundry-form')[0].reset();
        document.getElementById('transaction-code').value = GenerateRandomCode(2);
    }
    function PrintReceipt(jsonData)
    {
        var query = 'data=' + encodeURIComponent(JSON.stringify(jsonData));
        var iframe = document.createElement('iframe');
        iframe.style.display = 'none';
        iframe.src = "../../assets/printables/invoice.html?" + query;
        document.body.appendChild(iframe);
    }
</script>
<?php include ('../includes/bottom.php'); ?>