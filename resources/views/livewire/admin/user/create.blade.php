<div wire:ignore.self class="modal fade" id="createModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <i class="fas da-user mr-1"></i>
                <h5 class="modal-title text-white" id="staticBackdropLabel"><i
                        class="fas fa-user-plus mr-1"></i><b>Tambah
                        {{ $title }}</b>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-dark">
                <div class="row mt-2">
                    <label for="nama" class="form-label">Nama</label>
                    <span class="text-danger">*</span>
                    <input wire:model="nama"type="text"
                        class="form-control
                    @error('nama') is-invalid
                    @enderror"
                        placeholder="Masukkan Nama"></input>
                    @error('nama')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="row mt-2">
                    <label for="email" class="form-label">Email</label>
                    <span class="text-danger">*</span>
                    <input wire:model="email" type="email"
                        class="form-control
                    @error('email') is-invalid
                    @enderror"
                        placeholder="Masukkan Email"></input>
                    @error('email')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="row mt-2">
                    <label for="role" class="form-label">Role</label>
                    <span class="text-danger">*</span>
                    <select id="role" wire:model="role"
                        class="form-control
                        @error('role') is-invalid
                        @enderror">
                        <option selected>
                            --Pilih Role--</option>
                        <option value="Admin">Admin</option>
                        <option value="Pelanggan">Pelanggan</option>
                    </select>
                    @error('role')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="row mt-2">
                    <label for="password" class="form-label">Password</label>
                    <span class="text-danger">*</span>
                    <input wire:model="password" type="password"
                        class="form-control
                    @error('password') is-invalid
                    @enderror"
                        placeholder="Masukkan Password"></input>
                    @error('password')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="row mt-2">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <span class="text-danger">*</span>
                    <input wire:model="password_confirmation" type="password"
                        class="form-control
                    @error('password_confirmation') is-invalid
                    @enderror"
                        placeholder="Masukkan Password Konfirmasi"></input>
                    @error('password_confirmation')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                        class="fas fa-times mr-1"></i>Batal</button>
                <button wire:click="store" type="button" class="btn btn-success"><i
                        class="fas fa-save mr-1"></i>Simpan</button>
            </div>
        </div>
    </div>
</div>
