@extends('layouts.app1')

@section('content')
    <div class="container">
        <h1>Buat Kategori Baru</h1>
        <form action="{{ route('kategori.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="id">ID Kategori</label>
                <input type="text" class="form-control" id="id" name="id" required>
            </div>

            <div class="form-group">
                <label for="nama">Nama Kategori</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>

            <div class="form-group mb-2">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
        </form>

        <!-- Tautan untuk mengekspor ke PDF -->
        <a href="{{ route('kategori.exportPdf') }}" class="btn btn-info mt-3">Ekspor ke PDF</a>
    </div>
@endsection
