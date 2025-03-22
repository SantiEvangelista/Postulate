<div class="formbold-main-wrapper">
    <div class="formbold-form-wrapper">
<form id="step3Form" action="{{ route('stepper.ajax.submit.step3') }}" method="POST">
    @csrf
    <div class="formbold-steps">
        <ul>
            <li>
                <span class="step-number">1</span>
                <span class="step-text">{{ __('stepper.steps.personal_info') }}</span>
            </li>
            <li>
                <span class="step-number">2</span>
                <span class="step-text">{{ __('stepper.steps.education') }}</span>
            </li>
            <li class="active">
                <span class="step-number">3</span>
                <span class="step-text">{{ __('stepper.steps.experience') }}</span>
            </li>
        </ul>
    </div>

    <div class="section">
        <h3>{{ __('stepper.experience.professional_objective') }}</h3>
        <textarea name="objetivo_profesional" 
            class="formbold-form-input @error('objetivo_profesional') error @enderror"
            placeholder="{{ __('stepper.placeholders.professional_objective') }}"
            rows="4">{{ old('objetivo_profesional', $sessionData->objetivo_profesional ?? '') }}</textarea>
        @error('objetivo_profesional')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="section">
        <h3>{{ __('stepper.experience.languages') }}</h3>
        <div id="languages-container">
            @if(isset($lenguajes) && $lenguajes->isNotEmpty())
                @foreach($lenguajes as $index => $lenguaje)
                    <div class="dynamic-list-item">
                        <select name="lenguajes[{{ $index }}][nombre]" class="formbold-form-input @error('lenguajes.' . $index . '.nombre') error @enderror">
                            <option value="">{{ __('stepper.placeholders.language') }}</option>
                            <option value="Ingles" {{ old('lenguajes.' . $index . '.nombre', $lenguaje->nombre) == 'Ingles' ? 'selected' : '' }}>Inglés</option>
                            <option value="Espanol" {{ old('lenguajes.' . $index . '.nombre', $lenguaje->nombre) == 'Espanol' ? 'selected' : '' }}>Español</option>
                            <option value="Portuges" {{ old('lenguajes.' . $index . '.nombre', $lenguaje->nombre) == 'Portuges' ? 'selected' : '' }}>Portugués</option>
                            <option value="Frances" {{ old('lenguajes.' . $index . '.nombre', $lenguaje->nombre) == 'Frances' ? 'selected' : '' }}>Francés</option>
                            <option value="Chino" {{ old('lenguajes.' . $index . '.nombre', $lenguaje->nombre) == 'Chino' ? 'selected' : '' }}>Chino</option>
                            <option value="Aleman" {{ old('lenguajes.' . $index . '.nombre', $lenguaje->nombre) == 'Aleman' ? 'selected' : '' }}>Alemán</option>
                        </select>
                        <button type="button" class="remove-item" onclick="this.parentElement.remove()">{{ __('stepper.buttons.remove') }}</button>
                    </div>
                @endforeach
            @else
                <div class="dynamic-list-item">
                    <select name="lenguajes[0][nombre]" class="formbold-form-input @error('lenguajes.0.nombre') error @enderror">
                        <option value="">{{ __('stepper.placeholders.language') }}</option>
                        <option value="Ingles" {{ old('lenguajes.0.nombre') == 'Ingles' ? 'selected' : '' }}>Inglés</option>
                        <option value="Espanol" {{ old('lenguajes.0.nombre') == 'Espanol' ? 'selected' : '' }}>Español</option>
                        <option value="Portuges" {{ old('lenguajes.0.nombre') == 'Portuges' ? 'selected' : '' }}>Portugués</option>
                        <option value="Frances" {{ old('lenguajes.0.nombre') == 'Frances' ? 'selected' : '' }}>Francés</option>
                        <option value="Chino" {{ old('lenguajes.0.nombre') == 'Chino' ? 'selected' : '' }}>Chino</option>
                        <option value="Aleman" {{ old('lenguajes.0.nombre') == 'Aleman' ? 'selected' : '' }}>Alemán</option>
                    </select>
                </div>
            @endif
        </div>
        <button type="button" class="add-item-btn" onclick="addLanguage()">{{ __('stepper.experience.add_language') }}</button>
        @error('lenguajes')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="section">
        <h3>{{ __('stepper.experience.personality_traits') }}</h3>
        <div id="traits-container">
            @if(isset($rasgos) && $rasgos->isNotEmpty())
                @foreach($rasgos as $index => $rasgo)
                    <div class="dynamic-list-item">
                        <select name="rasgos[{{ $index }}][nombre]" class="formbold-form-input @error('rasgos.' . $index . '.nombre') error @enderror">
                            <option value="">{{ __('stepper.placeholders.trait') }}</option>
                            <option value="Extrovertido" {{ old('rasgos.' . $index . '.nombre', $rasgo->nombre) == 'Extrovertido' ? 'selected' : '' }}>Extrovertido</option>
                            <option value="Introvertido" {{ old('rasgos.' . $index . '.nombre', $rasgo->nombre) == 'Introvertido' ? 'selected' : '' }}>Introvertido</option>
                            <option value="Amable" {{ old('rasgos.' . $index . '.nombre', $rasgo->nombre) == 'Amable' ? 'selected' : '' }}>Amable</option>
                            <option value="Sensible" {{ old('rasgos.' . $index . '.nombre', $rasgo->nombre) == 'Sensible' ? 'selected' : '' }}>Sensible</option>
                            <option value="Amistoso" {{ old('rasgos.' . $index . '.nombre', $rasgo->nombre) == 'Amistoso' ? 'selected' : '' }}>Amistoso</option>
                            <option value="Inteligente" {{ old('rasgos.' . $index . '.nombre', $rasgo->nombre) == 'Inteligente' ? 'selected' : '' }}>Inteligente</option>
                        </select>
                        <button type="button" class="remove-item" onclick="this.parentElement.remove()">{{ __('stepper.buttons.remove') }}</button>
                    </div>
                @endforeach
            @else
                <div class="dynamic-list-item">
                    <select name="rasgos[0][nombre]" class="formbold-form-input @error('rasgos.0.nombre') error @enderror">
                        <option value="">{{ __('stepper.placeholders.trait') }}</option>
                        <option value="Extrovertido" {{ old('rasgos.0.nombre') == 'Extrovertido' ? 'selected' : '' }}>Extrovertido</option>
                        <option value="Introvertido" {{ old('rasgos.0.nombre') == 'Introvertido' ? 'selected' : '' }}>Introvertido</option>
                        <option value="Amable" {{ old('rasgos.0.nombre') == 'Amable' ? 'selected' : '' }}>Amable</option>
                        <option value="Sensible" {{ old('rasgos.0.nombre') == 'Sensible' ? 'selected' : '' }}>Sensible</option>
                        <option value="Amistoso" {{ old('rasgos.0.nombre') == 'Amistoso' ? 'selected' : '' }}>Amistoso</option>
                        <option value="Inteligente" {{ old('rasgos.0.nombre') == 'Inteligente' ? 'selected' : '' }}>Inteligente</option>
                    </select>
                </div>
            @endif
        </div>
        <button type="button" class="add-item-btn" onclick="addTrait()">{{ __('stepper.experience.add_trait') }}</button>
        @error('rasgos')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="section">
        <h3>{{ __('stepper.experience.other_studies') }}</h3>
        <div id="studies-container">
            @if(isset($otrosEstudios) && $otrosEstudios->isNotEmpty())
                @foreach($otrosEstudios as $index => $estudio)
                    <div class="dynamic-list-item">
                        <select name="otros_estudios[{{ $index }}][nombre]" class="formbold-form-input @error('otros_estudios.' . $index . '.nombre') error @enderror">
                            <option value="">{{ __('stepper.placeholders.study') }}</option>
                            <option value="Python" {{ old('otros_estudios.' . $index . '.nombre', $estudio->nombre) == 'Python' ? 'selected' : '' }}>Python</option>
                            <option value="Excel" {{ old('otros_estudios.' . $index . '.nombre', $estudio->nombre) == 'Excel' ? 'selected' : '' }}>Excel</option>
                            <option value="PHP" {{ old('otros_estudios.' . $index . '.nombre', $estudio->nombre) == 'PHP' ? 'selected' : '' }}>PHP</option>
                            <option value="Laravel" {{ old('otros_estudios.' . $index . '.nombre', $estudio->nombre) == 'Laravel' ? 'selected' : '' }}>Laravel</option>
                        </select>
                        <button type="button" class="remove-item" onclick="this.parentElement.remove()">{{ __('stepper.buttons.remove') }}</button>
                    </div>
                @endforeach
            @else
                <div class="dynamic-list-item">
                    <select name="otros_estudios[0][nombre]" class="formbold-form-input @error('otros_estudios.0.nombre') error @enderror">
                        <option value="">{{ __('stepper.placeholders.study') }}</option>
                        <option value="Python" {{ old('otros_estudios.0.nombre') == 'Python' ? 'selected' : '' }}>Python</option>
                        <option value="Excel" {{ old('otros_estudios.0.nombre') == 'Excel' ? 'selected' : '' }}>Excel</option>
                        <option value="PHP" {{ old('otros_estudios.0.nombre') == 'PHP' ? 'selected' : '' }}>PHP</option>
                        <option value="Laravel" {{ old('otros_estudios.0.nombre') == 'Laravel' ? 'selected' : '' }}>Laravel</option>
                    </select>
                </div>
            @endif
        </div>
        <button type="button" class="add-item-btn" onclick="addStudy()">{{ __('stepper.experience.add_study') }}</button>
        @error('otros_estudios')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="section">
        <h3>{{ __('stepper.experience.interesting_data') }}</h3>
        <textarea name="datos_interes" 
            class="formbold-form-input @error('datos_interes') error @enderror"
            placeholder="{{ __('stepper.placeholders.interesting_data') }}"
            rows="4">{{ old('datos_interes', $sessionData->datos_interes ?? '') }}</textarea>
        @error('datos_interes')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="formbold-form-btn-wrapper">
        <div class="formbold-left-buttons">
            <a href="#" class="formbold-clear-btn">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.3334 4L12.3934 4.94L11.4534 4L10.5134 4.94L9.57341 4L8.63341 4.94L7.69341 4L6.75341 4.94L5.81341 4L4.87341 4.94L3.93341 4L3 4.94V13.3333H13.3334V4ZM5.81341 11.3333H4.87341V9.45333H5.81341V11.3333ZM8.63341 11.3333H7.69341V9.45333H8.63341V11.3333ZM11.4534 11.3333H10.5134V9.45333H11.4534V11.3333Z" fill="#DC3545"/>
                </svg>
                {{ __('stepper.buttons.clear') }}
            </a>
            <a href="{{ route('generador.paso2.create') }}" class="formbold-back-btn">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.21875 7.33312L8.79475 3.75712L7.85208 2.81445L2.66675 7.99979L7.85208 13.1851L8.79475 12.2425L5.21875 8.66645H13.3334V7.33312H5.21875Z" fill="#07074D"/>
                </svg>
                {{ __('stepper.buttons.back') }}
            </a>
        </div>
        <button type="submit" class="formbold-btn">
            {{ __('stepper.buttons.next') }}
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_1675_1807)">
                    <path d="M10.7814 7.33312L7.20541 3.75712L8.14808 2.81445L13.3334 7.99979L8.14808 13.1851L7.20541 12.2425L10.7814 8.66645H2.66675V7.33312H10.7814Z" fill="white"/>
                </g>
                <defs>
                    <clipPath id="clip0_1675_1807">
                        <rect width="16" height="16" fill="white"/>
                    </clipPath>
                </defs>
            </svg>
        </button>
    </div>
