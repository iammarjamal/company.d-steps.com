@props([ 
    // Add Custom Class
    'class' => !empty($class) ? $class : null,
    
    // Select Color (By Default primary)
    'color' => !empty($style) ? $style : 'primary',
    
    // Add Icon
    'icon' => !empty($icon) ? $icon : null,

    // Select Role
    'button' => !empty($button) ? 'true' : null,
])

<div>
    @if (!empty($button))
    <a {{ $attributes }}>
        <button
        class="
        {{ $class }} 
        {{ $color == 'primary' ? 'text-white dark:bg-primary-600 bg-primary-500 ' : null }}
        {{ $color == 'secondary' ? 'text-white dark:bg-secondary-500 bg-secondary-600' : null }} 
        {{ $color == 'success' ? 'text-white dark:bg-success-500 bg-success-600' : null }} 
        {{ $color == 'danger' ? 'text-white dark:bg-danger-500 bg-danger-600' : null }}
        {{ $color == 'warning' ? 'text-white dark:bg-warning-500 bg-warning-600' : null }} 
        {{ $color == 'info' ? 'text-white dark:bg-info-500 bg-info-600' : null }}
        
        {{ $color == 'white' ? 'text-white dark:bg-white-500 bg-white-600' : null }}
        {{ $color == 'black' ? 'text-black dark:text-black' : null }}

        mx-auto my-auto py-2 px-3 w-full transition duration-150 ease-out border border-transparent rounded-md shadow-sm whitespace-nowrap hover:opacity-80 disabled:opacity-70 hover:ease-in
        "
        role="button"
        {{ $attributes }}
        >
    
        @if(!empty($icon))
        <div class="flex justify-between w-full">
            <div class="flex items-center justify-start text-start">
                <svg class="w-5 h-5 rtl:-mr-1 ltr:-ml-1 ltr:mr-2 rtl:ml-2 text-white animate-spin 
                {{ $color == 'none' ? 'text-black dark:text-white' : 'text-white' }}
                " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" wire:loading>
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <h1 class="font-bold">
                    {{ $slot }}
                </h1>
            </div>
            <div class="flex items-center justify-end text-end">
                <i class="{{ $icon }} rtl:mr-4 ltr:ml-4"></i>
            </div>
        </div>
        
        @else
        <div class="flex items-center justify-center w-full">
            <h1 class="font-bold">
                {{ $slot }}
            </h1>
            <svg class="w-5 h-5 text-black rtl:-mr-1 ltr:-ml-1 ltr:mr-2 rtl:ml-2 dark:text-white animate-spin
            {{ $color == 'none' ? 'text-black dark:text-white' : 'text-white' }}
            " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" wire:loading>
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        </div>
        @endif
        </button>
    </a>
    @else
    <a class="{{ $class }}
    text-black dark:text-white" 
    {{ $attributes }}
    >
        {{ $slot }}
    </a>
    @endif
</div>