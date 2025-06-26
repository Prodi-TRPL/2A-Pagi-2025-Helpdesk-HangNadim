@extends('layout.admin')
@section('content')

<h4 class="mb-2 text-primary">Komplain</h4>
<div class="card shadow-sm mb-4">
    <div class="card-body p-3 p-md-4">
        <form action="{{ route('komplain.update', $komplain->id) }}" class="needs-validation" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori:</label>
                <select class="form-select @error('kategori_id') is-invalid @enderror" id="kategori" name="kategori_id">
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" {{ $kategori->id == $komplain->kategori_id ? 'selected' : '' }}>
                            {{ $kategori->nama_kategori }}
                        </option>
                    @endforeach
                </select>
                @error('kategori_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status:</label>
                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                      <option value="Menunggu" {{ $komplain->status == 'Menunggu' ? 'selected' : ''}}>Menunggu</option>
                      <option value="Diproses"{{ $komplain->status == 'Diproses' ? 'selected' : ''}}>Diproses</option>
                      <option value="Selesai" {{ $komplain->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                    @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </select>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Tingkatan:</label>
                <select class="form-select @error('tingkat') is-invalid @enderror" id="tingkat" name="tingkat">
                      <option value="Rendah" {{ $komplain->tingkat == 'Rendah' ? 'selected' : ''}}>Rendah</option>
                      <option value="Sedang"{{ $komplain->tingkat == 'Sedang' ? 'selected' : ''}}>Sedang</option>
                      <option value="Tinggi" {{ $komplain->tingkat == 'Tinggi' ? 'selected' : '' }}>Tinggi</option>
                    @error('tingkat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </select>
            </div>


            <div class="mb-3">
                <label for="catatan" class="form-label">Catatan Perubahan:</label>
                <textarea class="form-control @error('catatan_perubahan') is-invalid @enderror" id="catatan" name="catatan_perubahan" rows="1"></textarea>
                @error('catatan_perubahan')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi Penyelesaian:</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi_penyelesaian" rows="6">{{ $komplain->deskripsi_penyelesaian }}</textarea>
            </div>

            <div class="mb-3">
                <label for="penyelesaian" class="form-label">Bukti Penyelesaian:</label>
                <input type="file" id="penyelesaian" name="bukti_penyelesaian" class="form-control @error('bukti_penyelesaian') is-invalid @enderror">
                @error('bukti_penyelesaian')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="d-flex flex-column flex-md-row gap-2 justify-content-md-between">
                <a href="{{ route('komplain') }}"
                        class="btn btn-outline-secondary order-2 order-md-1">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
                <button type="submit" class="btn btn-primary order-1 order-md-2">
                    <i class="fas fa-edit me-1"></i> Perbarui
                </button>
            </div>
        </form>
    </div>
</div>
@endsection