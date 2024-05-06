<div>
    <!-- Body -->
    <form wire:submit="forgotPassword">
        <x-camelui::card class="sm:p-3 md:p-5 lg:p-6 xl:p-8" rounded="2xl">
            <div class="relative w-full mb-3">
                <x-camelui::input label="{{ trans('app.user.email') }}" type="email" placeholder="{{ trans('app.user.email') }}" wire="email" icon="fa-solid fa-envelope" required="true" />
            </div>
            
            <div class="mt-6 text-center">
                <x-camelui::button class="py-3.5" icon="fa-solid fa-location-arrow" wire:target="forgotPassword">
                    {{ trans('app.auth.forget.password.title') }}
                </x-camelui::button>
            </div>
        </x-camelui::card>
    </form>
    <!-- Body -->
    
    <!-- Login -->
    <div class="justify-center w-full mt-3 text-center">
        <span class="text-sm text-gray-400">
            {{ trans('app.auth.forget.password.page.login.title') }}
            <a href="{{ route('auth.login') }}" wire:navigate>
                <span class="underline">{{ trans('app.auth.forget.password.page.login.btn') }}</span>
            </a>
        </span>
    </div>
    <!-- Login -->
</div>
