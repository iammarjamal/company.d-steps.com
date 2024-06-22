<div class="w-full pt-4 px-6 mt-1  border-t border-zinc-900/5 dark:border-zinc-50/5">


    <div class="flex flex-row justify-between mx-2 mb-5 font-serif leading-5 text-neutral-700">
        <div class="flex flex-row items-center justify-center" x-data="{ popup: false }">
            <x-camelui::button class="py-2" color="primary" icon="fa-solid fa-plus" x-on:click="popup = true"
                               wire:target="create">
                {{ trans('app.dashboard.content.carousel.add.btn') }}
            </x-camelui::button>
            <x-camelui::modal wire="popup">
                <div x-data="{ user: true }" x-on:save.window="popup = false">
                    <!-- create -->
                    <div
                        x-show="user"
                        x-transition:enter="transition-all duration-500"
                        x-transition:enter-start="opacity-0 transform origin-center"
                        x-transition:enter-end="opacity-100 transform origin-center"
                        x-data="{ select: false }"
                    >
                        <!-- Image -->
                        <div class="flex justify-center mb-6" x-show="user">
                            <form wire:submit="save" class="flex flex-col w-full mt-3.5">
                                <div class="relative w-full mb-3">
                                    <label class="text-md text-zinc-900 dark:text-zinc-50">{{ trans('app.content.page') }} <span class="text-red-600 dark:text-red-400">*</span>:</label>
                                    <select wire:model="page" required="true" class="w-full p-2 transition duration-100 ease-in-out border rounded-md shadow-sm rtl:pl-8 ltr:pr-8 placeholder-zinc-400 dark:bg-zinc-700 dark:text-zinc-300 dark:placeholder-zinc-400 border-zinc-200 focus:ring-primary-400 focus:border-primary-400 dark:border-zinc-500 form-input sm:text-sm focus:outline-none">
                                        <option value="home"> الرئيسية</option>
                                        <option value="branches">الفروع</option>
                                        <option value="about">حول الشركة</option>
                                    </select>
                                </div>
                                <div class="relative w-full mb-3">
                                    <x-camelui::input label="{{ trans('app.content.image.title') }}"
                                                      placeholder="{{ trans('app.content.image.title') }}" wire="title"
                                                      icon="" required="true"/>
                                </div>
                                <div class="relative w-full mb-3">
                                    <x-camelui::input label="{{ trans('app.content.image.description') }}"
                                                      placeholder="{{ trans('app.content.image.description') }}" wire="description"
                                                      icon="" required="true"/>
                                </div>
                                <div class="relative w-full mb-3">
                                    <x-camelui::input label="{{ trans('app.content.image.src') }}" type="file"
                                                      placeholder="{{ trans('app.content.image.src') }}" wire="image"
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
                        <!-- User -->

                    </div>
                    <!-- First Step -->


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
                                    <div class="relative w-full mb-3">
                                        <label class="text-md text-zinc-900 dark:text-zinc-50" >{{ trans('app.content.page') }}:</label>
                                        <select  wire:model="page" required="true" class="w-full p-2 transition duration-100 ease-in-out border rounded-md shadow-sm rtl:pl-8 ltr:pr-8 placeholder-zinc-400 dark:bg-zinc-700 dark:text-zinc-300 dark:placeholder-zinc-400 border-zinc-200 focus:ring-primary-400 focus:border-primary-400 dark:border-zinc-500 form-input sm:text-sm focus:outline-none">
                                            <option value="home"> الرئيسية</option>
                                            <option value="branches">الفروع</option>
                                            <option value="about">حول الشركة</option>
                                        </select>
                                    </div>
                                    <x-camelui::input label="{{ trans('app.search') }}" wire="search" type="text"
                                                      placeholder="{{ trans('app.search') }}"
                                                      icon="fa-solid fa-magnifying-glass" required="false"/>

                                    <x-camelui::button class="py-2  mt-3" color="primary" icon="fa-solid fa-magnifying-glass"
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


            <x-camelui::link class="cursor-pointer" x-on:click="list = ! list">
                <i class="text-3xl transition-all bx" :class="list ? 'bx-list-ul': 'bx-grid-alt'"></i>
            </x-camelui::link>
        </div>
    </div>


    <!-- table -->
    <div class="flex items-center justify-start w-full gap-y-0.5" :class="list ? 'flex-col' : 'flex-wrap'">
        @forelse ($images as $image)
            <div
                :class="list ? 'flex flex-col w-full p-1 cursor-pointer' : 'p-1  w-1/2 md:w-1/3 lg:w-1/4'">
                <livewire:pages.admin.pages.content.pages.single-img @filters="$refresh" :$image
                                                                    wire:key="table-{{random_int(1000000, 9999999)}}-{{$image->id}}"/>
            </div>
        @empty
            <div class="flex flex-col items-center justify-center w-full h-screen text-center max-h-80"
                 wire:key="empty">
                @if(!empty($search) AND $count == 0)
                    <x-camelui::heading class="text-zinc-400 dark:text-zinc-600 mb-1.5" size="2xl">
                        <i class="fa-solid fa-user-slash fa-2x"></i>
                    </x-camelui::heading>
                    <x-camelui::heading class="text-zinc-400 dark:text-zinc-600" size="lg">لا يوجد نتائج
                    </x-camelui::heading>
                @else
                    <x-camelui::heading class="text-zinc-400 dark:text-zinc-600 mb-1.5" size="2xl">
                        <i class="fa-solid fa-user-slash fa-2x"></i>
                    </x-camelui::heading>
                    <x-camelui::heading class="text-zinc-400 dark:text-zinc-600" size="lg">لا يوجد صور حالياً
                    </x-camelui::heading>
                @endif
            </div>
        @endforelse
    </div>
    @if($count > $pagination)
        <div class="flex flex-col items-center justify-center w-full pt-8 mt-32 text-center">
            <x-camelui::button class="py-2" color="primary" wire:click="setPagination">
                {{ trans('app.more') }}
            </x-camelui::button>
        </div>
    @endif
    <!-- table -->

</div>
