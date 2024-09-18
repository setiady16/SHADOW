@extends('index')

@section('content')
    <main class="main-content position-relative border-radius-lg">
        <div class="container mt-5">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">Detail Pengguna</h3>
                    <a href="{{ route('users.index') }}" class="btn btn-light float-right">Kembali ke Daftar Pengguna</a>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="username" class="form-label">Nama Pengguna</label>
                        <p class="form-control-plaintext">{{ $user->username }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <p class="form-control-plaintext">{{ $user->email }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Peran</label>
                        <p class="form-control-plaintext">
                        <span class="badge {{ $user->role == 'admin' ? 'bg-success' : 'bg-secondary' }}">
                            {{ ucfirst($user->role) }}
                        </span>
                        </p>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <p class="mb-0">ID Pengguna: {{ $user->id }}</p>
                </div>
            </div>
        </div>
    </main>
@endsection
