<!-- resources/views/books/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Daftar Buku</h1>

    <!-- Form Pencarian dan Filter -->
    <form action="{{ route('books.index') }}" method="GET">
        @csrf
        <label for="search">Cari Buku:</label>
        <input type="text" name="search" id="search" placeholder="Cari judul, pengarang...">

        <label for="category_id">Pilih Kategori:</label>
        <select name="category_id" id="category_id">
            <option value="">Semua Kategori</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <button type="submit">Cari</button>
    </form>

    <ul>
        @foreach ($books as $book)
            <li>
                {{ $book->title }} oleh {{ $book->author }} - Kategori: {{ $book->category->name }}
            </li>
        @endforeach
    </ul>

    <!-- Pagination Links -->
    {{ $books->links() }}

    <a href="{{ route('books.create') }}">Tambah Buku</a>
@endsection