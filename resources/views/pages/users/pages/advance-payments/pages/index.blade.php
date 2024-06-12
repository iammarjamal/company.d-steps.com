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

{{--        <div class="flex flex-row items-center justify-center gap-2">--}}
{{--            <input--}}
{{--                type="text"--}}
{{--                placeholder="اكتب كلمة للبحث"--}}
{{--                wire:model="search"--}}
{{--                class="flex-1 p-1 py-2 border"--}}
{{--            >--}}

{{--            <button wire:click="filters"--}}
{{--                    class="flex flex-row items-center justify-center gap-2 px-4 py-2 bg-blue-500 text-white h-full rounded hover:bg-blue-600 focus:outline-none">--}}
{{--                {{ trans('app.search') }}--}}
{{--                <i class="fa-solid fa-magnifying-glass"></i>--}}
{{--            </button>--}}


{{--            <button wire:click="resetFilters"--}}
{{--                    class="flex flex-row items-center justify-center gap-2 px-4 py-2 bg-green-500 text-white h-full rounded hover:bg-green-600 focus:outline-none">--}}
{{--                تهيئة--}}
{{--                <svg class="fill-white" xmlns="http://www.w3.org/2000/svg" height="16" width="16"--}}
{{--                     viewBox="0 0 512 512">--}}
{{--                    <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->--}}
{{--                    <path--}}
{{--                        d="M0 416c0 17.7 14.3 32 32 32l54.7 0c12.3 28.3 40.5 48 73.3 48s61-19.7 73.3-48L480 448c17.7 0 32-14.3 32-32s-14.3-32-32-32l-246.7 0c-12.3-28.3-40.5-48-73.3-48s-61 19.7-73.3 48L32 384c-17.7 0-32 14.3-32 32zm128 0a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zM320 256a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm32-80c-32.8 0-61 19.7-73.3 48L32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l246.7 0c12.3 28.3 40.5 48 73.3 48s61-19.7 73.3-48l54.7 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-54.7 0c-12.3-28.3-40.5-48-73.3-48zM192 128a32 32 0 1 1 0-64 32 32 0 1 1 0 64zm73.3-64C253 35.7 224.8 16 192 16s-61 19.7-73.3 48L32 64C14.3 64 0 78.3 0 96s14.3 32 32 32l86.7 0c12.3 28.3 40.5 48 73.3 48s61-19.7 73.3-48L480 128c17.7 0 32-14.3 32-32s-14.3-32-32-32L265.3 64z"/>--}}
{{--                </svg>--}}
{{--            </button>--}}
{{--        </div>--}}

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
                                    <div class="relative w-full my-1">
                                        <label for="status">الحالة:</label>
                                        <select id="status" wire:model="status" class="w-full p-1 py-2 border">
                                            <option value="all">{{__('app.all')}}</option>
                                            <option value="requested">{{__('app.requested')}}</option>
                                            <option value="approved">{{__('app.approved')}}</option>
                                        </select>
                                    </div>
                                    <div class="relative w-full my-1">
                                        <x-camelui::input label="{{ trans('app.created_at') }}" type="date"
                                                          placeholder="{{ trans('app.created_at') }}"
                                                          wire="created_at"
                                                          icon="" required="false"/>
                                    </div>
                                    <div class="relative w-full my-1">
                                        <x-camelui::input label="{{ trans('app.approved_at') }}" type="date"
                                                          placeholder="{{ trans('app.approved_at') }}"
                                                          wire="approved_at"
                                                          icon="" required="false"/>
                                    </div>
                                    <div class="relative w-full my-1">
                                        <x-camelui::input label="{{ trans('app.search') }}" type="text"
                                                          placeholder="اكتب كلمة للبحث"
                                                          wire="search"
                                                          icon="" required="false"/>
                                    </div>
                                    <x-camelui::button class="py-2 mt-3" color="primary"
                                                       icon="fa-solid fa-magnifying-glass"
                                                       type="submit" wire:target="filters">
                                        {{ trans('app.search') }}
                                    </x-camelui::button>
                                    <x-camelui::button class="py-2 mt-3" color="success"
                                                       icon="fa-solid fa-sliders"
                                                       type="button" wire:click="resetFilters" wire:target="resetFilters">
                                        {{ trans('app.reset') }}
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
                                class=" rounded-full p-3 {{ $advancePayment->status === 'requested' ? 'border border-yellow-400' : 'bg-green-500 text-white'}}">{{ $advancePayment->status }}</span>
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
