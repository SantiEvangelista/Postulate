@extends('layout')

@section('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      font-family: "Inter", sans-serif;
    }
    .formbold-main-wrapper {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
      width: 100%;
    }
  
    .formbold-form-wrapper {
      margin: 0 auto;
      max-width: 650px;
      width: 100%;
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }

    @media (min-width: 1200px) {
      .formbold-form-wrapper {
        max-width: 50%;
      }
    }
  
    .formbold-steps {
      padding-bottom: 18px;
      margin-bottom: 35px;
      border-bottom: 1px solid #DDE3EC;
    }
    .formbold-steps ul {
      padding: 0;
      margin: 0;
      list-style: none;
      display: flex;
      gap: 20px;
      justify-content: center;
    }
    .formbold-steps li {
      display: flex;
      align-items: center;
      gap: 8px;
      font-weight: 500;
      font-size: 14px;
      line-height: 20px;
      color: #536387;
    }
    .formbold-steps li span.step-number {
      display: flex;
      align-items: center;
      justify-content: center;
      background: #DDE3EC;
      border-radius: 50%;
      width: 28px;
      height: 28px;
      font-weight: 500;
      font-size: 14px;
      line-height: 20px;
      color: #536387;
    }
    .formbold-steps li.active {
      color: #07074D;
    }
    .formbold-steps li.active span.step-number {
      background: #6A64F1;
      color: #FFFFFF;
    }
  
    .formbold-input-flex {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      margin-bottom: 22px;
    }
    .formbold-input-flex > div {
      flex: 1 1 250px;
      min-width: 0;
    }
    .formbold-form-input {
      width: 100%;
      padding: 13px 22px;
      border-radius: 5px;
      border: 1px solid #DDE3EC;
      background: #FFFFFF;
      font-weight: 500;
      font-size: 16px;
      color: #536387;
      outline: none;
      resize: none;
    }
    .formbold-form-input:focus {
      border-color: #6a64f1;
      box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
    }
    .formbold-form-label {
      color: #07074D;
      font-weight: 500;
      font-size: 14px;
      line-height: 24px;
      display: block;
      margin-bottom: 10px;
    }
  
    .formbold-form-btn-wrapper {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      justify-content: space-between;
      gap: 15px;
      margin-top: 25px;
    }

    .formbold-left-buttons {
      display: flex;
      gap: 15px;
      align-items: center;
    }

    .text-danger {
        color: #dc3545;
        font-size: 0.875rem;
        margin-top: 0.25rem;
        display: block;
    }

    .formbold-form-input.error {
        border-color: #dc3545;
    }

    .formbold-form-input.error:focus {
        box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
    }

    .section {
        margin-bottom: 30px;
    }

    .section h3 {
        margin-bottom: 20px;
        color: #07074D;
        font-size: 18px;
    }

    .dynamic-list {
        margin-bottom: 15px;
    }

    .dynamic-list-item {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 10px;
    }

    .dynamic-list-item select {
        flex: 1;
        min-width: 200px;
    }

    .remove-item {
        color: #dc3545;
        cursor: pointer;
        padding: 5px 10px;
        border-radius: 4px;
        display: flex;
        align-items: center;
        white-space: nowrap;
    }

    .remove-item:hover {
        background-color: #fee2e2;
    }

    .add-item-btn {
        background-color: #28a745;
        color: white;
        border: none;
        padding: 8px 16px;
        border-radius: 4px;
        cursor: pointer;
        margin-bottom: 15px;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .add-item-btn:hover {
        background-color: #218838;
    }

    .formbold-steps li span.step-text {
      display: inline;
    }

    @media (max-width: 576px) {
      .formbold-main-wrapper {
        padding: 15px;
      }
      
      .formbold-form-wrapper {
        padding: 15px;
      }

      .formbold-input-flex > div {
        width: 100%;
      }

      .formbold-form-btn-wrapper {
        flex-direction: column-reverse;
        align-items: stretch;
      }

      .formbold-left-buttons {
        justify-content: center;
      }

      .formbold-btn {
        width: 100%;
        justify-content: center;
      }

      .section h3 {
        font-size: 16px;
      }

      .dynamic-list-item {
        flex-direction: column;
      }

      .dynamic-list-item select {
        width: 100%;
      }

      .remove-item {
        justify-content: center;
      }

      .add-item-btn {
        width: 100%;
        justify-content: center;
      }

      .formbold-steps li:not(.active) span.step-text {
        display: none;
      }

      .formbold-steps li.active span.step-text {
        display: inline;
      }

      .formbold-steps ul {
        gap: 12px;
      }
    }
</style>
@endsection

@section('body')
@include('components.switch-languaje')

    <div class="formbold-main-wrapper">
        <div class="formbold-form-wrapper">
            <form action="{{ route('generador.paso3.store') }}" method="POST" class="needs-validation" novalidate>
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
                        @if($lenguajes->isNotEmpty())
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
                        @if($rasgos->isNotEmpty())
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
                        @if($otrosEstudios->isNotEmpty())
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
                        @include('components.back-button', ['route' => 'generador.paso2.create'])
                        @include('components.clear-session')
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
@endsection

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
