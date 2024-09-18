<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Letters List</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
    <h1>Letters List</h1>
    <a href="{{ route('letters.create') }}" class="btn btn-primary">Add New Letter</a>
    <table class="table mt-3">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>User</th>
            <th>Template</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($letters as $letter)
            <tr>
                <td>{{ $letter->id }}</td>
                <td>{{ $letter->title }}</td>
                <td>{{ $letter->user->username }}</td>
                <td>{{ $letter->template->name }}</td>
                <td>
                    <a href="{{ route('letters.edit', $letter->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('letters.destroy', $letter->id) }}" method="POST" style="display:inline;">
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
