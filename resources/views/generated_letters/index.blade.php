<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generated Letters List</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
    <h1>Generated Letters List</h1>
    <a href="{{ route('generated_letters.create') }}" class="btn btn-primary">Add New Generated Letter</a>
    <table class="table mt-3">
        <thead>
        <tr>
            <th>ID</th>
            <th>Letter</th>
            <th>Generated Content</th>
            <th>Generated At</th>
            <th>Actions</th>
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
                    <a href="{{ route('generated_letters.edit', $generatedLetter->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('generated_letters.destroy', $generatedLetter->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
