<div>
    <div>
        <x-camelui::card class="p-6" rounded="2xl">

            <form wire:submit="register">
                <div class="relative w-full mb-3">
                    <x-camelui::input label="{{ trans('app.company.name') }}" placeholder="{{ trans('app.company.name') }}" wire="username" icon="fa-solid fa-user" required="true" oninput="this.value=this.value.replace(/[^a-zA-Z0-9-]/g,'')" />
                </div>
                <div class="relative w-full mb-3">
                    <x-camelui::input label="{{ trans('app.user.email') }}" type="email" placeholder="{{ trans('app.user.email') }}" wire="email" icon="fa-solid fa-envelope" required="true" oninput="this.value=this.value.replace(/[^a-zA-Z0-9.@-]/g,'')" />
                </div>
                <div class="relative w-full mb-3">
                    <x-camelui::input label="{{ trans('app.user.phone') }}" type="tel" placeholder="{{ trans('app.user.phone') }}" wire="phone" icon="fa-solid fa-phone" required="true" oninput="this.value=this.value.replace(/\D/g,'')" />
                </div>
                <div class="relative w-full mb-3">
                    <x-camelui::password label="{{ trans('app.password') }}" placeholder="{{ trans('app.password') }}" wire="password" required="true" />
                </div>

                <div class="mt-6 text-center">
                    <x-camelui::button class="bg-primary-800 py-3.5" icon="fa-solid fa-user-plus" wire:target="register">
                        {{ trans('app.auth.register.btn') }}
                    </x-camelui::button>
                </div>
            </form>
        </x-camelui::card>
    </div>
    <div class="justify-center w-full mt-3 text-center">
        <span class="text-sm text-gray-400">
            {{ trans('app.auth.register.login.body') }}
            <a href="{{ route('auth.login') }}" wire:navigate>
                <span class="underline">{{ trans('app.auth.register.login.btn') }}</span>
            </a>
        </span>
    </div>
</div>