@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="h3 mb-4 fw-bold">Edit Buku</h1>

    @if ($errors->any())
        <div class="alert alert-danger rounded-pill px-4 py-2">
            <strong>Terjadi kesalahan:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li class="small">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.update', $book->id) }}" method="POST" class="card shadow-sm p-4" style="border-radius: 1.5rem;">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label fw-semibold">Judul Buku</label>
            <input type="text" name="title" id="title" class="form-control"
                   placeholder="Masukkan judul buku"
                   value="{{ old('title', $book->title) }}" required
                   style="border-radius: 1.5rem; padding: 0.5rem 1rem;">
        </div>

        <div class="mb-3">
            <label for="author" class="form-label fw-semibold">Pengarang Buku</label>
            <input type="text" name="author" id="author" class="form-control"
                   placeholder="Masukkan nama pengarang"
                   value="{{ old('author', $book->author) }}" required
                   style="border-radius: 1.5rem; padding: 0.5rem 1rem;">
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label fw-semibold">Kategori Buku</label>
            <select name="category_id" id="category_id" class="form-select" required
                    style="border-radius: 1.5rem; padding: 0.5rem 1rem;">
                <option value="" disabled>Pilih Kategori</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ (old('category_id', $book->category_id) == $category->id) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="isbn" class="form-label fw-semibold">ISBN</label>
            <input type="text" name="isbn" id="isbn" class="form-control"
                   placeholder="Masukkan nomor ISBN"
                   value="{{ old('isbn', $book->isbn) }}"
                   style="border-radius: 1.5rem; padding: 0.5rem 1rem;">
        </div>

        <div class="mb-3">
            <label for="published_at" class="form-label fw-semibold">Tanggal Terbit</label>
            <input type="date" name="published_at" id="published_at" class="form-control"
                   value="{{ old('published_at', $book->published_at ? \Carbon\Carbon::parse($book->published_at)->format('Y-m-d') : '') }}"
                   style="border-radius: 1.5rem; padding: 0.5rem 1rem;">
        </div>

        <div class="mb-3">
            <label for="pages" class="form-label fw-semibold">Jumlah Halaman</label>
            <input type="number" name="pages" id="pages" class="form-control"
                   placeholder="Contoh: 300"
                   value="{{ old('pages', $book->pages) }}" min="1"
                   style="border-radius: 1.5rem; padding: 0.5rem 1rem;">
        </div>

        <div class="mb-3">
            <label for="available" class="form-label fw-semibold">Jumlah Tersedia</label>
            <input type="number" name="available" id="available" class="form-control"
                   placeholder="Masukkan jumlah stok"
                   value="{{ old('available', $book->available) }}" min="0" required
                   style="border-radius: 1.5rem; padding: 0.5rem 1rem;">
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('books.index') }}" class="btn btn-outline-secondary px-4" style="border-radius: 2rem;">
                Batal
            </a>
            <button type="submit" class="btn btn-warning px-4 d-flex align-items-center gap-2" style="border-radius: 2rem;">
                <i class="bi bi-pencil-square"></i> Update Buku
            </button>
        </div>
    </form>
</div>
@endsection