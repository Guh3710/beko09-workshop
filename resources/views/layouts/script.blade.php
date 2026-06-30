<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        $('[data-toggle="dropdown"]').dropdown();
        Livewire.on('setPageTitle', (title) => {
            document.title = title;
        });
        Livewire.on('Login_Inactive', () => {
            Swal.fire({
                title: 'Akun Tidak Aktif',
                text: 'Silakan hubungi Admin untuk mengaktifkan akun Anda.',
                icon: 'warning',
                confirmButtonText: 'OK'
            });
        });
        Livewire.on('clearSavedEmail', () => {
            localStorage.removeItem('savedEmail');
        });
        const savedEmail = localStorage.getItem('savedEmail');
        const emailInput = document.querySelector('#email');
        if (savedEmail && emailInput) {
            emailInput.value = savedEmail;
        }
        emailInput?.addEventListener('input', () => {
            localStorage.setItem('savedEmail', emailInput.value);
        });
        window.addEventListener('livewire:initialized', () => {
            const component = Livewire.find(
                document.querySelector('[wire\\:id]')?.getAttribute('wire:id')
            );
            if (component && savedEmail) {
                component.set('email', savedEmail);
            }
        });
    });
    document.addEventListener("livewire:load", function() {
        Livewire.hook('message.processed', () => {
            $('[data-toggle="dropdown"]').dropdown();
            $('[data-widget="pushmenu"]').PushMenu();
            $('[data-widget="treeview"]').Treeview?.();
            $('[data-widget="tooltip"]').tooltip();
        });
    });
</script>
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
