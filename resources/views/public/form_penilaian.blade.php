@extends('layout.app') 
@section('content')     
<div class="container my-4"> 
  <div class="row justify-content-center">
    <div class="col-12 col-md-9"> 
        
            @if ($komplain->penilaian)
            <x-feedback 
            title="Terima Kasih Atas Penilaian Anda!"
            subtitle="Masukan Anda sangat berarti untuk peningkatan layanan kami.">
            <div class="card mb-4 shadow-sm w-100"> 
                <div class="card-header bg-primary">
                            <h5 class="mb-0 text-white">Detail Penilaian</h5>
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
            </x-feedback>
            
            @elseif(!$komplain->penilaian)             
            <div class="container pt-5 mt-4">
                <div class="mb-4">                 
                    <h4>Penilaian untuk Tiket: <span class="text-primary"> {{ $komplain->tiket }} </span> </h4>                   
                </div>                 
                <div class="bg-light mb-4">                     
                    <form method="POST" action="{{route('penilaian.submit', $komplain->tiket)}}" class="p-3 border rounded needs-validation" novalidate>                         
                        @csrf                         
                        <div class="mb-3">                             
                            <label for="rating" class="form-label">Tingkat kepuasan:</label>                             
                            <select name="rating" id="rating" class="form-select @error('rating') is-invalid @enderror">                                 
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