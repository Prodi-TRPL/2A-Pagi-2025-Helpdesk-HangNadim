<div class="container mt-4 flex-grow-1 py-3 py-md-5">
    <div class="row justify-content-center">
            <div class="col-12 col-md-8">

                @if ($success)
                <x-feedback
                title="Terima Kasih Atas komplain Anda!"
                subtitle="Kami akan segera menangani masalah Anda">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-header bg-primary">
                                <h5 class="mb-0 text-white">Detail Komplain</h5>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-6 fw-bold">Nama:</div>
                                    <div class="col-md-6">{{ $pelapor->nama }}</div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6 fw-bold">Email:</div>
                                    <div class="col-md-6">
                                        {{ $pelapor->email }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6 fw-bold">Status Komplain:</div>
                                    <div class="col-md-6">Menunggu</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 fw-bold">Komplain:</div>
                                    <div class="col-md-6">{{ $komplain->message }}</div>
                                </div>
                            </div>
                        </div>
                </x-feedback>
                @else
                    @if($error)
                        <x-alert type="danger">
                            {{ $error }}
                        </x-alert>
                    @endif

                    <div class="mb-4 mt-4">
                        <div class="progress" style="height: 4px;">
                            <div class="progress-bar bg-primary" role="progressbar"
                                style="width: {{ $step === 1 ? '50%' : '100%' }}"
                                aria-valuenow="{{ $step === 1 ? 50 : 100}}"
                                aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <small class="text-{{ $step === 1 ? 'primary fw-bold' : 'muted' }}">Data Diri</small>
                            <small class="text-{{ $step === 2 ? 'primary fw-bold' : 'muted' }}">Komplain</small>
                        </div>
                    </div>

                    
                    <!-- Form Identitas -->
                    <div class="{{ $step === 1 ? '' : 'd-none' }}">

                    <a href="/" class="btn btn-outline-success mb-2">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>

                    <h4 class="mb-4 text-primary">Data Diri</h4>
                    <div class="card shadow-sm">
                        <div class="card-body p-3 p-md-4">
                            <form wire:submit.prevent="submitDataDiri" class="needs-validation" novalidate>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama </label>
                                    <input type="text" wire:model="nama" id="nama" 
                                           class="form-control @error('nama') is-invalid @enderror">
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email </label>
                                    <input type="email" wire:model="email" id="email" 
                                           class="form-control @error('email') is-invalid @enderror">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label for="whatsapp" class="form-label">WhatsApp</label>
                                    <input type="text" wire:model="whatsapp" id="whatsapp" 
                                           class="form-control @error('whatsapp') is-invalid @enderror"
                                           placeholder="Contoh: 08123456789">
                                    @error('whatsapp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-4">
                                    <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                    <input type="text" wire:model="pekerjaan" id="pekerjaan" 
                                           class="form-control @error('pekerjaan') is-invalid @enderror">
                                    @error('pekerjaan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="d-grid d-md-flex justify-content-md-end">
                                    <button type="submit" class="btn btn-primary">
                                        Selanjutnya <i class="fas fa-arrow-right ms-1"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                    <!-- Form Komplain -->
                <div class="{{ $step === 2 ? '' : 'd-none' }}">
                    <h4 class="mb-3 mb-md-4 text-primary">Komplain</h4>
                    <div class="card shadow-sm">
                        <div class="card-body p-3 p-md-4">
                            <form wire:submit.prevent="submitKomplain" class="needs-validation">
                                <div class="mb-3">
                                    <label for="kategori" class="form-label">Kategori:</label>
                                    <select class="form-select @error('kategori_id') is-invalid @enderror" wire:model="kategori_id" id="kategori">
                                        <option value="" hidden>-- Pilih Kategori --</option>
                                        @foreach ($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                    @error('kategori_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label for="message" class="form-label">Komplain:</label>
                                    <textarea class="form-control @error('message') is-invalid @enderror" id="message" wire:model="message" rows="6"></textarea>
                                    @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label for="bukti" class="form-label">Bukti:</label>
                                    <input type="file" wire:model="bukti" id="bukti" class="form-control @error('bukti') is-invalid @enderror">
                                    @error('bukti')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                
                                <div class="d-flex flex-column flex-md-row gap-2 justify-content-md-between">
                                    <button type="button" wire:click="previousStep" 
                                            class="btn btn-outline-secondary order-2 order-md-1">
                                        <i class="fas fa-arrow-left me-1"></i> Kembali
                                    </button>
                                    <button type="submit" class="btn btn-primary order-1 order-md-2">
                                        <i class="fas fa-paper-plane me-1"></i> Kirim Komplain
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        </div> 
    </div> 
</div> 
