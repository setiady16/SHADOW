@extends('index')

@section('content')
    <main class="main-content position-relative border-radius-lg">
        <div class="container mt-5">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h1>Templates List</h1>
                    <a href="{{ route('templates.create') }}" class="btn btn-light float-right">Add New Template</a>
                </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover text-center align-middle">
                            <thead class="bg-light">
                                <tr>
{{--                                    <th>ID</th>--}}
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($templates as $template)
                                    <tr>
{{--                                        <td>{{ $template->id }}</td>--}}
                                        <td>{{ $template->name }}</td>
                                        <td>
                                            <a href="{{ route('templates.edit', $template->id) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('templates.destroy', $template->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete();">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                            <a href="{{--{{route('templates.show')}}--}}" class="btn btn-secondary">Lihat</a>
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
            return confirm('Anda yakin ingin menghapus template ini?');
        }
    </script>
@endsection
