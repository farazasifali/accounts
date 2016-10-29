<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo site_url(); ?>">Exclusive Accounts</a>
    </div>
    <!-- /.navbar-header -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">

                <!-- Dashboard -->
                <li>
                    <a href="<?php echo site_url('Dashboard'); ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <!-- ./Dashboard -->

                <li>
                    <a href="#">
                        <i class="fa fa-money" aria-hidden="true"></i>
                        Expenses
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo site_url("Person"); ?>">Person</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url("Expenses/expensesCategory"); ?>">Expense Category</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url("Expenses"); ?>">Expense</a>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="#">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        Employee
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo site_url("Employee"); ?>">View Employees</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url("Employee"); ?>">Employee Salaries</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        Purchases
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo site_url("Vendors"); ?>">Vendor</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url("Purchases"); ?>">View Purchases</a>
                        </li>
                    </ul>
                </li>

                <!-- Transactions -->
                <li>
                    <a href="<?php echo site_url("Transactions"); ?>">
                        <i class="fa fa-calculator" aria-hidden="true"></i> 
                        Transactions
                    </a>
                </li>
                <!-- ./Transactions -->

                <!-- Transactions -->
                <li>
                    <a href="<?php echo site_url("Login/Logout"); ?>">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                        Logout
                    </a>
                </li>
                <!-- ./Transactions -->

            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>