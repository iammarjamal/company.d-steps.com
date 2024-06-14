<?php

namespace App\Livewire\Pages\Users\Pages\Index\Pages;

use App\Models\AdvancePayment;
use App\Models\Vacation;
use Livewire\Component;

class Index extends Component
{
    public $totalVacations;
    public $totalRequestedVacations;
    public $totalApprovedVacations;
    public $totalDeletedVacations;

    public $totalAdvancePayments;
    public $totalRequestedAdvancePayments;
    public $totalApprovedAdvancePayments;
    public $totalDeletedAdvancePayments;

    public function mount()
    {
        $this->loadUserStatistics();
    }

    public function loadUserStatistics()
    {
        // Vacation statistics
        $this->totalVacations =  Vacation::where('user_id', auth()->user()->id)->count();
        $this->totalRequestedVacations = Vacation::where('user_id', auth()->user()->id)->where('status', 'requested')->count();
        $this->totalApprovedVacations = Vacation::where('user_id', auth()->user()->id)->where('status', 'approved')->count();
        $this->totalDeletedVacations = Vacation::where('user_id', auth()->user()->id)->onlyTrashed()->count();

        // Advance Payment statistics
        $this->totalAdvancePayments = AdvancePayment::where('user_id', auth()->user()->id)->count();
        $this->totalRequestedAdvancePayments = AdvancePayment::where('user_id', auth()->user()->id)->where('status', 'requested')->count();
        $this->totalApprovedAdvancePayments = AdvancePayment::where('user_id', auth()->user()->id)->where('status', 'approved')->count();
        $this->totalDeletedAdvancePayments = AdvancePayment::where('user_id', auth()->user()->id)->onlyTrashed()->count();

    }

    public function render()
    {
        return view('pages.users.pages.index.pages.index')
            ->layout('pages.users.layouts.layout');
    }
}
