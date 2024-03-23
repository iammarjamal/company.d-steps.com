<?php

namespace App\Livewire\Pages\Auth\Pages\Login;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use hisorange\BrowserDetect\Parser as Browser;
use Livewire\Component;

class Login extends Component
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

        // Auth
        if($check == true){
            // Insert New Session
            if(empty($_SERVER['HTTP_REFERER'])){
                $referrers = 'direct';
            }else{
                $referrers = $_SERVER['HTTP_REFERER'];
            }
            $response = file_get_contents('http://www.geoplugin.net/json.gp?ip='.Request::ip());
            $data =  @json_decode($response);
            if(!empty($data->geoplugin_countryName)){
                $country = $data->geoplugin_countryName;
            }else{
                $country = null;
            }

            DB::table('sessions_logs')->insert([
                'user_id' => Auth::user()->id,
                'IP' => Request::ip(),
                'referrers' => $referrers,
                'country' => $country,
                'devices' => Browser::deviceModel(),
                'OS' => Browser::platformName(),
                'browsers' => Browser::browserFamily(),
                'UA' => Request::header('User-Agent'),
                'created_at' =>  Carbon::now(),
            ]);

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
        return view('pages.auth.pages.login.login')
        ->layout('layouts.auth.layout')
        ->title(trans('app.auth.login.title'));
    }
}
