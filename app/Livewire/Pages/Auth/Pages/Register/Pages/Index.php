<?php

namespace App\Livewire\Pages\Auth\Pages\Register\Pages;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Index extends Component
{
    // User
    public $username;
    public $email;
    public $password;

    public function register()
    {
        // Validate
        $this->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:'.User::class,
            'password' => 'required|string|min:8',
        ]);

        // Create User
        $user = User::create([
            'username' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),

            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // Login User
        Auth::login($user, true);

        $this->redirect(route('dashboard.index'), navigate: true);
    }

    public function render()
    {
        return view('pages.auth.pages.register.pages.index')
        ->layout('pages.auth.layouts.layout') 
        ->title(trans('app.auth.register.title'));
    }
}
