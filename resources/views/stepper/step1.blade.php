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
  
    .formbold-form-file {
      padding: 12px;
      display: flex;
      align-items: center;
      gap: 10px;
      position: relative;
      cursor: pointer;
      border: 1px solid #DDE3EC;
      border-radius: 5px;
    }
    
    .formbold-form-file input {
      opacity: 0;
      position: absolute;
      width: 100%;
      height: 100%;
      cursor: pointer;
    }
    
    .formbold-form-file-wrapper {
      display: flex;
      flex-direction: column;
      gap: 5px;
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

    .form-group {
      margin-bottom: 20px;
    }

    textarea.formbold-form-input {
      min-height: 120px;
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
    <!-- Toast Container -->

    @include('components.switch-languaje')

    <div class="formbold-main-wrapper">
        <div class="formbold-form-wrapper">
            <form action="{{ route('generador.paso1.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
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
                            <label for="name" class="formbold-form-label">{{ __('stepper.personal_info.first_name') }}</label>
                            <input type="text" 
                                name="name" 
                                id="name" 
                                class="formbold-form-input @error('name') error @enderror" 
                                value="{{ old('name', $sessionData->name ?? '') }}"
                                placeholder="{{ __('stepper.placeholders.first_name') }}" 
                                required>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="surname" class="formbold-form-label">{{ __('stepper.personal_info.last_name') }}</label>
                            <input type="text" 
                                name="surname" 
                                id="surname" 
                                class="formbold-form-input @error('surname') error @enderror"
                                value="{{ old('surname', $sessionData->surname ?? '') }}"
                                placeholder="{{ __('stepper.placeholders.last_name') }}" 
                                required>
                            @error('surname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="formbold-input-flex">
                        <div>
                            <label for="email" class="formbold-form-label">{{ __('stepper.personal_info.email') }}</label>
                            <input type="email" 
                                name="email" 
                                id="email" 
                                class="formbold-form-input @error('email') error @enderror"
                                value="{{ old('email', $sessionData->email ?? '') }}"
                                placeholder="{{ __('stepper.placeholders.email') }}" 
                                required>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="phone" class="formbold-form-label">{{ __('stepper.personal_info.phone') }}</label>
                            <input type="tel" 
                                name="phone" 
                                id="phone" 
                                class="formbold-form-input @error('phone') error @enderror"
                                value="{{ old('phone', $sessionData->phone ?? '') }}"
                                placeholder="{{ __('stepper.placeholders.phone') }}" 
                                required>
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="formbold-input-flex">
                        <div>
                            <label for="birthday" class="formbold-form-label">{{ __('stepper.personal_info.birth_date') }}</label>
                            <input type="date" 
                                name="birthday" 
                                id="birthday" 
                                class="formbold-form-input @error('birthday') error @enderror"
                                value="{{ old('birthday', $sessionData->birthday ?? '') }}"
                                required>
                            @error('birthday')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="adress" class="formbold-form-label">{{ __('stepper.personal_info.address') }}</label>
                            <input type="text" 
                                name="adress" 
                                id="adress" 
                                class="formbold-form-input @error('adress') error @enderror"
                                value="{{ old('adress', $sessionData->adress ?? '') }}"
                                placeholder="{{ __('stepper.placeholders.address') }}" 
                                required>
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
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.71429 17.8571H13.2857M10 3.92857V14.6429M10 3.92857L6.71429 7.21429M10 3.92857L13.2857 7.21429" stroke="#07074D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <span>Choose a file</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="formbold-form-btn-wrapper">
                    <div class="formbold-left-buttons">
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

