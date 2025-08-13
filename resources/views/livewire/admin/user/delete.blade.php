<div wire:ignore.self class="modal fade" id="deleteModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <i class="fas da-user mr-1"></i>
                <h5 class="modal-title text-white" id="staticBackdropLabel"><i class="fas fa-trash mr-2"></i><b>Hapus
                        {{ $title }}</b>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-dark">
                <div class="row">
                    <div class="col-4">
                        Nama
                    </div>
                    <div class="col-8">
                        : {{ $nama }}
                    </div>
                    <div class="col-4">
                        Email
                    </div>
                    <div class="col-8">
                        : {{ $email }}
                    </div>
                    <div class="col-4">
                        Role
                    </div>
                    <div class="col-8">
                        :
                        @if ($role == 'Admin')
                            <span class="badge badge-info">
                                {{ $role }}
                            </span>
                        @else
                            <span class="badge badge-success">
                                {{ $role }}
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                        class="fas fa-times mr-1"></i>Tidak</button>
                <button wire:click="destroy({{ $user_id }})" type="button" class="btn btn-success"><i
                        class="fas fa-trash mr-2"></i>Ya</button>
            </div>
        </div>
    </div>
</div>
