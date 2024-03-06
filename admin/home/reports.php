<?php 
    if (!defined('DB_SERVER')){
        include ('../includes/authentication.php');
    }
    $inputJSON = file_get_contents('php://input');
    
    if(isset($inputJSON)){
        $query = "call report('$inputJSON')";
        $query_run = mysqli_query($con, $query);
        if($query_run) {
            echo '
            <div class="col-md-8 mt-3">
                <div class="card mb-4" style="max-height: 550px; overflow: auto; font-size: 12px;">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Sales Report
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th style="width: 200px;">#</th>
                                </tr>
                            </thead>
                            <tbody>';
                                while($row = mysqli_fetch_assoc($query_run)) {
                                    echo '
                                        <tr>
                                            <td class="text-uppercase">'.$row["item"].'</td>
                                            <td>'.$row["amount"].'</td>
                                        </tr>
                                    ';
                                }
                            echo '
                            </tbody>
                        </table>
                    </div>
                </div>   
            </div>
            ';
        }
    }
?>