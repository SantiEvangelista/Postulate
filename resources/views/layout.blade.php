<!DOCTYPE html>
<!-- Change the value of lang="en" attribute if your website's language is not English.
You can find the code of your language here - https://www.w3schools.com/tags/ref_language_codes.asp -->
<html lang="es">
    <head>
        <title>Generador de Curriculums</title>
        <meta name="description" content="">    
        <meta charset="utf-8">
        <meta name="author" content="https://themeforest.net/user/bestlooker/portfolio">
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        
        <!-- Favicons -->
        <link rel="shortcut icon" href="images/favicon.png">

        <!-- CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/style-responsive.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/vertical-rhythm.min.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
    </head>
    <body class="appear-animate">
        
                    <!-- Navigation panel -->
                    <nav class="main-nav dark transparent stick-fixed">
                        <div class="full-wrapper relative clearfix">
                            <!-- Logo ( * your text or image into link tag *) -->
                            <div class="nav-logo-wrap local-scroll">
                                <a href="#top" class="logo">
                                    <img src="images/logo-white.png" alt="Company logo" />
                                </a>
                            </div>
                            <div class="mobile-nav" role="button" tabindex="0">
                                <i class="fa fa-bars"></i>
                                <span class="sr-only">Menu</span>
                            </div>
                            <!-- Main Menu -->
                            <div class="inner-nav desktop-nav">
                                <ul class="clearlist scroll-nav local-scroll">
                                    <li class="active"><a href="#home">Home</a></li>
                                    <li><a href="#contact">Servicio</a></li>
                                    <li><a href="#contact">Contacto</a></li>
                                    <li><a href="#about">Acerca de </a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <!-- End Navigation panel -->

        @yield('contenido')
         <!-- Foter -->
            <footer style="background-color: #111111;color: white" class="page-section footer pb-60">
                <div class="container">

                    <!-- Footer Logo -->
                    <div class="local-scroll mb-30 wow fadeInUp" data-wow-duration="1.2s">
                        <a href="#top"><img src="images/logo-footer.png" width="78" height="36" alt="Company logo" /><span class="sr-only">Scroll to the top of the page</span></a>
                    </div>
                    <!-- End Footer Logo -->
                    
                    <!-- Social Links -->
                    <div class="footer-social-links mb-110 mb-xs-60">
                        <a href="#" style="color: white" title="Facebook" target="_blank"><i  style="color: white" class="fa fa-facebook"></i> <span  style="color: white" class="sr-only">Facebook profile</span></a>
                        <a href="#" style="color: white" title="Twitter" target="_blank"><i   style="color: white" class="fa fa-twitter"></i> <span   style="color: white" class="sr-only">Twitter profile</span></a>
                        <a href="#" style="color: white" title="Behance" target="_blank"><i   style="color: white" class="fa fa-behance"></i> <span   style="color: white" class="sr-only">Behance profile</span></a>
                        <a href="#" style="color: white" title="LinkedIn+" target="_blank"><i style="color: white" class="fa fa-linkedin"></i> <span  style="color: white" class="sr-only">LinkedIn+ profile</span></a>
                        <a href="#" style="color: white" title="Pinterest" target="_blank"><i style="color: white" class="fa fa-pinterest"></i> <span style="color: white" class="sr-only">Pinterest profile</span></a>
                    </div>
                    <!-- End Social Links -->
                    
                    <!-- Footer Text -->
                    <div class="footer-text">
                        
                        <!-- Copyright -->
                        <div class="footer-copy font-alt">
                            <a href="http://themeforest.net/user/theme-guru/portfolio" target="_blank">© Rhythm 2021</a>.
                        </div>
                        <!-- End Copyright -->
                        
                        <div class="footer-made">
                            Made with love for great people.
                        </div>
                        
                    </div>
                    <!-- End Footer Text --> 
                    
                 </div>
                 
                 
                 <!-- Top Link -->
                 <div class="local-scroll">
                     <a href="#top" class="link-to-top"><i class="fa fa-caret-up"></i></a>
                 </div>
                 <!-- End Top Link -->
                 
            </footer>
            <!-- End Foter -->        
        <!-- JS -->
        <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>        
        <script type="text/javascript" src="js/SmoothScroll.js"></script>
        <script type="text/javascript" src="js/jquery.scrollTo.min.js"></script>
        <script type="text/javascript" src="js/jquery.localScroll.min.js"></script>
        <script type="text/javascript" src="js/jquery.viewport.mini.js"></script>
        <script type="text/javascript" src="js/jquery.countTo.js"></script>
        <script type="text/javascript" src="js/jquery.appear.js"></script>
        <script type="text/javascript" src="js/jquery.sticky.js"></script>
        <script type="text/javascript" src="js/jquery.parallax-1.1.3.js"></script>
        <script type="text/javascript" src="js/jquery.fitvids.js"></script>
        <script type="text/javascript" src="js/owl.carousel.min.js"></script>
        <script type="text/javascript" src="js/isotope.pkgd.min.js"></script>
        <script type="text/javascript" src="js/imagesloaded.pkgd.min.js"></script>
        <script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>
        <script type="text/javascript" src="js/wow.min.js"></script>
        <script type="text/javascript" src="js/masonry.pkgd.min.js"></script>
        <script type="text/javascript" src="js/morphext.js"></script>
        <script type="text/javascript" src="js/jquery.lazyload.min.js"></script>
        <script type="text/javascript" src="js/all.js"></script>
        <script type="text/javascript" src="js/contact-form.js"></script>
        <script type="text/javascript" src="js/jquery.ajaxchimp.min.js"></script>        
        
        @yield('scripts')
    </body>
</html>
