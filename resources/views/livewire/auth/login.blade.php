<div class="login-box">
    <div class="card card-outline card-dark">
        <div class="card-header text-center">
            <img src="{{ asset('adminlte3/dist/img/logobeko.png') }}" alt="Beko09Workshop"
                class="brand-image img-circle elevation-3 mb-2" style="width: 80px; height: 80px;">

            <h1 class="d-block mt-2">
                <b>Beko 09 Workshop</b><span>.™</span>
            </h1>
        </div>

        <div class="card-body">
            <p class="login-box-msg"><strong>Masuk untuk memulai sesi Anda</strong></p>

            <form wire:submit.prevent="login">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                        placeholder="Masukkan Email Anda" wire:model.defer="email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

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
                <div class="form-check mb-3 text-dark">
                    <input wire:model="remember" type="checkbox" class="form-check-input" id="remember">
                    <label class="form-check-label" for="remember"><i class="fas fa-check-box"></i> <strong>Ingat
                            saya</strong></label>
                </div>
                <div class="text-center mt-2 mb-3">
                    <button type="submit" class="btn btn-primary px-4">Masuk</button>
                </div>
            </form>

            <p class="mb-0">
                <a href="{{ route('register') }}" class="text-center">Belum punya Akun? Daftar</a>
            </p>
            <div class="text-end mt-3">
                <a href="/" class="btn btn-danger btn-sm">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
