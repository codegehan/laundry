<div id="layoutSidenav" style="font-size: 16px;">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark bg-dark text-dark" id="sidenavAccordion" style="background-color: #e4f1fa !important">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading text-dark">Home</div>
                    <a class="nav-link  text-dark <?php if (strpos($_SERVER['PHP_SELF'], 'home/index') !== false)  { echo 'active'; } ?>" href="../home">
                        <div class="sb-nav-link-icon text-dark"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <a class="nav-link  text-dark <?php if (strpos($_SERVER['PHP_SELF'], 'home/inventory') !== false)  { echo 'active'; } ?>" href="inventory.php">
                        <div class="sb-nav-link-icon text-dark"><i class="fas fa-archive"></i></div>
                        Inventory
                    </a>
                    <!-- ---------------------------------------------------------------------->
                    <a class="nav-link text-dark <?php if (strpos($_SERVER['PHP_SELF'], 'home/laundry.php') !== false)  {  } else{ echo'collapsed'; } ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLaundry" aria-expanded="false" aria-controls="collapseLaundry">
                        <div class="sb-nav-link-icon text-dark"><i class="fas fa-users"></i></div>
                        Laundry
                        <div class="sb-sidenav-collapse-arrow text-dark"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse <?php if (strpos($_SERVER['PHP_SELF'], 'home/tool.php') !== false)  { echo'show'; }?>" id="collapseLaundry" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link text-dark <?php if (strpos($_SERVER['PHP_SELF'], 'home/laundry_pending') !== false)  { echo 'active'; } ?>" href="laundry_pending.php">Pending</a>
                            <a class="nav-link text-dark <?php if (strpos($_SERVER['PHP_SELF'], 'home/laundry_pay') !== false)  { echo 'active'; } ?>" href="laundry_pay.php">Mark Paid</a>
                            <a class="nav-link text-dark <?php if (strpos($_SERVER['PHP_SELF'], 'home/laundry_release') !== false)  { echo 'active'; } ?>" href="laundry_release.php">Release</a>
                        </nav>
                    </div>
                    <!-- ---------------------------------------------------------------------->
                    <a class="nav-link  text-dark <?php if (strpos($_SERVER['PHP_SELF'], 'home/sales') !== false)  { echo 'active'; } ?>" href="sales.php">
                        <div class="sb-nav-link-icon text-dark"><i class="fas fa-money-bill-wave"></i></div>
                        Sales
                    </a>
                    <!-- <a class="nav-link  text-dark <?php if (strpos($_SERVER['PHP_SELF'], 'home/reports.php') !== false)  { echo 'active'; } ?>" href="#">
                        <div class="sb-nav-link-icon text-dark"><i class="fas fa-file"></i></div>
                        Reports
                    </a> -->
                    <?php 
                        $userrole = $_SESSION["auth_role"];

                        if (strtoupper($userrole) == "ADMIN") { ?>
                            <a class="nav-link text-dark <?php if (strpos($_SERVER['PHP_SELF'], 'home/user') !== false || strpos($_SERVER['PHP_SELF'], 'home/user_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/user_edit.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/user_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/customer.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/customer_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/customer_edit.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/customer_view.php') !== false)  {  } else{ echo'collapsed'; } ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAccounts" aria-expanded="false" aria-controls="collapseAccounts">
                                <div class="sb-nav-link-icon text-dark"><i class="fas fa-users"></i></div>
                                Accounts
                                <div class="sb-sidenav-collapse-arrow text-dark"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse <?php if (strpos($_SERVER['PHP_SELF'], 'home/user') !== false || strpos($_SERVER['PHP_SELF'], 'home/user_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/user_edit.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/user_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/customer.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/customer_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/customer_edit.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/customer_view.php') !== false)  { echo'show'; }?>" id="collapseAccounts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link text-dark <?php if (strpos($_SERVER['PHP_SELF'], 'home/customer') !== false || strpos($_SERVER['PHP_SELF'], 'home/customer_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/customer_edit.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/customer_view.php') !== false)  { echo 'active'; } ?>" href="customer.php">Customers</a>
                                    <a class="nav-link text-dark <?php if (strpos($_SERVER['PHP_SELF'], 'home/user') !== false || strpos($_SERVER['PHP_SELF'], 'home/user_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/user_edit.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/user_view.php') !== false)  { echo 'active'; } ?>" href="user.php">Users</a>
                                </nav>
                            </div>
                        <?php } ?>
                        <a class="nav-link text-dark <?php if (strpos($_SERVER['PHP_SELF'], 'home/user.php') !== false)  {  } else{ echo'collapsed'; } ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseTool" aria-expanded="false" aria-controls="collapseTool">
                            <div class="sb-nav-link-icon text-dark"><i class="fas fa-wrench"></i></div>
                            Tools
                            <div class="sb-sidenav-collapse-arrow text-dark"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse <?php if (strpos($_SERVER['PHP_SELF'], 'home/tool') !== false)  { echo'show'; }?>" id="collapseTool" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link text-dark <?php if (strpos($_SERVER['PHP_SELF'], 'home/tool_category') !== false)  { echo 'active'; } ?>" href="tool_category.php">Add Category</a>
                                <a class="nav-link text-dark <?php if (strpos($_SERVER['PHP_SELF'], 'home/tool_item') !== false)  { echo 'active'; } ?>" href="tool_item.php">Add Item</a>
                                <a class="nav-link text-dark <?php if (strpos($_SERVER['PHP_SELF'], 'home/tool_rate') !== false)  { echo 'active'; } ?>" href="tool_rate.php">Add Rates</a>
                            </nav>
                        </div>
                </div>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">