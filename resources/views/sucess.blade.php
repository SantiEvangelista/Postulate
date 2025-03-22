@extends('layout')

@section('body')
    <!-- Language Selector -->
    <div class="language-selector position-fixed top-0 end-0 m-3">
        <div class="btn-group">
            <a href="{{ route('language.switch', 'es') }}" class="btn btn-sm {{ App::getLocale() == 'es' ? 'btn-dark' : 'btn-outline-dark' }}">ES</a>
            <a href="{{ route('language.switch', 'en') }}" class="btn btn-sm {{ App::getLocale() == 'en' ? 'btn-dark' : 'btn-outline-dark' }}">EN</a>
        </div>
    </div>

    <!-- Success Section -->
    <section class="success-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h1 class="display-1 fw-bold mb-4">{{ __('stepper.success.title') }}</h1>
                    <p class="lead mb-5">{{ __('stepper.success.subtitle') }}</p>
                    <a href="{{ route('resultado.pdf',['generador'=>$cv]) }}" target="_blank" class="btn btn-dark btn-lg">
                        {{ __('stepper.success.view_cv') }}
                    </a>
                </div>
            </div>
        </div>
    </section>

    <style>
        .success-section {
            padding: 120px 0;
            background-color: #f8f9fa;
            background-image: url('{{ asset('images/construction/bg-5.webp') }}');
            min-height: 100vh;
            display: flex;
            align-items: center;
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

        .lead {
            font-size: 1.5rem;
            color: #6c757d;
        }
    </style>
@endsection
