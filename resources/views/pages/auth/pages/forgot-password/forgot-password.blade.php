<div>
    <!-- Body -->
    <form wire:submit="forgotPassword" rounded="2xl">
        <x-camelui::card class="p-6">
            <div class="relative w-full mb-3">
                <x-camelui::input label="{{ trans('app.user.email') }}" type="email" placeholder="{{ trans('app.user.email') }}" wire="email" icon="fa-solid fa-envelope" required="true" />
            </div>
            
            <div class="mt-6 text-center">
                <x-camelui::button class="bg-primary-800 py-3.5" icon="fa-solid fa-location-arrow" wire:target="forgotPassword">
                    {{ trans('app.auth.forgotpassword.title') }}
                </x-camelui::button>
            </div>
        </x-camelui::card>
    </form>
    <!-- Body -->
    
    <!-- Login -->
    <div class="justify-center w-full mt-3 text-center">
        <span class="text-sm text-gray-400">
            {{ trans('app.auth.forgotpassword.login.body') }}
            <a href="{{ route('auth.login') }}" wire:navigate>
                <span class="underline">{{ trans('app.auth.forgotpassword.login.btn') }}</span>
            </a>
        </span>
    </div>
    <!-- Login -->
</div>
