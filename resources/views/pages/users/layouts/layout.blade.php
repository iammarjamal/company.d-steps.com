@extends('layouts.app')

@section('slot')
    <div class="flex h-screen"
         x-data="{ Shortbar: false, Sidebar: JSON.parse(localStorage.getItem('DashboardSidebar')) }"
         x-init="$watch('Sidebar', (val) => localStorage.setItem('DashboardSidebar', val))">
        <!-- SideBar -->
        <div class="relative h-screen" x-show="Sidebar">
            <button
                type="button"
                aria-hidden="true"
                class="fixed z-30 w-full h-full bg-black/50 focus:outline-none lg:hidden"
                x-show="Sidebar"
                x-transition:enter="transition transition-opacity transform ease-in duration-100"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition transition-opacity transform ease-in duration-300"
                x-transition:leave-start="transform opacity-100"
                x-transition:leave-end="transform opacity-0"
                x-on:click="Sidebar = false, $refs.html.classList.remove('overflow-y-hidden')"
            ></button>
            <aside
                class="fixed lg:static  bg-zinc-50 dark:bg-zinc-900 no-scrollbar ltr:left-0 rtl:right-0 z-40 w-56 overflow-y-scroll transition-all duration-300 transform border-l shadow-lg tab:w-72 laptop:w-72 border-zinc-900/5 dark:border-zinc-300/5 shadow-zinc-500/5 dark:shadow-zinc-500/5 max-w-[15rem] h-full ease-in-out"
                x-show="Sidebar"
                aria-hidden="true"
                x-transition:enter="transition-transform duration-500"
                x-transition:enter-start="ltr:-translate-x-full rtl:translate-x-full"
                x-transition:enter-end="ltr:-translate-x-0 rtl:translate-x-0"
                x-transition:leave="transition-transform duration-300"
                x-transition:leave-start="transform ltr:-translate-x-0 rtl:translate-x-0"
                x-transition:leave-end="transform ltr:-translate-x-full rtl:translate-x-full"
            >
                <div class="flex items-center justify-center p-4 my-3 lg:my-4 ">
                    <x-camelui::logo class="h-[72px] w-auto"/>
                </div>
                <nav class="flex flex-col gap-1 px-1 mb-3 border-t border-zinc-900/5 dark:border-zinc-50/5">
                    <div class="flex flex-col w-full gap-1 px-1 mt-4">

                        <!-- General -->
                        <div class="mb-3">
                            <li class="flex items-start mx-4 mt-2 mb-0">
                                <span
                                    class="text-xs text-indigo-600 dark:text-indigo-400">{{ trans('app.dashboard.navbar.title.general') }}</span>
                            </li>

                            <a
                                class="{{ Route::currentRouteName() === 'user.index' ? 'bg-zinc-200 dark:bg-zinc-800 bg-opacity-25' : '' }} flex items-center px-4 py-2 mx-2 mt-1 rounded-md hover:bg-zinc-200 dark:hover:bg-zinc-800 hover:bg-opacity-25 text-zinc-900 dark:text-zinc-100 cursor-pointer"
                                x-on:click="Sidebar = window.innerWidth <= 1024 ? false : true; setTimeout(() => { Livewire.navigate('{{ route('user.index') }}') }, 350)"
                            >
                                <i class="inline-flex text-xl flex-inline {{ Route::currentRouteName() === 'user.index' ? 'bx bxs-home' : 'bx bx-home' }}"></i>
                                <p class="mx-3 text-lg">{{ trans('app.dashboard.navbar.index') }}</p>
                            </a>
                        </div>
                        <!-- General -->

                            <!-- Notifications -->
                            <div class="mb-3">
                                <li class="flex items-start mx-4 mt-2 mb-0">
                                <span
                                    class="text-xs text-indigo-600 dark:text-indigo-400">{{ trans('app.dashboard.navbar.title.activity') }}</span>
                                </li>

                                <a
                                    class="{{ Route::currentRouteName() === 'user.notifications.manage' ? 'bg-zinc-200 dark:bg-zinc-800 bg-opacity-25' : '' }} flex items-center px-4 py-2 mx-2 mt-1 rounded-md hover:bg-zinc-200 dark:hover:bg-zinc-800 hover:bg-opacity-25 text-zinc-900 dark:text-zinc-100 cursor-pointer"
                                    x-on:click="Sidebar = window.innerWidth <= 1024 ? false : true; setTimeout(() => { Livewire.navigate('{{ route('user.notifications.manage') }}') }, 350)"
                                >
                                    <i class="inline-flex text-xl flex-inline {{ Route::currentRouteName() === 'user.notifications.manage' ? 'bx bxs-bell' : 'bx bx-bell' }}"></i>
                                    <p class="mx-3 text-lg">{{ trans('app.dashboard.navbar.title.notifications') }}</p>
                                </a>
                            </div>
                            <!-- Notifications -->

                            <!-- Requests -->
                            <div class="mb-3">
                                <li class="flex items-start mx-4 mt-2 mb-0">
                                <span
                                    class="text-xs text-indigo-600 dark:text-indigo-400">{{ trans('app.dashboard.navbar.title.requests') }}</span>
                                </li>

                                <a
                                    class="{{ Route::currentRouteName() === 'user.requests.vacation' ? 'bg-zinc-200 dark:bg-zinc-800 bg-opacity-25' : '' }} flex items-center px-4 py-2 mx-2 mt-1 rounded-md hover:bg-zinc-200 dark:hover:bg-zinc-800 hover:bg-opacity-25 text-zinc-900 dark:text-zinc-100 cursor-pointer"
                                    x-on:click="Sidebar = window.innerWidth <= 1024 ? false : true; setTimeout(() => { Livewire.navigate('{{ route('user.requests.vacation') }}') }, 350)"
                                >
                                    <i class="inline-flex text-xl flex-inline {{ Route::currentRouteName() === 'user.requests.vacation' ? 'fa-solid fa-calendar' : 'fa-regular fa-calendar' }}"></i>
                                    <p class="mx-3 text-lg">{{ trans('app.dashboard.navbar.title.vacation') }}</p>
                                </a>
                                <a
                                    class="{{ Route::currentRouteName() === 'user.requests.advance-payments' ? 'bg-zinc-200 dark:bg-zinc-800 bg-opacity-25' : '' }} flex items-center px-4 py-2 mx-2 mt-1 rounded-md hover:bg-zinc-200 dark:hover:bg-zinc-800 hover:bg-opacity-25 text-zinc-900 dark:text-zinc-100 cursor-pointer"
                                    x-on:click="Sidebar = window.innerWidth <= 1024 ? false : true; setTimeout(() => { Livewire.navigate('{{ route('user.requests.advance-payments') }}') }, 350)"
                                >
                                    <i class="inline-flex text-xl flex-inline {{ Route::currentRouteName() === 'user.requests.advance-payments' ? 'fas fa-money-bill-alt' : 'far fa-money-bill-alt' }}"></i>
                                    <p class="mx-3 text-lg">{{ trans('app.dashboard.navbar.title.advance-payment') }}</p>
                                </a>
                            </div>
                            <!-- Requests -->
                    </div>
                </nav>
            </aside>
        </div>
        <!-- SideBar -->

        <!-- Main -->
        <main class="w-full px-0 mt-2 overflow-y-scroll no-scrollbar md:px-2 lg:px-4 xl:px-6">

            <!-- Header -->
            <header class="relative z-20 flex items-center justify-between w-full px-3 py-2 pb-0" id="headerApp">
                <div class="flex items-center">
                    <x-camelui::button x-on:click="Sidebar = ! Sidebar" class="p-2 px-3 rounded-2xl laptop:p-3">
                        <i class="text-xl fa-solid fa-bars text-zinc-50"></i>
                    </x-camelui::button>
                </div>
                <div class="flex flex-wrap items-center phone:gap-2 laptop:gap-4">
                    <div class="flex flex-wrap items-center gap-2 lg:gap-2">
                        <!-- DarkMode -->
                        <div class="relative">
                            <x-darkmode box="true"/>
                        </div>
                        <!-- DarkMode -->

                        {{-- <!-- Language -->
                        <div class="relative">
                            <x-language box="true"/>
                        </div>
                        <!-- Language --> --}}

                        <!-- Notification -->
                        <div class="relative">
                            <livewire:components.notifications/>
                        </div>
                        <!-- Notification -->
                    </div>
                    <!-- Profile -->
                    <div class="relative rtl:mr-1.5 ltr:ml-1.5">
                        <x-profile/>
                    </div>
                    <!-- Profile -->
                </div>
            </header>
            <!-- Header -->

            <!-- App -->
            <div class="z-10 flex flex-col w-full pb-10 mt-10" id="App">
                {{ $slot }}
            </div>
            <!-- App -->
        </main>
        <!-- Main -->


    </div>
    <script>
        window.addEventListener('DOMContentLoaded' ,function () {
            const id = {{auth()->user()->id}}
            window.Echo.private(`App.Models.User.${id}`)
                .listen('UserNotificationSent', (e) => {
                    Livewire.dispatch('reverb_notification_sent');
                    // console.log(e);
                })
                .listen('UserNotificationDeleted', (e) => {
                    Livewire.dispatch('reverb_notification_deleted');
                });

            window.Echo.channel(`management`)
                .listen('UserVacationCreatedOrUpdated', (e) => {
                    Livewire.dispatch('reverb_vacation_created_or_updated');
                    // console.log(e);
                })
                .listen('UserVacationDeleted', (e) => {
                    Livewire.dispatch('reverb_vacation_deleted');
                    // console.log(e);
                })
                .listen('UserAdvancePaymentCreatedOrUpdated', (e) => {
                    Livewire.dispatch('reverb_advance_payment_created_or_updated');
                    // console.log(e);
                })
                .listen('UserAdvancePaymentDeleted', (e) => {
                    Livewire.dispatch('reverb_advance_payment_deleted');
                    // console.log(e);
                })

        });

    </script>
@endsection
