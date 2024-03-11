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
    ::-webkit-scrollbar{
        display: none;
    }
</style>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tool</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="../home" class="text-decoration-none">Dashboard</a></li>
            <li class="breadcrumb-item">Tool</li>
            <li class="breadcrumb-item">Category</li>
        </ol>
        <div class="card mb-4 w-25" style="max-height: 550px; overflow: scroll; font-size: 12px;">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
               Add Category
            </div>
            <div class="card-body">
                <form action="tool_process.php" method="POST">
                    <div class="bg-light">
                        <div>
                            <div class="mb-2">
                                <input type="text" class="form-control" name="category" placeholder="Category name">
                            </div>
                            <div class="mb-2 text-center">
                                <button type="submit" class="btn btn-primary" name="add_category_btn">Add</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?php include ('../includes/bottom.php'); ?>