@extends('layout.admin')
@section('content')
@section('navbar', 'Daftar Komplain')

@if(session('success'))
  <x-alert type="success">
    {{ session('success') }}</x-alert>
@endif

<div class="d-sm-flex align-items-center justify-content-between mb-3">
  <h1 class="h3 mb-0 fw-bold text-gray-900 ps-3">Daftar Komplain</h1>
</div>

<div class="card shadow">
      <div class="card-body">
        
        <div class="table-responsive">
          <table id="tabel-komplain" class="table table-bordered table-striped dt-responsive nowrap" style="width:100%">
            <thead class="table-primary">
              <tr>
                <th class="text-center">No Tiket</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Kategori</th>
                <th class="text-center">Tanggal Masuk</th>
                <th class="text-center">Tingkatan</th>
                <th class="text-center">Status</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($komplains as $komplain)
              <tr>
                <td>{{ $komplain->tiket }}</td>
                <td>{{ $komplain->pelapor->nama }}</td>
                <td>{{ $komplain->kategori->nama_kategori }}</td>
                <td>{{ $komplain->created_at->format('Y-m-d') }}</td>

                <td>
                  <select
                    class="form-select form-select-sm"
                    onchange="showModal(this)"
                    data-komplain-id="{{ $komplain->id }}"
                    data-current-tingkat="{{ $komplain->tingkat }}">
                    <option value="Rendah" {{ $komplain->tingkat == 'Rendah' ? 'selected' : '' }}>Rendah</option>
                    <option value="Sedang" {{ $komplain->tingkat == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                    <option value="Tinggi" {{ $komplain->tingkat == 'Tinggi' ? 'selected' : '' }}>Tinggi</option>
                  </select>
                </td>

                <td>
                  <form action="{{ route('update.status.tingkat', $komplain->id) }}" method="POST">
                    @csrf @method('PATCH')
                    <select name="status" class="form-select form-select-sm" onchange="this.form.submit()" @if(auth()->user()->role == 'Direktur') disabled @endif>
                      <option value="Menunggu" {{ $komplain->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                      <option value="Diproses" {{ $komplain->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                      <option value="Selesai" {{ $komplain->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                  </form>
              </td>
                
              <td class="text-center">
                <a href="{{ route('komplain.edit', $komplain->id) }}" class="btn btn-warning btn-sm @if(auth()->user()->role == 'Direktur') disabled @endif"><i class="fas fa-edit"></i></a>
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $komplain->id }}"><i class="fas fa-info-circle"></i></button>
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalRiwayat{{ $komplain->id }}"><i class="fas fa-clock"></i></button>
              </td>

              </tr>

              <x-modal id="modalDetail{{ $komplain->id }}" title="Detail Komplain">
                <div class="mb-3">
                    <strong>Status Penumpang:</strong>
                    <p class="text-muted">{{ $komplain->penumpang_text }}</p>
                </div>
                
                @if ($komplain->is_penumpang)
                  <div class="mb-3">
                    <strong>Maskapai:</strong>
                    <p class="text-muted">{{ $komplain->maskapai }}</p>
                  </div>
                  
                  <div class="mb-3">
                    <strong>Nomor Penerbangan:</strong>
                    <p class="text-muted">{{ ($komplain->no_penerbangan) }}</p>
                  </div>
                @endif

                <div class="mb-3">
                    <strong>Email:</strong>
                    <p class="text-muted">{{ $komplain->pelapor->email }}</p>
                </div>

                <div class="mb-3">
                    <strong>Whatsapp:</strong>
                    <p class="text-muted">{{ $komplain->pelapor->whatsapp }}</p>
                </div>

                <div class="mb-3">
                    <strong>Pekerjaan:</strong>
                    <p class="text-muted">{{ $komplain->pelapor->pekerjaan }}</p>
                </div>

                  <div class="mb-3">
                      <strong>Komplain:</strong>
                      <p class="text-danger">{{ $komplain->message }}</p>
                  </div>

                  <div class="mb-3">
                      <strong>Terakhir diubah oleh:</strong>
                      <p class="text-muted">{{ $komplain->user->name ?? '-'}}</p>
                  </div>

                  <div class="mb-3">
                      <strong>Bukti:</strong>
                    <div class="d-flex justify-content-center">
                      <a href="{{ asset('storage/' . $komplain->bukti) }}" target="_blank">
                          <img src="{{ asset('storage/' . $komplain->bukti) }}"
                              alt="Bukti Komplain"
                              class="img-fluid rounded shadow-sm"
                              style="max-width: 100%; max-height: 400px; object-fit: contain;">
                      </a>
                    </div>
                  </div>

              </x-modal>

              {{-- Modal Riwayat --}}
              <x-modal id="modalRiwayat{{ $komplain->id }}" title="Riwayat Komplain">
                  <p class="text-primary"><strong>Riwayat Komplain dengan tiket: {{$komplain->tiket}}</strong></p>
                
                    @foreach($komplain->histories as $history)
                    <div class="border-bottom border-primary p-3 mb-3 rounded">
                        <p><strong>{{ $history->created_at->format('d M Y H:i') }}</strong></p>
                        <strong>Riwayat</strong>
                        <p> {{ $history->riwayat ?? '-'}}</p>
                        <strong>Catatan Perubahan</strong>
                        <p> {{ $history->catatan_perubahan ?? '-' }}</p>
                        <p><strong>Diubah oleh:</strong> {{ $history->changer->name ?? '-'}}</p>
                    </div>
                    @endforeach

              </x-modal>

           {{-- Modal Catatan --}}
            <div class="modal fade" id="modalTingkat" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog">
                <form id="formTingkat" method="POST">
                  @csrf
                  @method('PATCH')
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Catatan Perubahan Tingkat</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                      <input type="hidden" name="tingkat" id="tingkatBaru">
                      <div class="mb-3">
                        <label class="form-label">Catatan Perubahan</label>
                        <textarea name="catatan_perubahan" id="catatan_perubahan" class="form-control @error('catatan_perubahan') is-invalid @enderror"></textarea>
                        @error('catatan_perubahan') <div class="invalid-feedback">{{$message}}</div> @enderror
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-primary"><i class="fas fa-pen"></i> Simpan</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>

              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

@push('scripts')

  <script>
    let modal = new bootstrap.Modal(document.getElementById('modalTingkat'));
    let selectedElement = null;
    let oldValue = '';
    let newValue = '';

    function showModal(selectEl) {
      oldValue = selectEl.dataset.currentTingkat;
      newValue = selectEl.value;
      if (newValue === oldValue) return;

      selectedElement = selectEl;

      const komplainId = selectEl.dataset.komplainId;
      const route = `{{ route('update.status.tingkat', ':id') }}`.replace(':id', komplainId);

      document.getElementById('formTingkat').action = route;
      document.getElementById('tingkatBaru').value = newValue;
      document.getElementById('catatan_perubahan').value = '';

      modal.show();
    }

    document.getElementById('modalTingkat').addEventListener('hidden.bs.modal', function () {
      if (selectedElement) {
        selectedElement.value = oldValue;
      }
    });
</script>


  <script>
        $(document).ready(function () {
      $('#tabel-komplain').DataTable({
        responsive: true,
        ordering: false,
        language: {
          search: "Cari:",
          lengthMenu: "Tampilkan _MENU_ data",
          info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
          paginate: {
            first: "Pertama",
            last: "Terakhir",
            next: "→",
            previous: "←"
          },
          zeroRecords: "Tidak ada data ditemukan"
        }
      });
    });
  </script>
    @endpush
@endsection