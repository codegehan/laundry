<?php include ('../includes/header.php'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">View Item</h1>
        <ol class="breadcrumb mb-4 mt-3">
            <li class="breadcrumb-item active"><a href="../home" class="text-decoration-none">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="./inventory" class="text-decoration-none">Inventory Management</a></li>
            <li class="breadcrumb-item">View Item</li>
        </ol>
        <?php
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "call itemdetail('$id')";
                $sql_run = mysqli_query($con, $sql);

                if(mysqli_num_rows($sql_run) > 0) {
                    foreach($sql_run as $row){
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Item info: <strong><?=$row['itemcode']?></strong>
                            <div class="float-end btn-disabled">
                                <a class="btn btn-primary" href="./inventory"><i class="fas fa-arrow-left"></i> Back</a>
                            </div>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="inv_name"><b>Item Name</b></label>
                                <input type="text" class="form-control-plaintext" value="<?=$row['itemdescription']?>" id="inv_name" disabled>
                            </div>

                            <div class="col-md-2 mb-3">
                                <label for="inv_avail"><b>Category</b></label>
                                <input type="text" class="form-control-plaintext" value="<?=$row['category']?>" id="inv_avail" disabled>
                            </div>

                            <div class="col-md-2 mb-3">
                                <label for="inv_qty"><b>Quantity</b></label>
                                <input type="text" class="form-control-plaintext" value="<?=$row['qty']?>" id="inv_qty" disabled>
                            </div>

                            <div class="col-md-2 mb-3">
                                <label for="inv_qty"><b>Min Qty</b></label>
                                <input type="text" class="form-control-plaintext" value="<?=$row['minqty']?>" id="inv_qty" disabled>
                            </div>

                            <div class="col-md-2 mb-3">
                                <label for="inv_status"><b>Status</b></label>
                                <input type="text" class="form-control-plaintext" value="<?=$row['status']?>" id="inv_status" disabled>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="inv_name"><b>Entered By</b></label>
                                <input type="text" class="form-control-plaintext" value="<?=$row['enteredby']?>" id="inv_name" disabled>
                            </div>

                            <div class="col-md-2 mb-3">
                                <label for="inv_avail"><b>Entered Date</b></label>
                                <input type="text" class="form-control-plaintext" value="<?=$row['entereddate']?>" id="inv_avail" disabled>
                            </div>

                            <div class="col-md-2 mb-3">
                                <label for="inv_qty"><b>Updated By</b></label>
                                <input type="text" class="form-control-plaintext" value="<?=$row['updatedby']?>" id="inv_qty" disabled>
                            </div>

                            <div class="col-md-2 mb-3">
                                <label for="inv_qty"><b>Updated Date</b></label>
                                <input type="text" class="form-control-plaintext" value="<?=$row['updateddate']?>" id="inv_qty" disabled>
                            </div>

                            <div class="col-md-2 mb-3">
                                <label for="inv_status"><b>Date Expired</b></label>
                                <input type="text" class="form-control-plaintext" value="<?=$row['dateexpired']?>" id="inv_status" disabled>
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
                            <h4>Inventory info</h4>
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