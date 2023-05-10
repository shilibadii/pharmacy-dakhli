<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->

<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title><?php echo $title; ?></title>

    <meta name="author" content="themesflat.com">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <!-- Reponsive -->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="assets/icon/Favicon.png">
    <link rel="apple-touch-icon-precomposed" href="assets/icon/Favicon.png">

</head>

<body class="body header-fixed">

    <!-- preloade -->
    <div class="preload preload-container">
        <div class="preload-logo"></div>
    </div>
    <!-- /preload -->

    <div id="wrapper" class="wrapper-style">
        <div id="page" class="clearfix">
        <?php echo $content; ?>
         <!-- Footer -->
         <footer class="footer">
             
                <div class="bottom-inner">
                    <div class="tf-container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="bottom">
                                   
                                    <p class="copy-right">Pharmacy 2023 - ALL rights reserved</p>
    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           </footer>
        </div>
        <!-- /#page -->
    </div>
    <!-- /#wrapper -->

    <a id="scroll-top"></a>
    <div class="modal fade popup" id="popup_bid" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                
                <div class="modal-body ">
                    <a href="#" class="btn-close" data-dismiss="modal"><i class="fal fa-times"></i></a>
                    <?php
                    echo "<h3>Welcome ". ($_SESSION['username']) ."</h3>"
                     ?>
                     <div class="justify-content-center mb30 mt-5">
                        <a href="add_medecin.php" class="tf-button connect w-75"  > <span>ADD MEDECIN</span></a>
                    </div>
                     <div class="justify-content-center mb30">
                        <a href="change_password.php" class="tf-button connect w-75"  > <span>CHANGE PASSWORD</span></a>
                    </div>
                    <div class="justify-content-center mb30">
                        <a href="logout.php" class="tf-button connect w-75"  > <span>LOGOUT</span></a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
  
    <!-- Javascript -->

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.easing.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-validate.js"></script>
    <script src="assets/js/swiper-bundle.min.js"></script>
    <script src="assets/js/textanimation.js"></script>
    <script src="assets/js/swiper.js"></script>
    <script src="assets/js/switchmode.js"></script>
    <script src="assets/js/plugin.js"></script>
    <script src="assets/js/shortcodes.js"></script>
    <script src="assets/js/main.js"></script>
    

</body>

</html>