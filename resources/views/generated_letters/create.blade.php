<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Generated Letter</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h1 class="card-title">Create New Generated Letter</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('generated_letters.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="letter_id" class="form-label">Letter</label>
                    <select class="form-control" id="letter_id" name="letter_id" required>
                        @foreach($letters as $letter)
                            <option value="{{ $letter->id }}">{{ $letter->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="generated_content" class="form-label">Generated Content</label>
                    <textarea class="form-control" id="generated_content" name="generated_content" rows="5" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="generated_at" class="form-label">Generated At</label>
                    <input type="datetime-local" class="form-control" id="generated_at" name="generated_at" required>
                </div>
                <div class="d-flex">
                    <button type="submit" class="btn btn-success me-2">Save</button>
                    <a href="{{ route('generated_letters.index') }}" class="btn btn-outline-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
