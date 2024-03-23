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
                class="{{ $class }} flex-col flex min-3-xl pb-2 phone:!border-t-1 phone:!border-0 phone:!bottom-0 tab:!border-t-1 tab:!border-0 tab:!bottom-0 shadow dark:shadow-zinc-800 overflow-y-scroll no-scrollbar dark:bg-zinc-800 border-zinc-300 dark:border-zinc-600 phone:fixed tab:fixed laptop:relative desktop:relative ease-in-out z-50 p-2 bg-zinc-50 border cursor-auto phone:p-4 tab:p-6 laptop:p-8 desktop:p-10 rounded-2xl phone:!rounded-b-none phone:!rounded-t-3xl tab:!rounded-t-3xl tab:!rounded-b-none laptop:!rounded-2xl desktop:!rounded-2xl phone:max-h-[96%] tab:max-h-[96%] laptop:max-h-[94%] desktop:max-h-[94%] phone:w-full tab:w-full laptop:w-1/2 desktop:w-1/3 max-w-7xl"
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