<header class="header">
                <div class="tf-container">
                    <div class="row">
                        <div class="col-md-12">                              
                            <div id="site-header-inner">                                 
                                <div id="site-logo" class="clearfix">
                                    <div id="site-logo-inner">
                                        <a href="index.php" rel="home" class="main-logo">
                                            <img id="logo_header" src="assets/images/logo/logo_dark.png" alt="Image">
                                        </a>
                                    </div>
                                </div>
                                
                               <div class="header-center">
                                <nav id="main-nav" class="main-nav">
                                    <ul id="menu-primary-menu" class="menu">
                                        <li class="menu-item ">
                                            <a href="index.php">HOME</a>
                                            
                                        </li>
                                        <li class="menu-item">
                                            <a href="medecins.php">MEDECINS</a>                                        
                                        </li>

                                        <li class="menu-item">
                                            <a href="contact.php">CONTACT</a>                                        
                                        </li>
                                    </ul>
                                </nav><!-- /#main-nav -->
                               </div>
                               <div class="header-right">
                               <?php
                                if (session_status() == PHP_SESSION_NONE) {
                                    session_start();
                                }

                                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                                    // If the user is logged in, show a profile button
                                    echo '<a href="#" class="tf-button connect" data-toggle="modal" data-target="#popup_bid"> <i class="icon-fl-settings"></i><span>SETTINGS</span></a>';
                                } else {
                                    // If the user is not logged in, show a login button
                                    
                                    echo '<a href="login.php" class="tf-button connect"  > <span>CONNECT</span></a>';
                                }
                                ?>
                                

                                    
                                   
                                </div>   

                                <div class="mobile-button"><span></span></div><!-- /.mobile-button -->
                            </div>
                        </div>
                    </div>
                </div>
                
            </header>