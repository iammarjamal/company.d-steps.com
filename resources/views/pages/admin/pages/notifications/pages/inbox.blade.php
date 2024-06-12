<div class="mt-0 pt-4">
    <div class="p-4 flex flex-row items-center justify-start gap-4 w-1/2">
        <input
            type="text"
            placeholder="اكتب كلمة للبحث"
            wire:model="search"
            class="flex-1 p-1 py-2 border"
        >

        <button wire:click="filters"
                class="flex flex-row items-center justify-center gap-2 px-4 py-2 bg-blue-500 text-white h-full rounded hover:bg-blue-600 focus:outline-none">
            {{ trans('app.search') }}
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>

        <button wire:click="resetFilters"
                class="flex flex-row items-center justify-center gap-2 px-4 py-2 bg-green-500 text-white h-full rounded hover:bg-green-600 focus:outline-none">
            تهيئة
            <svg class="fill-white" xmlns="http://www.w3.org/2000/svg" height="16" width="16"
                 viewBox="0 0 512 512">
                <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path
                    d="M0 416c0 17.7 14.3 32 32 32l54.7 0c12.3 28.3 40.5 48 73.3 48s61-19.7 73.3-48L480 448c17.7 0 32-14.3 32-32s-14.3-32-32-32l-246.7 0c-12.3-28.3-40.5-48-73.3-48s-61 19.7-73.3 48L32 384c-17.7 0-32 14.3-32 32zm128 0a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zM320 256a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm32-80c-32.8 0-61 19.7-73.3 48L32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l246.7 0c12.3 28.3 40.5 48 73.3 48s61-19.7 73.3-48l54.7 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-54.7 0c-12.3-28.3-40.5-48-73.3-48zM192 128a32 32 0 1 1 0-64 32 32 0 1 1 0 64zm73.3-64C253 35.7 224.8 16 192 16s-61 19.7-73.3 48L32 64C14.3 64 0 78.3 0 96s14.3 32 32 32l86.7 0c12.3 28.3 40.5 48 73.3 48s61-19.7 73.3-48L480 128c17.7 0 32-14.3 32-32s-14.3-32-32-32L265.3 64z"/>
            </svg>
        </button>
    </div>
    <div
        class="overflow-hidden text-center w-full overflow-x-auto rounded-xl border border-slate-300 dark:border-slate-700">
        @if($notifications->isEmpty())
            <x-camelui::heading class="text-zinc-400 dark:text-zinc-600" size="lg">لا يوجد إشعارات واردة
            </x-camelui::heading>
        @else
            <table class="w-full text-center text-sm text-slate-700 dark:text-slate-300">
                <thead
                    class="border-b border-slate-300 bg-slate-100 text-sm text-black dark:border-slate-700 dark:bg-slate-800 dark:text-white">
                <tr>
                    <th scope="col" class="p-4"><x-camelui::paragraph>المرسل</x-camelui::paragraph></th>
                    <th scope="col" class="p-4"><x-camelui::paragraph>العنوان</x-camelui::paragraph></th>
                    <th scope="col" class="p-4"><x-camelui::paragraph>النص</x-camelui::paragraph></th>
                    <th scope="col" class="p-4"><x-camelui::paragraph>التاريخ</x-camelui::paragraph></th>
                </tr>
                </thead>
                <tbody class="divide-y divide-slate-300 dark:divide-slate-700">
                @foreach($notifications as $notification)
                    <tr>
                        <td class="p-4"> <x-camelui::paragraph>{{ $notification->sender->username }}</x-camelui::paragraph> </td>
                        <td class="p-4"><x-camelui::paragraph>{{ $notification->title }}</x-camelui::paragraph></td>
                        <td class="p-4"><x-camelui::paragraph>{{ $notification->content }}</x-camelui::paragraph></td>
                        <td class="p-4"><x-camelui::paragraph>{{ $notification->created_at->format('Y-m-d H:i') }}</x-camelui::paragraph></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $notifications->links() }}
            </div>
        @endif
    </div>
</div>
