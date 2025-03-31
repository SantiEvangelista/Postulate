<style>
    .formbold-back-btn {
        cursor: pointer;
        background: #ffffff;
        border: none;
        font-weight: 500;
        font-size: 16px;
        line-height: 24px;
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 8px 16px;
        border-radius: 5px;
        transition: all 0.3s ease;
    }

    .formbold-back-btn svg {
        width: 20px;
        height: 20px;
        transition: transform 0.3s ease;
    }

    .formbold-back-btn:hover {
        background-color: #FFF8E6;
    }

    .formbold-back-btn:hover svg {
        transform: scale(1.1);
    }
</style>

<a href="{{ route($route) }}" class="formbold-back-btn">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M19 12H5M5 12L12 19M5 12L12 5" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    {{ __('stepper.buttons.back') }}
</a>
