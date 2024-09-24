<!-- resources/views/kategori/export.blade.php -->

@extends('layouts.app') <!-- Ganti dengan layout yang kamu gunakan -->

@section('content')
    <div class="container">
        <h1>Ekspor Kategori</h1>

        <form action="{{ route('kategori.export') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="format">Pilih Format Ekspor:</label>
                <select name="format" id="format" class="form-control" required>
                    <option value="">-- Pilih Format --</option>
                    <option value="csv">CSV</option>
                    <option value="excel">Excel</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Ekspor</button>
        </form>

        <a href="{{ route('kategori.index') }}" class="btn btn-secondary mt-3">Kembali ke Daftar Kategori</a>
    </div>
@endsection
