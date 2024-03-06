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
        <h1 class="mt-4">Laundry</h1>
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
                                if($row['ispickupdone'] == 0 & $row['ispaid'] == 1 & $row['isdone'] == 1) { ?>
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
                                            <div class="col-3 mb-1 ms-3">
                                                <a href="laundry_validate?id=<?=$row['transaction_id']?>&worker=<?=$userID?>&type=markrelease" class="btn btn-primary btn-sm" title="Edit"> 
                                                    Release
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php  } 
                                } 
                            }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?php include ('../includes/bottom.php'); ?>