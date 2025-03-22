@extends('layout')

@section('body')
    <!-- Language Selector -->
    <div class="language-selector position-fixed top-0 end-0 m-3">
        <div class="btn-group">
            <a href="{{ route('language.switch', 'es') }}" class="btn btn-sm {{ App::getLocale() == 'es' ? 'btn-dark' : 'btn-outline-dark' }}">ES</a>
            <a href="{{ route('language.switch', 'en') }}" class="btn btn-sm {{ App::getLocale() == 'en' ? 'btn-dark' : 'btn-outline-dark' }}">EN</a>
        </div>
    </div>

    <!-- Hero Section -->
    <section class="home-section">
       
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="display-1 fw-bold mb-4">{{ __('home.title') }}</h1>
                    <p class="lead mb-4">{{ __('home.subtitle') }}</p>
                    <a href="#" class="btn btn-dark btn-lg">{{ __('home.get_started') }}</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services-section py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold">{{ __('home.services_title') }}</h2>
                <p class="lead">{{ __('home.services_subtitle') }}</p>
            </div>

            <div class="row g-4">
                <!-- Service Item 1 -->
                <div class="col-md-4">
                    <div class="service-item">
                        <span class="service-number">01.</span>
                        <h3 class="h4 mb-3">{{ __('home.service_1_title') }}</h3>
                        <p>{{ __('home.service_1_description') }}</p>
                        <a href="#" class="text-dark text-decoration-none">{{ __('home.service_1_link') }}</a>
                    </div>
                </div>

                <!-- Service Item 2 -->
                <div class="col-md-4">
                    <div class="service-item">
                        <span class="service-number">02.</span>
                        <h3 class="h4 mb-3">{{ __('home.service_2_title') }}</h3>
                        <p>{{ __('home.service_2_description') }}</p>
                        <a href="#" class="text-dark text-decoration-none">{{ __('home.service_2_link') }}</a>
                    </div>
                </div>

                <!-- Service Item 3 -->
                <div class="col-md-4">
                    <div class="service-item">
                        <span class="service-number">03.</span>
                        <h3 class="h4 mb-3">{{ __('home.service_3_title') }}</h3>
                        <p>{{ __('home.service_3_description') }}</p>
                        <a href="#" class="text-dark text-decoration-none">{{ __('home.service_3_link') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .home-section {
            padding: 120px 0;
            background-color: #f8f9fa;
            background-image: url('{{ asset('images/construction/bg-5.webp') }}');
        }

        .services-section {
            background-color: #fff;
        }

        .service-item {
            padding: 2rem;
            background-color: #fff;
            border: 1px solid #dee2e6;
            height: 100%;
            transition: all 0.3s ease;
        }

        .service-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .service-number {
            font-size: 1rem;
            font-weight: 600;
            color: #6c757d;
            display: block;
            margin-bottom: 1rem;
        }

        .btn-dark {
            padding: 0.8rem 2rem;
            border-radius: 0;
        }

        .btn-dark:hover {
            background-color: #343a40;
        }

        .language-selector {
            z-index: 1000;
        }
    </style>
@endsection 