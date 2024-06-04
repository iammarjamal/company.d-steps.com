<div class="w-full pt-4 px-6 mt-1  border-t border-zinc-900/5 dark:border-zinc-50/5">

    <div class="flex flex-row justify-between mx-2 mb-5 font-serif leading-5 text-neutral-700">
        <div class="flex flex-row items-center justify-center" x-data="{ popup: false }">
            <x-camelui::button class="py-2" color="primary" icon="fa-solid fa-plus" x-on:click="popup = true"
                               wire:target="create">
                {{ trans('app.dashboard.advance-payment.add.btn') }}
            </x-camelui::button>
            <x-camelui::modal wire="popup">
                <div x-data="{ user: true }" x-on:save.window="popup = false">
                    <div
                        x-show="user"
                        x-transition:enter="transition-all duration-500"
                        x-transition:enter-start="opacity-0 transform origin-center"
                        x-transition:enter-end="opacity-100 transform origin-center"
                        x-data="{ select: false }"
                    >


                        <div class="flex justify-center mb-6" x-show="user">
                            <form wire:submit="save" class="flex flex-col w-full mt-3.5">
                                <div class="relative w-full mb-3">
                                    <x-camelui::input label="{{ trans('app.title') }}"
                                                      placeholder="{{ trans('app.title') }}" wire="title"
                                                      icon="" required="true"/>
                                </div>
                                <div class="relative w-full mb-3">
                                    <x-camelui::input label="{{ trans('app.advance-payment-value') }}" type="number"
                                                      placeholder="{{ trans('app.advance-payment-value') }}" wire="amount"
                                                      icon="" required="true"/>
                                </div>
                                <div class="w-full mt-4">
                                    <x-camelui::button class="py-3.5" color="primary" icon="fa-solid fa-plus"
                                                       wire:target="save">
                                        {{ trans('app.save') }}
                                    </x-camelui::button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </x-camelui::modal>
        </div>

        <div class="flex flex-row items-center justify-center gap-4">
            <div class="longpress" x-data="{ sidebar: false }" x-on:filters.window="sidebar = false">
                <x-camelui::link
                    class="cursor-pointer"
                    x-on:click="sidebar = ! sidebar"
                    x-data="{ pressTimer: null }"
                    x-on:mousedown="pressTimer = setTimeout(() => { $wire.set('search', '') }, 500)"
                    x-on:mouseup="clearTimeout(pressTimer)"
                    x-on:mouseleave="clearTimeout(pressTimer)"
                    x-on:touchstart="pressTimer = setTimeout(() => { $wire.set('search', '') }, 500)"
                    x-on:touchend="clearTimeout(pressTimer)"
                >
                    <i class="text-3xl transition-all bx @if(!empty($search) AND $count == 0) bxs-filter-alt @else bx-filter-alt @endif"></i>
                </x-camelui::link>

                <template x-teleport="body">
                    <div
                        class="fixed inset-0 z-50 flex items-center justify-center w-full h-full cursor-pointer bg-opacity-90 bg-zinc-900"
                        x-show="sidebar"
                        x-transition:enter="transition-opacity transform ease-in duration-300"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="transition-opacity transform ease-in duration-500"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                    >
                        <div
                            class="fixed inset-y-0 z-50 flex flex-col w-64 h-full px-4 py-5 font-serif text-sm leading-5 opacity-100 cursor-auto ltr:right-0 rtl:left-0 bg-zinc-100 dark:bg-zinc-800 border-zinc-300 dark:border-zinc-600 text-zinc-800"
                            x-show="sidebar"
                            x-transition:enter="transition-transform duration-300 opacity-100"
                            x-transition:enter-start="rtl:-translate-x-full ltr:translate-x-full opacity-100"
                            x-transition:enter-end="rtl:-translate-x-0 ltr:translate-x-0 opacity-100"
                            x-transition:leave="transition-transform duration-300 opacity-100"
                            x-transition:leave-start="rtl:-translate-x-0 ltr:translate-x-0 opacity-100"
                            x-transition:leave-end="rtl:-translate-x-full ltr:translate-x-full opacity-100"
                            @click.outside="sidebar = false"
                        >
                            <div class="relative flex flex-row w-full">
                                <form wire:submit="filters" class="flex flex-col w-full gap-y-3">
                                    <x-camelui::input label="{{ trans('app.search') }}" wire="search" type="text"
                                                      placeholder="{{ trans('app.search') }}"
                                                      icon="fa-solid fa-magnifying-glass" required="false"/>

                                    <x-camelui::button class="py-2" color="primary" icon="fa-solid fa-magnifying-glass"
                                                       type="submit" wire:target="filters">
                                        {{ trans('app.search') }}
                                    </x-camelui::button>
                                </form>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </div>


    <div
        class="relative overflow-hidden text-center w-full overflow-x-auto rounded-xl border border-slate-300 dark:border-slate-700">
        @if($advancePayments->isEmpty())
            <x-camelui::heading class="text-zinc-400 dark:text-zinc-600" size="lg">لا يوجد طلبات سلفة
            </x-camelui::heading>
        @else
            <table class="w-full text-center text-sm text-slate-700 dark:text-slate-300">
                <thead
                    class="border-b border-slate-300 bg-slate-100 text-sm text-black dark:border-slate-700 dark:bg-slate-800 dark:text-white">
                <tr>
                    <th scope="col" class="p-4">العنوان</th>
                    <th scope="col" class="p-4">المبلغ</th>
                    <th scope="col" class="p-4">الحالة</th>
                    <th scope="col" class="p-4"> عمليات</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-slate-300 dark:divide-slate-700">
                @foreach($advancePayments as $advancePayment)
                    <tr>
                        <td class="p-4">{{ $advancePayment->title }}</td>
                        <td class="p-4">{{ $advancePayment->amount }}</td>
                        <td class="p-4"><span
                                class=" rounded-full p-3 {{ $advancePayment->status === 'requested' ? 'border border-yellow-400' : 'bg-green-400'}}">{{ $advancePayment->status }}</span>
                        </td>
                        <td x-data="{ update: false , remove: false  }"
                            class="p-4 flex items-center justify-center flex-row gap-2">

                            <!-- Delete modal -->
                            @if($advancePayment->status === 'requested')
                                <x-camelui::link
                                    x-on:click="remove = ! remove">
                                    <i class="text-xl cursor-pointer fa-solid fa-trash text-danger-500 dark:text-danger-400"></i>
                                </x-camelui::link>
                                <x-camelui::modal wire="remove">
                                    <x-camelui::heading size="md">
                                        هل تريد حذف طلب السلفة ؟، هذا الإجراء لا يمكن التراجع عنه
                                    </x-camelui::heading>
                                    <div class="flex flex-col justify-between w-full mt-3">
                                        <form wire:submit="deleteAdvancePayment({{ $advancePayment->id }})">
                                            <x-camelui::button style="danger" class="py-2" icon="fa-solid fa-trash"
                                                               wire:target="deleteAdvancePayment"
                                                               x-on:click="setTimeout(() => { remove = false; }, 950)">
                                                حذف
                                            </x-camelui::button>
                                        </form>
                                    </div>
                                </x-camelui::modal>
                                <!-- Delete modal -->

                                <!-- Update modal -->
                                <x-camelui::link x-on:click="update = ! update;$wire.setToUpdate({{$advancePayment->id}})">
                                    <i class="text-xl cursor-pointer fa-solid fa-edit text-teal-700 dark:text-teal-400"></i>
                                </x-camelui::link>
                                <x-camelui::modal wire="update">
                                    <div x-data="{ vacation: true }" x-on:update.window="update = false">
                                        <div
                                            x-show="vacation"
                                            x-transition:enter="transition-all duration-500"
                                            x-transition:enter-start="opacity-0 transform origin-center"
                                            x-transition:enter-end="opacity-100 transform origin-center"
                                        >


                                            <div class="flex justify-center mb-6" x-show="vacation">
                                                <form wire:submit="update({{$advancePayment->id}})"
                                                      class="flex flex-col w-full mt-3.5">
                                                    <div class="relative w-full mb-3">
                                                        <x-camelui::input label="{{ trans('app.title') }}"
                                                                          placeholder=""
                                                                          wire="title"
                                                                          icon="" required="true"/>
                                                    </div>
                                                    <div class="relative w-full mb-3">
                                                        <x-camelui::input label="{{ trans('app.advance-payment-value') }}" type="number"
                                                                          placeholder="" wire="amount"
                                                                          icon="" required="true"/>
                                                    </div>
                                                    <div class="w-full mt-4">
                                                        <x-camelui::button class="py-3.5" color="primary"
                                                                           icon="fa-solid fa-plus"
                                                                           wire:target="update">
                                                            {{ trans('app.save') }}
                                                        </x-camelui::button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </x-camelui::modal>
                                <!-- Update modal -->
                            @endif
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $advancePayments->links() }}
            </div>
        @endif
    </div>
</div>