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
        <h1 class="mt-4">Sales
            <!-- <a href="laundry_add" class="btn btn-success btn-icon-split float-end mt-2"> 
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Add Laundry</span>
            </a> -->
        </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="../home" class="text-decoration-none">Dashboard</a></li>
            <li class="breadcrumb-item">Sales</li>
        </ol>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <label for="" class="bg-secondary text-light px-2 py-1 rounded">Date From:</label>
                    <input type="date" class="form-control" id="dateFrom">
                </div>
                <div class="col-md-4">
                    <label for="" class="bg-secondary px-2 py-1 text-light rounded">Date To:</label>
                    <input type="date" class="form-control" id="dateTo">
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button class="btn btn-success" onclick="GenerateReport()">Generate</button>
                </div>
            </div>
        </div>
        <div id="salesReportContainer">
        </div>
    </div>
</main>

<script src="<?php echo base_url ?>assets/js/sweetalert.js"></script>
<script>
    function GenerateReport(){
        var dateFrom = $('#dateFrom').val();
        var dateTo = $('#dateTo').val();
        
        var data = {
            datefrom: dateFrom,
            dateto: dateTo
        }

        if (dateFrom === "" || dateTo === "") {
            swal({
                title: "PLEASE ENTER DATE FROM AND DATE TO",
                icon: "error",
                timer: 2000,
                button: false,
                content: {
                    element: "span",
                    attributes: {
                        innerHTML: "<br>",
                    },
                },
            });
            return;
        }
        
        $.ajax({
            url: "reports.php",
            method: "POST",
            data:  JSON.stringify(data),
            success: function (response) {
                $('#salesReportContainer').html(response);
            },
            error: function(xhr, status, error) {
            console.error("Request Failed: ", error);
           }
        });
    }
</script>