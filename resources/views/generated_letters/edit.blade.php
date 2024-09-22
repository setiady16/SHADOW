@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h1 class="card-title">Edit Surat yang Dihasilkan</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('generated_letters.update', $generatedLetter->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Letter -->
                    <div class="mb-3">
                        <label for="letter_id" class="form-label">Surat</label>
                        <select class="form-select" id="letter_id" name="letter_id" required>
                            @foreach($letters as $letter)
                                <option value="{{ $letter->id }}" {{ $generatedLetter->letter_id == $letter->id ? 'selected' : '' }}>{{ $letter->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Generated Content -->
                    <div class="mb-3">
                        <label for="generated_content" class="form-label">Konten yang Dihasilkan</label>
                        <textarea class="form-control" id="generated_content" name="generated_content" rows="5" required>{{ $generatedLetter->generated_content }}</textarea>
                    </div>

                    <!-- Generated At -->
                    <div class="mb-3">
                        <label for="generated_at" class="form-label">Dihasilkan Pada</label>
                        <input type="datetime-local" class="form-control" id="generated_at" name="generated_at" value="{{ \Carbon\Carbon::parse($generatedLetter->generated_at)->format('Y-m-d\TH:i') }}" required>
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex">
                        <button type="submit" class="btn btn-success me-2">Update</button>
                        <a href="{{ route('generated_letters.index') }}" class="btn btn-outline-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
