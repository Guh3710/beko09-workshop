<div>
    <div class="content-wrapper">
        <section class="content-header"
            style="background: linear-gradient(90deg, #0f2027, #203a43, #2c5364); padding:15px;">
            <div class="container-fluid text-white">
                <div class="row mb-2">
                    <div class="col-sm-6 text-white">
                        <h1><i class="fas fa-tools mr-2"></i><b>{{ $title }}</b></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right" style="background: transparent;">
                            <li class="breadcrumb-item">
                                <a class="text-white"><i class="fas fa-home mr-1"></i>Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active text-white">
                                <i class="fas fa-tools mr-1"></i><b>{{ $title }}</b>
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
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <button wire:click="create" class="btn btn-primary" data-toggle="modal"
                            data-target="#createModal">
                            <i class="fas fa-plus mr-1"></i><b>Tambah Jasa Bubut</b>
                        </button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fas fa-print mr-1"></i><b>Cetak</b>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item text-success" wire:click.prevent="exportExcel">
                                    <i class="fas fa-file-excel mr-1"></i>Excel
                                </a>
                                <a class="dropdown-item text-danger" wire:click.prevent="exportPdf">
                                    <i class="fas fa-file-pdf mr-1"></i>PDF
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-3 d-flex justify-content-between">
                    <div class="col-4">
                        <input wire:model.live="search" type="text" class="form-control search-box"
                            placeholder="Cari Jasa Bubut...">
                    </div>
                    <div class="col-2">
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
                            <tr>
                                <th>No</th>
                                <th>Nama Jasa</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th><i class="fas fa-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jasabubut as $item)
                                <tr style="border-bottom:1px solid rgba(255,255,255,0.1);">
                                    <td class="text-center"><b>{{ $loop->iteration }}.</b></td>
                                    <td>{{ $item->nama_jasa }}</td>
                                    <td>{{ $item->deskripsi }}</td>
                                    <td class="text-center">Rp. {{ number_format($item->harga, 0, ',', '.') }}</td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center" style="gap: 10px;">
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
                    {{ $jasabubut->links() }}
                </div>
            </div>
            @include('livewire.admin.jasabubut.create')
            @include('livewire.admin.jasabubut.edit')
            @include('livewire.admin.jasabubut.delete')
            @script
                <script>
                    $wire.on('closeCreateModal', () => {
                        $('#createModal').modal('hide');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        Swal.fire("Berhasil!", "Jasa berhasil ditambahkan.", "success");
                    });
                    $wire.on('closeEditModal', () => {
                        $('#editModal').modal('hide');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        Swal.fire("Berhasil!", "Jasa berhasil diperbarui.", "success");
                    });
                    $wire.on('closeDeleteModal', () => {
                        $('#deleteModal').modal('hide');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        Swal.fire("Berhasil!", "Jasa berhasil dihapus.", "success");
                    });
                </script>
            @endscript
        </section>
    </div>
</div>
