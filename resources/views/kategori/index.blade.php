<!-- resources/views/kategori/index.blade.php -->

@extends('index')

@section('content')
    <main class="main-content position-relative border-radius-lg">
        <div class="container mt-5">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h1 class="card-title">Daftar Kategori</h1>
                    <a href="{{ route('kategori.create') }}" class="btn btn-light float-right">Tambah Kategori Baru</a>

                </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover text-center align-middle">
                            <thead class="bg-light">
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
                </div>
            </div>
        </main>
@endsection
