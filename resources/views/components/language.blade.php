{{--@props([--}}
{{--    'box' => !empty($box) ? $box : null, --}}
{{--])--}}

{{--<div>--}}
{{--    <div class="flex items-center justify-center w-10 h-10 p-1 text-center text-gray-100 @if(!empty($box)) border rounded-lg shadow-sm border-zinc-200 dark:border-zinc-700 hover:!bg-zinc-100 hover:dark:!bg-zinc-800 focus:outline-none @endif">--}}
{{--        <a class="cursor-pointer" href="{{ route('lang', [trans('app.lang') === 'ar' ? 'en' : 'ar']) }}">--}}
{{--            <span class="flex items-center justify-center w-9 h-9">--}}
{{--                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" viewBox="0 0 24 24" class="w-6 fill-zinc-900 dark:fill-zinc-50"><path d="M0 0h24v24H0z" fill="none"></path><path d=" M12.87 15.07l-2.54-2.51.03-.03c1.74-1.94 2.98-4.17 3.71-6.53H17V4h-7V2H8v2H1v1.99h11.17C11.5 7.92 10.44 9.75 9 11.35 8.07 10.32 7.3 9.19 6.69 8h-2c.73 1.63 1.73 3.17 2.98 4.56l-5.09 5.02L4 19l5-5 3.11 3.11.76-2.04zM18.5 10h-2L12 22h2l1.12-3h4.75L21 22h2l-4.5-12zm-2.62 7l1.62-4.33L19.12 17h-3.24z"></path></svg>--}}
{{--            </span>--}}
{{--        </a>--}}
{{--    </div>--}}
{{--</div>--}}

@props([
    'box' => !empty($box) ? $box : null,
])

<div>
    <div class="flex items-center justify-center w-10 h-10 p-1 text-center text-gray-100 @if(!empty($box)) border rounded-lg shadow-sm border-zinc-200 dark:border-zinc-700 hover:!bg-zinc-100 hover:dark:!bg-zinc-800 focus:outline-none @endif">
        <a class="cursor-pointer" href="{{ route('lang', [trans('app.lang') === 'ar' ? 'en' : 'ar']) }}">
            <span class="flex items-center justify-center w-9 h-9">
                <i class="text-2xl fa-solid fa-globe text-zinc-900 dark:text-zinc-50"></i>
            </span>
        </a>
    </div>
</div>
