@extends('layouts.app')

@section('slot')
<div class="flex flex-col items-center justify-center">
    <!-- Layout -->
    <div class="px-4 sm:mt-6 md:mt-6 lg:mt-6 xl:mt-8 max-w-7xl">
        <!-- Header -->
        <header class="w-full mb-6" x-data="{ Sidebar: false }">
            <!-- Navbar -->
            <div class="flex items-center justify-between">
                <!-- Menu Desktop -->
                <div class="inline-flex items-center justify-start text-center">
                    <a class="flex justify-start" href="{{ route('home.index') }}" wire:navigate>
                        <img class="w-auto h-12" src="{{ asset('assets') }}/images/brand/logo.png" alt="logo" />
                    </a>
                </div>
                <!-- Menu Desktop -->

                <div class="inline-flex items-center justify-end text-end gap-x-2">

                    <!-- Shorticon Desktop -->
                    <div class="items-center justify-start gap-1 text-center hidden lg:inline-flex">
                        <div x-on:click="$refs.html.classList.remove('overflow-y-hidden')">
                            @if(!Auth::check())
                                <x-camelui::link class="py-2.5" href="{{ route('auth.login') }}" icon="fa-solid fa-user" wire:navigate button>
                                    <span class="">{{ trans('app.auth.login.title') }}</span>
                                </x-camelui::link>
                            @else
                                <x-camelui::link href="{{ route('dashboard.index') }}" class="relative block w-10 h-10 overflow-hidden border-2 rounded-full shadow border-zinc-200 dark:border-zinc-700 focus:outline-none" wire:navigate>
                                    <x-camelui::avatar />
                                </x-camelui::link>
                            @endif
                        </div>
                    </div>
                    <!-- Shorticon Desktop -->


                    <!-- DarkMode -->
                    <div>
                        <x-darkmode box="true" />
                    </div>
                    <!-- DarkMode -->

                    {{-- <!-- Language -->
                    <div>
                        <x-language box="true" />
                    </div>
                    <!-- Language --> --}}


                    <!-- Menu -->
                    <div x-data="{ navbar: false }">
                        <div class="rounded-lg cursor-pointer">
                            <a
                                x-on:click="navbar = true"
                                class="cursor-pointer flex items-center justify-center w-10 h-10 p-1 text-center text-gray-100 border rounded-lg shadow-sm border-zinc-200 dark:border-zinc-700 hover:!bg-zinc-100 hover:dark:!bg-zinc-800 focus:outline-none"
                            >
                                <svg fill="currentColor" viewBox="0 0 20 20" class="w-8 h-8 text-zinc-900 dark:text-zinc-50 rtl:scale-x-[-1]">
                                    <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                        <template x-teleport="body">
                            <div
                                x-show="navbar"
                                x-transition:enter="transition transition-opacity transform ease-in duration-100"
                                x-transition:enter-start="opacity-0"
                                x-transition:enter-end="opacity-100"
                                x-transition:leave="transition transition-opacity transform ease-in duration-300"
                                x-transition:leave-start="transform opacity-100"
                                x-transition:leave-end="transform opacity-0"
                                class="fixed top-0 left-0 z-40 flex items-center justify-center w-full h-screen px-4 py-5 overflow-hidden bg-black cursor-pointer bg-opacity-90"
                            >
                                <div
                                    x-show="navbar"
                                    :class="navbar ? 'animate__animated animate__fadeInUp animate__faster' : 'animate__animated animate__fadeOutDown animate__faster'"
                                    class="mx-auto mb-5"
                                    x-on:click.outside="navbar = false"
                                >
                                    <div class="flex flex-col items-center justify-center py-8 mx-auto overflow-y-hidden leading-7 text-center gap-y-10 rtl:-mr-3 ltr:-ml-3">
                                        <a
                                            class="flex flex-col items-center justify-center text-base text-center {{ Route::currentRouteName() === 'home.index' ? 'font-bold bg-opacity-50' : '' }}"
                                            href="{{ route('home.index') }}"
                                            wire:navigate.hover
                                            x-on:click="navbar = false"
                                        >
                                            <h1 class="text-6xl transition duration-300 ease-out hover:ease-in text-zinc-50 hover:text-zinc-400">
                                                {{ trans('app.home.index.title') }}
                                            </h1>
                                        </a>
                                        <a
                                            class="flex flex-col items-center justify-center text-base text-center {{ Route::currentRouteName() === 'home.about' ? 'font-bold bg-opacity-50' : '' }}"
                                            href="{{ route('home.about') }}"
                                            wire:navigate.hover
                                            x-on:click="navbar = false"
                                        >
                                            <h1 class="text-6xl transition duration-300 ease-out hover:ease-in text-zinc-50 hover:text-zinc-400">
                                                {{ trans('app.home.about.title') }}
                                            </h1>
                                        </a>
                                        <a
                                            class="flex flex-col items-center justify-center text-base text-center {{ Route::currentRouteName() === 'home.branches' ? 'font-bold bg-opacity-50' : '' }}"
                                            href="{{ route('home.branches') }}"
                                            wire:navigate.hover
                                            x-on:click="navbar = false"
                                        >
                                            <h1 class="text-6xl transition duration-300 ease-out hover:ease-in text-zinc-50 hover:text-zinc-400">
                                                {{ trans('app.home.branches.title') }}
                                            </h1>
                                        </a>
                                        @if(!Auth::check())
                                            <x-camelui::link class="py-2.5" href="{{ route('auth.login') }}" icon="fa-solid fa-user" wire:navigate button>
                                                <span class="">{{ trans('app.auth.login.title') }}</span>
                                            </x-camelui::link>
                                        @else
                                            <x-camelui::link href="{{ route('dashboard.index') }}" class="relative block w-10 h-10 overflow-hidden border-2 rounded-full shadow border-zinc-200 dark:border-zinc-700 focus:outline-none" wire:navigate>
                                                <x-camelui::avatar />
                                            </x-camelui::link>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                    <!-- Menu -->
                </div>
            </div>
            <!-- Navbar -->
        </header>
        <!-- Header -->

        <!-- Body -->
        <main>
            {{ $slot }}
        </main>
        <!-- Body -->

        <!-- Footer -->
        <footer class="w-full border-t border-slate-900/5 dark:border-slate-50/5 sm:px-4 md:px-6 lg:px-8 xl:px-12">
            <section class="z-10 py-8 mx-auto">
                <div class="w-full mx-auto">
                    <div class="flex flex-wrap">
                        <div class="w-full px-2 lg:w-6/12">
                            <div class="mb-10">
                                <div class="inline-block p-0 mb-5">
                                    <a class="flex justify-start" href="{{ route('home.index') }}" wire:navigate>
                                        <img class="w-auto h-12" src="{{ asset('assets') }}/images/brand/logo.png" alt="logo" />
                                    </a>
                                </div>
                                <div class="rtl:md:pl-20 ltr:md:pr-20 rtl:lg:pl-20 ltr:lg:pr-20 rtl:xl:pl-24 ltr:xl:pr-24">
                                    <x-camelui::paragraph size="xs">
                                        {{ trans('app.home.index.page.footer.content') }}
                                    </x-camelui::paragraph>
                                </div>

                                <div class="flex items-center mt-6 leading-7 text-gray-900 gap-x-6 md:order-2">
                                    <a href="https://www.instagram.com/" class="text-gray-500 cursor-pointer">
                                        <span class="border-gray-200 border-solid sr-only">Instagram</span>
                                        <i class="text-2xl fa-brands fa-instagram"></i>
                                    </a>

                                    <a href="https://www.twitter.com/" class="text-gray-500 cursor-pointer">
                                        <span class="border-gray-200 border-solid sr-only">Twitter</span>
                                        <i class="text-2xl fa-brands fa-twitter"></i>
                                    </a>

                                    <a href="https://www.twitter.com/" class="text-gray-500 cursor-pointer">
                                        <span class="border-gray-200 border-solid sr-only">Twitter</span>
                                        <i class="text-2xl fa-brands fa-tiktok"></i>
                                    </a>

                                    <a href="https://www.twitter.com/" class="text-gray-500 cursor-pointer">
                                        <span class="border-gray-200 border-solid sr-only">Twitter</span>
                                        <i class="text-2xl fa-brands fa-youtube"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="w-1/2 px-3 sm:w-1/2 lg:w-3/12">
                            <div class="w-full mb-5">
                                <x-camelui::heading size="lg">{{ trans('app.name') }}</x-camelui::heading>
                                <ul class="mt-5">
                                    <li>
                                        <a href="{{ route('home.index') }}" class="inline-block w-full mb-2 font-medium transition duration-300 rounded-lg xl:mb-4 group/sidebar-link hover:bg-merino" wire:navigate>
                                            <div>
                                                <x-camelui::paragraph size="md">
                                                    {{ trans('app.home.index.title') }}
                                                </x-camelui::paragraph>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('home.about') }}" class="inline-block w-full mb-2 font-medium transition duration-300 rounded-lg xl:mb-4 group/sidebar-link hover:bg-merino" wire:navigate>
                                            <div>
                                                <x-camelui::paragraph size="md">
                                                    {{ trans('app.home.about.title') }}
                                                </x-camelui::paragraph>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('home.branches') }}" class="inline-block w-full mb-2 font-medium transition duration-300 rounded-lg xl:mb-4 group/sidebar-link hover:bg-merino" wire:navigate>
                                            <div>
                                                <x-camelui::paragraph size="md">
                                                    {{ trans('app.home.branches.title') }}
                                                </x-camelui::paragraph>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="w-1/2 px-3 sm:w-1/2 lg:w-3/12">
                            <div class="w-full mb-5">
                                <x-camelui::heading size="lg">{{ trans('app.home.index.page.footer.other') }}</x-camelui::heading>
                                <ul class="mt-5">
                                    <li>
                                        <a href="https://d-steps.com/ar/%D8%B3%D9%8A%D8%A7%D8%B3%D8%A9-%D8%A7%D9%84%D8%AE%D8%B5%D9%88%D8%B5%D9%8A%D8%A9/page-991697412" class="inline-block w-full mb-2 font-medium transition duration-300 rounded-lg xl:mb-4 group/sidebar-link hover:bg-merino">
                                            <div>
                                                <x-camelui::paragraph size="md">
                                                    {{ trans('app.home.index.page.footer.other.privacy') }}
                                                </x-camelui::paragraph>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://d-steps.com/ar/%D8%B3%D9%8A%D8%A7%D8%B3%D8%A9-%D8%A7%D9%84%D8%A7%D8%B3%D8%AA%D8%A8%D8%AF%D8%A7%D9%84-%D9%88%D8%A7%D9%84%D8%A7%D8%B3%D8%AA%D8%B1%D8%AC%D8%A7%D8%B9/page-1765276475" class="inline-block w-full mb-2 font-medium transition duration-300 rounded-lg xl:mb-4 group/sidebar-link hover:bg-merino">
                                            <div>
                                                <x-camelui::paragraph size="md">
                                                    {{ trans('app.home.index.page.footer.other.tos') }}
                                                </x-camelui::paragraph>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- BackToTop-->
            <a
                class="fixed z-50 hidden p-3 text-white transition-colors bg-indigo-600 rounded-md cursor-pointer bottom-5 hover:ease-in rtl:left-2 rtl:lg:left-3 ltr:right-2 ltr:lg:right-3 hover:bg-indigo-700"
                onclick="window.scrollTo(0, 0);"
                id="myBtn"
            >
                <i class="fas fa-arrow-up"></i>
            </a>
            <script>
                document.addEventListener("livewire:navigated", () => {
                    // UpToTop
                    let mybutton = document.getElementById("myBtn");
                    window.onscroll = function () {
                        scrollFunction();
                    };
                    function scrollFunction() {
                        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                            mybutton.style.display = "block";
                        } else {
                            mybutton.style.display = "none";
                        }
                    }
                });

                document.addEventListener("livewire:init", () => {
                    // UpToTop
                    let mybutton = document.getElementById("myBtn");
                    window.onscroll = function () {
                        scrollFunction();
                    };
                    function scrollFunction() {
                        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                            mybutton.style.display = "block";
                        } else {
                            mybutton.style.display = "none";
                        }
                    }
                });
            </script>
            <!-- BackToTop-->
        </footer>
        <!-- Footer -->
    </div>
    <!-- Layout -->
</div>
@endsection
