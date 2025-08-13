<div wire:ignore.self class="modal fade" id="editModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" id="editModalLabel">
                    <i class="fas fa-edit mr-2"></i><b>Edit Sparepart</b>
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
                        placeholder="Masukkan Merek">
                    @error('merek')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="harga" class="form-label">Harga (Rp) <span class="text-danger">*</span></label>
                    <input wire:model="harga" type="number" class="form-control @error('harga') is-invalid @enderror"
                        placeholder="Masukkan Harga">
                    @if (!empty($harga) && is_numeric($harga))
                        <div class="mt-2 text-success">
                            <strong>Preview:</strong> Rp{{ number_format((float) $harga, 0, ',', '.') }}
                        </div>
                    @endif
                    @error('harga')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="stok" class="form-label">Stok <span class="text-danger">*</span></label>
                    <input wire:model="stok" type="number" class="form-control @error('stok') is-invalid @enderror"
                        placeholder="Masukkan Jumlah Stok">
                    @error('stok')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="satuan" class="form-label">Satuan <span class="text-danger">*</span></label>
                    <input wire:model="satuan" type="text" class="form-control @error('satuan') is-invalid @enderror"
                        placeholder="Contoh: pcs, unit, botol">
                    @error('satuan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input wire:model="gambar" type="file" key="{{ $sparepart_id }}"
                        class="form-control @error('gambar') is-invalid @enderror">
                    @if ($gambar_lama && !$gambar)
                        <div class="mt-2">
                            <label class="d-block">Gambar lama:</label>
                            <img src="{{ asset('storage/' . $gambar_lama) }}" class="img-thumbnail" width="120">
                        </div>
                    @endif
                    @if ($gambar)
                        <div class="mt-2">
                            <label class="d-block">Preview gambar baru:</label>
                            <img src="{{ $gambar->temporaryUrl() }}" class="img-thumbnail" width="120">
                        </div>
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
                <button wire:click="update" type="button" class="btn btn-success">
                    <i class="fas fa-edit mr-1"></i>Update
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    $('#editModal').on('hidden.bs.modal', function() {
        Livewire.emit('resetModal');
    });
</script>
