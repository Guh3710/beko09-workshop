<div wire:ignore.self class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form wire:submit.prevent="update">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white"><i class="fas fa-edit mr-1"></i>Edit Transaksi</h5>
                    <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body text-dark">
                    <div class="form-group">
                        <label>User<span class="text-danger">*</span></label>
                        <select wire:model="user_id" class="form-control">
                            <option value="">-- Pilih User --</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->nama }}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Jenis Transaksi<span class="text-danger">*</span></label>
                        <select wire:model="jenis_transaksi" class="form-control">
                            <option value="">-- Pilih Jenis --</option>
                            <option value="jasa">Jasa Bubut</option>
                            <option value="sparepart">Sparepart</option>
                        </select>
                        @error('jenis_transaksi')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    @if ($jenis_transaksi === 'jasa')
                        <div class="form-group">
                            <label>Jasa Bubut<span class="text-danger">*</span></label>
                            <select wire:model="jasabubut_id" class="form-control">
                                <option value="">-- Pilih Jasa --</option>
                                @foreach ($jasa_bubuts as $jasa)
                                    <option value="{{ $jasa->id }}">{{ $jasa->nama_jasa }}</option>
                                @endforeach
                            </select>
                            @error('jasabubut_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    @elseif ($jenis_transaksi === 'sparepart')
                        <div class="form-group">
                            <label>Sparepart<span class="text-danger">*</span></label>
                            <select wire:model="sparepart_id" class="form-control">
                                <option value="">-- Pilih Sparepart --</option>
                                @foreach ($spareparts as $spare)
                                    <option value="{{ $spare->id }}">{{ $spare->nama_sparepart }}</option>
                                @endforeach
                            </select>
                            @error('sparepart_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            @if ($sparepart_id && ($sparepart = $spareparts->find($sparepart_id)))
                                <div class="mt-2 text-center">
                                    <img src="{{ asset('storage/' . $sparepart->gambar) }}" class="img-thumbnail"
                                        width="120" style="object-fit:contain;">
                                </div>
                            @endif
                        </div>
                    @endif
                    <div class="form-group">
                        <label>Jumlah<span class="text-danger">*</span></label>
                        <input type="number" wire:model="jumlah" class="form-control">
                        @error('jumlah')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Total Harga<span class="text-danger">*</span></label>
                        <input type="number" wire:model="total_harga" class="form-control">
                        @error('total_harga')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Tanggal Transaksi<span class="text-danger">*</span></label>
                        <input type="date" wire:model="tanggal_transaksi" class="form-control">
                        @error('tanggal_transaksi')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Status<span class="text-danger">*</span></label>
                        <select wire:model="status" class="form-control">
                            <option value="pending">Belum Lunas</option>
                            <option value="selesai">Selesai / Lunas</option>
                        </select>
                        @error('status')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times mr-1"></i>Batal</button>
                    <button type="submit" class="btn btn-success"><i class="fas fa-save mr-1"></i>Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
