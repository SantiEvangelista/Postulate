// Toast notification functionality
class ToastManager {
    constructor() {
        this.toastContainer = document.querySelector('.toast-container');
        this.init();
    }

    init() {
        if (!this.toastContainer) return;

        // Handle close button clicks
        this.toastContainer.addEventListener('click', (e) => {
            if (e.target.classList.contains('toast-close')) {
                const toast = e.target.closest('.toast');
                this.removeToast(toast);
            }
        });

        // Auto-remove all toasts after delay
        document.querySelectorAll('.toast').forEach(toast => {
            setTimeout(() => {
                if (toast && document.body.contains(toast)) {
                    this.removeToast(toast);
                }
            }, 5000); // Toast display duration
        });
    }

    removeToast(toast) {
        if (!toast) return;
        
        toast.classList.add('removing');
        setTimeout(() => {
            toast.remove();
        }, 300); // Animation duration for the slide out
    }
}

// Form validation functionality
class FormValidator {
    constructor() {
        this.form = document.querySelector('form');
        this.init();
    }

    init() {
        if (!this.form) return;

        // Add error class to invalid fields
        this.form.addEventListener('submit', (e) => {
            const inputs = this.form.querySelectorAll('input, textarea');
            inputs.forEach(input => {
                if (!input.validity.valid) {
                    input.classList.add('error');
                }
            });
        });

        // Remove error class on input
        this.form.addEventListener('input', (e) => {
            if (e.target.classList.contains('error')) {
                e.target.classList.remove('error');
            }
        });
    }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    new ToastManager();
    new FormValidator();
});
