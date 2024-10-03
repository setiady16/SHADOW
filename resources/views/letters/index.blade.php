@extends('index')

@section('content')
    <main class="main-content position-relative border-radius-lg">
        <div class="container mt-5">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h1>Letters List</h1>
                    <a href="{{ route('letters.create') }}" class="btn btn-light float-right">Add New Letter</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover text-center align-middle">
                        <thead class="bg-light">
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
                                    <form action="{{ route('letters.destroy', $letter->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete();">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    <a href="{{ route('letters.show', $letter->id) }}" class="btn btn-secondary">Lihat</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <script>
        function confirmDelete() {
            return confirm('Anda yakin ingin menghapus surat ini?');
        }
    </script>
@endsection
