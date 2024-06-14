<?php

namespace App\Livewire\Pages\Hr\Pages\Index\Pages;

use App\Models\AdvancePayment;
use App\Models\User;
use App\Models\Vacation;
use Livewire\Component;

class Index extends Component
{
    public $userCounts;
    public $totalVacations;
    public $totalRequestedVacations;
    public $totalApprovedVacations;
    public $totalDeletedVacations;

    public $totalAdvancePayments;
    public $totalRequestedAdvancePayments;
    public $totalApprovedAdvancePayments;
    public $totalDeletedAdvancePayments;
 
    public $totalNormalUsers;

    public function mount()
    {
        $this->loadUserStatistics();
    }

    public function loadUserStatistics()
    {
        $this->userCounts = User::excludeRoles(['hr', 'admin'])
            ->selectRaw('COUNT(id) as count, DATE(created_at) as date')
            ->groupBy('date')
            ->pluck('count', 'date')
            ->toArray();

        $this->totalVacations = Vacation::count();
        $this->totalRequestedVacations = Vacation::where('status', 'requested')->count();
        $this->totalApprovedVacations = Vacation::where('status', 'approved')->count();
        $this->totalDeletedVacations = Vacation::onlyTrashed()->count();

        $this->totalAdvancePayments = AdvancePayment::count();
        $this->totalRequestedAdvancePayments  = AdvancePayment::where('status', 'requested')->count();
        $this->totalApprovedAdvancePayments  = AdvancePayment::where('status', 'approved')->count();
        $this->totalDeletedAdvancePayments = AdvancePayment::onlyTrashed()->count();


        $this->totalNormalUsers = User::role('user')->count();


    }

    public function render()
    {
        return view('pages.hr.pages.index.pages.index')
            ->layout('pages.hr.layouts.layout');
    }
}
