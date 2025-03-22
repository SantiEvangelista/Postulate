class Stepper {
    constructor() {
        this.formData = JSON.parse(localStorage.getItem('formData')) || {
            step1: {},
            step2: {},
            step3: {}
        };
        this.currentStep = parseInt(localStorage.getItem('currentStep')) || 1;
        this.initializeToastr();
        this.loadStep(this.currentStep);
    }

    initializeToastr() {
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
    }

    goToPreviousStep() {
        if (this.currentStep > 1) {
            this.currentStep--;
            localStorage.setItem('currentStep', this.currentStep);
            this.loadStep(this.currentStep);
        }
    }

    loadStep(step) {
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
                this.initializeFormListeners();
                this.updateStepperUI(step);
                if (this.formData[`step${step}`]) {
                    this.fillFormWithData(this.formData[`step${step}`]);
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
                this.showErrors(error);
            });
    }

    fillFormWithData(data) {
        const form = document.querySelector('form');
        if (!form) return;

        Object.keys(data).forEach(key => {
            const input = form.querySelector(`[name="${key}"]`);
            if (input && input.type !== 'file') {
                input.value = data[key];
            }
        });
    }

    showErrors(response) {
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

    initializeFormListeners() {
        const form = document.querySelector('form');
        if (form) {
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                this.submitForm(form);
            });
        }

        const backButton = document.querySelector('.formbold-back-btn');
        if (backButton) {
            backButton.addEventListener('click', (e) => {
                e.preventDefault();
                this.goToPreviousStep();
            });
        }

        const clearButton = document.querySelector('.formbold-clear-btn');
        if (clearButton) {
            clearButton.addEventListener('click', (e) => {
                e.preventDefault();
                this.clearForm();
            });
        }
    }

    clearForm() {
        // Limpiar localStorage
        localStorage.removeItem('formData');
        localStorage.removeItem('currentStep');
        
        // Reiniciar el estado del stepper
        this.formData = {
            step1: {},
            step2: {},
            step3: {}
        };
        this.currentStep = 1;
        
        // Recargar el primer paso
        this.loadStep(1);
        
        // Mostrar mensaje de éxito
        if (typeof toastr !== 'undefined') {
            toastr.success('Formulario limpiado correctamente');
        }
    }

    submitForm(form) {
        const loading = document.getElementById('loading');
        if (!loading) return;

        loading.style.display = 'block';
        const currentFormData = new FormData(form);
        
        const formObject = {};
        currentFormData.forEach((value, key) => {
            formObject[key] = value;
        });
        this.formData[`step${this.currentStep}`] = formObject;
        
        localStorage.setItem('formData', JSON.stringify(this.formData));

        const finalData = new FormData();
        if (this.currentStep === 3) {
            Object.keys(this.formData).forEach(step => {
                Object.keys(this.formData[step]).forEach(key => {
                    finalData.append(key, this.formData[step][key]);
                });
            });
        } else {
            currentFormData.forEach((value, key) => {
                finalData.append(key, value);
            });
        }
        
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
                    localStorage.removeItem('formData');
                    localStorage.removeItem('currentStep');
                    window.location.href = data.redirect;
                } else {
                    this.currentStep++;
                    localStorage.setItem('currentStep', this.currentStep);
                    this.loadStep(this.currentStep);
                }
            } else {
                if (data.errors) {
                    this.displayErrors(data.errors);
                    this.showErrors(data);
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
            if (error.errors) {
                this.displayErrors(error.errors);
            }
            this.showErrors(error);
        })
        .finally(() => {
            if (loading) {
                loading.style.display = 'none';
            }
        });
    }

    displayErrors(errors) {
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

    updateStepperUI(step) {
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

        const backButton = document.querySelector('.formbold-back-btn');
        if (backButton) {
            if (step > 1) {
                backButton.style.display = 'flex';
            } else {
                backButton.style.display = 'none';
            }
        }
    }
}

// Inicializar el stepper cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', () => {
    window.stepper = new Stepper();
}); 