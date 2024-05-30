{{--@props([--}}
{{--    'box' => !empty($box) ? $box : null, --}}
{{--])--}}

{{--<div class="longpress" x-data="{ popup: false, pressTimer: null }" x-on:mousedown="pressTimer = setTimeout(() => { popup = true }, 500)" x-on:mouseup="clearTimeout(pressTimer)" x-on:mouseleave="clearTimeout(pressTimer)" x-on:touchstart="pressTimer = setTimeout(() => { popup = true }, 500)" x-on:touchend="clearTimeout(pressTimer)">--}}
{{--    <button x-on:click="theme = window.matchMedia('(prefers-color-scheme: dark)').matches == true ? 'light' : 'dark'" x-show="theme == 'system'" class="flex items-center justify-center w-10 h-10 p-1 text-center text-gray-100 @if(!empty($box)) border rounded-lg shadow-sm border-zinc-200 dark:border-zinc-700 hover:!bg-zinc-100 hover:dark:!bg-zinc-800 focus:outline-none @endif">--}}
{{--        <span class="flex items-center justify-center w-8 h-8">--}}
{{--            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" viewBox="0 0 512 512" class="w-6 dark:fill-zinc-50 fill-zinc-900"><path d="M448 256c0-106-86-192-192-192V448c106 0 192-86 192-192zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z"/></svg>--}}
{{--        </span>--}}
{{--    </button>--}}
{{--    <button x-on:click="theme = 'light'" x-show="theme == 'dark'" class="flex items-center justify-center w-10 h-10 p-1 text-center text-gray-100 @if(!empty($box)) border rounded-lg shadow-sm border-zinc-200 dark:border-zinc-700 hover:!bg-zinc-100 hover:dark:!bg-zinc-800 focus:outline-none @endif">--}}
{{--        <span class="flex items-center justify-center w-8 h-8">--}}
{{--            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" viewBox="0 0 24 24" class="w-6 fill-zinc-50"><path d="M12.1,22c-0.3,0-0.6,0-0.9,0c-5.5-0.5-9.5-5.4-9-10.9c0.4-4.8,4.2-8.6,9-9c0.4,0,0.8,0.2,1,0.5c0.2,0.3,0.2,0.8-0.1,1.1c-2,2.7-1.4,6.4,1.3,8.4c2.1,1.6,5,1.6,7.1,0c0.3-0.2,0.7-0.3,1.1-0.1c0.3,0.2,0.5,0.6,0.5,1c-0.2,2.7-1.5,5.1-3.6,6.8C16.6,21.2,14.4,22,12.1,22zM9.3,4.4c-2.9,1-5,3.6-5.2,6.8c-0.4,4.4,2.8,8.3,7.2,8.7c2.1,0.2,4.2-0.4,5.8-1.8c1.1-0.9,1.9-2.1,2.4-3.4c-2.5,0.9-5.3,0.5-7.5-1.1C9.2,11.4,8.1,7.7,9.3,4.4z"></path></svg>--}}
{{--        </span>--}}
{{--    </button>--}}
{{--    <button x-on:click="theme = 'dark'" x-show="theme == 'light'" class="flex items-center justify-center w-10 h-10 p-1 text-center text-gray-100 @if(!empty($box)) border rounded-lg shadow-sm border-zinc-200 dark:border-zinc-700 hover:!bg-zinc-100 hover:dark:!bg-zinc-800 focus:outline-none @endif">--}}
{{--        <span class="flex items-center justify-center w-8 h-8">--}}
{{--            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" viewBox="0 0 24 24" class="w-6 fill-zinc-900"><path d="M12,18c-3.3,0-6-2.7-6-6s2.7-6,6-6s6,2.7,6,6S15.3,18,12,18zM12,8c-2.2,0-4,1.8-4,4c0,2.2,1.8,4,4,4c2.2,0,4-1.8,4-4C16,9.8,14.2,8,12,8z"></path><path d="M12,4c-0.6,0-1-0.4-1-1V1c0-0.6,0.4-1,1-1s1,0.4,1,1v2C13,3.6,12.6,4,12,4z"></path><path d="M12,24c-0.6,0-1-0.4-1-1v-2c0-0.6,0.4-1,1-1s1,0.4,1,1v2C13,23.6,12.6,24,12,24z"></path><path d="M5.6,6.6c-0.3,0-0.5-0.1-0.7-0.3L3.5,4.9c-0.4-0.4-0.4-1,0-1.4s1-0.4,1.4,0l1.4,1.4c0.4,0.4,0.4,1,0,1.4C6.2,6.5,5.9,6.6,5.6,6.6z"></path><path d="M19.8,20.8c-0.3,0-0.5-0.1-0.7-0.3l-1.4-1.4c-0.4-0.4-0.4-1,0-1.4s1-0.4,1.4,0l1.4,1.4c0.4,0.4,0.4,1,0,1.4C20.3,20.7,20,20.8,19.8,20.8z"></path><path d="M3,13H1c-0.6,0-1-0.4-1-1s0.4-1,1-1h2c0.6,0,1,0.4,1,1S3.6,13,3,13z"></path><path d="M23,13h-2c-0.6,0-1-0.4-1-1s0.4-1,1-1h2c0.6,0,1,0.4,1,1S23.6,13,23,13z"></path><path d="M4.2,20.8c-0.3,0-0.5-0.1-0.7-0.3c-0.4-0.4-0.4-1,0-1.4l1.4-1.4c0.4-0.4,1-0.4,1.4,0s0.4,1,0,1.4l-1.4,1.4C4.7,20.7,4.5,20.8,4.2,20.8z"></path><path d="M18.4,6.6c-0.3,0-0.5-0.1-0.7-0.3c-0.4-0.4-0.4-1,0-1.4l1.4-1.4c0.4-0.4,1-0.4,1.4,0s0.4,1,0,1.4l-1.4,1.4C18.9,6.5,18.6,6.6,18.4,6.6z"></path></svg>--}}
{{--        </span>--}}
{{--    </button>--}}

{{--    <x-camelui::modal wire="popup">--}}
{{--        <div class="relative flex flex-col w-full h-38 min-w-2xl gap-y-2">--}}
{{--            <div class="flex flex-row justify-between w-full gap-3 mb-5 text-center">--}}
{{--                <div x-on:click="theme = 'dark'" class="flex flex-col w-1/3 bg-white border-2 rounded-lg shadow cursor-pointer sm:p-5 md:p-6 lg:p-6 xl:p-8 dark:bg-zinc-800" :class="theme == 'dark' ? '!border-primary-600 dark:!border-primary-500' : 'border-zinc-400 dark:border-zinc-600'">--}}
{{--                    <div class="flex items-center justify-center w-full h-12 mb-3 text-center">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" viewBox="0 0 24 24" class="w-10 dark:fill-zinc-50 fill-zinc-900"><path d="M12.1,22c-0.3,0-0.6,0-0.9,0c-5.5-0.5-9.5-5.4-9-10.9c0.4-4.8,4.2-8.6,9-9c0.4,0,0.8,0.2,1,0.5c0.2,0.3,0.2,0.8-0.1,1.1c-2,2.7-1.4,6.4,1.3,8.4c2.1,1.6,5,1.6,7.1,0c0.3-0.2,0.7-0.3,1.1-0.1c0.3,0.2,0.5,0.6,0.5,1c-0.2,2.7-1.5,5.1-3.6,6.8C16.6,21.2,14.4,22,12.1,22zM9.3,4.4c-2.9,1-5,3.6-5.2,6.8c-0.4,4.4,2.8,8.3,7.2,8.7c2.1,0.2,4.2-0.4,5.8-1.8c1.1-0.9,1.9-2.1,2.4-3.4c-2.5,0.9-5.3,0.5-7.5-1.1C9.2,11.4,8.1,7.7,9.3,4.4z"></path></svg>--}}
{{--                    </div>--}}
{{--                    <x-camelui::heading size="xs">--}}
{{--                        {{ trans('app.DarkMode') }}--}}
{{--                    </x-camelui::heading>--}}
{{--                </div>--}}
{{--                <div x-on:click="theme = 'system'" class="flex flex-col w-1/3 bg-white border-2 rounded-lg shadow cursor-pointer sm:p-5 md:p-6 lg:p-6 xl:p-8 dark:bg-zinc-800" :class="theme == 'system' ? '!border-primary-600 dark:!border-primary-500' : 'border-zinc-400 dark:border-zinc-600'">--}}
{{--                    <div class="flex items-center justify-center w-full h-12 mb-3 text-center">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" viewBox="0 0 512 512" class="w-9 dark:fill-zinc-50 fill-zinc-900"><path d="M448 256c0-106-86-192-192-192V448c106 0 192-86 192-192zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z"/></svg>--}}
{{--                    </div>--}}
{{--                    <x-camelui::heading size="xs">--}}
{{--                        {{ trans('app.DefaultMode') }}--}}
{{--                    </x-camelui::heading>--}}
{{--                </div>--}}
{{--                <div x-on:click="theme = 'light'" class="flex flex-col w-1/3 bg-white border-2 rounded-lg shadow cursor-pointer sm:p-5 md:p-6 lg:p-6 xl:p-8 dark:bg-zinc-800" :class="theme == 'light' ? '!border-primary-600 dark:!border-primary-500' : 'border-zinc-400 dark:border-zinc-600'">--}}
{{--                    <div class="flex items-center justify-center w-full h-12 mb-3 text-center">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" viewBox="0 0 24 24" class="w-10 dark:fill-zinc-50 fill-zinc-900"><path d="M12,18c-3.3,0-6-2.7-6-6s2.7-6,6-6s6,2.7,6,6S15.3,18,12,18zM12,8c-2.2,0-4,1.8-4,4c0,2.2,1.8,4,4,4c2.2,0,4-1.8,4-4C16,9.8,14.2,8,12,8z"></path><path d="M12,4c-0.6,0-1-0.4-1-1V1c0-0.6,0.4-1,1-1s1,0.4,1,1v2C13,3.6,12.6,4,12,4z"></path><path d="M12,24c-0.6,0-1-0.4-1-1v-2c0-0.6,0.4-1,1-1s1,0.4,1,1v2C13,23.6,12.6,24,12,24z"></path><path d="M5.6,6.6c-0.3,0-0.5-0.1-0.7-0.3L3.5,4.9c-0.4-0.4-0.4-1,0-1.4s1-0.4,1.4,0l1.4,1.4c0.4,0.4,0.4,1,0,1.4C6.2,6.5,5.9,6.6,5.6,6.6z"></path><path d="M19.8,20.8c-0.3,0-0.5-0.1-0.7-0.3l-1.4-1.4c-0.4-0.4-0.4-1,0-1.4s1-0.4,1.4,0l1.4,1.4c0.4,0.4,0.4,1,0,1.4C20.3,20.7,20,20.8,19.8,20.8z"></path><path d="M3,13H1c-0.6,0-1-0.4-1-1s0.4-1,1-1h2c0.6,0,1,0.4,1,1S3.6,13,3,13z"></path><path d="M23,13h-2c-0.6,0-1-0.4-1-1s0.4-1,1-1h2c0.6,0,1,0.4,1,1S23.6,13,23,13z"></path><path d="M4.2,20.8c-0.3,0-0.5-0.1-0.7-0.3c-0.4-0.4-0.4-1,0-1.4l1.4-1.4c0.4-0.4,1-0.4,1.4,0s0.4,1,0,1.4l-1.4,1.4C4.7,20.7,4.5,20.8,4.2,20.8z"></path><path d="M18.4,6.6c-0.3,0-0.5-0.1-0.7-0.3c-0.4-0.4-0.4-1,0-1.4l1.4-1.4c0.4-0.4,1-0.4,1.4,0s0.4,1,0,1.4l-1.4,1.4C18.9,6.5,18.6,6.6,18.4,6.6z"></path></svg>--}}
{{--                    </div>--}}
{{--                    <x-camelui::heading size="xs">--}}
{{--                        {{ trans('app.LightMode') }}--}}
{{--                    </x-camelui::heading>--}}
{{--                </div>--}}
{{--            </div>     --}}
{{--        </div>        --}}
{{--    </x-camelui::modal>--}}
{{--</div>--}}

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
