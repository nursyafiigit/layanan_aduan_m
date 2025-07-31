@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <h1 class="h3 mb-4 fw-bold">Tambah Kategori Baru</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Terjadi kesalahan:</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            {{-- Nama Kategori --}}
            <div class="mb-3">
                <input type="text" name="name" id="name" class="form-control" placeholder="Nama Kategori"
                    value="{{ old('name') }}" required style="border-radius: 1.5rem; padding: 0.75rem 1rem;">
            </div>

            {{-- Deskripsi --}}
            <div class="mb-3">
                <textarea name="description" id="description" class="form-control" rows="4" placeholder="Deskripsi"
                    style="border-radius: 1.5rem; padding: 0.75rem 1rem; resize: none;">{{ old('description') }}</textarea>
            </div>

            {{-- Tombol Aksi --}}
            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary"
                    style="border-radius: 1.5rem; padding: 0.5rem 1.5rem;">
                    <i class="bi bi-x-circle me-1"></i> Batal
                </a>
                <button type="submit" class="btn btn-success" style="border-radius: 1.5rem; padding: 0.5rem 1.5rem;">
                    <i class="bi bi-save me-1"></i> Simpan
                </button>
            </div>
        </form>
    </div>

    </div>
@endsection
