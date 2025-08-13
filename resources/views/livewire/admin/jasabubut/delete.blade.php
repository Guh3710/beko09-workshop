<div wire:ignore.self class="modal fade" id="deleteModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" id="deleteModalLabel">
                    <i class="fas fa-trash mr-2"></i><b>Hapus Jasa Bubut</b>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-dark">
                <p class="text-center">
                    Apakah Anda yakin ingin menghapus data jasa berikut?
                </p>
                <div class="row mt-3">
                    <div class="col-4 font-weight-bold">Nama</div>
                    <div class="col-8">: {{ $nama_jasa }}</div>
                    <div class="col-4 font-weight-bold">Harga</div>
                    <div class="col-8">: Rp. {{ number_format($harga, 0, ',', '.') }}</div>
                    @if ($deskripsi)
                        <div class="col-4 font-weight-bold">Deskripsi</div>
                        <div class="col-8">: {{ $deskripsi }}</div>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    <i class="fas fa-times mr-1"></i>Tidak
                </button>
                <button wire:click="destroy({{ $jasa_id }})" type="button" class="btn btn-success">
                    <i class="fas fa-trash-alt mr-1"></i>Ya
                </button>
            </div>
        </div>
    </div>
</div>
