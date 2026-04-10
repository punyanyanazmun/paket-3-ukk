@extends('layouts.app')

@section('title', 'Tracking Aspirasi')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="card mb-4">
            <div class="card-header">
                <h4>Tracking Aspirasi</h4>
            </div>
            <div class="card-body">
                <form action="/tracking" method="GET" class="row g-3">
                    <div class="col-md-9">
                        <label for="nama_siswa" class="form-label">Cari Nama Siswa</label>
                        <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="{{ old('nama_siswa', $namaSiswa ?? '') }}" placeholder="Masukkan nama siswa (kosongkan untuk semua)">
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100">Tampilkan Data</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5>Hasil Tracking</h5>
            </div>
            <div class="card-body">
                @if(!empty($trackingData) && $trackingData->count())
                    <p class="text-muted small mb-3">Menampilkan histori aspirasi siswa secara umum. Gunakan pencarian untuk memfilter berdasarkan nama.</p>
                    <div class="table-responsive" style="max-height:420px; overflow:auto;">
                        <table class="table table-bordered table-striped table-sm align-middle">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Siswa</th>
                                    <th>Isi Aspirasi</th>
                                    <th>Kategori</th>
                                    <th>Status</th>
                                    <th>Feedback</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($trackingData as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->nama_siswa }}</td>
                                        <td>{{ $item->isi_aspirasi }}</td>
                                        <td>{{ $item->nama_kategori }}</td>
                                        <td>
                                            @if($item->status == 'pending')
                                                <span class="badge bg-secondary">Menunggu</span>
                                            @elseif($item->status == 'proses')
                                                <span class="badge bg-warning">Sedang Diperbaiki</span>
                                            @else
                                                <span class="badge bg-success">Selesai</span>
                                            @endif
                                        </td>
                                        <td>{!! nl2br(e($item->feedback_all ?? '-')) !!}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center text-muted">
                        <p>Tidak ada data aspirasi saat ini.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection