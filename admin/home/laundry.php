<?php include ('../includes/header.php'); ?>
<style type="text/css">
    #datatablesSimple th:nth-child(7) {
        width: 15% !important;
    }
    .table th, .table td {
        white-space: nowrap;
    }

    .adjusted-td td{
        padding: 5px;
    }
</style>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Laundry
            <a href="laundry_add" class="btn btn-success btn-icon-split float-end mt-2"> 
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Add Laundry</span>
            </a>
        </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="../home" class="text-decoration-none">Dashboard</a></li>
            <li class="breadcrumb-item">Laundry</li>
        </ol>
        <div class="card mb-4" style="max-height: 550px; overflow: scroll; font-size: 12px;">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                DataTable Laundry
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover text-center" id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Transaction Id</th>
                            <th>Laundry Code</th>
                            <th>Transaction Date</th>
                            <th>Customer Name</th>
                            <th>Pickup Date</th>
                            <th>Pickup Time</th>
                            <th>Total Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = "call getlaundrylist()";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0){
                                foreach($query_run as $row){
                        ?>
                        <tr class="adjusted-td">
                            <td><?= $row['transaction_id'];?></td>
                            <td><?= $row['laundry_code'];?></td>
                            <td><?= $row['transaction_date'];?></td>
                            <td><?= $row['customer_name'];?></td>
                            <td><?= $row['pickup_date'];?></td>
                            <td><?= $row['pickup_time'];?></td>
                            <td><?= $row['total_amount'];?></td>
                            <td>
                                <div class="d-flex text-center">
                                    <!-- <div class="col-3 mb-1">
                                        <a href="inventory_view?id=<?=$row['transaction_id']?>" class="btn btn-dark btn-sm" title="View"> 
                                            <span class="icon text-white-50">View</i></span>
                                        </a>
                                    </div> -->
                                    <div class="col-3 mb-1 ms-3">
                                        <a href="laundry_validate?id=<?=$row['transaction_id']?>&worker=<?=$userID?>" style="border-radius: 50%;" class="btn btn-success btn-sm" title="Edit"> 
                                            <span class="icon text-white-50"><i class="fa fa-circle-check"></i></span>
                                            <span class="text"></span>
                                        </a>
                                    </div>
                                    <!-- <div class="col-md-3">
                                        <button type="button" data-toggle="modal" value="<?=$row['transaction_id']; ?>" data-target="#Modal_delete_inventory" onclick="deleteModal(this)" class="btn btn-danger btn-sm" title="Delete">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                            <span class="text"></span>
                                        </button>
                                    </div> -->
                                </div>
                            </td>
                        </tr>
                        <?php } } else{ } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<!-- Modal Inventory Delete -->
<div class="modal fade" id="Modal_delete_inventory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Inventory</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete number <label id="label_id"></label>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <form action="inventory_code.php" method="POST">
                    <input type="hidden" id="delete_id" name="inv_id">
                    <button type="submit" name="delete_inventory" class="btn btn-danger">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- JavaScript for delete inventory -->
<script>
    function deleteModal(button) {
        var id = button.value;
        document.getElementById("delete_id").value = id;
        document.getElementById("label_id").innerHTML = id;
    }
</script>
<?php include ('../includes/bottom.php'); ?>