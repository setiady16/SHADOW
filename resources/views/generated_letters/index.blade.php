@extends('index')
@section('content')
    <main class="main-content position-relative border-radius-lg">
        <div class="container mt-5">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">Daftar Surat yang Dihasilkan</h3>
                    <a href="{{ route('generated_letters.create') }}" class="btn btn-light float-right">Tambah Surat yang Dihasilkan Baru</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover text-center align-middle">
                        <thead class="bg-light">
                        <tr>
                            <th>ID</th>
                            <th>Surat</th>
                            <th>Konten yang Dihasilkan</th>
                            <th>Dihasilkan Pada</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($generated_letters as $generatedLetter)
                            <tr>
                                <td>{{ $generatedLetter->id }}</td>
                                <td>{{ $generatedLetter->letter->title }}</td>
                                <td>{{ $generatedLetter->generated_content }}</td>
                                <td>{{ $generatedLetter->generated_at }}</td>
                                <td>
                                    <a href="{{ route('generated_letters.edit', $generatedLetter->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('generated_letters.destroy', $generatedLetter->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus surat ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-muted">
                    <p class="mb-0">Total Surat yang Dihasilkan: {{ $generated_letters->count() }}</p>
                </div>
            </div>
        </div>
    </main>
@endsection
