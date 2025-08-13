{{-- ======================= SCRIPT JS UTAMA ======================= --}}
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap Bundle (dengan Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- ======================= LIVEWIRE & EVENT HOOK ======================= --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Aktifkan dropdown bootstrap
        $('[data-toggle="dropdown"]').dropdown();

        // Ubah title halaman jika ada event
        Livewire.on('setPageTitle', (title) => {
            document.title = title;
        });

        // Notifikasi akun tidak aktif
        Livewire.on('Login_Inactive', () => {
            Swal.fire({
                title: 'Akun Tidak Aktif',
                text: 'Silakan hubungi Admin untuk mengaktifkan akun Anda.',
                icon: 'warning',
                confirmButtonText: 'OK'
            });
        });

        // Bersihkan email yang tersimpan di localStorage
        Livewire.on('clearSavedEmail', () => {
            localStorage.removeItem('savedEmail');
        });

        // Auto-isi email dari localStorage
        const savedEmail = localStorage.getItem('savedEmail');
        const emailInput = document.querySelector('#email');

        if (savedEmail && emailInput) {
            emailInput.value = savedEmail;
        }

        // Simpan email di localStorage jika ada input
        emailInput?.addEventListener('input', () => {
            localStorage.setItem('savedEmail', emailInput.value);
        });

        // Set ulang nilai email ke komponen Livewire
        window.addEventListener('livewire:initialized', () => {
            const component = Livewire.find(
                document.querySelector('[wire\\:id]')?.getAttribute('wire:id')
            );
            if (component && savedEmail) {
                component.set('email', savedEmail);
            }
        });
    });

    // Hook untuk inisialisasi ulang setelah Livewire update DOM
    document.addEventListener("livewire:load", function() {
        Livewire.hook('message.processed', () => {
            $('[data-toggle="dropdown"]').dropdown();
            $('[data-widget="pushmenu"]').PushMenu();
            $('[data-widget="treeview"]').Treeview?.();
            $('[data-widget="tooltip"]').tooltip();
        });
    });
</script>

{{-- ======================= TOGGLE LIHAT PASSWORD ======================= --}}
<script>
    function togglePassword(fieldId = 'password', iconId = 'eyeIcon') {
        const input = document.getElementById(fieldId);
        const icon = document.getElementById(iconId);

        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = "password";
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
</script>

{{-- ======================= NOTIFIKASI REGISTER ======================= --}}
@if (session('Register_Success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Registrasi Berhasil',
            text: 'Akun anda berhasil dibuat, Silakan login.',
            confirmButtonText: 'OK',
            showConfirmButton: true
        });
    </script>
@endif

{{-- ======================= NOTIFIKASI LOGIN ======================= --}}
@if (session('Login_Success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Login Berhasil',
            text: 'Selamat datang di Beko 09 Workshop.™',
            confirmButtonText: 'OK',
            showConfirmButton: true
        });
    </script>
@endif

{{-- ======================= NOTIFIKASI LOGOUT ======================= --}}
<script>
    function confirmLogout(e) {
        e.preventDefault();
        Swal.fire({
            title: "Apakah Anda yakin?",
            text: "Anda akan keluar dari Beko 09 Workshop.™",
            icon: "warning",
            showCancelButton: true,
            reverseButtons: true,
            buttonsStyling: false,
            cancelButtonColor: "#d33",
            confirmButtonColor: "#28a745",
            cancelButtonText: '<span><i class="fas fa-times mr-1"></i>Batal</span>',
            confirmButtonText: '<span><i class="fas fa-check mr-1"></i>Lanjut</span>',
            customClass: {
                confirmButton: 'btn btn-success mx-2',
                cancelButton: 'btn btn-danger mx-2'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form.keluar').submit();
            }
        });
    }
</script>
@if (session('Logout_Success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil Logout',
            text: 'Anda telah keluar dari Beko 09 Workshop.™',
            confirmButtonText: 'OK',
            showConfirmButton: true
        });
    </script>
@endif
