<div class="mt-0 pt-4 ">
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
        class="relative overflow-hidden text-center w-full overflow-x-auto rounded-xl border border-slate-300 dark:border-slate-700">
        @if($notifications->isEmpty())
            <x-camelui::heading class="text-zinc-400 dark:text-zinc-600" size="lg">لا يوجد إشعارات مرسلة
            </x-camelui::heading>
        @else
            <table class="w-full text-center text-sm text-slate-700 dark:text-slate-300">
                <thead
                    class="border-b border-slate-300 bg-slate-100 text-sm text-black dark:border-slate-700 dark:bg-slate-800 dark:text-white">
                <tr>
                    <th scope="col" class="p-4">المرسل إليه</th>
                    <th scope="col" class="p-4">العنوان</th>
                    <th scope="col" class="p-4">النص</th>
                    <th scope="col" class="p-4">التاريخ</th>
                    <th scope="col" class="p-4"></th>
                </tr>
                </thead>
                <tbody class="divide-y divide-slate-300 dark:divide-slate-700">
                @foreach($notifications as $notification)
                    <tr>
                        <td class="p-4">{{ $notification->receiver->username }}</td>
                        <td class="p-4">{{ $notification->title }}</td>
                        <td class="p-4">{{ $notification->content }}</td>
                        <td class="p-4">{{ $notification->created_at->format('Y-m-d H:i') }}</td>
                        <td class="p-4">
                            <x-camelui::link href="#" wire:click="confirmDelete({{ $notification->id }})">
                                <i class="text-xl fa-solid fa-trash text-danger-500 dark:text-danger-400"></i>
                            </x-camelui::link>
                            <!-- Confirm Delete Modal -->
                            @if($confirmingDelete)
                                <div
                                    class="fixed inset-0 z-50 flex items-center justify-center w-full h-full cursor-pointer bg-opacity-50 bg-zinc-900"
                                    x-transition:enter="transition transition-opacity transform ease-in duration-300"
                                    x-transition:enter-start="opacity-0"
                                    x-transition:enter-end="opacity-100"
                                    x-transition:leave="transition transition-opacity transform ease-in duration-500"
                                    x-transition:leave-start="opacity-100"
                                    x-transition:leave-end="opacity-0"
                                    x-data="{ showModal: @entangle('confirmingDelete') }"
                                    x-show="showModal"
                                    x-cloak
                                    @keydown.escape.window="showModal = false"
                                >
                                    <div class="absolute inset-0 bg-black opacity-50"></div>

                                    <div
                                        class="relative p-8 bg-white w-full max-w-md m-auto rounded-xl shadow-lg animate__animated animate__fadeInUp animate__faster"
                                        @click.away="showModal = false">
                                        <!-- Modal Content Goes Here -->
                                        <x-camelui::heading size="md">
                                            هل تريد حذف الإشعار ؟، هذا الإجراء لا يمكن التراجع عنه
                                        </x-camelui::heading>
                                        <div class="flex flex-col justify-between w-full mt-3">
                                            <x-camelui::button style="danger" class="py-2" icon="fa-solid fa-trash"
                                                               wire:click="deleteNotification({{ $notification->id }})">
                                                حذف
                                            </x-camelui::button>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </td>

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
