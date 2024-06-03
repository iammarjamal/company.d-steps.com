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
            {{ trans('app.reset') }}
            <i class="fa-solid fa-sliders"></i>
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
