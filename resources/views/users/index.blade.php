@extends('index')
@section('content')
    <main class="main-content position-relative border-radius-lg">
        <div class="container mt-5">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">Daftar Pengguna</h3>
                    <a href="{{ route('users.create') }}" class="btn btn-light float-right">Tambah Pengguna Baru</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover text-center align-middle">
                        <thead class="bg-light">
                        <tr>
                            <th>ID</th>
                            <th>Nama Pengguna</th>
                            <th>Email</th>
                            <th>Peran</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                <span class="badge {{ $user->role == 'admin' ? 'bg-success' : 'bg-secondary' }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                                </td>
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-muted">
                    <p class="mb-0">Total Pengguna: {{ $users->count() }}</p>
                </div>
            </div>
        </div>
    </main>
@endsection
