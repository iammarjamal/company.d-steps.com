<?php

namespace App\Livewire\Pages\Users\Pages\Vacations\Pages;

use App\Events\UserVacationCreatedOrUpdated;
use App\Events\UserVacationDeleted;
use App\Models\Vacation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $status = 'all';
    public $title;
    public $description;
    public $starts_at;
    public $ends_at;

    public $search;

    public function setToUpdate($id){
        $vacation = Vacation::findOrFail($id);
        $this->title = $vacation->title;
        $this->description = $vacation->description;
        $this->starts_at = $vacation->starts_at;
        $this->ends_at = $vacation->ends_at;
    }

    public function deleteVacation($id)
    {
        $vacation = Vacation::findOrFail($id);
        if($vacation->status != 'approved'){
            $vacation->delete();
            UserVacationDeleted::dispatch();
            $this->dispatch('remove')->self();
        }
    }

    #[On('remove')]
    #[On('save')]
    #[On('update')]
    public function resetFilters(){
        $this->search = '';
        $this->starts_at = '';
        $this->ends_at = '';
        $this->dispatch('filters');
    }

    public function filters()
    {
        $this->validate([
            'search' => 'nullable|string',
            'starts_at' => 'nullable|date',
            'ends_at' => 'nullable|date|after:starts_at',
        ]);

        // Close Sidebar
        $this->dispatch('filters');
    }

    public function save(){
        $this->validate([
           'title' => 'required|string',
           'description'=>'required|string',
            'starts_at' => ['nullable', 'date', function ($attribute, $value, $fail) {
                if ($value && Carbon::parse($value)->isBefore(Carbon::today())) {
                    $fail(__('validation.custom.starts_at.min_today'));
                }
            }],
           'ends_at' => 'required|date|after:starts_at',
        ]);

        Vacation::create([
           'user_id' => Auth::user()->id,
           'title' => $this->title,
           'description' => $this->description,
           'starts_at' => Carbon::make($this->starts_at),
           'ends_at' => Carbon::make($this->ends_at),
        ]);

        UserVacationCreatedOrUpdated::dispatch();
        $this->dispatch('save');
        $this->reset(['title', 'description', 'starts_at' , 'ends_at']);
    }

    public function update($id){
        $this->validate([
            'title' => 'required|string',
            'description'=>'required|string',
            'starts_at' => ['nullable', 'date', function ($attribute, $value, $fail) {
                if ($value && Carbon::parse($value)->isBefore(Carbon::today())) {
                    $fail(__('validation.custom.starts_at.min_today'));
                }
            }],
            'ends_at' => 'required|date|after:starts_at',
        ]);
        $vacation = Vacation::findOrFail($id);
        $vacation->update([
            'title' => $this->title,
            'description' => $this->description,
            'starts_at' => Carbon::make($this->starts_at),
            'ends_at' => Carbon::make($this->ends_at),
        ]);
        UserVacationCreatedOrUpdated::dispatch();
        $this->dispatch('update');
        $this->reset(['title', 'description', 'starts_at' , 'ends_at']);
    }

    #[On('reverb_vacation_created_or_updated')]
    #[On('reverb_vacation_deleted')]
    public function render()
    {
//        $vacations  = Vacation::where('user_id' , Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(5);

        $vacationsQuery = Vacation::where('user_id' , Auth::user()->id)->orderBy('created_at', 'DESC');

        if ($this->status != 'all') {
            $vacationsQuery->where('status', $this->status);
        }

        if ($this->search) {
            $vacationsQuery->where('title', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%')
                ->orWhere('created_at', 'like', '%' . $this->search . '%')
                ->orWhere('updated_at', 'like', '%' . $this->search . '%');
        }

        if ($this->starts_at) {
            $vacationsQuery->where('starts_at', '>=', $this->starts_at);
        }

        if ($this->ends_at) {
            $vacationsQuery->where('ends_at', '<=', $this->ends_at);
        }

        $vacations = $vacationsQuery->paginate(5);
        $count = $vacationsQuery->count();

        return view('pages.users.pages.vacations.pages.index' , [
            'vacations' => $vacations ,
            'count' => $count,])
            ->layout('pages.users.layouts.layout')
            ->title(trans('dashboard.navbar.title.vacation'));
    }
}
