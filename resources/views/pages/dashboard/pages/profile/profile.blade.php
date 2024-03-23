<div>    
    <div class="w-full p-2 pt-6 mt-3 border-t border-zinc-200/60 dark:border-zinc-800 phone:mb-20 laptop:py-5 max-w-64 sm:px-2 md:px-4 lg:px-6 xl:px-8">
        <div class="max-w-2xl p-2 mx-auto desktop:mt-12">
            <x-camelui::card class="p-6" rounded="2xl">
            <!-- Profile -->
            <form wire:submit="profile" class="flex flex-col">
                <div class="relative flex justify-center w-full">
                    <div class="relative block w-24 h-24 overflow-hidden border-2 rounded-full shadow border-zinc-200 dark:border-zinc-700 focus:outline-none">
                        <x-avatar />
                    </div>
                </div>
                <div class="relative w-full my-4">
                    <x-camelui::input label="{{ trans('app.name') }}" placeholder="{{ trans('app.name') }}" wire="name" icon="fa-solid fa-user" required="true" />
                </div>
                <div class="relative w-full mb-4">
                    <x-camelui::input label="{{ trans('app.email') }}" type="email" placeholder="{{ trans('app.email') }}" wire="email" icon="fa-solid fa-envelope" required="true" />
                </div>
                <div class="relative w-full mb-4">
                    <x-camelui::input label="{{ trans('app.phone') }}" type="tel" placeholder="{{ trans('app.phone') }}" wire="phone" icon="fa-solid fa-phone" required="false" />
                </div>
                <div class="relative w-full mt-1">
                    <x-camelui::button class="py-3.5" color="primary" icon="fa-solid fa-check-double" wire:target="profile">
                        {{ trans('app.dashboard.profile.btn') }}
                    </x-camelui::button>
                </div>
            </form>
            <!-- Profile -->

            <!-- Change Password -->
            <div class="mt-3 text-center" x-data="{ popup: false }">
                <a class="text-gray-500 underline cursor-pointer text-md dark:text-gray-400" x-on:click="popup = ! popup">
                    {{ trans('app.dashboard.profile.change.password') }}
                </a>
                <x-camelui::modal wire="popup">
                    <div class="flex justify-center mb-6">
                        <form wire:submit="changePassword" class="flex flex-col w-full mt-3.5">
                            <div class="relative w-full mb-3">
                                <x-camelui::password label="{{ trans('app.old_password') }}" placeholder="{{ trans('app.old_password') }}" wire="old_password" />
                            </div>
                            <div class="relative w-full mb-3">
                                <x-camelui::password label="{{ trans('app.new_password') }}" placeholder="{{ trans('app.new_password') }}" wire="password" />
                            </div>
                            <div class="relative w-full mb-3">
                                <x-camelui::password label="{{ trans('app.password_confirmation') }}" placeholder="{{ trans('app.password_confirmation') }}" wire="password_confirmation" />
                            </div>
                            <div class="w-full mt-4">
                                <x-camelui::button class="py-3.5" color="primary" icon="fa-solid fa-key" wire:target="changePassword">
                                    {{ trans('app.dashboard.profile.change.password') }}
                                </x-camelui::button>
                            </div>
                        </form>
                    </div>
                </x-camelui::modal>
            </div>
            <!-- Change Password -->
            </x-camelui::card>
        </div>
    </div>
</div>