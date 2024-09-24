<!-- resources/views/kategori/surat.blade.php -->

@extends('layouts.app') <!-- Ganti dengan layout yang kamu gunakan -->

@section('content')
    <div class="container">
        <h1>Detail Kategori</h1>
        <div class="card">
            <div class="card-header">
                <h5>{{ $kategori->nama }}</h5>
            </div>
            <div class="card-body">
                <h6>ID Kategori:</h6>
                <p>{{ $kategori->id }}</p>

                <h6>Deskripsi:</h6>
                <p>{{ $kategori->deskripsi }}</p>

                <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali ke Daftar Kategori</a>
                <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-primary">Edit Kategori</a>
            </div>
        </div>
    </div>
@endsection
