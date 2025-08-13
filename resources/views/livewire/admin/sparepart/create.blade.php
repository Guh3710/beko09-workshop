<div wire:ignore.self class="modal fade" id="createModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" id="createModalLabel">
                    <i class="fas fa-motorcycle mr-2"></i><b>Tambah Sparepart</b>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-dark">
                <div class="form-group">
                    <label for="nama_sparepart" class="form-label">Nama Sparepart <span
                            class="text-danger">*</span></label>
                    <input wire:model="nama_sparepart" type="text"
                        class="form-control @error('nama_sparepart') is-invalid @enderror"
                        placeholder="Masukkan Nama Sparepart">
                    @error('nama_sparepart')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="merek" class="form-label">Merek <span class="text-danger">*</span></label>
                    <input wire:model="merek" type="text" class="form-control @error('merek') is-invalid @enderror"
                        placeholder="Masukkan Merek Sparepart">
                    @error('merek')
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
                <div class="form-group">
                    <label for="stok" class="form-label">Stok <span class="text-danger">*</span></label>
                    <input wire:model="stok" type="number" class="form-control @error('stok') is-invalid @enderror"
                        placeholder="Masukkan Stok">
                    @error('stok')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="satuan" class="form-label">Satuan <span class="text-danger">*</span></label>
                    <input wire:model="satuan" type="text" class="form-control @error('satuan') is-invalid @enderror"
                        placeholder="Contoh: pcs, botol, set">
                    @error('satuan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input wire:model="gambar" type="file"
                        class="form-control @error('gambar') is-invalid @enderror">
                    @if ($gambar)
                        @if (is_string($gambar))
                            <img src="{{ asset('storage/' . $gambar) }}" alt="Preview" class="mt-2" width="100">
                        @else
                            <img src="{{ $gambar->temporaryUrl() }}" alt="Preview" class="mt-2" width="100">
                        @endif
                    @endif
                    @error('gambar')
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
