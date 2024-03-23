@props([
    'box' => !empty($box) ? $box : null, 
])

<div class="longpress" x-data="{ popup: false, pressTimer: null }" x-on:mousedown="pressTimer = setTimeout(() => { popup = true }, 500)" x-on:mouseup="clearTimeout(pressTimer)" x-on:mouseleave="clearTimeout(pressTimer)" x-on:touchstart="pressTimer = setTimeout(() => { popup = true }, 500)" x-on:touchend="clearTimeout(pressTimer)">
    <button x-on:click="theme = window.matchMedia('(prefers-color-scheme: dark)').matches == true ? 'light' : 'dark'" x-show="theme == 'system'" class="flex items-center justify-center w-10 h-10 p-1 text-center text-gray-100 @if(!empty($box)) border rounded-lg shadow-sm border-zinc-200 dark:border-zinc-700 hover:!bg-zinc-100 hover:dark:!bg-zinc-800 focus:outline-none @endif">
        <span class="flex items-center justify-center w-8 h-8">
            <i class="text-2xl fill-current fa-solid fa-circle-half-stroke text-zinc-900 dark:text-zinc-50"></i>
        </span>
    </button>
    <button x-on:click="theme = 'dark'" x-show="theme == 'light'" class="flex items-center justify-center w-10 h-10 p-1 text-center text-gray-100 @if(!empty($box)) border rounded-lg shadow-sm border-zinc-200 dark:border-zinc-700 hover:!bg-zinc-100 hover:dark:!bg-zinc-800 focus:outline-none @endif">
        <span class="flex items-center justify-center w-8 h-8">
            <i class="text-2xl fill-current fa-solid fa-moon text-zinc-900"></i>
        </span>
    </button>
    <button x-on:click="theme = 'light'" x-show="theme == 'dark'" class="flex items-center justify-center w-10 h-10 p-1 text-center text-gray-100 @if(!empty($box)) border rounded-lg shadow-sm border-zinc-200 dark:border-zinc-700 hover:!bg-zinc-100 hover:dark:!bg-zinc-800 focus:outline-none @endif">
        <span class="flex items-center justify-center w-8 h-8">
            <i class="text-2xl fill-current text-zinc-50 fa-solid fa-sun"></i>
        </span>
    </button>

    <x-camelui::modal wire="popup">
        <div class="relative flex flex-col w-full h-38 gap-y-2">
            <div class="flex flex-row justify-between w-full gap-3 mb-5 text-center">
                                <div x-on:click="theme = 'dark'" class="flex flex-col w-1/3 bg-white border-2 rounded-lg shadow cursor-pointer phone:p-5 tab:p-6 laptop:p-6 desktop:p-8 dark:bg-zinc-800" :class="theme == 'dark' ? '!border-indigo-600 dark:!border-indigo-500' : 'border-zinc-400 dark:border-zinc-600'">
                    <div class="flex items-center justify-center w-full h-12 mb-3 text-center">
                        <i class="text-4xl fill-current fa-solid fa-moon dark:text-zinc-50 text-zinc-900"></i>
                    </div>
                    <x-camelui::heading size="sm">
                        الداكن
                    </x-camelui::heading>
                </div>
                <div x-on:click="theme = 'system'" class="flex flex-col w-1/3 bg-white border-2 rounded-lg shadow cursor-pointer phone:p-5 tab:p-6 laptop:p-6 desktop:p-8 dark:bg-zinc-800" :class="theme == 'system' ? '!border-indigo-600 dark:!border-indigo-500' : 'border-zinc-400 dark:border-zinc-600'">
                    <div class="flex items-center justify-center w-full h-12 mb-3 text-center">
                        <i class="text-4xl fill-current fa-solid fa-circle-half-stroke text-zinc-900 dark:text-zinc-50"></i>
                    </div>
                    <x-camelui::heading size="sm">
                        الإفتراضي
                    </x-camelui::heading>
                </div>
                <div x-on:click="theme = 'light'" class="flex flex-col w-1/3 bg-white border-2 rounded-lg shadow cursor-pointer phone:p-5 tab:p-6 laptop:p-6 desktop:p-8 dark:bg-zinc-800" :class="theme == 'light' ? '!border-indigo-600 dark:!border-indigo-500' : 'border-zinc-400 dark:border-zinc-600'">
                    <div class="flex items-center justify-center w-full h-12 mb-3 text-center">
                        <i class="text-4xl fill-current dark:text-zinc-50 text-zinc-900 fa-solid fa-sun"></i>
                    </div>
                    <x-camelui::heading size="sm">
                        الفاتح
                    </x-camelui::heading>
                </div>
            </div>     
        </div>        
    </x-camelui::modal>
</div>