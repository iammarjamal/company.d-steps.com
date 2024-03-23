<?php

namespace App\Livewire\Pages\Auth\Pages\Register;

use App\Models\Branch;
use App\Models\Notification;
use App\Models\Space;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use hisorange\BrowserDetect\Parser as Browser;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Register extends Component
{
    // Personal
    public $name;
    public $email;
    public $password;

    // Company
    public $companyLogo;
    public $companyName;
    public $companyPhone;
    public $companyEmail;

    public function personal()
    {
        // Validate
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:'.User::class,
            'password' => 'required|string|min:8',
        ]);

        $this->dispatch('personal');
    }

    public function register()
    {
        // Validate
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:'.User::class,
            'password' => 'required|string|min:8',

            'companyLogo' => 'nullable|image|max:2048',
            'companyName' => 'required|string|max:255',
            'companyPhone' => 'required|numeric',
            'companyEmail' => 'required|email',
        ]);

        // Get Language
        $lang = Session::get('locale') == 'en' ? 'en' : 'ar';
        
        // Get IP Info
        empty($_SERVER['HTTP_REFERER']) ? $referrers = null : $referrers = $_SERVER['HTTP_REFERER'];
        $response = file_get_contents('http://www.geoplugin.net/json.gp?ip='.Request::ip());
        $data =  @json_decode($response);
        !empty($data->geoplugin_countryName) ? $country = $data->geoplugin_countryName : $country = null;

        // Create User
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),

            'country' => $country,
            'timezone' => 'Asia/Riyadh',
            'language' => $lang,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // Login User
        Auth::login($user, true);

        // Insert New Session
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

        // Add Notification
        $titleNotification = $lang == 'en' ? 'Welcome to Rqeim' : 'مرحباً بك في رقيم';
        $contentNotification = $lang == 'en' ? 'We are pleased to serve you, do not hesitate to contact us at any time.' : 'يسُرنا خدمتك, لا تتردد بالتواصل معنا في اي وقت.';
        Notification::insert([
            'user_id' => Auth::user()->id,
            'title' => $titleNotification,
            'content' => $contentNotification,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // Add Space
        $space_id = Space::insertGetId([
            'user_id' => Auth::user()->id,
            
            'name' => $this->companyName,
            'phone' => $this->companyPhone,
            'email' => $this->companyEmail,

            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // Update User
        User::where('id', Auth::user()->id)->update([
            'space_id' => $space_id,
        ]);

        // Add Branch
        $nameBranch = $lang == 'en' ? 'Main Branch' : 'الفرع الرئيسي';
        Branch::insert([
            'space_id' => $space_id,
            'name' => $nameBranch,
            'country' => $country,
            'address' => null,

            'x' => null,
            'y' => null,
            
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // Add Logs
        DB::table('activities_logs')->insert([
            'space_id' => $space_id,
            'user_id' => Auth::user()->id,
            'msg' => 'logs.space.create',
            'status' => 'create',
            'created_at' =>  Carbon::now(),
        ]);

        $this->dispatch('company');
    }

    public function render()
    {
        return view('pages.auth.pages.register.register')
        ->layout('layouts.auth.layout')
        ->title(trans('app.auth.register.title'));
    }
}
