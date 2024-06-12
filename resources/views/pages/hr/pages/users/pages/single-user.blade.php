<div class="w-full">
    <div x-data="{ update: false, remove: false }" x-on:update.window="update = false"
         x-on:remove.window="remove = false">
        <!-- List -->
        <div x-data="{ menulist: true }" x-show="list"
             x-transition:enter="transition-opacity transform ease-in duration-300" x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100">
            <x-camelui::card class="flex justify-between py-4 gap-y-3 flex-col items-center p-2.5" rounded="2xl">
                <div class="flex flex-row items-center justify-center w-full" x-on:click="menulist = ! menulist">
                    <div class="flex items-center justify-center w-1/5">
                        <img src="https://ui-avatars.com/api/?name={{$username}}&background=4F46E5&color=fff"
                             class="mb-1 rounded-full  h-9 md:h-9 lg:h-10 xl:h-12"/>
                    </div>
                    <div class="flex items-center justify-center w-3/5">
                        <x-camelui::heading size="xl">
                            {{ $username }}
                        </x-camelui::heading>
                    </div>
                    <div class="flex items-center justify-center w-1/5">
                        <x-camelui::link href="#">
                            <i class="text-xl transition-all fa-solid fa-chevron-up"
                               :class="menulist ? 'rotate-0' : 'rotate-180'"></i>
                        </x-camelui::link>
                    </div>
                </div>
                <div
                    class="flex items-center justify-center flex-row w-full pt-3 mt-2.5 border-t border-zinc-200 dark:border-zinc-700"
                    x-show="menulist"
                    x-transition:enter="transition-opacity transform ease-in duration-100"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition-opacity transform ease-in duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                >
                    <div class="flex items-center justify-center w-1/3">
                        <x-camelui::link   x-on:click="update = ! update">
                            <i class="text-xl fa-solid fa-edit text-secondary-700 dark:text-secondary-400"></i>
                        </x-camelui::link>
                    </div>
                    {{--                    <div class="flex items-center justify-center w-1/3">--}}
                    {{--                        <x-camelui::link href="#" x-on:click="address = ! address">--}}
                    {{--                            <i class="text-xl fa-solid fa-location-dot text-secondary-700 dark:text-secondary-400"></i>--}}
                    {{--                        </x-camelui::link>--}}
                    {{--                    </div>--}}
                    <div class="flex items-center justify-center w-1/3">
                        <x-camelui::link href="#" x-on:click="remove = ! remove">
                            <i class="text-xl fa-solid fa-trash text-danger-500 dark:text-danger-400"></i>
                        </x-camelui::link>
                    </div>
                </div>
            </x-camelui::card>
        </div>
        <!-- List -->

        <!-- Grid -->
        <div x-show="!list" x-transition:enter="transition-opacity transform ease-in duration-300"
             x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
            <x-camelui::card class="flex  py-8 gap-y-3 flex-col justify-center items-center p-2.5" rounded="2xl">
                <img src="https://ui-avatars.com/api/?name={{$username}}&background=4F46E5&color=fff"
                     class="mb-1 rounded-full"/>
                <x-camelui::heading size="xs">
                    {{ $username }}
                </x-camelui::heading>
                <div
                    class="flex items-center justify-center flex-row w-full pt-3 mt-2.5 border-t border-zinc-200 dark:border-zinc-700">
                    <div class="flex items-center justify-center w-1/3">
                        <x-camelui::link href="#" x-on:click="update = ! update">
                            <i class="text-xl fa-solid fa-edit text-secondary-700 dark:text-secondary-400"></i>
                        </x-camelui::link>
                    </div>
                    {{--                    <div class="flex items-center justify-center w-1/3">--}}
                    {{--                        <x-camelui::link href="#" x-on:click="address = ! address">--}}
                    {{--                            <i class="text-xl fa-solid fa-location-dot text-secondary-700 dark:text-secondary-400"></i>--}}
                    {{--                        </x-camelui::link>--}}
                    {{--                    </div>--}}
                    <div class="flex items-center justify-center w-1/3">
                        <x-camelui::link href="#" x-on:click="remove = ! remove">
                            <i class="text-xl fa-solid fa-trash text-danger-500 dark:text-danger-400"></i>
                        </x-camelui::link>
                    </div>
                </div>
            </x-camelui::card>
        </div>
        <!-- Grid -->


        <!-- Update -->
            <x-camelui::modal wire="update">
                <div x-data="{ user: true }" x-on:save.window="update = false">
                    <div
                        x-show="user"
                        x-transition:enter="transition-all duration-500"
                        x-transition:enter-start="opacity-0 transform origin-center"
                        x-transition:enter-end="opacity-100 transform origin-center"
                        x-data="{ select: false }"
                    >

                        <!-- User -->
                        <div class="flex justify-center mb-6" x-show="user">
                            <form wire:submit="save" class="flex flex-col w-full mt-3.5">
                                <div class="relative w-full mb-3">
                                    <x-camelui::input label="{{ trans('app.user.name') }}"
                                                      placeholder="{{ trans('app.user.name') }}" wire="username"
                                                      icon="fa-solid fa-user" required="true"/>
                                </div>
                                <div class="relative w-full mb-3">
                                    <x-camelui::input label="{{ trans('app.user.email') }}" type="email"
                                                      placeholder="{{ trans('app.user.email') }}" wire="email"
                                                      icon="fa-solid fa-envelope" required="true"/>
                                </div>
                                <div class="relative w-full mb-3">
                                    <x-camelui::password label="{{ trans('app.user.password') }}" placeholder="{{ trans('app.user.password') }}" wire="password" required="true" />
                                </div>
                                <div class="relative w-full mb-3">
                                    <x-camelui::password label="{{ trans('app.user.password_confirmation') }}" placeholder="{{ trans('app.user.password_confirmation') }}" wire="password_confirmation" required="true" />
                                </div>
                                <div class="w-full mt-4">
                                    <x-camelui::button class="py-3.5" color="primary" icon="fa-solid fa-plus"
                                                       wire:target="save">
                                        {{ trans('app.save') }}
                                    </x-camelui::button>
                                </div>
                            </form>
                        </div>
                        <!-- User -->
                    </div>


                </div>
            </x-camelui::modal>
        <!-- Update -->


        <!-- Remove -->
        <x-camelui::modal wire="remove">
            <x-camelui::heading size="md">
                هل تريد حذف العميل ؟، هذا الإجراء لا يمكن التراجع عنه
            </x-camelui::heading>
            <div class="flex flex-col justify-between w-full mt-3">
                <form wire:submit="remove({{ $id }})">
                    <x-camelui::button style="danger" class="py-2" icon="fa-solid fa-trash" wire:target="remove"
                                       x-on:click="setTimeout(() => { remove = false; }, 950)">
                        حذف
                    </x-camelui::button>
                </form>
            </div>
        </x-camelui::modal>
        <!-- Remove -->
    </div>
</div>
