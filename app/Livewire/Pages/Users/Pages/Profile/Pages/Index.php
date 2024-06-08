<?php

namespace App\Livewire\Pages\Users\Pages\Profile\Pages;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\Attributes\On;

class Index extends Component
{
    public $name;
    public $email;

    public $old_password;
    public $password;
    public $password_confirmation;

    public function profile()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|'.Rule::unique(User::class)->ignore(Auth::user()->id),
        ]);


        User::where('id', Auth::user()->id)->update([
            'username' => $this->name,
            'email' => $this->email,
            'updated_at' => Carbon::now()
        ]);

        $this->dispatch('profile');
    }

    public function changePassword()
    {
        $this->validate([
            'old_password' => 'required|min:8|string',
            'password' => 'required|min:8|string|confirmed',
        ]);

        $user = Auth::user();

        // Success
        if(Hash::check($this->old_password, $user->password)){
            $user->update([
                'password' => Hash::make($this->password),
                'updated_at' => Carbon::now()
            ]);


            session()->flash('password', trans('passwords.reset'));
            $this->reset('old_password', 'password', 'password_confirmation');
            $this->resetValidation();
        }

        // Error
        else{
            $this->addError('old_password', trans('auth.changePassword'));
        }
    }


    #[On('profile')]
    public function render()
    {
        $this->name = Auth::user()->username;
        $this->email = Auth::user()->email;
        $this->phone = Auth::user()->phone;

        return view('pages.users.pages.profile.pages.index')
            ->layout('pages.users.layouts.layout')
            ->title(trans('app.dashboard.profile.title'));
    }
}
