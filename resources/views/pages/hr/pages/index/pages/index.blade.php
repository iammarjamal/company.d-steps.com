<div>
    <div class="w-full pt-4 px-6 mt-1  border-t border-zinc-900/5 dark:border-zinc-50/5">


        <div class="flex flex-wrap w-full gap-y-2">
            <div class="p-1 sm:w-full md:w-1/2 lg:w-1/3 xl:w-1/4">
                <x-camelui::card class="p-6" rounded="2xl">
                    <div class="flex items-center justify-between">
                        <div>
                            <x-camelui::heading>
                                طلبات السلفة
                            </x-camelui::heading>
                            <p class="text-2xl font-medium text-gray-900 dark:text-white">{{$totalAdvancePayments}}</p>
                        </div>

                        <span class="p-3 rounded-full text-primary-600 bg-primary-100 dark:bg-primary-500/20 dark:text-primary-400">
                            <i class="text-2xl fa-solid fa-money-bill-1-wave"></i>
                        </span>
                    </div>

                    {{--                    <div class="flex gap-1 mt-1 text-green-600">--}}
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
                    {{--                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />--}}
                    {{--                        </svg>--}}

                    {{--                        <p class="flex gap-2 text-xs">--}}
                    {{--                            <span class="font-medium"> 67.81% </span>--}}

                    {{--                            <span class="text-gray-500 dark:text-gray-400"> Since last week </span>--}}
                    {{--                        </p>--}}
                    {{--                    </div>--}}
                </x-camelui::card>
            </div>

            <div class="p-1 sm:w-full md:w-1/2 lg:w-1/3 xl:w-1/4">
                <x-camelui::card class="p-6" rounded="2xl">
                    <div class="flex items-center justify-between">
                        <div>
                            <x-camelui::heading>
                                طلبات الإجازات
                            </x-camelui::heading>

                            <p class="text-2xl font-medium text-gray-900 dark:text-white">{{$totalVacations}}</p>
                        </div>

                        <span class="p-3 rounded-full text-primary-600 bg-primary-100 dark:bg-primary-500/20 dark:text-primary-400">
                            <i class="text-2xl fa-regular fa-calendar"></i>
                        </span>
                    </div>
                </x-camelui::card>
            </div>

            <div class="p-1 sm:w-full md:w-1/2 lg:w-1/3 xl:w-1/4">
                <x-camelui::card class="p-6" rounded="2xl">
                    <div class="flex items-center justify-between">
                        <div>
                            <x-camelui::heading>
                                الموظفين
                            </x-camelui::heading>

                            <p class="text-2xl font-medium text-gray-900 dark:text-white">{{$totalNormalUsers}}</p>
                        </div>

                        <span class="p-3 rounded-full bg-primary-100 text-primary-600 dark:bg-primary-500/20 dark:text-primary-400">
                            <i class="text-2xl fa-solid fa-users"></i>
                        </span>
                    </div>
                </x-camelui::card>
            </div>
        </div>

    </div>



    <div class="mt-20  grid grid-cols-1 lg:grid-cols-2 gap-20" wire:ignore>
        <div class="lg:col-span-2">
            <canvas id="userChart"></canvas>
        </div>
        <div>
            <canvas id="vacationChart"></canvas>
        </div>
        <div>
            <canvas id="advancePaymentChart"></canvas>
        </div>
    </div>



    @push('js')
        <script>
            var ctx = document.getElementById('userChart').getContext('2d');
            var userChart = new Chart(ctx, {
                type: 'line', // or 'bar', 'pie', etc.
                data: {
                    labels: @json(array_keys($userCounts)),
                    datasets: [{
                        label: 'عدد الموظفين المسجلين',
                        data: @json(array_values($userCounts)),
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            var ctx2 = document.getElementById('vacationChart').getContext('2d');
            var vacationChart = new Chart(ctx2, {
                type: 'doughnut', // or 'bar', 'pie', etc.
                data: {
                    labels: ['عدد طلبات الإجازة الكلي', 'طلبات حالية', 'موافق عليه', 'محذوف'],
                    datasets: [{
                        label: 'حالة طلبات الإجازة',
                        data: [
                            {{ $totalVacations }},
                            {{ $totalRequestedVacations }},
                            {{ $totalApprovedVacations }},
                            {{ $totalDeletedVacations }}
                        ],
                        backgroundColor: [
                            'rgba(28,180,180,0.7)', // Total Vacations
                            'rgba(224,170,38, 0.7)', // Requested Vacations
                            'rgba(31,185,45,0.7)', // Approved Vacations
                            'rgba(217,71,103,0.7)'  // Deleted Vacations
                        ],
                        borderColor: [
                            'rgb(28,180,180)', // Total Vacations
                            'rgb(224,170,38)', // Requested Vacations
                            'rgb(31,185,45)', // Approved Vacations
                            'rgb(217,71,103)'  // Deleted Vacations
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            var ctx3 = document.getElementById('advancePaymentChart').getContext('2d');
            var advancePaymentChart = new Chart(ctx3, {
                type: 'pie', // or 'bar', 'pie', etc.
                data: {
                    labels: ['عدد طلبات السلفة الكلي', 'طلبات حالية', 'موافق عليه', 'محذوف'],
                    datasets: [{
                        label: 'حالة طلبات السلفة',
                        data: [
                            {{ $totalAdvancePayments }},
                            {{ $totalRequestedAdvancePayments }},
                            {{ $totalApprovedAdvancePayments }},
                            {{ $totalDeletedAdvancePayments }}
                        ],
                        backgroundColor: [
                            'rgba(153, 102, 255, 0.2)', // Total Advance Payments
                            'rgba(255, 159, 64, 0.2)',  // Requested Advance Payments
                            'rgba(75, 192, 192, 0.2)',  // Approved Advance Payments
                            'rgba(255, 99, 132, 0.2)'   // Deleted Advance Payments
                        ],
                        borderColor: [
                            'rgba(153, 102, 255, 1)', // Total Advance Payments
                            'rgba(255, 159, 64, 1)',  // Requested Advance Payments
                            'rgba(75, 192, 192, 1)',  // Approved Advance Payments
                            'rgba(255, 99, 132, 1)'   // Deleted Advance Payments
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });



        </script>
    @endpush
</div>
