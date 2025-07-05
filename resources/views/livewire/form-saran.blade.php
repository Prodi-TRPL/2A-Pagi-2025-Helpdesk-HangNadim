<div class="container mt-4 flex-grow-1 py-3 py-md-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            
            @if ($success)
                <x-feedback 
                    title="{{ __('messages.thanks_saran') }}"
                    subtitle="{{ __('messages.improve') }}">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header bg-primary">
                            <h5 class="mb-0 text-white">{{ __('messages.detail_saran') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6 fw-bold">{{ __('messages.name') }}</div>
                                <div class="col-md-6">{{ $pelapor->nama }}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6 fw-bold">Email:</div>
                                <div class="col-md-6">{{ $pelapor->email }}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 fw-bold">{{ __('messages.content_suggestion') }}</div>
                                <div class="col-md-6">{{ $saran->message }}</div>
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
                             aria-valuenow="{{ $step === 1 ? 50 : 100 }}" 
                             aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <small class="text-{{ $step === 1 ? 'primary fw-bold' : 'muted' }}">{{ __('messages.personal') }}</small>
                        <small class="text-{{ $step === 2 ? 'primary fw-bold' : 'muted' }}">{{ __('messages.suggestion_form') }}</small>
                    </div>
                </div>

                <!-- Form Data Diri -->
                <div class="{{ $step === 1 ? '' : 'd-none' }}">

                    <a href="/" class="btn btn-outline-success mb-2">
                        <i class="fas fa-arrow-left me-1"></i> {{ __('messages.back') }}
                    </a>

                    <h4 class="mb-4 text-primary">{{ __('messages.personal') }}</h4>
                    <div class="card shadow-sm">
                        <div class="card-body p-3 p-md-4">
                            <form wire:submit.prevent="submitDataDiri" class="needs-validation" novalidate>
                               <div class="row mb-3">
                                    <div class="col-md-6 mb-3">
                                        <label for="nama" class="form-label">{{ __('messages.name') }}</label>
                                        <input type="text" wire:model="nama" id="nama"
                                            class="form-control @error('nama') is-invalid @enderror">
                                        @error('nama')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email:</label>
                                        <input type="email" wire:model="email" id="email"
                                            class="form-control @error('email') is-invalid @enderror">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col-md-6 mb-3">
                                        <label for="whatsapp" class="form-label">{{ __('messages.wa') }}</label>
                                        <input type="text" wire:model="whatsapp" id="whatsapp"
                                            class="form-control @error('whatsapp') is-invalid @enderror"
                                            placeholder="Contoh: 08123456789">
                                        @error('whatsapp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="umur" class="form-label">{{ __('messages.age') }}</label>
                                        <input type="number" wire:model="umur" id="umur"
                                            class="form-control @error('umur') is-invalid @enderror">
                                        @error('umur')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="pekerjaan" class="form-label">{{ __('messages.job') }}</label>
                                    <input type="text" wire:model="pekerjaan" id="pekerjaan"
                                        class="form-control @error('pekerjaan') is-invalid @enderror">
                                    @error('pekerjaan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                               
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label d-block">{{ __('messages.gender') }}</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" wire:model="gender" id="radio1" value="Laki-Laki">
                                            <label class="form-check-label" for="radio1">{{ __('messages.male') }}</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" wire:model="gender" id="radio2" value="Perempuan">
                                            <label class="form-check-label" for="radio2">{{ __('messages.female') }}</label>
                                        </div>
                                        @error('gender')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                  
                                </div>
                                
                                <div class="d-grid d-md-flex justify-content-md-end">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('messages.next') }} <i class="fas fa-arrow-right ms-1"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Form Saran -->
                <div class="{{ $step === 2 ? '' : 'd-none' }}">
                    <h4 class="mb-3 mb-md-4 text-primary">{{ __('messages.suggestion_form') }}</h4>
                    <div class="card shadow-sm">
                        <div class="card-body p-3 p-md-4">
                            <form wire:submit.prevent="submitSaran" class="needs-validation" novalidate>
                                <div class="mb-4">
                                    <label for="saran" class="form-label">
                                        {{ __('messages.fill_suggestion') }}
                                    </label>
                                    <textarea wire:model="message" id="saran" 
                                              class="form-control @error('message') is-invalid @enderror" 
                                              rows="6" placeholder=></textarea>
                                    @error('message')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="bukti" class="form-label">{{ __('messages.opsional') }}</label>
                                    <input type="file" wire:model="bukti" id="bukti" class="form-control @error('bukti') is-invalid @enderror">
                                    @error('bukti')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                
                                <div class="d-flex flex-column flex-md-row gap-2 justify-content-md-between">
                                    <button type="button" wire:click="previousStep" 
                                            class="btn btn-outline-secondary order-2 order-md-1">
                                        <i class="fas fa-arrow-left me-1"></i> {{ __('messages.back') }}
                                    </button>
                                    <button type="submit" class="btn btn-primary order-1 order-md-2">
                                        <i class="fas fa-paper-plane me-1"></i> {{ __('messages.submit') }}
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