<div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white"><i class="fas fa-trash mr-1"></i>Hapus Transaksi</h5>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body text-center text-dark">
                <p>Apakah Anda yakin ingin menghapus transaksi ini?</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times mr-1"></i>Batal</button>
                <button wire:click="delete" class="btn btn-danger"><i class="fas fa-trash mr-1"></i>Hapus</button>
            </div>
        </div>
    </div>
</div>
