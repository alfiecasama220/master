<div class="nk-sidebar-main is-light">
                <div class="nk-sidebar-inner" data-simplebar>
                    
                <!-- ADD HERE -->

                    <div class="nk-menu-content menu-active" data-content="navDashboards">
                        <h5 class="title">Dashboards</h5>
                        <ul class="nk-menu">
                            
                        <?php 
                            
                            if(isset($_SESSION['loggedAdmin']) || isset($_SESSION['loggedManager'])) {
                        
                        ?>
                            <li class="nk-menu-item">
                                <a href="html/index.php" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                                    <span class="nk-menu-text">Dashboard</span>
                                </a>
                            </li><!-- .nk-menu-item -->
                        
                            <li class="nk-menu-item">
                                <a href="html/index-sales.php?status=2" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-bag-fill"></em></span>
                                    <span class="nk-menu-text">Sales Dashboard</span>
                                </a>
                            </li><!-- .nk-menu-item -->
                            <?php } ?>
                            <li class="nk-menu-item has-sub">
                                <a href="#" class="nk-menu-link nk-menu-toggle">
                                    <span class="nk-menu-icon"><em class="icon ni ni-inbox-in-fill"></em></span>
                                    <span class="nk-menu-text">Laundry</span>
                                </a>
                                <ul class="nk-menu-sub">
                                    <!-- <li class="nk-menu-item">
                                        <a href="html/laundry/add-laundry.php" class="nk-menu-link"><span class="nk-menu-text">Add Laundry</span></a>
                                    </li> -->
                                    <li class="nk-menu-item">
                                        <a href="html/package-list.php" class="nk-menu-link"><span class="nk-menu-text">Laundry Packages List</span></a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="html/service-list.php" class="nk-menu-link"><span class="nk-menu-text">Laundry Services List</span></a>
                                    </li>
                                    <!-- <li class="nk-menu-item">
                                        <a href="html/laundry/medicine-details.php" class="nk-menu-link"><span class="nk-menu-text">Laundry Details</span></a>
                                    </li> -->
                                </ul><!-- .nk-menu-sub -->
                            </li><!-- .nk-menu-item -->

                            <li class="nk-menu-item has-sub">
                                <a href="#" class="nk-menu-link nk-menu-toggle">
                                    <span class="nk-menu-icon"><em class="icon ni ni-list-fill"></em></span>
                                    <span class="nk-menu-text">Products</span>
                                </a>
                                <ul class="nk-menu-sub">
                                    <!-- <li class="nk-menu-item">
                                        <a href="html/.php" class="nk-menu-link"><span class="nk-menu-text">Add Products</span></a>
                                    </li> -->
                                    <li class="nk-menu-item">
                                        <a href="html/product-list.php" class="nk-menu-link"><span class="nk-menu-text">Products List</span></a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="html/product-details.php" class="nk-menu-link"><span class="nk-menu-text">Products Details</span></a>
                                    </li>
                                </ul><!-- .nk-menu-sub -->
                            </li><!-- .nk-menu-item -->

                            <li class="nk-menu-item has-sub">
                                <a href="#" class="nk-menu-link nk-menu-toggle">
                                    <span class="nk-menu-icon"><em class="icon ni ni-list-fill"></em></span>
                                    <span class="nk-menu-text">Users</span>
                                </a>
                                <ul class="nk-menu-sub">
                                    <li class="nk-menu-item">
                                        <a href="html/pages/auths/register.php" class="nk-menu-link"><span class="nk-menu-text">Add Users</span></a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="html/user-list.php" class="nk-menu-link"><span class="nk-menu-text">User's List</span></a>
                                    </li>
                                    <!-- <li class="nk-menu-item">
                                        <a href="html/product-details.php" class="nk-menu-link"><span class="nk-menu-text">User Profile</span></a>
                                    </li> -->
                                </ul><!-- .nk-menu-sub -->
                            </li><!-- .nk-menu-item -->
                            
                            <li class="nk-menu-item has-sub">
                                <a href="#" class="nk-menu-link nk-menu-toggle">
                                    <span class="nk-menu-icon"><em class="icon ni ni-inbox-in-fill"></em></span>
                                    <span class="nk-menu-text">Send Reports</span>
                                </a>
                                <ul class="nk-menu-sub">
                                    <li class="nk-menu-item">
                                        <a href="html/reports/add-reports.php" class="nk-menu-link"><span class="nk-menu-text">Create Report</span></a>
                                    </li>
                                    <!-- <li class="nk-menu-item">
                                        <a href="html/laundry/medicine-list.php" class="nk-menu-link"><span class="nk-menu-text">Laundry List</span></a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="html/laundry/medicine-details.php" class="nk-menu-link"><span class="nk-menu-text">Laundry Details</span></a>
                                    </li> -->
                                </ul><!-- .nk-menu-sub -->
                            </li><!-- .nk-menu-item -->
                            

                        </ul><!-- .nk-menu -->
                    </div>
                    
                    
                    
                    
                    
                        
                            
                        </ul><!-- .nk-menu -->
                    </div>
                </div>
            </div>