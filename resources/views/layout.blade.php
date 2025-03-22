<!DOCTYPE html>
<!-- Change the value of lang="en" attribute if your website's language is not English.
You can find the code of your language here - https://www.w3schools.com/tags/ref_language_codes.asp -->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>{{ config('app.name', 'CV Generator') }}</title>
        <meta name="description" content="">    
        <meta charset="utf-8">
        <meta name="author" content="https://themeforest.net/user/bestlooker/portfolio">
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        
        <!-- Favicons -->
        <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">

        <!-- CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
        <link rel="stylesheet" href="{{ asset('css/style-responsive.css') }} ">
        
        

        @yield('styles')
    </head>
    <body class="appear-animate">
        
        @yield('body')
        
        @include('components.footer')
        
        <!-- JS -->
        
        
        <div class="toast-container">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="toast" role="alert">
                        <div class="toast-content">
                            {{ $error }}
                        </div>
                        <button type="button" class="toast-close" aria-label="Close">×</button>
                    </div>
                @endforeach
            @endif
        </div>
        
        <script src="{{ asset('js/toastr.js') }}"></script>
        @yield('scripts')
    </body>
</html>
