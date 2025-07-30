<!-- resources/views/books/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Buku</h1>
    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Untuk HTTP PUT method -->

        <label for="title">Judul Buku:</label>
        <input type="text" name="title" value="{{ $book->title }}" id="title" required><br><br>

        <label for="author">Pengarang Buku:</label>
        <input type="text" name="author" value="{{ $book->author }}" id="author" required><br><br>

        <label for="category_id">Kategori Buku:</label>
        <select name="category_id" id="category_id" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select><br><br>

        <button type="submit">Update Buku</button>
    </form>
@endsection