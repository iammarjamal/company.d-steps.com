<?php

namespace App\Livewire\Pages\Users\Pages\AdvancePayments\Pages;

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
    public function resetFilter()
    {
        $this->search = '';
    }

    public function filters()
    {
        $this->validate([
            'search' => 'nullable|string',
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
        $this->dispatch('update');
        $this->reset(['title', 'amount']);
    }

    public function render()
    {
        $advancePaymentsQuery = AdvancePayment::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC');

        if ($this->search) {
            $advancePaymentsQuery->where('title', 'like', '%' . $this->search . '%')
                ->orWhere('amount', 'like', '%' . $this->search . '%')
                ->orWhere('created_at', 'like', '%' . $this->search . '%')
                ->orWhere('updated_at', 'like', '%' . $this->search . '%');
        }

        $advancePayments = $advancePaymentsQuery->paginate(5);
        $count = $advancePaymentsQuery->count();

        return view('pages.users.pages.advance-payments.pages.index', [
            'advancePayments' => $advancePayments,
            'count' => $count,
        ])
            ->layout('pages.dashboard.layouts.layout')
            ->title(trans('app.dashboard.profile.title'));
    }
}
