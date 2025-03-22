<!-- Footer Section -->
<footer class="footer py-5 bg-light">
    <div class="container">
        <div class="row">
            <!-- Company Info -->
            <div class="col-lg-3 mb-4 mb-lg-0">
                <div class="footer-brand mb-4">
                    <h5 class="mb-3">CV Generator</h5>
                </div>
                <p class="text-muted mb-4">
                    {{ config('app.address', '1355 Market St, Suite 900') }}<br>
                    {{ config('app.city', 'San Francisco, CA 94103') }}<br>
                    P: {{ config('app.phone', '(123) 456-7890') }}
                </p>
            </div>

            <!-- Company Links -->
            <div class="col-lg-3 mb-4 mb-lg-0">
                <h5 class="mb-3">{{ __('footer.company') }}</h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="#" class="text-muted text-decoration-none">{{ __('footer.about_us') }}</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-muted text-decoration-none">{{ __('footer.services') }}</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-muted text-decoration-none">{{ __('footer.contact') }}</a>
                    </li>
                </ul>
            </div>

            <!-- Products Links -->
            <div class="col-lg-3 mb-4 mb-lg-0">
                <h5 class="mb-3">{{ __('footer.products') }}</h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="#" class="text-muted text-decoration-none">{{ __('footer.cv_generator') }}</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-muted text-decoration-none">{{ __('footer.templates') }}</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-muted text-decoration-none">{{ __('footer.examples') }}</a>
                    </li>
                </ul>
            </div>

            <!-- Newsletter -->
            <div class="col-lg-3">
                <h5 class="mb-3">{{ __('footer.newsletter') }}</h5>
                <p class="text-muted mb-3">{{ __('footer.newsletter_text') }}</p>
                <form class="mb-3">
                    <div class="input-group">
                        <input type="email" class="form-control" placeholder="{{ __('footer.email_placeholder') }}">
                        <button class="btn btn-dark" type="submit">{{ __('footer.subscribe') }}</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Copyright -->
        <div class="row mt-5 pt-4 border-top">
            <div class="col-md-6 text-center text-md-start">
                <p class="text-muted mb-0">
                    &copy; {{ date('Y') }} {{ config('app.name', 'CV Generator') }}. {{ __('footer.rights') }}
                </p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <div class="social-links">
                    <a href="#" class="text-muted text-decoration-none me-3">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="#" class="text-muted text-decoration-none me-3">
                        <i class="bi bi-twitter"></i>
                    </a>
                    <a href="#" class="text-muted text-decoration-none me-3">
                        <i class="bi bi-linkedin"></i>
                    </a>
                    <a href="#" class="text-muted text-decoration-none">
                        <i class="bi bi-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <style>
        .footer {
            font-size: 0.9rem;
        }
        .footer h5 {
            font-weight: 600;
            color: #212529;
        }
        .footer-brand {
            font-weight: bold;
        }
        .social-links a:hover {
            color: #212529 !important;
        }
        .btn-dark {
            border-radius: 0;
            padding: 0.5rem 1rem;
        }
        .form-control {
            border-radius: 0;
            padding: 0.5rem 1rem;
        }
    </style>
</footer> 