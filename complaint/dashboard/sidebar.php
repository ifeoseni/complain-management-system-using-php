<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="../index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Visit Home Page
                            </a>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard Home Page
                            </a>
                            
                            <div class="sb-sidenav-menu-heading">Complain Section</div>
                            <a class="nav-link" href="lodgecomplain.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                               Lodge Complain
                            </a>
                            <a class="nav-link" href="yourcomplain.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                               View Your Lodge Complain
                            </a>
                            <a class="nav-link" href="othercomplain.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                View Other People Complain
                            </a>
                            
                             
                            <div class="sb-sidenav-menu-heading">Account Section</div>
                            <a class="nav-link" href="logout.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Log Out
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small text-white">Logged in as: <?php echo $_SESSION['username']; ?></div>
                        
                    </div>
                </nav>