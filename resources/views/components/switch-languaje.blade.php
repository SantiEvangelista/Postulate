    <div class="language-selector position-fixed top-0 end-0 m-3">
        <div class="btn-group">
            <a href="{{ route('language.switch', 'es') }}" class="btn btn-sm {{ App::getLocale() == 'es' ? 'btn-dark' : 'btn-outline-dark' }}">ES</a>
            <a href="{{ route('language.switch', 'en') }}" class="btn btn-sm {{ App::getLocale() == 'en' ? 'btn-dark' : 'btn-outline-dark' }}">EN</a>
        </div>
    </div>