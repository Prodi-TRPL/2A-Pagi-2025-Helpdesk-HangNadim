<div class="container mt-4 flex-grow-1 pt-5" >
    <div class="row justify-content-center">
        <div id="formContainer" class="row justify-content-center position-sticky">
            <div class="col-md-9">

                @if ($success)
                <x-feedback 
                title="Terima Kasih Sarannya!"
                subtitle="Kami akan mempertimbangkan saran Anda.">
                {{ $success }}
            </x-alert>
            @else 
            @if($error)
            <x-alert type="danger">
                {{ $error }}
            </x-alert>
            @endif
            
            <!-- Form Identitas -->
            <h4 class="mt-3 mb-3 {{ $step === 1 ? 'text-primary' : 'd-none' }}">Data Diri</h4>
            <div wire:key="form-identitas" class="bg-light {{ $step === 1 ? '' : 'd-none'}}">
                <form wire:submit.prevent="submitDataDiri" class="p-3 border rounded needs-validation" novalidate>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama:</label>
                    <input type="text" wire:model="nama" id="nama" class="form-control @error('nama') is-invalid @enderror">
                    @error('nama')<div class="invalid-feedback">{{ $message }}@enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" wire:model="email" id="email" class="form-control @error('email') is-invalid @enderror">
                    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    <label for="whatsapp" class="form-label">WhatsApp:</label>
                    <input type="text" wire:model="whatsapp" id="whatsapp" class="form-control @error('whatsapp') is-invalid @enderror">
                    @error('whatsapp')<div class="invalid-feedback">{{ $message }}@enderror
                    </div>
                    <div class="mb-3">
                        <label for="pekerjaan" class="form-label">Pekerjaan:</label>
                        <input type="text" wire:model="pekerjaan" id="pekerjaan" class="form-control @error('pekerjaan') is-invalid @enderror">
                        @error('pekerjaan')<div class="invalid-feedback">{{ $message }}@enderror
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-info text-white mt-3 ">Selanjutnya</button>
                        </div>
                    </form>
                </div>
                
                <h4 class="mt-3 mb-3 {{ $step === 2 ? 'text-primary' : 'd-none' }}">Saran</h4>
                <div wire:key="form-saran" class="bg-light {{ $step === 2 ? '' : 'd-none' }}">
                    <form wire:submit.prevent="submitSaran" class="p-3 border rounded needs-validation" novalidate>
                        <div class="mb-3 bg-light-subtle">
                            <label for="saran" class="form-label">Saran:</label>
                            <textarea wire:model="message" id="saran" class="form-control @error('message') is-invalid @enderror" rows="6" ></textarea>
                            @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="d-flex justify-content-end mt-3">
                            <button type="button" wire:click="previousStep" class="btn btn-secondary me-2">Kembali</button>
                            <button type="submit" class="btn btn-info text-white">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>