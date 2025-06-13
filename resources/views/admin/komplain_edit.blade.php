@extends('layout.admin')
@section('content')

<h4 class="mb-3 mb-md-4 text-primary">Komplain</h4>
<div class="card shadow-sm">
    <div class="card-body p-3 p-md-4">
        <form class="needs-validation">
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori:</label>
                <select class="form-control @error('kategori_id') is-invalid @enderror" id="kategori" name="kategori_id">
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}"
                            {{ ($komplains->kategori && $komplains->kategori->id == $kategori->id) ? 'selected' : '' }}>
                            {{ $kategori->nama_kategori }}
                        </option>
                    @endforeach
                </select>
                @error('kategori_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status:</label>
                <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                      <option value="Menunggu" {{ $komplains->status == 'Menunggu' ? 'selected' : ''}}>Menunggu</option>
                      <option value="Diproses"{{ $komplains->status == 'Diproses' ? 'selected' : ''}}>Diproses</option>
                      <option value="Selesai" {{ $komplains->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>

            <div class="d-flex flex-column flex-md-row gap-2 justify-content-md-between">
                <a href="{{ route('komplain') }}"
                        class="btn btn-outline-secondary order-2 order-md-1">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
                <button type="submit" class="btn btn-primary order-1 order-md-2">
                    <i class="fas fa-paper-plane me-1"></i> Kirim Saran
                </button>
            </div>
        </form>
    </div>
</div>
@endsection