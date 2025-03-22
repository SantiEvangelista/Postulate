@include('components.switch-languaje')
<div class="formbold-main-wrapper">
    <div class="formbold-form-wrapper">
        <form id="step1Form" action="{{ route('stepper.ajax.submit.step1') }}" method="POST">
            @csrf
            <div class="formbold-steps">
                <ul>
                    <li class="active">
                        <span class="step-number">1</span>
                        <span class="step-text">{{ __('stepper.steps.personal_info') }}</span>
                    </li>
                    <li>
                        <span class="step-number">2</span>
                        <span class="step-text">{{ __('stepper.steps.education') }}</span>
                    </li>
                    <li>
                        <span class="step-number">3</span>
                        <span class="step-text">{{ __('stepper.steps.experience') }}</span>
                    </li>
                </ul>
            </div>

            <div class="formbold-form-step-1 active">
                <h3 class="mb-4">{{ __('stepper.personal_info.title') }}</h3>

                <div class="formbold-input-flex">
                    <div>
                        <label for="name"
                            class="formbold-form-label">{{ __('stepper.personal_info.first_name') }}</label>
                        <input type="text" name="name" id="name"
                            class="formbold-form-input @error('name') error @enderror"
                            value="{{ old('name', $sessionData->name ?? '') }}"
                            placeholder="{{ __('stepper.placeholders.first_name') }}" required>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="surname"
                            class="formbold-form-label">{{ __('stepper.personal_info.last_name') }}</label>
                        <input type="text" name="surname" id="surname"
                            class="formbold-form-input @error('surname') error @enderror"
                            value="{{ old('surname', $sessionData->surname ?? '') }}"
                            placeholder="{{ __('stepper.placeholders.last_name') }}" required>
                        @error('surname')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="formbold-input-flex">
                    <div>
                        <label for="email"
                            class="formbold-form-label">{{ __('stepper.personal_info.email') }}</label>
                        <input type="email" name="email" id="email"
                            class="formbold-form-input @error('email') error @enderror"
                            value="{{ old('email', $sessionData->email ?? '') }}"
                            placeholder="{{ __('stepper.placeholders.email') }}" required>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="phone"
                            class="formbold-form-label">{{ __('stepper.personal_info.phone') }}</label>
                        <input type="tel" name="phone" id="phone"
                            class="formbold-form-input @error('phone') error @enderror"
                            value="{{ old('phone', $sessionData->phone ?? '') }}"
                            placeholder="{{ __('stepper.placeholders.phone') }}" required>
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="formbold-input-flex">
                    <div>
                        <label for="birthday"
                            class="formbold-form-label">{{ __('stepper.personal_info.birth_date') }}</label>
                        <input type="date" name="birthday" id="birthday"
                            class="formbold-form-input @error('birthday') error @enderror"
                            value="{{ old('birthday', $sessionData->birthday ?? '') }}" required>
                        @error('birthday')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="adress"
                            class="formbold-form-label">{{ __('stepper.personal_info.address') }}</label>
                        <input type="text" name="adress" id="adress"
                            class="formbold-form-input @error('adress') error @enderror"
                            value="{{ old('adress', $sessionData->adress ?? '') }}"
                            placeholder="{{ __('stepper.placeholders.address') }}" required>
                        @error('adress')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="photo" class="formbold-form-label">{{ __('stepper.personal_info.photo') }}</label>
                    <div class="formbold-form-file">
                        <input type="file" name="photo" id="photo" accept="image/*">
                        <div class="formbold-form-file-wrapper">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6.71429 17.8571H13.2857M10 3.92857V14.6429M10 3.92857L6.71429 7.21429M10 3.92857L13.2857 7.21429"
                                    stroke="#07074D" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <span>Choose a file</span>
                        </div>
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
