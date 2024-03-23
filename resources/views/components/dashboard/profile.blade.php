<div>
    <div x-data="{ dropdownOpen: false }">
        <button x-on:click="dropdownOpen = ! dropdownOpen" class="relative block w-10 h-10 overflow-hidden border-2 rounded-full shadow border-zinc-200 dark:border-zinc-700 focus:outline-none">
            <x-avatar />
        </button>
        <div x-show="dropdownOpen" x-on:click="dropdownOpen = false" class="fixed inset-0 z-30 w-full h-full" style="display: none;"></div>
        <div x-show="dropdownOpen" x-transition class="absolute z-40 w-48 p-2 mt-2 overflow-hidden border rounded-lg shadow-lg rtl:left-0 ltr:right-0 border-zinc-200 dark:border-zinc-600 shadow-zinc-600/5 dark:shadow-zinc-400/5 bg-zinc-50 dark:bg-zinc-900" style="display: none;">
            <ul class="my-1">

                @if(Auth::user()->role == 'admin')
                <a href="{{ route('dashboard.index') }}" x-on:click="dropdownOpen = false" class="block p-2 mb-1 text-sm rounded-md hover:bg-zinc-200 dark:hover:bg-zinc-800 hover:bg-opacity-25 text-zinc-900 dark:text-zinc-100">
                    <li class="flex items-center justify-between">
                        لوحة التحكم
                        <span class="flex items-center mr-5 text-base rounded-full text-primary">
                            <i class="fa-solid fa-gauge"></i>
                        </span>
                    </li>
                </a>
                @endif

                <a href="{{ route('dashboard.profile') }}" x-on:click="dropdownOpen = false" class="{{ Route::currentRouteName() === 'dashboard.profile' ? 'bg-zinc-200 dark:bg-zinc-800 bg-opacity-25' : '' }} block p-2 mb-1 text-sm rounded-md hover:bg-zinc-200 dark:hover:bg-zinc-800 hover:bg-opacity-25 text-zinc-900 dark:text-zinc-100" wire:navigate>
                    <li class="flex items-center justify-between">
                        {{ trans('app.dashboard.navbar.general.profile') }}
                        <span class="inline-flex items-center text-xl rounded-full ltr:ml-5 rtl:mr-5">
                            <i class="{{ Route::currentRouteName() === 'dashboard.profile' ? 'bx bxs-user' : 'bx bx-user' }}"></i>
                        </span>
                    </li>
                </a>
                
                @if(!Auth::check())
                <a href="{{ route('dashboard.preferences') }}" x-on:click="dropdownOpen = false" class="{{ Route::currentRouteName() === 'dashboard.preferences' ? 'bg-zinc-200 dark:bg-zinc-800 bg-opacity-25' : '' }} block p-2 mb-1 text-sm rounded-md hover:bg-zinc-200 dark:hover:bg-zinc-800 hover:bg-opacity-25 text-zinc-900 dark:text-zinc-100" wire:navigate>
                    <li class="flex items-center justify-between">
                        {{ trans('app.dashboard.navbar.general.preferences') }}
                        <span class="inline-flex items-center text-xl rounded-full ltr:ml-5 rtl:mr-5">
                            <i class="{{ Route::currentRouteName() === 'dashboard.preferences' ? 'bx bxs-cookie' : 'bx bx-cookie' }}"></i>
                        </span>
                    </li>
                </a>

                <a href="{{ route('dashboard.security') }}" x-on:click="dropdownOpen = false" class="{{ Route::currentRouteName() === 'dashboard.security' ? 'bg-zinc-200 dark:bg-zinc-800 bg-opacity-25' : '' }} block p-2 mb-1 text-sm rounded-md hover:bg-zinc-200 dark:hover:bg-zinc-800 hover:bg-opacity-25 text-zinc-900 dark:text-zinc-100" wire:navigate>
                    <li class="flex items-center justify-between">
                        {{ trans('app.dashboard.navbar.general.security') }}
                        <span class="inline-flex items-center text-xl rounded-full ltr:ml-5 rtl:mr-5">
                            <i class="{{ Route::currentRouteName() === 'dashboard.security' ? 'bx bxs-check-shield' : 'bx bx-check-shield' }}"></i>
                        </span>
                    </li>
                </a>
                @endif

                <div class="mt-1 mb-1 border-t border-slate-900/5 dark:border-slate-50/5"></div>

                <a href="{{ route('auth.logout') }}" x-on:click="dropdownOpen = false" class="block p-2 mt-1 text-sm text-red-600 rounded-md hover:bg-zinc-200 dark:hover:bg-zinc-800 hover:bg-opacity-25 dark:text-red-400">
                    <li class="flex items-center justify-between">
                        {{ trans('app.dashboard.navbar.general.logout') }}
                        <span class="inline-flex items-center text-xl rounded-full ltr:ml-5 rtl:mr-5">
                            <i class="bx bx-log-out"></i>
                        </span>
                    </li>
                </a>
            </ul>
        </div>
    </div>
</div>
