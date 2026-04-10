@extends('layouts.app')

@section('title', 'List Aspirasi')

@section('content')
<div class="row gy-4">
    @include('partials.sidebar')
    <div class="col-lg-9">
        <div class="d-flex flex-column flex-md-row align-items-start justify-content-between mb-4 gap-3">
            <div>
                <h2 class="mb-1">Dashboard Admin</h2>
                <p class="text-muted">Status & histori aspirasi siswa</p>
            </div>
        </div>

        <div class="card custom-card mb-4">
            <div class="page-card-header">Filter Aspirasi</div>
            <div class="card-body">
                <form method="GET" action="/aspirasi" class="row g-3">
                    <div class="col-sm-6 col-lg-3">
                        <label for="tanggal" class="form-label">Filter Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ request('tanggal') }}">
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <label for="kategori_id" class="form-label">Filter Kategori</label>
                        <select class="form-select" id="kategori_id" name="kategori_id">
                            <option value="">Semua Kategori</option>
                            @foreach($kategori as $kat)
                                <option value="{{ $kat->id }}" {{ request('kategori_id') == $kat->id ? 'selected' : '' }}>{{ $kat->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <label for="status" class="form-label">Filter Status</label>
                        <select class="form-select" id="status" name="status">
                            <option value="">Semua Status</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Diajukan</option>
                            <option value="proses" {{ request('status') == 'proses' ? 'selected' : '' }}>Diproses</option>
                            <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                    </div>
                    <div class="col-sm-6 col-lg-3 d-flex align-items-end gap-2">
                        <button type="submit" class="btn btn-primary w-100">Apply</button>
                        <a href="/aspirasi" class="btn btn-secondary w-100">Reset</a>
                    </div>
                </form>
            </div>
        </div>

        <div class="card custom-card">
            <div class="page-card-header">Daftar Aspirasi</div>
            <div class="card-body">
                <div class="table-responsive" style="max-height:420px; overflow:auto;">
                    <table class="table align-middle mb-0 table-sm">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Kategori</th>
                                <th>Isi Aspirasi</th>
                                <th>Status</th>
                                <th class="text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($aspirasi as $index => $asp)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $asp->nama_siswa }}</td>
                                    <td>{{ $asp->nama_kategori }}</td>
                                    <td>{{ Str::limit($asp->isi_aspirasi, 60) }}</td>
                                    <td>
                                        @if($asp->status == 'pending')
                                            <span class="badge badge-status-pending">Diajukan</span>
                                        @elseif($asp->status == 'proses')
                                            <span class="badge badge-status-proses">Diproses</span>
                                        @else
                                            <span class="badge badge-status-selesai">Selesai</span>
                                        @endif
                                        @if(!empty($asp->progres))
                                            <div class="small text-muted mt-1">{{ $asp->progres }}</div>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                Aksi
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li>
                                                    <form action="/aspirasi/status/{{ $asp->id }}" method="POST" class="d-inline">
                                                        @csrf
                                                        <input type="hidden" name="status" value="proses">
                                                        <button type="submit" class="dropdown-item">Ubah ke Diproses</button>
                                                    </form>
                                                </li>
                                                <li>
                                                    <form action="/aspirasi/status/{{ $asp->id }}" method="POST" class="d-inline">
                                                        @csrf
                                                        <input type="hidden" name="status" value="selesai">
                                                        <button type="submit" class="dropdown-item">Ubah ke Selesai</button>
                                                    </form>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#progressModal{{ $asp->id }}">Update Progres</a>
                                                </li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#feedbackModal{{ $asp->id }}">Tambah Feedback</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal Progress -->
                                <div class="modal fade" id="progressModal{{ $asp->id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Update Progres</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <form action="/aspirasi/progres/{{ $asp->id }}" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="status{{ $asp->id }}" class="form-label">Status</label>
                                                        <select class="form-select" id="status{{ $asp->id }}" name="status">
                                                            <option value="">Biarkan</option>
                                                            <option value="pending">Diajukan</option>
                                                            <option value="proses">Diproses</option>
                                                            <option value="selesai">Selesai</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="progres{{ $asp->id }}" class="form-label">Progres</label>
                                                        <input type="text" class="form-control" id="progres{{ $asp->id }}" name="progres" value="{{ $asp->progres }}" placeholder="Contoh: Sedang diperbaiki" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Simpan Progres</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Feedback -->
                                <div class="modal fade" id="feedbackModal{{ $asp->id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Tambah Feedback</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <form action="/feedback/{{ $asp->id }}" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="isi_feedback{{ $asp->id }}" class="form-label">Isi Feedback</label>
                                                        <textarea class="form-control" id="isi_feedback{{ $asp->id }}" name="isi_feedback" rows="3" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection