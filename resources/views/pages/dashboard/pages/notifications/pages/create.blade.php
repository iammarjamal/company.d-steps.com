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
                <label for="user"
                       class="block text-sm font-medium text-gray-700">{{ trans('app.notifications.users') }}</label>
                <select id="user" name="user" wire:model="targetUser"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-lg p-2.5"
                        required>
                    <option selected>اختر مستخدم</option>
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->username}}</option>
                    @endforeach
                </select>
                @error('targetUser')
                <span class="text-xs text-red-400">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-0">
                <label for="title"
                       class="block text-sm font-medium text-gray-700">{{ trans('app.notifications.title') }}</label>
                <input type="text" id="title" name="title" wire:model="title"
                       placeholder="{{ trans('app.notifications.title') }}"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-lg p-2.5">
                @error('title')
                <span class="text-xs text-red-400">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-0">
                <label for="body"
                       class="block text-sm font-medium text-gray-700">{{ trans('app.notifications.body') }}</label>
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
