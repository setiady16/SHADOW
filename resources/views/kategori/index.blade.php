<!-- resources/views/kategori/index.blade.php -->

@extends('layouts.app') <!-- Ganti dengan layout yang kamu gunakan -->

@section('content')
    <div class="container">
        <h1>Daftar Kategori</h1>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($kategori as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td>
                        <!-- Tambahkan aksi edit dan delete di sini -->
                        <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('kategori.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
