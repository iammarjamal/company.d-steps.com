<div>
    @if(session('success'))
        <div
            class="fixed inset-0 z-50 flex items-end justify-center px-4 py-6 pointer-events-none sm:p-6 sm:items-start sm:justify-end"
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

    <form wire:submit.prevent="send">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2">
            <div class="mt-0">
                <label for="users"
                       class="block text-sm font-medium text-gray-700">
                    <x-camelui::paragraph>{{ trans('app.notifications.type') }}</x-camelui::paragraph>
                </label>
                <select wire:model.live="typeOfNotification"  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-xl p-2.5 text-zinc-500 dark:text-zinc-400">
                    <option value="general">{{ trans('app.notifications.general') }}</option>
                    <option value="private">{{ trans('app.notifications.private') }}</option>
                </select>
            </div>
            @if($typeOfNotification == 'private')
                <div class="mt-0">
                    <label for="users"
                           class="block text-sm font-medium text-gray-700">
                        <x-camelui::paragraph>{{ trans('app.notifications.users') }}</x-camelui::paragraph>
                    </label>
                    <div class="relative" id="users" x-data="{ open: false , searching : false }"
                         x-on:select-contact.window="open = true; searching = false">
                        <input
                            x-on:focus="open = true"
                            @click.outside="open = false"
                            {{--                        @keydown.enter="$wire.selectContact(),open = true"--}}
                            type="text"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-xl p-2.5 text-zinc-500 dark:text-zinc-400"
                            placeholder="اختر مستخدم"
                            wire:model="query"
                            {{--                        wire:keyup.debounce.100ms="selectContact; searching = true"--}}
                            wire:keydown.enter.prevent="selectContact; open = false; searching = true"
                            wire:keyup.enter.stop.prevent=""
                        />

                        <div x-show="searching" class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group">
                            <div class="p-8 font-bold bg-gray-50">
                                <x-camelui::paragraph>جاري البحث...</x-camelui::paragraph>
                            </div>
                        </div>

                        {{--                    @if(!empty($query))--}}
                        <div x-show="open"
                             class="absolute mt-1 z-10 max-h-72 overflow-y-scroll w-full bg-white rounded-t-none shadow-lg">
                            @forelse($users as  $user)
                                <a
                                    wire:click.prevent="createTag({{$user->id}}); searching = false"
                                    class="block cursor-pointer py-6 px-8 font-bold hover:bg-gray-100 "
                                >
                                    <x-camelui::paragraph>{{ $user->username }}</x-camelui::paragraph>
                                </a>
                            @empty

                                <div class="block p-8 font-bold bg-gray-50">
                                    <x-camelui::paragraph>لا يوجد نتائج!</x-camelui::paragraph>
                                </div>
                            @endforelse
                        </div>
                        {{--                    @endif--}}

                        <div class="flex flex-wrap gap-2 p-4">
                            @foreach($targetUsers as $user)
                                <span
                                    class="inline-flex  gap-2 items-center text-sm p-2 rounded-full bg-yellow-200 text-gray-600 ">{{$user->username}}
                            <button type="button" role="button" wire:click="removeTag({{$user->id}})"
                                    class="font-light">x</button>
                            </span>
                            @endforeach
                            @error('targetUsers')
                            <span class="text-xs text-red-400">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                </div>
            @endif

            {{--            <div class="mt-0">--}}
            {{--                <label for="user"--}}
            {{--                       class="block text-sm font-medium text-gray-700">{{ trans('app.notifications.users') }}</label>--}}
            {{--                <select id="user" name="user" wire:model="targetUser"--}}
            {{--                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-lg p-2.5"--}}
            {{--                        required>--}}
            {{--                    <option selected>اختر مستخدم</option>--}}
            {{--                    @foreach($users as $user)--}}
            {{--                        <option value="{{$user->id}}">{{$user->username}}</option>--}}
            {{--                    @endforeach--}}
            {{--                </select>--}}
            {{--                @error('targetUser')--}}
            {{--                <span class="text-xs text-red-400">{{ $message }}</span>--}}
            {{--                @enderror--}}
            {{--            </div>--}}
            <div class="mt-0">
                <label for="title"
                       class="block text-sm font-medium text-gray-700">
                    <x-camelui::paragraph>{{ trans('app.notifications.title') }}</x-camelui::paragraph>
                </label>
                <input type="text" id="title" name="title" wire:model="title"
                       placeholder="{{ trans('app.notifications.title') }}"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-lg p-2.5">
                @error('title')
                <span class="text-xs text-red-400">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-0">
                <label for="body"
                       class="block text-sm font-medium text-gray-700">
                    <x-camelui::paragraph>{{ trans('app.notifications.body') }}</x-camelui::paragraph>
                </label>
                <textarea id="content" name="content" wire:model="content"
                          placeholder="{{ trans('app.notifications.body') }}"
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-lg p-2.5"></textarea>
                @error('content')
                <span class="text-xs text-red-400">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="w-full mt-4">
            <button type="submit"
                    class="py-3.5 px-6 w-full bg-indigo-600 text-white font-semibold rounded-md shadow hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                <i class="fa-solid fa-paper-plane mx-2"></i>{{ trans('app.send') }}
            </button>
        </div>
    </form>
</div>
