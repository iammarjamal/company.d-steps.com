<div>
    <!-- Body -->
    <x-camelui::card class="p-6" rounded="2xl">
        <form wire:submit="resetpassword">
            <div class="relative w-full mb-3">
                <x-camelui::input label="{{ trans('app.user.email') }}" type="email" placeholder="{{ trans('app.email') }}" wire="email" icon="fa-solid fa-envelope" disabled="true" />
            </div>
            <div class="relative w-full mb-3">
                <x-camelui::password label="{{ trans('app.new_password') }}" placeholder="{{ trans('app.new_password') }}" wire="password" required="true" />
            </div>
            <div class="relative w-full mb-3">
                <x-camelui::password label="{{ trans('app.password_confirmation') }}" placeholder="{{ trans('app.password_confirmation') }}" wire="password_confirmation" required="true" />
            </div>
            
            <div class="mt-6 text-center">
                <x-camelui::button class="bg-primary-800 py-3.5" icon="fa-solid fa-unlock" wire:target="resetpassword">
                    {{ trans('app.auth.resetpassword.title') }}
                </x-camelui::button>
            </div>
        </form>
    </x-camelui::card>
    <!-- Body -->
</div>