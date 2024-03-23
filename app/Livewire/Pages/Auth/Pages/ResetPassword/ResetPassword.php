<?php

namespace App\Livewire\Pages\Auth\Pages\ResetPassword;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Locked;
use Livewire\Component;

class ResetPassword extends Component
{
    #[Locked]
    public $email;

    public $token;
    
    public $password;
    public $password_confirmation;

    public function resetpassword()
    {
        $this->validate([
            'password' => 'required|min:6|string|confirmed',
            'password_confirmation' => 'required|min:6|string',
        ]);

        $user = DB::table('password_reset_tokens')->where('email', $this->email)->first();
        if(Hash::check($this->token, $user->token)){
            User::Where('email', $this->email)->update([
                'password' => Hash::make($this->password),
                'updated_at' => Carbon::now(),
            ]);
    
            DB::table('password_reset_tokens')
            ->where('email', $this->email)
            ->delete();
        }

        $this->reset();
        $this->redirect(route('auth.login'), navigate: true);
    }

    public function mount($email, $token)
    {
        $this->email = $email;
        $this->token = $token;

        $user = DB::table('password_reset_tokens')->where('email', $email)->first();
        if(!Hash::check($token, $user->token)){
            return abort(404);
        }
    }

    public function render()
    {
        return view('pages.auth.pages.reset-password.reset-password')
        ->layout('layouts.auth.layout')
        ->title(trans('app.auth.resetpassword.title'));
    }
}
