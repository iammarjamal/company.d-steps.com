@props([
    // Add Custom Class
    'class' => !empty($class) ? $class : null,
    
    // Select Required
    'required' => !empty($required) ? $required : false,

    // Sync With Livewire
    'wire' => !empty($wire) ? $wire : null,
])

<template x-teleport="body">
    <div x-data="{ isDelayedClose: false }" x-init='$watch("{{$wire}}", (value) => {if (value) {setTimeout(() => {isDelayedClose = true;}, 750);}else{isDelayedClose = false;}});'>
        <div
            class="fixed inset-0 z-50 flex items-center justify-center w-full h-full cursor-pointer bg-opacity-90 bg-zinc-900"
            x-show="{{ $wire }}"
            x-transition:enter="transition transition-opacity transform ease-in duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition transition-opacity transform ease-in duration-500"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
        >
            <div
                class="{{ $class }} flex-col flex min-3-xl pb-2 sm:!border-t-1 sm:!border-0 sm:!bottom-0 md:!border-t-1 md:!border-0 md:!bottom-0 shadow dark:shadow-zinc-800 overflow-y-scroll no-scrollbar dark:bg-zinc-800 border-zinc-300 dark:border-zinc-600 sm:fixed md:fixed lg:relative xl:relative ease-in-out z-50 p-2 bg-zinc-50 border cursor-auto sm:p-4 md:p-6 lg:p-8 xl:p-10 rounded-2xl sm:!rounded-b-none sm:!rounded-t-3xl md:!rounded-t-3xl md:!rounded-b-none lg:!rounded-2xl xl:!rounded-2xl sm:max-h-[96%] md:max-h-[96%] lg:max-h-[94%] xl:max-h-[94%] sm:w-full md:w-full lg:w-1/2 xl:w-1/3 max-w-7xl"
                :class="{{$wire}} ? 'animate__animated animate__fadeInUp animate__faster' : 'animate__animated animate__fadeOutDown animate__faster'"
                @if(empty($required))
                @click.outside="if(isDelayedClose){ {{$wire}} = false; isDelayedClose = false; }"
                @endif
                x-show="{{ $wire }}"
                x-transition:enter="transition-transform duration-300 opacity-100"
                x-transition:enter-start="translate-y-full opacity-100"
                x-transition:enter-end="translate-y-0 opacity-100"
                x-transition:leave="transition-transform duration-500 opacity-100"
                x-transition:leave-start="transform opacity-100"
                x-transition:leave-end="transform translate-y-0 opacity-100"
            >
                <!-- Body -->
                {{ $slot }}
                <!-- Body -->
            </div>
        </div>
    </div>
</template>