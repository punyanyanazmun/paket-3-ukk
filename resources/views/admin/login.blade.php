@extends('layouts.app')

@section('title', 'Login Admin')

@section('content')
<div class="d-flex align-items-center justify-content-center min-vh-100 py-5">
    <div class="card card-login">
        <div class="login-header">
            <div class="mb-3">
                <i class="fas fa-school fa-2x"></i>
            </div>
            <h4>Aplikasi Pengaduan Sarana Sekolah</h4>
            <p>Masuk untuk mengelola aspirasi dan memberikan umpan balik.</p>
        </div>
        <div class="card-body p-4 p-sm-5">
            <form action="/login" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100 py-2">Login</button>
            </form>
        </div>
    </div>
</div>
@endsection