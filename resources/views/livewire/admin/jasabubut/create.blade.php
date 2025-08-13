<div wire:ignore.self class="modal fade" id="createModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" id="createModalLabel">
                    <i class="fas fa-tools mr-2"></i><b>Tambah Jasa Bubut</b>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-dark">
                <div class="form-group">
                    <label for="nama_jasa" class="form-label">Nama Jasa <span class="text-danger">*</span></label>
                    <input wire:model="nama_jasa" type="text"
                        class="form-control @error('nama_jasa') is-invalid @enderror" placeholder="Masukkan Nama Jasa">
                    @error('nama_jasa')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea wire:model="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="3"
                        placeholder="Opsional: Masukkan deskripsi jasa bubut"></textarea>
                    @error('deskripsi')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="harga" class="form-label">Harga (Rp) <span class="text-danger">*</span></label>
                    <input wire:model="harga" type="number" class="form-control @error('harga') is-invalid @enderror"
                        placeholder="Masukkan Harga">
                    @error('harga')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    <i class="fas fa-times mr-1"></i>Batal
                </button>
                <button wire:click="store" type="button" class="btn btn-success">
                    <i class="fas fa-save mr-1"></i>Simpan
                </button>
            </div>
        </div>
    </div>
</div>
