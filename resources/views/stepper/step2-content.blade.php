<div class="formbold-main-wrapper">
    <div class="formbold-form-wrapper">
        <form id="step2Form" action="{{ route('stepper.ajax.submit.step2') }}" method="POST">
            @csrf
            <div class="formbold-steps">
                <ul>
                    <li>
                        <span class="step-number">1</span>
                        <span class="step-text">{{ __('stepper.steps.personal_info') }}</span>
                    </li>
                    <li class="active">
                        <span class="step-number">2</span>
                        <span class="step-text">{{ __('stepper.steps.education') }}</span>
                    </li>
                    <li>
                        <span class="step-number">3</span>
                        <span class="step-text">{{ __('stepper.steps.experience') }}</span>
                    </li>
                </ul>
            </div>

            <div class="education-section">
                <h3>{{ __('stepper.education.secondary.title') }}</h3>
                <div class="formbold-input-flex">
                    <div>
                        <label for="secundario"
                            class="formbold-form-label">{{ __('stepper.education.secondary.school') }}</label>
                        <input type="text" name="secundario" id="secundario"
                            class="formbold-form-input @error('secundario') error @enderror"
                            value="{{ old('secundario', $sessionData->secundario ?? '') }}"
                            placeholder="{{ __('stepper.placeholders.school') }}" required>
                        @error('secundario')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="orientacion"
                            class="formbold-form-label">{{ __('stepper.education.secondary.orientation') }}</label>
                        <input type="text" name="orientacion" id="orientacion"
                            class="formbold-form-input @error('orientacion') error @enderror"
                            value="{{ old('orientacion', $sessionData->orientacion ?? '') }}"
                            placeholder="{{ __('stepper.placeholders.orientation') }}" required>
                        @error('orientacion')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="formbold-input-flex">
                    <div>
                        <label for="fecha_inicio_secundario"
                            class="formbold-form-label">{{ __('stepper.education.secondary.start_date') }}</label>
                        <input type="date" name="fecha_inicio_secundario" id="fecha_inicio_secundario"
                            class="formbold-form-input @error('fecha_inicio_secundario') error @enderror"
                            value="{{ old('fecha_inicio_secundario', $sessionData->fecha_inicio_secundario ?? '') }}"
                            required>
                        @error('fecha_inicio_secundario')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="fecha_fin_secundario"
                            class="formbold-form-label">{{ __('stepper.education.secondary.end_date') }}</label>
                        <input type="date" name="fecha_fin_secundario" id="fecha_fin_secundario"
                            class="formbold-form-input"
                            value="{{ old('fecha_fin_secundario', $sessionData->fecha_fin_secundario ?? '') }}">
                    </div>
                </div>
            </div>

            <div class="education-section">
                <h3>{{ __('stepper.education.tertiary.title') }}</h3>
                <div class="formbold-input-flex">
                    <div>
                        <label for="terciaria"
                            class="formbold-form-label">{{ __('stepper.education.tertiary.school') }}</label>
                        <input type="text" name="terciaria" id="terciaria"
                            class="formbold-form-input @error('terciaria') error @enderror"
                            value="{{ old('terciaria', $sessionData->terciaria ?? '') }}"
                            placeholder="{{ __('stepper.placeholders.school') }}" required>
                        @error('terciaria')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="orientacion_terciaria"
                            class="formbold-form-label">{{ __('stepper.education.tertiary.orientation') }}</label>
                        <input type="text" name="orientacion_terciaria" id="orientacion_terciaria"
                            class="formbold-form-input @error('orientacion_terciaria') error @enderror"
                            value="{{ old('orientacion_terciaria', $sessionData->orientacion_terciaria ?? '') }}"
                            placeholder="{{ __('stepper.placeholders.orientation') }}" required>
                        @error('orientacion_terciaria')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="formbold-input-flex">
                    <div>
                        <label for="fecha_inicio_terciaria"
                            class="formbold-form-label">{{ __('stepper.education.tertiary.start_date') }}</label>
                        <input type="date" name="fecha_inicio_terciaria" id="fecha_inicio_terciaria"
                            class="formbold-form-input @error('fecha_inicio_terciaria') error @enderror"
                            value="{{ old('fecha_inicio_terciaria', $sessionData->fecha_inicio_terciaria ?? '') }}"
                            required>
                        @error('fecha_inicio_terciaria')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="fecha_fin_terciaria"
                            class="formbold-form-label">{{ __('stepper.education.tertiary.end_date') }}</label>
                        <input type="date" name="fecha_fin_terciaria" id="fecha_fin_terciaria"
                            class="formbold-form-input"
                            value="{{ old('fecha_fin_terciaria', $sessionData->fecha_fin_terciaria ?? '') }}">
                    </div>
                </div>
            </div>

            <div class="formbold-form-btn-wrapper">
                <div class="formbold-left-buttons">
                    <a href="{{ route('generador.clearSession') }}" class="formbold-clear-btn">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.3334 4L12.3934 4.94L11.4534 4L10.5134 4.94L9.57341 4L8.63341 4.94L7.69341 4L6.75341 4.94L5.81341 4L4.87341 4.94L3.93341 4L3 4.94V13.3333H13.3334V4ZM5.81341 11.3333H4.87341V9.45333H5.81341V11.3333ZM8.63341 11.3333H7.69341V9.45333H8.63341V11.3333ZM11.4534 11.3333H10.5134V9.45333H11.4534V11.3333Z"
                                fill="#DC3545" />
                        </svg>
                        {{ __('stepper.buttons.clear') }}
                    </a>
                    <a href="{{ route('generador.paso1.create') }}" class="formbold-back-btn">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.21875 7.33312L8.79475 3.75712L7.85208 2.81445L2.66675 7.99979L7.85208 13.1851L8.79475 12.2425L5.21875 8.66645H13.3334V7.33312H5.21875Z"
                                fill="#07074D" />
                        </svg>
                        {{ __('stepper.buttons.back') }}
                    </a>
                </div>
                <button type="submit" class="formbold-btn">
                    {{ __('stepper.buttons.next') }}
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_1675_1807)">
                            <path
                                d="M10.7814 7.33312L7.20541 3.75712L8.14808 2.81445L13.3334 7.99979L8.14808 13.1851L7.20541 12.2425L10.7814 8.66645H2.66675V7.33312H10.7814Z"
                                fill="white" />
                        </g>
                        <defs>
                            <clipPath id="clip0_1675_1807">
                                <rect width="16" height="16" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                </button>
            </div>
        </form>
    </div>
</div>
