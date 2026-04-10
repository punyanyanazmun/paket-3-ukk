@extends('layouts.app')

@section('title', 'Form Aspirasi')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card custom-card">
            <div class="page-card-header">
                <i class="fas fa-file-alt me-2"></i> Form Aspirasi Siswa
            </div>
            <div class="card-body p-4 p-sm-5">
                <form action="/aspirasi" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="nama_siswa" class="form-label">Nama Siswa</label>
                        <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" placeholder="Masukkan nama siswa" required>
                    </div>
                    <div class="mb-4">
                        <label for="kategori_id" class="form-label">Kategori Aspirasi</label>
                        <select class="form-select" id="kategori_id" name="kategori_id" required>
                            <option value="">Pilih Kategori</option>
                            @foreach($kategori as $kat)
                                <option value="{{ $kat->id }}">{{ $kat->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="isi_aspirasi" class="form-label">Isi Aspirasi</label>
                        <textarea class="form-control" id="isi_aspirasi" name="isi_aspirasi" rows="6" placeholder="Tuliskan aspirasi Anda di sini..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-2">Kirim Aspirasi</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection