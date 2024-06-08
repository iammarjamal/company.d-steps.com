<div>
    <div class="w-full pt-4 px-6 mt-1 border-t border-zinc-900/5 dark:border-zinc-50/5">
        <div x-data="{ selectedTab: 'create' }" class="w-full">
            <div @keydown.right.prevent="$focus.wrap().next()" @keydown.left.prevent="$focus.wrap().previous()" class="flex gap-2 overflow-x-auto border-b border-slate-300 dark:border-slate-700" role="tablist" aria-label="tab options">
                <button @click="selectedTab = 'create'" :aria-selected="selectedTab === 'create'" :tabindex="selectedTab === 'create' ? '0' : '-1'" :class="selectedTab === 'create' ? 'font-bold text-blue-700 border-b-2 border-blue-700 dark:border-blue-600 dark:text-blue-600' : 'text-slate-700 font-medium dark:text-slate-300 dark:hover:border-b-slate-300 dark:hover:text-white hover:border-b-2 hover:border-b-slate-800 hover:text-black'" class="h-min px-4 py-2 text-sm" type="button" role="tab" aria-controls="create" >{{__('app.notifications.new')}}</button>
                <button @click="selectedTab = 'sent'" :aria-selected="selectedTab === 'sent'" :tabindex="selectedTab === 'sent' ? '0' : '-1'" :class="selectedTab === 'sent' ? 'font-bold text-blue-700 border-b-2 border-blue-700 dark:border-blue-600 dark:text-blue-600' : 'text-slate-700 font-medium dark:text-slate-300 dark:hover:border-b-slate-300 dark:hover:text-white hover:border-b-2 hover:border-b-slate-800 hover:text-black'" class="h-min px-4 py-2 text-sm" type="button" role="tab" aria-controls="sent" >{{__('app.notifications.sent')}}</button>
                <button @click="selectedTab = 'inbox'" :aria-selected="selectedTab === 'inbox'" :tabindex="selectedTab === 'inbox' ? '0' : '-1'" :class="selectedTab === 'inbox' ? 'font-bold text-blue-700 border-b-2 border-blue-700 dark:border-blue-600 dark:text-blue-600' : 'text-slate-700 font-medium dark:text-slate-300 dark:hover:border-b-slate-300 dark:hover:text-white hover:border-b-2 hover:border-b-slate-800 hover:text-black'" class="h-min px-4 py-2 text-sm" type="button" role="tab" aria-controls="inbox" >{{__('app.notifications.inbox')}}</button>
             </div>
            <div class="px-2 py-4 text-slate-700 dark:text-slate-300">
                <div x-show="selectedTab === 'create'" id="create" role="tabpanel" aria-label="create">  <div><livewire:pages.admin.pages.notifications.pages.create/></div> </div>
                <div x-show="selectedTab === 'sent'" id="sent" role="tabpanel" aria-label="sent"> <div><livewire:pages.admin.pages.notifications.pages.sent/></div> </div>
                <div x-show="selectedTab === 'inbox'" id="inbox" role="tabpanel" aria-label="inbox"> <div><livewire:pages.admin.pages.notifications.pages.inbox/></div> </div>
            </div>
        </div>



    </div>
</div>
