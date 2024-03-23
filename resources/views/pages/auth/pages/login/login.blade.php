<div>
    <!-- Body -->
    <div>
        <x-camelui::card class="p-6" rounded="2xl">
            <form wire:submit="login">
                <div class="relative w-full mb-3">
                    <x-camelui::input label="{{ trans('app.user.email') }}" type="email" placeholder="{{ trans('app.user.email') }}" wire="email" icon="fa-solid fa-envelope" required="true" />
                </div>
                <div class="relative w-full mb-3">
                    <x-camelui::password label="{{ trans('app.password') }}" placeholder="{{ trans('app.password') }}" wire="password" required="true" />
                </div>
    
                <!-- Forget Password -->
                <div class="flex justify-end rtl:ml-1 ltr:mr-1">
                    <div class="mt-0">
                        <a class="text-sm text-gray-400" href="{{ route('auth.forgot-password') }}" wire:navigate>
                            <div class="flex justify-between">
                                <span class="p-button-label">{{ trans('app.auth.forgotpassword.title') }}</span><span><i class="fa-solid fa-user-lock rtl:mr-2 ltr:ml-2"></i></span>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Forget Password -->
    
                <div class="mt-6 text-center">
                    <x-camelui::button class="bg-primary-800 py-3.5" icon="fa-solid fa-user-lock" wire:target="login">
                        {{ trans('app.auth.login.title') }}
                    </x-camelui::button>
                </div>
            </form>
        </x-camelui::card>
    </div>
    <!-- Body -->
    
    <!-- Register -->
    {{-- <div class="justify-center w-full mt-3 text-center">
        <span class="text-sm text-gray-400">
            {{ trans('app.auth.login.register.body') }}
            <a href="{{ route('auth.register') }}" wire:navigate>
                <span class="underline">{{ trans('app.auth.login.register.btn') }}</span>
            </a>
        </span>
    </div> --}}
    <!-- Register -->
</div>