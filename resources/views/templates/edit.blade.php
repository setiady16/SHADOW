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

                    <!-- Konten Template (Summernote) -->
                    <div class="mb-3">
                        <label for="content" class="form-label">Konten Template</label>
                        <textarea class="form-control" id="content" name="content" rows="5" required>{!! $content !!}</textarea>
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex">
                        @can('user')
                            <a href="javascript:void(0);" class="btn btn-success me-2" onclick="downloadPDF()">Download</a>
                        @endcan
                        @can('admin')
                            <button type="submit" class="btn btn-success me-2">Update</button>
                        @endcan
                        <a href="{{ route('templates.index') }}" class="btn btn-outline-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Include CSS and JS for Summernote -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <script>
        $(document).ready(function() {
            // Inisialisasi Summernote
            $('#content').summernote({
                height: 300,   // Set the height of Summernote
                focus: true    // Set the focus on the editor
            });




        });

        function downloadPDF() {
            var content = $('#content').val(); // Assuming Summernote is initialized on the textarea with id 'content'
            var url = "{{ route('templates.download', $template->id) }}?content=" + encodeURIComponent(content);
            window.open(url, '_blank');
        }
    </script>
@endsection
