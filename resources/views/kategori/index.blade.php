@extends('index')

@section('content')
    <main class="main-content position-relative border-radius-lg">
        <div class="container mt-5">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">Daftar Kategori</h3>
                    <a href="{{ route('kategori.create') }}" class="btn btn-light float-right">Tambah Kategori Baru</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover text-center align-middle">
                        <thead class="bg-light">
                        <tr>
                            <th>NO</th>
                            <th>Nama Kategori</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $no = 0;
                        @endphp
                        @foreach($kategori as $item)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td>
                                    <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('kategori.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus kategori ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-muted">
                    <p class="mb-0">Total Kategori: {{ $kategori->count() }}</p>
                </div>
            </div>
        </div>
    </main>
@endsection
