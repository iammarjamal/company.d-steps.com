<?php

namespace App\Livewire\Pages\Auth\Pages\ForgetPassword\Pages;

use App\Mail\Auth\ResetPassword;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Livewire\Component;

class Index extends Component
{

    public $email;
    
    public function forgotPassword()
    {
        $this->validate([
            'email' => 'required|string|email|max:255',
        ]);

        $email = $this->email;
        $check_email = User::Where('email', $email)->count();

        if($check_email == 0){
            $this->addError('email', trans('auth.failed'));            
        }else{

            $token = Str::random(128);
            DB::table('password_reset_tokens')->where('email', $email)->delete();
            Mail::to($email)->send(new ResetPassword($email, $token));
            DB::table('password_reset_tokens')->insert([
                'email' => $email,
                'token' => Hash::make($token),
                'created_at' => Carbon::now()
            ]);

            session()->flash('email', trans('passwords.sent'));
            $this->reset();
        }
    }

    public function render()
    {
        return view('pages.auth.pages.forget-password.pages.index')
        ->layout('pages.auth.layouts.layout') 
        ->title(trans('app.auth.forget.password.title'));
    }
}
