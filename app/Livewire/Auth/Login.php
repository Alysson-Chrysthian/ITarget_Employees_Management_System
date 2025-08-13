<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $name, $password;

    protected function rules()
    {
        return [
            'name' => 'required|exists:admins',
            'password' => 'required',
        ];
    }

    public function login() 
    {
        $this->validate();

        if (!Auth::guard('admin')->attempt([
            'name' => $this->name,
            'password' => $this->password,
        ])) {
            return $this->addError('password', 'This password isn`t valid');
        }

        return $this->redirect('/');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
