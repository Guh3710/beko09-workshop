<div class="register-box">
    <div class="card card-outline card-dark">
        <div class="card-header text-center">
            <img src="{{ asset('adminlte3/dist/img/logobeko.png') }}" alt="Beko09Workshop"
                class="brand-image img-circle elevation-3 mb-2" style="width: 80px; height: 80px;">
            <h1 class="d-block mt-2">
                <b>Beko 09 Workshop</b><span>.™</span>
            </h1>
        </div>

        <div class="card-body">
            <p class="login-box-msg"><strong>Daftar untuk memulai sesi Anda</strong></p>

            <form wire:submit.prevent="register">
                @csrf

                {{-- Nama --}}
                <div class="input-group mb-3">
                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                        placeholder="Masukkan Nama Lengkap Anda" wire:model="nama">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                @error('nama')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                {{-- Email --}}
                <div class="input-group mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                        placeholder="Masukkan Email Anda" wire:model="email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                {{-- Password --}}
                <div class="input-group mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="Masukkan Password Anda" wire:model="password" id="password">
                    <div class="input-group-append">
                        <span class="input-group-text" onclick="togglePassword('password', 'eyeIcon1')"
                            style="cursor: pointer;">
                            <i class="fas fa-eye" id="eyeIcon1"></i>
                        </span>
                    </div>
                </div>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                {{-- Konfirmasi Password --}}
                <div class="input-group mb-3">
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                        placeholder="Konfirmasi Password Anda" wire:model="password_confirmation"
                        id="password_confirmation">
                    <div class="input-group-append">
                        <span class="input-group-text" onclick="togglePassword('password_confirmation', 'eyeIcon2')"
                            style="cursor: pointer;">
                            <i class="fas fa-eye" id="eyeIcon2"></i>
                        </span>
                    </div>
                </div>
                @error('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="text-center mt-3 mb-3">
                    <button type="submit" class="btn btn-primary px-4">Daftar</button>
                </div>
            </form>

            <p class="mb-1">
                <a href="{{ route('login') }}">Sudah punya akun? Masuk</a>
            </p>

            <div class="text-end mt-3">
                <a href="/" class="btn btn-danger btn-sm">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
