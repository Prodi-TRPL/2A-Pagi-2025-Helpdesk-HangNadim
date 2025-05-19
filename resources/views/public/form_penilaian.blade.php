@extends('layout.app') 
@section('content')     
    <div id="formContainer" class="row justify-content-center position-sticky">         
        <div class="col-md-9">             
            @if ($komplain->penilaian)
                <div class="bg-light p-4 border rounded text-center my-5">
                    <div class="mb-4">
                        <img src="{{asset('thankya.svg')}}" alt="Terima Kasih" class="img-fluid" style="max-height: 100px;">
                    </div>
                                        
                    <h3 class="text-info mb-3">Terima Kasih Atas Penilaian Anda!</h3>
                    <p class="lead text-secondary mb-4">Masukan Anda sangat berarti untuk peningkatan layanan kami.</p>
                    
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header bg-light">
                            <h5 class="mb-0">Detail Penilaian</h5>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6 fw-bold">Tiket:</div>
                                <div class="col-md-6">{{ $komplain->tiket }}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6 fw-bold">Nama:</div>
                                <div class="col-md-6">{{ $komplain->pelapor->nama }}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6 fw-bold">Tingkat Kepuasan:</div>
                                <div class="col-md-6">
                                    {{ $komplain->penilaian->rating_text}}
                                </div>
                            </div>
                            @if($komplain->penilaian->feedback)
                            <div class="row">
                                <div class="col-md-6 fw-bold">Komentar:</div>
                                <div class="col-md-6">{{ $komplain->penilaian->feedback }}</div>
                            </div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <a href="{{ route('dashboard' ) }}" class="btn btn-info text-white">Kembali ke Dashboard</a>
                    </div>
                </div>
                
            @elseif(!$komplain->penilaian)             
                <h4 class="mt-3 mb-3">Rating</h4>                                              
                <div class="mb-3">                 
                    <h4>Penilaian untuk Tiket: {{ $komplain->tiket }}</h4>                   
                    <p>Nama: {{ $komplain->pelapor->nama }}</p>             
                </div>                 
                <div class="bg-light">                     
                    <form method="POST" action="{{route('penilaian.submit', $komplain->tiket)}}" class="p-3 border rounded needs-validation" novalidate>                         
                        @csrf                         
                        <div class="mb-3">                             
                            <label for="rating" class="form-label">Tingkat kepuasan:</label>                             
                            <select name="rating" id="rating" class="form-control @error('rating') is-invalid @enderror">                                 
                                <option value="" hidden>Tingkat Kepuasan </option>                                 
                                @foreach(\App\Models\Penilaian::ratingOptions() as $value => $label)                                     
                                    <option value="{{ $value }}"  {{ old('rating') == $value ? 'selected' : '' }}>{{ $label }}</option>                                 
                                @endforeach                             
                            </select>                             
                            @error('rating')<div class="invalid-feedback">{{ $message }}</div>@enderror                         
                        </div>                          
                        <div class="mb-3">                             
                            <label for="feedback" class="form-label">Komentar:</label>                             
                            <textarea name="feedback" id="feedback" class="form-control @error('feedback') is-invalid @enderror"  rows="6"></textarea>                             
                            @error('feedback')<div class="invalid-feedback">{{ $message }}</div>@enderror                         
                        </div>                          
                        <div class="d-flex justify-content-end">                             
                            <button type="submit" class="btn btn-primary">Kirim Penilaian</button>                         
                        </div>                     
                    </form>                 
                </div>     
            @endif 
        </div>
    </div>
@endsection