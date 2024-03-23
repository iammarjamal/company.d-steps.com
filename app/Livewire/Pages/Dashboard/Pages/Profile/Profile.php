<?php

namespace App\Livewire\Pages\Dashboard\Pages\Profile;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;
use Livewire\Component;

class Profile extends Component
{
    public $name;
    public $email;
    public $phone;

    public $old_password;
    public $password;
    public $password_confirmation;

    public function profile()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|'.Rule::unique(User::class)->ignore(Auth::user()->id),
            'phone' => 'nullable|string',
        ]);

        // Update Email
        if ($this->email != Auth::user()->email) {
            User::where('id', Auth::user()->id)->update([
                'email' => $this->email,
                'email_verified_at' => null,
            ]);
        }

        // Update Phone
        if ($this->phone != Auth::user()->phone) {
            User::where('id', Auth::user()->id)->update([
                'phone' => $this->phone,
                'phone_verified_at' => null,
            ]);
        }

        // Update name
        User::where('id', Auth::user()->id)->update([
            'name' => $this->name,
            'updated_at' => Carbon::now()
        ]);

        $this->dispatch('profile');
    }

    public function changePassword()
    {
        $this->validate([
            'old_password' => 'required|min:6|string',
            'password' => 'required|min:6|string|confirmed',
            'password_confirmation' => 'required|min:6|string',
        ]);

        $user = User::findOrFail(Auth::user()->id);

        // Success
        if(Hash::check($this->old_password, $user->password)){
            User::where('id', Auth::user()->id)->update([
                'password' => Hash::make($this->password),
                'updated_at' => Carbon::now()
            ]);

            // session()->flash('old_password', trans('passwords.reset'));
            // session()->flash('password_confirmation', trans('passwords.reset'));
            
            session()->flash('password', trans('passwords.reset'));
            $this->reset('old_password', 'password', 'password_confirmation');
        }
        
        // Error
        else{
            $this->addError('old_password', trans('auth.changePassword'));
        }
    }

    #[On('profile')]
    public function render()
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
        $this->phone = Auth::user()->phone;

        return view('pages.dashboard.pages.profile.profile')
        ->layout('layouts.dashboard.layout') 
        ->title(trans('app.dashboard.profile.title'));
    }
}
