@extends('layouts.app1') <!-- Menggunakan layout yang sudah ada -->

@section('title', 'Profile') <!-- Menetapkan judul halaman -->

@section('content')
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h1 class="card-title">Profile</h1>
            </div>
            <div class="card-body">
                <h5 class="card-title">Welcome, {{ Auth::user()->name }}</h5> <!-- Menampilkan nama pengguna -->
                <p class="card-text"><strong>Email:</strong> {{ Auth::user()->email }}</p> <!-- Menampilkan email pengguna -->
                <p class="card-text"><strong>Username:</strong> {{ Auth::user()->username }}</p> <!-- Menampilkan username pengguna -->

                <div class="mt-4">
                    <a href="{{ route('users.edit', Auth::user()->id) }}" class="btn btn-warning">Edit Profile</a> <!-- Tombol untuk mengedit profil -->
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;"> <!-- Form untuk logout -->
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button> <!-- Tombol untuk logout -->
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
