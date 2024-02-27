<?php include ('../includes/header.php'); ?>
<style>

    .icon-container h1 {
        position: relative;
        z-index: 1;
    }
</style>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="container d-flex justify-content-center align-items-center" style="min-height: 60vh;">
            <div class="row col-md-12">
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body" style="height: 50px;"></div>
                        <div class="card-body text-center">
                            <div class="icon-container">
                                <i class="fas fa fa-users" style="z-index:-1; margin-bottom:-14px; zoom: 5; opacity: 20%"></i>
                                <h1 class="text-white">0</h1>
                            </div>
                        </div>
                        <div class="card-body text-center">Total Customer Today</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body" style="height: 50px;"></div>
                        <div class="card-body text-center">
                            <div class="icon-container">
                                <i class="fab fa-paypal" style="z-index:-1; margin-bottom:-14px; zoom: 5; opacity: 20%"></i>
                                <h1 class="text-white">0</h1>
                            </div>
                        </div>
                        <div class="card-body text-center">Payment</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body" style="height: 50px;"></div>
                        <div class="card-body text-center">
                            <div class="icon-container">
                                <i class="fas fa-shopping-basket" style="z-index:-1; margin-bottom:-14px; zoom: 5; opacity: 20%"></i>
                                <h1 class="text-white">0</h1>
                            </div>
                        </div>
                        <div class="card-body text-center">Pending Orders</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include ('../includes/bottom.php'); ?>
<script src="<?php echo base_url ?>assets/demo/chart-bar-demo.js"></script>
<script src="<?php echo base_url ?>assets/demo/chart-pie-demo.js"></script>