@extends('layouts.app1')

@section('content')
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h1 class="card-title">Edit Template</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('templates.update', $template->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Nama Template -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Template</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $template->name }}" required>
                    </div>

                    <!-- Konten Template -->
                    <div class="mb-3">
                        <label for="content" class="form-label">Konten Template</label>
                        <textarea class="form-control" id="content" name="content" rows="5" required>{{ $template->content }}</textarea>
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex">
                        <button type="submit" class="btn btn-success me-2">Update</button>
                        <a href="{{ route('templates.index') }}" class="btn btn-outline-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
