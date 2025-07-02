@props([
    'title',
    'image' => 'complete.svg',
    'subtitle',
    'back' => 'home',
    'card' => true,
    'showImage' => true,
    'showButton' => true,
])

@if ($card)
<div class="bg-light p-4 border rounded text-center my-5">
@else
<div class="my-3 text-center">
@endif

    @if ($showImage && $image)
    <div class="mb-4">
        <img src="{{ asset('img/'. $image) }}" alt="Gambar" class="img-fluid" style="max-height: 100px;">
    </div>
    @endif
                        
    @if ($title)
    <h3 class="text-primary mb-3">{{ $title }}</h3>
    @endif

    @if ($subtitle)
    <p class="lead text-secondary mb-4">{{ $subtitle }}</p>
    @endif
    
    {{ $slot }}

    @if ($showButton && $back)
    <div class="mt-4">
        <a href="{{ route($back) }}" class="btn btn-outline-primary">
            {{ __('messages.home_back') }}<i class="fas fa-arrow-right ms-2"></i> 
        </a>
    </div>
    @endif

</div>
