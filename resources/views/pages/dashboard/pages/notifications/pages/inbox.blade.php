<div class="mt-6 pt-10 border-t border-zinc-900/5 dark:border-zinc-50/5">
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
                    <th scope="col" class="p-4">المرسل</th>
                    <th scope="col" class="p-4">العنوان</th>
                    <th scope="col" class="p-4">النص</th>
                    <th scope="col" class="p-4">التاريخ</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-slate-300 dark:divide-slate-700">
                @foreach($notifications as $notification)
                    <tr>
                        <td class="p-4">{{ $notification->sender->username }}</td>
                        <td class="p-4">{{ $notification->title }}</td>
                        <td class="p-4">{{ $notification->content }}</td>
                        <td class="p-4">{{ $notification->created_at->format('Y-m-d H:i') }}</td>
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
