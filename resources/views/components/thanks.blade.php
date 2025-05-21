@props(['title', 'image' => 'thankya.svg', 'subtitle','back' => 'home'])

<div class="bg-light p-4 border rounded text-center my-5">
    <div class="mb-4">
        <img src="{{asset($image)}}" alt="Terima Kasih" class="img-fluid" style="max-height: 100px;">
    </div>
                        
    <h3 class="text-info mb-3">{{ $title }}</h3>
    <p class="lead text-secondary mb-4">{{ $subtitle }}.</p>
    
    {{$slot}}
    
    <div class="mt-4">
        <a href="{{ route($back ) }}" class="btn btn-info text-white">Kembali ke Dashboard</a>
    </div>
</div>