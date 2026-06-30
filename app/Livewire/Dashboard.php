<?php

namespace App\Livewire;

use App\Models\DataTransaksi;
use App\Models\Pesanan;
use App\Models\User;
use App\Models\JasaBubut;
use App\Models\Sparepart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public $jumlahUser;
    public $jumlahJasaBubut;
    public $jumlahSparepart;
    public $jumlahTransaksi;
    public $jumlahPesananSaya;

    protected $listeners = ['logoutConfirmed' => 'logout'];

    public function mount()
    {
        $this->jumlahUser = User::count();
        $this->jumlahJasaBubut = JasaBubut::count();
        $this->jumlahSparepart = Sparepart::count();
        $this->jumlahTransaksi = DataTransaksi::count();
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        session()->flash('Logout_Success', true);

        return redirect()->route('login');
    }

    public function render()
    {
        $role = Auth::check() ? Auth::user()->role : '-';

        $this->jumlahPesananSaya = DataTransaksi::where('user_id', Auth::id())->count();

        return view('livewire.dashboard', [
            'title' => 'Dashboard',
            'role' => $role
        ]);
    }
}
