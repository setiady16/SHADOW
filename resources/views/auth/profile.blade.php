@extends('layouts.app1')

@section('content')
    <div class="container">
        <h2>Profile</h2>
        <p>Welcome, {{ Auth::user()->name }}!</p>
        <!-- Tambahkan informasi profil lainnya di sini -->
    </div>
@endsection
