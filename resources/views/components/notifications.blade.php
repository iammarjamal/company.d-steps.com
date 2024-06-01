<div x-data="{ popup: false }" wire:poll.120000ms>

    <!-- Button -->
    <span class="relative inline-flex">
        <button x-on:click="popup = ! popup" class="flex items-center justify-center w-10 h-10 p-1 text-center text-gray-100 border rounded-lg shadow-sm border-zinc-200 dark:border-zinc-700 hover:!bg-zinc-100 hover:dark:!bg-zinc-800 focus:outline-none">
            <i class="w-8 h-8 text-2xl fa-solid fa-bell text-zinc-900 dark:text-zinc-100"></i>
        </button>
        @if($notifications->where('status', 'unread')->count() > 0)
            <span class="absolute top-0 right-0 flex w-3 h-3 -mt-1 -mr-1">
                <span class="absolute inline-flex w-full h-full bg-indigo-400 rounded-full opacity-75 animate-ping"></span>
                <span class="relative inline-flex w-3 h-3 bg-indigo-500 rounded-full"></span>
            </span>
        @endif
    </span>
    <!-- Button -->

    <div @click.outside="popup = false" x-show="popup" x-transition class="absolute p-2 rtl:left-[-6vh] ltr:right-[-6vh] mt-4 w-64 xl:w-72 border border-zinc-200 dark:border-zinc-600 shadow-lg shadow-zinc-600/5 dark:shadow-zinc-400/5 bg-zinc-50 dark:bg-zinc-900 rounded-lg overflow-hidden z-10" x-cloak>
        <div class="h-48 p-2 overflow-auto">
            @forelse ($notifications as $notification)
                <a wire:click="read({{$notification->id}})" class="flex cursor-pointer items-center px-4 py-3 text-zinc-900 dark:text-zinc-50 hover:text-white hover:bg-indigo-600 hover:dark:bg-indigo-600 rounded-md -mx-2 mt-1 @if($notification->status == 'unread') bg-zinc-900/5 dark:bg-zinc-50/5 @endif">
                    <p class="-mx-2 text-sm">
                        <span class="text-xs font-bold" href="#">{{ $notification->title }}</span>
                        <br />
                        <span class="text-[10px]" href="#">{!! $notification->content !!}</span>
                    </p>
                </a>
            @empty
            <div class="flex items-center justify-center h-full text-center">
                <x-camelui::heading size="xs">لا يوجد إشعارات حالياً</x-camelui::heading>
            </div>
            @endforelse
        </div>

        <div class="mt-3 mb-3 border-t border-slate-900/5 dark:border-slate-50/5"></div>

        <div class="my-1 mt-4">
            <form wire:submit="read(0)">
                <x-camelui::button class="!p-0" color="none" wire="read(0)">
                    {{ trans('app.dashboard.navbar.general.notifications.btn') }}
                </x-camelui::button>
            </form>
        </div>
    </div>
</div>
