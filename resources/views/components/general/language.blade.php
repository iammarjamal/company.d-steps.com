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