</form>
</div>
</div>

<script>
    let languageCount = 1;
    let traitCount = 1;
    let studyCount = 1;

    function addLanguage() {
        const container = document.getElementById('languages-container');
        const div = document.createElement('div');
        div.className = 'dynamic-list-item';
        div.innerHTML = `
            <select name="lenguajes[${languageCount}][nombre]" class="formbold-form-input">
                <option value="">{{ __('stepper.placeholders.language') }}</option>
                <option value="Ingles">Inglés</option>
                <option value="Espanol">Español</option>
                <option value="Portuges">Portugués</option>
                <option value="Frances">Francés</option>
                <option value="Chino">Chino</option>
                <option value="Aleman">Alemán</option>
            </select>
            <button type="button" class="remove-item" onclick="this.parentElement.remove()">{{ __('stepper.buttons.remove') }}</button>
        `;
        container.appendChild(div);
        languageCount++;
    }

    function addTrait() {
        const container = document.getElementById('traits-container');
        const div = document.createElement('div');
        div.className = 'dynamic-list-item';
        div.innerHTML = `
            <select name="rasgos[${traitCount}][nombre]" class="formbold-form-input">
                <option value="">{{ __('stepper.placeholders.trait') }}</option>
                <option value="Extrovertido">Extrovertido</option>
                <option value="Introvertido">Introvertido</option>
                <option value="Amable">Amable</option>
                <option value="Sensible">Sensible</option>
                <option value="Amistoso">Amistoso</option>
                <option value="Inteligente">Inteligente</option>
            </select>
            <button type="button" class="remove-item" onclick="this.parentElement.remove()">{{ __('stepper.buttons.remove') }}</button>
        `;
        container.appendChild(div);
        traitCount++;
    }

    function addStudy() {
        const container = document.getElementById('studies-container');
        const div = document.createElement('div');
        div.className = 'dynamic-list-item';
        div.innerHTML = `
            <select name="otros_estudios[${studyCount}][nombre]" class="formbold-form-input">
                <option value="">{{ __('stepper.placeholders.study') }}</option>
                <option value="Python">Python</option>
                <option value="Excel">Excel</option>
                <option value="PHP">PHP</option>
                <option value="Laravel">Laravel</option>
            </select>
            <button type="button" class="remove-item" onclick="this.parentElement.remove()">{{ __('stepper.buttons.remove') }}</button>
        `;
        container.appendChild(div);
        studyCount++;
    }
</script>