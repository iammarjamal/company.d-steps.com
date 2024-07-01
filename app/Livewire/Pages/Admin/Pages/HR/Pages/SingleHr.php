<?php

namespace App\Livewire\Pages\Admin\Pages\Hr\Pages;

use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Component;
use App\Livewire\Pages\Admin\Pages\HR\Pages\Index as HrIndex;

class SingleHr extends Component
{
    public $user;
    public $id;
    public $username;
    public $email;
    public $password;
    public $password_confirmation;

    protected $listeners = ['save' => 'handleSave'];

    public function handleSave(){

    }

    private function resetInputs()
    {
        $this->username = null;
        $this->email = null;
        $this->password = null;
        $this->password_confirmation = null;
    }

    public function save()
    {
        $data = $this->validate([
            'username' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($this->user->id),
            ],
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if (empty($data['password'])) {
            unset($data['password']);
        }

        $this->user->update($data);
        $this->dispatch('save');
        $this->resetInputs();
    }

    public function remove($id)
    {
        $this->id = $id;
        $this->validate([
            'id' => 'required|integer',
        ]);

        sleep(1);
        User::where('id', $this->id)->delete();
        $this->dispatch('remove')->to(HrIndex::class);
    }

    public function mount($user)
    {
        $this->user = $user;
        $this->id = $this->user->id;
        $this->username = $this->user->username;
        $this->email = $this->user->email;
    }

    public function render()
    {
        return view('pages.admin.pages.hr.pages.single-hr');
    }
}
