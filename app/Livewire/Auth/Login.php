<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Login extends Component
{
    #[Layout('auth.login')]
    public $email, $password, $remember = false;

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ], [
            'email.required' => 'Email tidak boleh kosong.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password tidak boleh kosong.',
            'password.min' => 'Password minimal 8 karakter.',
        ]);

        $user = User::where('email', $this->email)->first();

        if (!$user) {
            $this->addError('email', 'Email tidak terdaftar.');
            return;
        }

        if (!Auth::attempt([

            'email' => $this->email,
            'password' => $this->password
        ], $this->remember)) {

            $this->addError('password', 'Password yang dimasukkan salah.');
            return;
        }

        if ($user->status !== 'active') {

            $this->dispatch('Login_Inactive');
            return;
        }

        session()->flash('Login_Success', true);

        $this->dispatch('clearSavedEmail');

        session()->regenerate();

        if ($user->role === 'admin') {
            return redirect()->intended('/dashboard');
        } elseif ($user->role === 'pelanggan') {
            return redirect()->intended('pelanggan/order');
        }

        return redirect()->intended('/dashboard');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
