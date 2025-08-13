<div wire:ignore.self class="modal fade" id="deleteModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white" id="deleteModalLabel">
                    <i class="fas fa-trash mr-2"></i><b>Hapus Sparepart</b>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-dark">
                <p class="text-center">
                    Apakah Anda yakin ingin menghapus data sparepart berikut?
                </p>
                @if ($gambar_lama_delete)
                    <div class="text-center mb-3">
                        <img src="{{ asset('storage/' . $gambar_lama_delete) }}" alt="Gambar" width="100"
                            class="img-thumbnail">
                    </div>
                @endif
                <div class="row">
                    <div class="col-4 font-weight-bold">Nama</div>
                    <div class="col-8">: {{ $nama_sparepart }}</div>
                    <div class="col-4 font-weight-bold">Merek</div>
                    <div class="col-8">: {{ $merek }}</div>
                    <div class="col-4 font-weight-bold">Harga</div>
                    <div class="col-8">: Rp{{ number_format($harga, 0, ',', '.') }}</div>
                    <div class="col-4 font-weight-bold">Stok</div>
                    <div class="col-8">: {{ $stok }} {{ $satuan }}</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fas fa-times mr-1"></i> Tidak
                </button>
                <button wire:click="destroy" type="button" class="btn btn-danger">
                    <i class="fas fa-trash-alt mr-2"></i> Iya
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    Livewire.on('closeDeleteModal', () => {
        $('#deleteModal').modal('hide');
    });
</script>
