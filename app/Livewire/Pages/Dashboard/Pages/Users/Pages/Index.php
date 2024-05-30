<?php

namespace App\Livewire\Pages\Dashboard\Pages\Users\Pages;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $username;
    public $email;
    public $password;
    public $password_confirmation;

    // Search users
    #[Url]
    public $search;

    // Pagination
    public $pagination = 10;

    protected $listeners = ['save' => 'handleSave'];

    public function handleSave()
    {
        // Code to handle the 'save' event
    }

    public function save()
    {
        $data = $this->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|' . Rule::unique(User::class),
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create($data);
        $user->assignRole(Role::User);
        $this->dispatch('save');
        $this->resetInputs();
    }

    private function resetInputs()
    {
        $this->username = null;
        $this->email = null;
        $this->password = null;
        $this->password_confirmation = null;
    }

    #[On('remove')]
    public function filters()
    {
        $this->validate([
            'search' => 'nullable|string',
        ]);

        // Close Sidebar
        $this->dispatch('filters');
    }

    public function render()
    {
        $usersQuery = User::orderBy('created_at', 'DESC')
            ->whereDoesntHave('roles', function ($query) {
                $query->whereIn('name', ['admin', 'hr']);
            });

        if ($this->search) {
            if (Str::contains($this->search, '@')) {
                $usersQuery->where('email', 'like', '%' . $this->search . '%');
            } else {
                $usersQuery->where('username', 'like', '%' . $this->search . '%');
            }
        }

        $users = $usersQuery->take($this->pagination)->get();
        $count = $usersQuery->count();


        return view('pages.dashboard.pages.users.pages.index', [
            'users' => $users,
            'count' => $count,
        ])
            ->layout('pages.dashboard.layouts.layout')
            ->title(trans('app.dashboard.index.title'));
    }

}
