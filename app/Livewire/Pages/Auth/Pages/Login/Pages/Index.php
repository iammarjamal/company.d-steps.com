<?php

namespace App\Livewire\Pages\Auth\Pages\Login\Pages;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $email;
    public $password;
    public $remember_me = true;

    public function login()
    {
        // Validate
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
            'remember_me' => 'nullable|boolean',
        ]);

        // Check
        $check = Auth::attempt(
            array('email'=> $this->email, 'password' => $this->password), 
            $this->remember_me
        );

        // Success
        if($check == true){
            $this->redirect(route('dashboard.index'), navigate: true);
        }

        // Error
        else{
            $this->addError('email', trans('auth.password')); 
            $this->reset('password');
        }
    }

    public function render()
    {
        return view('pages.auth.pages.login.pages.index')
        ->layout('pages.auth.layouts.layout')
        ->title(trans('app.auth.login.title'));
    }
}
