<nav id="navScroll" class="navbar navbar-expand-lg navbar-light fixed-top" tabindex="0">
    <div class="container">
       
        {{-- <a class="navbar-brand pe-4 fs-4" href="/">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                class="bi bi-layers-half" viewbox="0 0 16 16">
                <path
                    d="M8.235 1.559a.5.5 0 0 0-.47 0l-7.5 4a.5.5 0 0 0 0 .882L3.188 8 .264 9.559a.5.5 0 0 0 0 .882l7.5 4a.5.5 0 0 0 .47 0l7.5-4a.5.5 0 0 0 0-.882L12.813 8l2.922-1.559a.5.5 0 0 0 0-.882l-7.5-4zM8 9.433 1.562 6 8 2.567 14.438 6 8 9.433z" />
            </svg>
            <span class="ms-1 fw-bolder">{{ config('app.name', 'HR System') }}</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> --}}

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#how-it-works" aria-label="{{ __('messages.nav.objectives') }}">
                        {{ __('messages.nav.objectives') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#impact" aria-label="{{ __('messages.nav.metrics') }}">
                        {{ __('messages.nav.metrics') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#aboutUs" aria-label="{{ __('messages.nav.about') }}">
                        {{ __('messages.nav.about') }}
                    </a>
                </li>
            </ul>
        </div>
        @include('components.switch-languaje')
    </div>    
</nav>
