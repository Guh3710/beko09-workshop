<?php

namespace App\Livewire\Admin\User;

use App\Exports\JasaBubutExport;
use App\Models\JasaBubut;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $paginate = '10';
    public $search = '';

    public $nama, $email, $role, $status, $password, $password_confirmation, $user_id;

    public function render()
    {
        $data = array(
            'title' => 'Manajemen User',
            'user' => User::where('nama', 'like', '%' . $this->search . '%')
                ->orwhere('email', 'like', '%' . $this->search . '%')
                ->orwhere('role', 'like', '%' . $this->search . '%')
                ->orderBy('role', 'asc')->paginate($this->paginate),
        );
        return view('livewire.admin.user.index', $data);
    }

    public function create()
    {
        $this->resetValidation();
        $this->reset(['nama', 'email', 'role', 'status', 'password', 'password_confirmation',]);
    }

    public function store()
    {
        $this->validate(
            [
                'nama' => 'required',
                'email' => 'required|email|unique:users,email',
                'role' => 'required',
                'password' => 'required|min:8|confirmed',
                'password_confirmation' => 'required',
            ],
            [
                'nama.required' => 'Nama Tidak Boleh Kosong',
                'email.required' => 'Email Tidak Boleh Kosong',
                'email.email' => 'Email Tidak Valid',
                'email.unique' => 'Email Tersebut Sudah Terdaftar',
                'role.required' => 'Role Tidak Boleh Kosong',
                'password.required' => 'Password Tidak Boleh Kosong',
                'password.min' => 'Password Minimal 8 Karakter',
                'password.confirmed' => 'Password Konfirmasi Tidak Cocok',
                'password_confirmation.required' => 'Password Konfirmasi Tidak Boleh Kosong',
            ]
        );

        $user = new User;
        $user->nama = $this->nama;
        $user->email = $this->email;
        $user->role = $this->role;
        $user->password = Hash::make($this->password);

        $user->save();

        $this->dispatch('closeCreateModal');
    }

    public function edit($id)
    {
        $this->resetValidation();
        $user = User::findOrFail($id);
        $this->nama = $user->nama;
        $this->email = $user->email;
        $this->role = $user->role;
        $this->status = $user->status;
        $this->password = '';
        $this->password_confirmation = '';
        $this->user_id = $user->id;
    }

    public function update($id)
    {
        $user = User::findOrFail($id);
        $user->status = $this->status;
        $this->validate(
            [
                'nama' => 'required',
                'email' => 'required|email|unique:users,email,' . $id,
                'role' => 'required',
                'status' => 'required|in:active,inactive',
                'password' => 'nullable|min:8|confirmed',
            ],
            [
                'nama.required' => 'Nama Tidak Boleh Kosong',
                'email.required' => 'Email Tidak Boleh Kosong',
                'email.email' => 'Email Tidak Valid',
                'email.unique' => 'Email Sudah Terdaftar',
                'role.required' => 'Role Tidak Boleh Kosong',
                'status.required' => 'Status Tidak Boleh Kosong',
                'status.in' => 'Status harus Active atau Inactive',
                'password.nullable' => 'Password Tidak Boleh Kosong',
                'password.min' => 'Password Minimal 8 Karakter',
                'password.confirmed' => 'Password Konfirmasi Tidak Cocok',
            ]
        );

        $user->nama = $this->nama;
        $user->email = $this->email;
        $user->role = $this->role;
        $user->status = $this->status;
        if ($this->password) {
            $user->password = Hash::make($this->password);
        }
        $user->save();

        $this->dispatch('closeEditModal');
    }

    public function setActive($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'active';
        $user->save();

        $this->dispatch('userStatusUpdated', message: 'User berhasil diaktifkan.');
    }

    public function setInactive($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'inactive';
        $user->save();

        $this->dispatch('userStatusUpdated', message: 'User berhasil dinonaktifkan.');
    }

    public function confirm($id)
    {
        $user = User::findOrFail($id);
        $this->nama = $user->nama;
        $this->email = $user->email;
        $this->role = $user->role;
        $this->user_id = $user->id;
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        $this->dispatch('closeDeleteModal');
    }
}
