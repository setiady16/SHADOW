<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Generated Letter</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
    <h1>Create New Generated Letter</h1>
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
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('generated_letters.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
</body>
</html>
