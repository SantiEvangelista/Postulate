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

    .formbold-clear-btn {
      cursor: pointer;
      background: #FFFFFF;
      border: none;
      color: #DC3545;
      font-weight: 500;
      font-size: 16px;
      line-height: 24px;
      display: flex;
      align-items: center;
      gap: 5px;
      padding: 8px 16px;
      border-radius: 5px;
      transition: all 0.3s ease;
    }

    .formbold-clear-btn:hover {
      background-color: #fee2e2;
    }

    .formbold-back-btn {
      cursor: pointer;
      background: #FFFFFF;
      border: none;
      color: #07074D;
      font-weight: 500;
      font-size: 16px;
      line-height: 24px;
      display: flex;
      align-items: center;
      gap: 5px;
      white-space: nowrap;
      padding: 8px 16px;
      border-radius: 5px;
      transition: all 0.3s ease;
    }

    .formbold-back-btn:hover {
      background-color: #f3f4f6;
    }

    .formbold-btn {
      display: flex;
      align-items: center;
      gap: 5px;
      font-size: 16px;
      border-radius: 5px;
      padding: 10px 25px;
      border: none;
      font-weight: 500;
      background-color: #6A64F1;
      color: white;
      cursor: pointer;
      transition: all 0.3s ease;
      white-space: nowrap;
    }
    .formbold-btn:hover {
      background-color: #5753e4;
      box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
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
<div class="container">
    
    <div class="form-container">
        <div id="loading" class="loading-spinner">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Cargando...</span>
            </div>
        </div>
        <div id="step-content"></div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/stepper.js') }}"></script>
@endsection 