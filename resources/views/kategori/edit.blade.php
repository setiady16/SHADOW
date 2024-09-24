<!-- resources/views/kategori/edit.blade.php -->

@extends('layouts.app') <!-- Ganti dengan layout yang kamu gunakan -->

@section('content')
    <div class="container">
        <h1>Edit Kategori</h1>
        <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Menambahkan metode PUT untuk mengupdate data -->

            <div class="form-group">
                <label for="id">ID Kategori</label>
                <input type="text" class="form-control" id="id" name="id" value="{{ $kategori->id }}" readonly>
            </div>

            <div class="form-group">
                <label for="nama">Nama Kategori</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $kategori->nama }}" required>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ $kategori->deskripsi }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
