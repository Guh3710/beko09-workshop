<div>
    <div class="content-wrapper">
        <section class="content-header"
            style="background: linear-gradient(90deg, #0f2027, #203a43, #2c5364); padding:15px;">
            <div class="container-fluid text-white">
                <div class="row mb-2">
                    <div class="col-sm-6 text-white">
                        <h1><i class="fas fa-users mr-2"></i><b>{{ $title }}</b></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right" style="background: transparent;">
                            <li class="breadcrumb-item">
                                <a class="text-white"><i class="fas fa-home mr-1"></i>Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active text-white">
                                <i class="fas fa-users mr-1"></i><b>{{ $title }}</b>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content" style="padding: 15px; background: linear-gradient(90deg, #0f2027, #203a43, #2c5364);">
            <div class="card"
                style="background: #ffffff; border-radius: 10px; box-shadow: 0 3px 8px rgba(0,0,0,0.2);">
                <div class="card-header"
                    style="background: linear-gradient(90deg, #0f2027, #203a43, #2c5364); color: #fff; border-top-left-radius: 5px; border-top-right-radius: 5px;">
                    <div class="d-flex justify-content-between">
                        <div>
                            <button wire:click="create" class="btn btn-primary font-weight-bold" data-toggle="modal"
                                data-target="#createModal">
                                <i class="fas fa-plus mr-1"></i> Tambah Data User
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body" style="background: linear-gradient(90deg, #0f2027, #203a43, #2c5364); padding:15px;">
                <!-- Search & Paginate -->
                <div class="mb-3 d-flex justify-content-between">
                    <div class="col-4 p-0">
                        <input wire:model.live="search" type="text" class="form-control search-box"
                            placeholder="Cari Data User...">
                    </div>
                    <div class="col-2 p-0">
                        <select wire:model.live="paginate" class="form-control paginate-select">
                            <option value="10">1-10</option>
                            <option value="25">10-25</option>
                            <option value="50">25-50</option>
                            <option value="100">50-100</option>
                        </select>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark text-center">
                            <tr style="border-bottom:2px solid rgba(255,255,255,0.2);">
                                <th style="width: 5%;">No</th>
                                <th style="width: 20%;">Nama</th>
                                <th style="width: 30%;">Email</th>
                                <th style="width: 15%;">Role</th>
                                <th style="width: 15%;"><i class="fas fa-cog"></i></th>
                                <th style="width: 15%;"><i class="fas fa-users"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $item)
                                <tr style="border-bottom:2px solid rgba(255,255,255,0.1);">
                                    <td class="text-center"><b>{{ $loop->iteration }}.</b></td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td class="text-center">
                                        <span class="badge badge-{{ $item->role == 'Admin' ? 'info' : 'success' }}">
                                            {{ $item->role }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        @if ($item->status === 'active')
                                            <button wire:click="setInactive({{ $item->id }})"
                                                class="btn btn-warning btn-sm" title="Nonaktifkan User">
                                                <i class="fas fa-toggle-on"></i>
                                            </button>
                                        @else
                                            <button wire:click="setActive({{ $item->id }})"
                                                class="btn btn-secondary btn-sm" title="Aktifkan User">
                                                <i class="fas fa-toggle-off"></i>
                                            </button>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center"
                                            style="gap: 10px;">
                                            <button wire:click="edit({{ $item->id }})"
                                                class="btn btn-primary btn-sm" data-toggle="modal"
                                                data-target="#editModal">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button wire:click="confirm({{ $item->id }})"
                                                class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#deleteModal">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $user->links() }}
                </div>
            </div>
        </section>
        @include('livewire.admin.user.create')
        @include('livewire.admin.user.edit')
        @include('livewire.admin.user.delete')
        @script
            <script>
                $wire.on('closeCreateModal', () => {
                    $('#createModal').modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    Swal.fire("Berhasil!", "Data berhasil ditambahkan.", "success");
                });
                $wire.on('closeEditModal', () => {
                    $('#editModal').modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    Swal.fire("Berhasil!", "Data berhasil diperbarui.", "success");
                });
                $wire.on('closeDeleteModal', () => {
                    $('#deleteModal').modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    Swal.fire("Berhasil!", "Data berhasil dihapus.", "success");
                });
            </script>
        @endscript
        @once
            @push('scripts')
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    Livewire.on('userStatusUpdated', ({
                        message
                    }) => {
                        Swal.fire({
                            title: 'Berhasil!',
                            text: message,
                            icon: 'success',
                            timer: 2000,
                            showConfirmButton: false,
                        });
                    });
                </script>
            @endpush
        @endonce
    </div>
</div>
