<div>
    @if(session('success'))
        <div
            class="fixed inset-0 flex items-end justify-center px-4 py-6 pointer-events-none sm:p-6 sm:items-start sm:justify-end"
            id="success-message" onclick="document.getElementById('success-message').style.display='none'">
            <div
                class="max-w-sm w-full bg-green-100 shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
                <div class="p-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <!-- Check Icon -->
                            <svg class="h-6 w-6 text-green-400" xmlns="http://www.w3.org/2000/svg"
                                 fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"
                                      d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <div class="ml-3 w-0 flex-1 pt-0.5">
                            <p class="text-sm font-medium text-green-800">
                                {{ session('success') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (session('error'))
        <div id="error-message"
             class="fixed inset-0 flex items-end justify-center px-4 py-6 pointer-events-none sm:p-6 sm:items-start sm:justify-end">
            <div
                class="max-w-sm w-full bg-red-100 shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
                <div class="p-4">
                    <div class="flex items-start">
                        <div class="ml-3 w-0 flex-1 pt-0.5">
                            <p class="text-sm font-medium text-red-800">
                                خطأ:
                            </p>
                            <ul class="mt-1 text-sm text-red-600 list-disc list-inside">
                                <li>{{ session('error') }}</li>
                            </ul>
                        </div>
                        <div class="ml-4 flex-shrink-0 flex">
                            <!-- Close Icon -->
                            <button onclick="document.getElementById('error-message').style.display='none'"
                                    class="bg-red-100 rounded-md inline-flex text-red-400 hover:text-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                <span class="sr-only">Close</span>
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                     fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M6.293 9.293a1 1 0 011.414 0L10 11.586l2.293-2.293a1 1 0 111.414 1.414L11.414 13l2.293 2.293a1 1 0 01-1.414 1.414L10 14.414l-2.293 2.293a1 1 0 01-1.414-1.414L8.586 13 6.293 10.707a1 1 0 010-1.414z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="w-full p-2 pt-6 mt-3 border-t border-zinc-200/60 dark:border-zinc-800 mb-20 lg:py-5  sm:px-2 md:px-4 lg:px-6 xl:px-8">
        <div class="max-w-2xl p-2 mx-auto lg:mt-12">
            <x-camelui::card class="p-6" rounded="2xl">
                <!-- Profile -->
                <form wire:submit="profile" class="flex flex-col">
                    <div class="relative flex justify-center w-full">
                        <div class="relative block w-24 h-24 overflow-hidden border-2 rounded-full shadow border-zinc-200 dark:border-zinc-700 focus:outline-none">
                            <x-camelui::avatar />
                        </div>
                    </div>
                    <div class="relative w-full my-4">
                        <x-camelui::input label="{{ trans('app.user.name') }}" placeholder="{{ trans('app.user.name') }}" wire="name" icon="fa-solid fa-user" required="true" />
                    </div>
                    <div class="relative w-full mb-4">
                        <x-camelui::input label="{{ trans('app.user.email') }}" type="email" placeholder="{{ trans('app.user.email') }}" wire="email" icon="fa-solid fa-envelope" required="true" />
                    </div>
                    <div class="relative w-full mb-4">
{{--                        <x-camelui::input label="{{ trans('app.phone') }}" type="tel" placeholder="{{ trans('app.phone') }}" wire="phone" icon="fa-solid fa-phone" required="false" />--}}
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
