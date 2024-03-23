@props([ 
    'class' => !empty($class) ? $class : null, 
])

<a>
    <span class="sr-only">{{ trans('app.name') }}</span>
    @if(trans('app.lang') == 'en')
        <img class="{{ $class }} w-auto max-w-full dark:hidden" src="{{route('home.index')}}/assets/images/brand/icon.webp" alt="icon-dark" />
        <img class="{{ $class }} hidden w-auto max-w-full dark:block" src="{{route('home.index')}}/assets/images/brand/icon.webp" alt="icon-light" />
    @else
        <img class="{{ $class }} max-w-full dark:hidden" src="{{route('home.index')}}/assets/images/brand/icon.webp" alt="icon-dark" />
        <img class="{{ $class }} hidden max-w-full dark:block" src="{{route('home.index')}}/assets/images/brand/icon.webp" alt="icon-light" />
    @endif
</a>