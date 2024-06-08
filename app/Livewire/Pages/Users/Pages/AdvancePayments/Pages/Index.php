<?php

namespace App\Livewire\Pages\Users\Pages\AdvancePayments\Pages;

use App\Events\UserAdvancePaymentCreatedOrUpdated;
use App\Events\UserAdvancePaymentDeleted;
use App\Models\AdvancePayment;
use Illuminate\Support\Facades\Auth;
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
        if ($advancePayment->status != 'approved') {
            $advancePayment->delete();
            UserAdvancePaymentDeleted::dispatch();
            $this->dispatch('remove')->self();
        }
    }

    #[On('remove')]
    #[On('save')]
    #[On('update')]
    public function resetFilters()
    {
        $this->status = 'all';
        $this->search = '';
        $this->created_at = '';
        $this->approved_at = '';
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

    public function save()
    {
        $this->validate([
            'title' => 'required|string',
            'amount' => 'required|numeric',
        ]);

        AdvancePayment::create([
            'user_id' => Auth::user()->id,
            'title' => $this->title,
            'amount' => $this->amount,
        ]);

        UserAdvancePaymentCreatedOrUpdated::dispatch();
        $this->dispatch('save');
        $this->reset(['title', 'amount']);
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
        $advancePaymentsQuery = AdvancePayment::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC');

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

        return view('pages.users.pages.advance-payments.pages.index', [
            'advancePayments' => $advancePayments,
            'count' => $count,
        ])
            ->layout('pages.users.layouts.layout')
            ->title(trans('dashboard.navbar.title.advance-payment'));
    }
}
