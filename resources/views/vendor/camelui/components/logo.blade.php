<a>
    <span class="sr-only">{{ trans('app.name') }}</span>
    @if(trans('app.lang') == 'en')
        <img class="w-auto h-12 max-w-full sm:h-10 dark:hidden" src="{{route('home.index')}}/assets/images/brand/logo-en-light.png" alt="logo-dark" />
        <img class="hidden w-auto h-12 max-w-full sm:h-10 dark:block" src="{{route('home.index')}}/assets/images/brand/logo-en-dark.png" alt="logo-light" />
    @else
        <img class="w-auto h-12 max-w-full sm:h-10 dark:hidden" src="{{route('home.index')}}/assets/images/brand/logo-ar-light.png" alt="logo-dark" />
        <img class="hidden w-auto h-12 max-w-full sm:h-10 dark:block" src="{{route('home.index')}}/assets/images/brand/logo-ar-dark.png" alt="logo-light" />
    @endif
</a>