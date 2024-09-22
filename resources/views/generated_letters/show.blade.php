@extends('index')

@section('content')
    <main class="main-content position-relative border-radius-lg">
        <div class="container mt-5">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">Detail Surat yang Dihasilkan</h3>
                    <a href="{{ route('generated_letters.index') }}" class="btn btn-light float-right">Kembali ke Daftar Surat</a>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="letter" class="form-label">Surat</label>
                        <p class="form-control-plaintext">{{ $generatedLetter->letter->title }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="generated_content" class="form-label">Konten yang Dihasilkan</label>
                        <p class="form-control-plaintext">{{ $generatedLetter->generated_content }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="generated_at" class="form-label">Dihasilkan Pada</label>
                        <p class="form-control-plaintext">{{ \Carbon\Carbon::parse($generatedLetter->generated_at)->format('d M Y H:i') }}</p>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <p class="mb-0">ID Surat: {{ $generatedLetter->id }}</p>
                </div>
            </div>
        </div>
    </main>
@endsection
