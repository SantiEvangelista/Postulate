@extends('layout')

@section('styles')
<style>
    .error-section {
        padding: 10rem 0;
        height: 100%;
        display: flex;
        align-items: center;
    }

    .error-code {
        font-size: 8rem;
        font-weight: bold;
        color: #212529;
        line-height: 1;
        margin-bottom: 1rem;
    }

    .error-title {
        font-size: 2rem;
        color: #212529;
        margin-bottom: 1rem;
    }

    .error-message {
        font-size: 1.25rem;
        color: #212529;
        margin-bottom: 2rem;
    }

    .btn-primary {
        padding: 0.8rem 2rem;
        border-radius: 5px;
        background-color: #212529;
        border: none;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #5753e4;
        box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
    }

    .language-selector {
        z-index: 1000;
    }
</style>
@endsection

@section('body')
    <!-- Language Selector -->
    @include('components.switch-languaje')

    <!-- Error Section -->
    <section class="error-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="error-code">404</div>
                    <h1 class="error-title">{{ __('errors.404.title') }}</h1>
                    <p class="error-message">{{ __('errors.404.message') }}</p>
                    <a href="{{ route('generador.paso1.create') }}" class="btn btn-primary btn-lg">
                        {{ __('errors.404.back_home') }}
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection 