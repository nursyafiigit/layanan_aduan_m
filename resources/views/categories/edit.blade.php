@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <h1 class="h3 mb-4 fw-bold">Edit Kategori</h1>

        {{-- Alert jika ada error validasi --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Terjadi kesalahan!</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('categories.update', $category->id) }}" method="POST" class="card p-4 shadow-sm"
            style="border-radius: 1.5rem;">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label fw-semibold">Nama Kategori</label>
                <input type="text" name="name" id="name" class="form-control"
                    value="{{ old('name', $category->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label fw-semibold">Deskripsi</label>
                <textarea name="description" id="description" class="form-control" rows="4">{{ old('description', $category->description) }}</textarea>
                <div class="d-flex justify-content-between mt-3">
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary"
                        style="border-radius: 1.5rem; padding: 0.5rem 1.5rem;">
                        <i class="bi bi-x-circle me-1"></i> Batal
                    </a>
                    <button type="submit" class="btn btn-primary" style="border-radius: 1.5rem; padding: 0.5rem 1.5rem;">
                        <i class="bi bi-save me-1"></i> Simpan Perubahan
                    </button>
                </div>
        </form>
    </div>
@endsection
