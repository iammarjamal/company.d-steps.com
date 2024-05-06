<div>
    <!-- Body -->
    <div>
        <x-camelui::card class="sm:p-3 md:p-5 lg:p-6 xl:p-8" rounded="2xl">
            <form wire:submit="register">
                <div class="relative w-full mb-3">
                    <x-camelui::input label="{{ trans('app.user.name') }}" type="text" placeholder="{{ trans('app.user.name') }}" wire="username" icon="fa-solid fa-user" required="true" />
                </div>
                <div class="relative w-full mb-3">
                    <x-camelui::input label="{{ trans('app.user.email') }}" type="email" placeholder="{{ trans('app.user.email') }}" wire="email" icon="fa-solid fa-envelope" required="true" />
                </div>
                <div class="relative w-full mb-3">
                    <x-camelui::password label="{{ trans('app.user.password') }}" placeholder="{{ trans('app.user.password') }}" wire="password" required="true" />
                </div>
    
                <div class="mt-6 text-center">
                    <x-camelui::button class="py-3.5" icon="fa-solid fa-user-plus" wire:target="register">
                        {{ trans('app.auth.register.title') }}
                    </x-camelui::button>
                </div>
            </form>
        </x-camelui::card>
    </div>
    <!-- Body -->
    
    <!-- Register -->
    <div class="justify-center w-full mt-3 text-center">
        <span class="text-sm text-gray-400">
            {{ trans('app.auth.register.page.login.title') }}
            <a href="{{ route('auth.login') }}" wire:navigate>
                <span class="underline">{{ trans('app.auth.register.page.login.btn') }}</span>
            </a>
        </span>
    </div>
    <!-- Register -->
</div>