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
        <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">

        <!-- CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }} ">
        <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
        <link rel="stylesheet" href="{{ asset('css/style-responsive.css') }} ">
        <link rel="stylesheet" href="{{ asset('css/animate.min.css') }} ">
        <link rel="stylesheet" href="{{ asset('css/vertical-rhythm.min.css') }} ">
        <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }} ">
        <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }} ">
    </head>
    <body class="appear-animate">
        
        @yield('body')
         <!-- Foter -->
            <footer style="background-color: #111111;color: white" class="page-section footer pb-60">
                <div class="container">

                    <!-- Footer Logo -->
                    <div class="local-scroll mb-30 wow fadeInUp" data-wow-duration="1.2s">
                        <a href="#top"><img src="{{ asset('images/logo-footer.png') }}" width="78" height="36" alt="Company logo" /><span class="sr-only">Scroll to the top of the page</span></a>
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
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script type="text/javascript" src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>        
        <script type="text/javascript" src="{{ asset('js/SmoothScroll.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.scrollTo.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.localScroll.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.viewport.mini.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.countTo.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.appear.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.sticky.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.parallax-1.1.3.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.fitvids.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/wow.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/masonry.pkgd.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/morphext.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.lazyload.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/all.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/contact-form.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>  
              
        
        @yield('scripts')
    </body>
</html>
