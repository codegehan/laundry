<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark bg-dark text-dark" id="sidenavAccordion" style="background-color: #e4f1fa !important">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading text-dark">Home</div>
                    <a class="nav-link  text-dark <?php if (strpos($_SERVER['PHP_SELF'], 'home/index.php') !== false)  { echo 'active'; } ?>" href="../home">
                        <div class="sb-nav-link-icon text-dark"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <!-- <a class="nav-link  text-dark <?php if (strpos($_SERVER['PHP_SELF'], 'home/notification.php') !== false)  { echo 'active'; } ?>" href="notification">
                        <div class="sb-nav-link-icon text-dark"><i class="fas fa-bell"></i></div>
                        Notification
                    </a> -->
                    <a class="nav-link text-dark <?php if (strpos($_SERVER['PHP_SELF'], 'home/user.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/user_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/user_edit.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/user_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/customer.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/customer_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/customer_edit.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/customer_view.php') !== false)  {  } else{ echo'collapsed'; } ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAccounts" aria-expanded="false" aria-controls="collapseAccounts">
                        <div class="sb-nav-link-icon text-dark"><i class="fas fa-users"></i></div>
                        Accounts
                        <div class="sb-sidenav-collapse-arrow text-dark"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse <?php if (strpos($_SERVER['PHP_SELF'], 'home/user.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/user_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/user_edit.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/user_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/customer.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/customer_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/customer_edit.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/customer_view.php') !== false)  { echo'show'; }?>" id="collapseAccounts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link text-dark <?php if (strpos($_SERVER['PHP_SELF'], 'home/customer.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/customer_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/customer_edit.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/customer_view.php') !== false)  { echo 'active'; } ?>" href="customer">Customers</a>
                            <a class="nav-link text-dark <?php if (strpos($_SERVER['PHP_SELF'], 'home/user.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/user_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/user_edit.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/user_view.php') !== false)  { echo 'active'; } ?>" href="user">Users</a>
                        </nav>
                    </div>
                    <a class="nav-link  text-dark <?php if (strpos($_SERVER['PHP_SELF'], 'home/inventory.php') !== false)  { echo 'active'; } ?>" href="inventory">
                        <div class="sb-nav-link-icon text-dark"><i class="fas fa-archive"></i></div>
                        Inventory Management
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">