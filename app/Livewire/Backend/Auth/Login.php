<?php

namespace App\Livewire\Backend\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email, $password, $remember = false;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password, 'is_admin' => true], $this->remember)) {
            session()->regenerate();
            return redirect()->route('admin.dashboard'); // or wherever you want
        }

        $this->addError('email', 'The provided credentials do not match our records or you are not an admin.');
    }

    public function render()
    {
        return view('livewire.backend.auth.login');
    }
}
