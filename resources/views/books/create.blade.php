<!-- resources/views/books/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Tambah Buku Baru</h1>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <label for="title">Judul Buku:</label>
        <input type="text" name="title" id="title" required><br><br>

        <label for="author">Pengarang Buku:</label>
        <input type="text" name="author" id="author" required><br><br>

        <label for="category_id">Kategori Buku:</label>
        <select name="category_id" id="category_id" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select><br><br>

        <label for="isbn">ISBN:</label>
        <input type="text" name="isbn" id="isbn"><br><br>

        <label for="published_at">Tanggal Terbit:</label>
        <input type="date" name="published_at" id="published_at"><br><br>

        <label for="pages">Jumlah Halaman:</label>
        <input type="number" name="pages" id="pages"><br><br>

        <label for="available">Jumlah Tersedia:</label>
        <input type="number" name="available" id="available" value="0"><br><br> <!-- Menambahkan input untuk 'available' -->

        <button type="submit">Simpan Buku</button>
    </form>
@endsection