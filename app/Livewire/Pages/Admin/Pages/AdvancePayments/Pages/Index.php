<?php

namespace App\Livewire\Pages\Admin\Pages\AdvancePayments\Pages;

use App\Events\UserAdvancePaymentCreatedOrUpdated;
use App\Events\UserAdvancePaymentDeleted;
use App\Events\UserVacationCreatedOrUpdated;
use App\Models\AdvancePayment;
use App\Models\Vacation;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $title;
    public $amount;
    public $status = 'all';
    public $created_at;
    public $approved_at;


    public $search;

    public function setToUpdate($id)
    {
        $advancePayment = AdvancePayment::findOrFail($id);
        $this->title = $advancePayment->title;
        $this->amount = $advancePayment->amount;
    }

    public function deleteAdvancePayment($id)
    {
        $advancePayment = AdvancePayment::findOrFail($id);
        $advancePayment->delete();
        UserAdvancePaymentDeleted::dispatch();
        $this->dispatch('remove')->self();
    }

    public function approveAdvancePayment($id)
    {
        $advancePayment = AdvancePayment::findOrFail($id);
        $advancePayment->update([
            'status' => 'approved',
            'approved_at' => now()
        ]);
        UserAdvancePaymentCreatedOrUpdated::dispatch();
    }
    public function filters()
    {
        $this->validate([
            'search' => 'nullable|string',
            'created_at' => 'nullable|date',
            'approved_at' => 'nullable|date',
        ]);

        // Close Sidebar
        $this->dispatch('filters');
    }

    #[On('remove')]
    #[On('update')]
    public function resetFilters()
    {
        $this->status = 'all';
        $this->search = '';
        $this->created_at = '';
        $this->approved_at = '';
    }

    public function update($id)
    {
        $this->validate([
            'title' => 'required|string',
            'amount' => 'required|numeric',
        ]);
        $advancePayment = AdvancePayment::findOrFail($id);
        $advancePayment->update([
            'title' => $this->title,
            'amount' => $this->amount
        ]);
        UserAdvancePaymentCreatedOrUpdated::dispatch();
        $this->dispatch('update');
        $this->reset(['title', 'amount']);
    }

    #[On('reverb_advance_payment_created_or_updated')]
    #[On('reverb_advance_payment_deleted')]
    public function render()
    {
        $advancePaymentsQuery = AdvancePayment::orderBy('created_at', 'DESC');

        if ($this->status != 'all') {
            $advancePaymentsQuery->where('status', $this->status);
        }

        if ($this->search) {
            $advancePaymentsQuery->where('title', 'like', '%' . $this->search . '%')
                ->orWhere('amount', 'like', '%' . $this->search . '%');
        }

        if ($this->created_at) {
            $advancePaymentsQuery->whereDate('created_at', $this->created_at);
        }

        if ($this->approved_at) {
            $advancePaymentsQuery->whereDate('approved_at', $this->approved_at);
        }

        $advancePayments = $advancePaymentsQuery->paginate(5);
        $count = $advancePaymentsQuery->count();

        return view('pages.admin.pages.advance-payments.pages.index', [
            'advancePayments' => $advancePayments,
            'count' => $count,
        ])
            ->layout('pages.dashboard.layouts.layout')
            ->title(trans('dashboard.navbar.title.advance-payment'));
    }
}
