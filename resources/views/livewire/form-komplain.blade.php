<div class="container mt-4 flex-grow-1 pt-5" >
    <div class="row justify-content-center">
        <div id="formContainer" class="row justify-content-center position-sticky">
            <div class="col-md-9">

        @if ($step === 1)
        <!-- Form Identitas -->
        <h4 class="mt-3 mb-3">Data Diri</h4>
            @if ($success)
                <x-alert type="success">
                    {{ $success }}
                </x-alert>
            @elseif ($error)
                <x-alert type="danger">
                    {{ $error }}
                </x-alert>
            @endif

            <div wire:key="form-identitas" class="bg-light">
                <form wire:submit.prevent="submitDataDiri" class="p-3 border rounded needs-validation" novalidate>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama:</label>
                        <input type="text" wire:model="nama" id="nama" class="form-control @error('nama') is-invalid @enderror">
                        @error('nama')<div class="invalid-feedback">{{$message}}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" wire:model="email" id="email" class="form-control @error('email') is-invalid @enderror">
                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="whatsapp" class="form-label">No. WhatsApp:</label>
                        <input type="tel" wire:model="whatsapp" id="whatsapp" class="form-control @error('whatsapp') is-invalid @enderror">
                        @error('whatsapp')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="pekerjaan" class="form-label">Pekerjaan:</label>
                        <input type="text" wire:model="pekerjaan" id="pekerjaan" class="form-control @error('pekerjaan') is-invalid @enderror">
                        @error('pekerjaan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-info text-white mt-3">Selanjutnya</button>
                    </div>
                </form>
            </div>

            @elseif ($step === 2)
            <!-- Form Komplain -->
            <h4 class="mt-3 mb-3">Isi Komplain</h4>
            <div wire:key="form-komplain" class="bg-light">
                <form wire:submit.prevent="submitKomplain" class="p-3 border rounded needs-validation">
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori:</label>
                        <select class="form-control @error('kategori_id') is-invalid @enderror" wire:model="kategori_id" id="kategori">
                            <option value="" hidden>-- Pilih Kategori --</option>
                            @foreach ($kategoris as $kategori )
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
                        <label for="bukti" class="form-label">Bukti (opsional):</label>
                        <input type="file" wire:model="bukti" id="bukti" class="form-control @error('bukti') is-invalid @enderror">
                        @error('bukti')<div class="invalid-feedback">{{ $message }}@enderror
                        
                        @if ($bukti)
                            @if (\Illuminate\Support\Str::startsWith($bukti->getMimeType(), 'image/'))
                                <img src="{{ $bukti->temporaryUrl() }}" class="mt-3" style="max-width: 300px; max-height: 200px; height: auto; width: auto;" />
                            @endif
                        @endif
                        
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <button type="button" wire:click="previousStep" class="btn btn-secondary me-2">Kembali</button>
                        <button type="submit" class="btn btn-info text-white">Kirim</button>
                    </div>
                </form>
            </div>
            @endif

            </div>
        </div>
    </div>
</div>