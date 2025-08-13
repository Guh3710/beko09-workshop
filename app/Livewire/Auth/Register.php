<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Register extends Component
{
    #[Layout('auth.register')]

    public $nama, $email, $password, $password_confirmation;

    public function register()
    {
        $this->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|same:password_confirmation',
            'password_confirmation' => 'required|min:8',
        ], [
            'nama.required' => 'Nama tidak boleh kosong.',
            'email.required' => 'Email tidak boleh kosong.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'password.required' => 'Password tidak boleh kosong.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.same' => 'Konfirmasi password tidak cocok.',
            'password_confirmation.required' => 'Konfirmasi password harus diisi.',
        ]);

        User::create([
            'nama' => $this->nama,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => 'pelanggan',
        ]);

        session()->flash('Register_Success', true);

        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
