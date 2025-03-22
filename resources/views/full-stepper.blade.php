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
      display: none;
    }
    .formbold-back-btn.active {
      display: block;
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
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Almacenamiento de datos del formulario
    let formData = {
        step1: {},
        step2: {},
        step3: {}
    };

    // Configuración global de toastr
    if (typeof toastr !== 'undefined') {
        toastr.options = {
            closeButton: true,
            newestOnTop: true,
            progressBar: true,
            positionClass: "toast-top-right",
            preventDuplicates: false,
            onclick: null,
            showDuration: "300",
            hideDuration: "1000",
            timeOut: "5000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut"
        };
    }

    let currentStep = 1;
    loadStep(currentStep);

    function loadStep(step) {
        const content = document.getElementById('step-content');
        content.style.display = 'none';

        fetch(`/generador/paso${step}/content`)
            .then(response => {
                if (!response.ok) {
                    return response.json().then(err => Promise.reject(err));
                }
                return response.text();
            })
            .then(html => {
                if (content) {
                    content.innerHTML = html;
                    content.style.display = 'block';
                }
                if (loading) {
                    loading.style.display = 'none';
                }
                initializeFormListeners();
                updateStepperUI(step);
                // Rellenar el formulario con datos guardados si existen
                if (formData[`step${step}`]) {
                    fillFormWithData(formData[`step${step}`]);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                if (loading) {
                    loading.style.display = 'none';
                }
                if (content) {
                    content.innerHTML = '<div class="alert alert-danger">Error al cargar el contenido. Por favor, intente de nuevo.</div>';
                    content.style.display = 'block';
                }
                showErrors(error);
            });
    }

    function fillFormWithData(data) {
        const form = document.querySelector('form');
        if (!form) return;

        Object.keys(data).forEach(key => {
            const input = form.querySelector(`[name="${key}"]`);
            if (input) {
                input.value = data[key];
            }
        });
    }

    function showErrors(response) {
        if (typeof toastr === 'undefined') {
            console.error('Toastr no está disponible');
            return;
        }

        if (response.errors) {
            Object.values(response.errors).forEach(error => {
                if (Array.isArray(error)) {
                    error.forEach(message => toastr.error(message));
                } else {
                    toastr.error(error);
                }
            });
        } else if (response.message) {
            toastr.error(response.message);
        }
    }

    function initializeFormListeners() {
        const form = document.querySelector('form');
        if (form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                submitForm(this);
            });
        }
    }

    function submitForm(form) {
        const loading = document.getElementById('loading');
        if (!loading) return;

        loading.style.display = 'block';
        const currentFormData = new FormData(form);
        
        // Guardar datos del formulario actual
        const formObject = {};
        currentFormData.forEach((value, key) => {
            formObject[key] = value;
        });
        formData[`step${currentStep}`] = formObject;

        // Si es el último paso, enviar todos los datos
        const finalData = new FormData();
        if (currentStep === 3) {
            // Agregar datos de todos los pasos
            Object.keys(formData).forEach(step => {
                Object.keys(formData[step]).forEach(key => {
                    finalData.append(key, formData[step][key]);
                });
            });
        } else {
            // Solo enviar datos del paso actual para validación
            currentFormData.forEach((value, key) => {
                finalData.append(key, value);
            });
        }
        
        // Agregar el token CSRF
        finalData.append('_token', document.querySelector('meta[name="csrf-token"]').content);

        fetch(form.action, {
            method: 'POST',
            body: finalData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json'
            },
            credentials: 'same-origin'
        })
        .then(response => {
            if (!response.ok) {
                return response.json().then(err => Promise.reject(err));
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                if (data.message) {
                    toastr.success(data.message);
                }
                if (data.redirect) {
                    window.location.href = data.redirect;
                } else {
                    currentStep++;
                    loadStep(currentStep);
                }
            } else {
                if (data.errors) {
                    displayErrors(data.errors);
                    showErrors(data);
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
            if (error.errors) {
                displayErrors(error.errors);
            }
            
        })
        .finally(() => {
            if (loading) {
                loading.style.display = 'none';
            }
        });
    }

    function displayErrors(errors) {
        document.querySelectorAll('.error-message').forEach(el => el.remove());
        
        for (const field in errors) {
            const input = document.querySelector(`[name="${field}"]`);
            if (input) {
                const errorDiv = document.createElement('div');
                errorDiv.className = 'error-message';
                errorDiv.textContent = errors[field][0];
                input.parentNode.insertBefore(errorDiv, input.nextSibling);
                
                toastr.error(errors[field][0]);
            }
        }
    }

    function updateStepperUI(step) {
        const stepperItems = document.querySelectorAll('.stepper-item');
        stepperItems.forEach((item, index) => {
            if (index + 1 < step) {
                item.classList.add('completed');
                item.classList.remove('active');
            } else if (index + 1 === step) {
                item.classList.add('active');
                item.classList.remove('completed');
            } else {
                item.classList.remove('active', 'completed');
            }
        });
    }
});
</script>
@endsection 