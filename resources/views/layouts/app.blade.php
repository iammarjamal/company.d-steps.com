<!DOCTYPE html>
<html x-ref="html" lang="{{ trans('app.lang') }}" dir="{{ trans('app.dir') }}" class="scroll-smooth no-scrollbar"
      x-data="{ theme: localStorage.getItem('theme'), list: JSON.parse(localStorage.getItem('list')) ,body: false }"  x-init="$watch('theme', (val) => localStorage.setItem('theme', val)), $watch('list', (val) => localStorage.setItem('list', val)), window.addEventListener('DOMContentLoaded', function () { setTimeout(function() { body = true; }, 1800); if(theme == null || theme == 'true' || theme == 'false'){ theme = 'system'; } })" :class="{ 'dark' : theme == 'dark' || theme == 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches }">
<head>

    <!-- Base Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ trans('app.name') }} - {{ $title ?? '' }}</title>
    <meta name="description" content="{{ $description ?? ''}}">
    <link rel="home" href="{{ route('home.index') }}">
    <!-- Base Meta -->

    <!-- Social Meta -->
    <meta property="og:site_name" content="{{ trans('app.name') }} - {{ $title ?? '' }}"/>
    <meta property="og:title" content="{{ trans('app.name') }} - {{ $title ?? '' }}"/>
    <meta property="og:description" content="{{ $description ?? ''}}"/>
    <meta property="og:url" content="{{ route('home.index') }}"/>
    <meta property="og:image" content="{{ asset('assets') }}/images/brand/icon.png"/>
    <meta property="og:type" content="website"/>
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ route('home.index') }}" />
    <meta property="twitter:title" content="{{ trans('app.name') }} - {{ $title ?? '' }}" />
    <meta property="twitter:description" content="{{ $description ?? ''}}" />
    <meta property="twitter:image" content="{{ asset('assets') }}/images/brand/icon.png" />
    <!-- Social Meta -->

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets') }}/images/brand/icon.png" />
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets') }}/images/brand/icon.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets') }}/images/brand/icon.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets') }}/images/brand/icon.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets') }}/images/brand/icon.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets') }}/images/brand/icon.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets') }}/images/brand/icon.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets') }}/images/brand/icon.png" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets') }}/images/brand/icon.png" />
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets') }}/images/brand/icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets') }}/images/brand/icon.png" />
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets') }}/images/brand/icon.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets') }}/images/brand/icon.png" />
    <link rel="shortcut icon" href="{{ asset('assets') }}/images/brand/icon.png" />
    <link rel="apple-touch-icon" href="{{ asset('assets') }}/images/brand/icon.png">
    <!-- Favicon -->

    <!-- Assets -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@6.11.0/css/flag-icons.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Assets -->

    <!-- Setup -->
    <script>
        if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
            if (localStorage.getItem("theme") == 'system' || localStorage.getItem("theme") == 'dark'){
                document.documentElement.classList.add('dark');
            }else{
                document.documentElement.classList.add('light');
            }
         }else{
            if (localStorage.getItem("theme") == 'system' || localStorage.getItem("theme") == 'light'){
                document.documentElement.classList.add('light');
            }else{
                document.documentElement.classList.add('dark');
            }
        }

        @if(env('APP_ENV') == 'production')
            document.addEventListener("contextmenu", function(e) {
                e.preventDefault();
            });
        @endif
    </script>
    <!-- Setup -->

    @livewireStyles
</head>
<body class="transition-all duration-500 no-scrollbar bg-zinc-50 dark:bg-zinc-900">

    <!-- Body -->
    <div x-show="body" x-cloak>
        @yield('slot')
    </div>
    <!-- Body -->

    <!-- Loader -->
    @persist('Loading')
    <div x-show="!body" id="LoadingApp" class="fixed inset-0 grid h-screen bg-cover place-items-center bg-gradient-to-br from-zinc-50 to-blue-zinc-50 dark:from-zinc-900 dark:to-blue-zinc-900">
        <div class="w-full h-full">
            <div class="w-full h-full relative space-y-5 overflow-hidden dark:bg-zinc-900 bg-zinc-50 shadow-xl dark:shadow-zinc-900/5 shadow-zinc-50/5 before:absolute before:inset-0 before:-translate-x-full before:-skew-x-12 before:animate-[shimmer_2s_infinite] before:border-t dark:before:border-zinc-50/10 before:border-zinc-900/10 before:bg-gradient-to-r before:from-transparent dark:before:via-zinc-50/10 before:via-zinc-900/10 before:to-transparent">
                <div class="space-y-3">
                    <div class="flex flex-col items-center justify-center h-screen animate__animated animate__fadeIn">
                        <div class="animate__animated animate__pulse animate__infinite animate__slower">
                            <img class="w-auto h-12" src="{{ asset('assets') }}/images/brand/logo.png" alt="logo" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endpersist
    <!-- Loader -->

    <!-- NoScript -->
    <noscript>
        <div class="fixed top-16 ltr:left-0 rtl:right-0 z-[1000] w-full h-full">
            <p class="text-sm text-center ltr:hidden">يرجى تشغيل محرك الجافاسكربت ليعمل الموقع بنجاح.</p>
            <p class="text-sm text-center rtl:hidden">Please enable the JavaScript to run successfully.</p>
        </div>
    </noscript>
    <!-- NoScript -->

    <!-- Script -->
    @livewireScripts
    <!-- Script -->
</body>
</html>
