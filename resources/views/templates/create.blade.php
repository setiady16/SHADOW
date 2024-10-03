@extends('layouts.app1')

@section('content')
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h1 class="card-title">Create New Template</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('templates.store') }}" method="POST">
                    @csrf

                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter template name" required>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Content Surat</label>
                        <textarea name="content" id="content" cols="30" rows="10"></textarea>

                    </div>



                    <!-- Buttons -->
                    <div class="d-flex">
                        <button type="submit" class="btn btn-success me-2">Save</button>
                        <a href="{{ route('templates.index') }}" class="btn btn-outline-secondary">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


