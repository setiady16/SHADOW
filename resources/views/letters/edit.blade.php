@extends('layouts.app1')

@section('content')
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h1 class="card-title">Edit Letter</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('letters.update', $letter->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- User Selection -->
                    <div class="mb-3">
                        <label for="user_id" class="form-label">User</label>
                        <select class="form-control" id="user_id" name="user_id" required>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ $letter->user_id == $user->id ? 'selected' : '' }}>
                                    {{ $user->username }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Template Selection -->
                    <div class="mb-3">
                        <label for="template_id" class="form-label">Template</label>
                        <select class="form-control" id="template_id" name="template_id" required>
                            @foreach($templates as $template)
                                <option value="{{ $template->id }}" {{ $letter->template_id == $template->id ? 'selected' : '' }}>
                                    {{ $template->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Title -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $letter->title }}" required>
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex">
                        <button type="submit" class="btn btn-success me-2">Update</button>
                        <a href="{{ route('letters.index') }}" class="btn btn-outline-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
