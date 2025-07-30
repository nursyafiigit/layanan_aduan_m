<!-- resources/views/categories/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Kategori</h1>
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Untuk HTTP PUT method -->

        <label for="name">Nama Kategori:</label>
        <input type="text" name="name" value="{{ $category->name }}" id="name" required><br><br>

        <label for="description">Deskripsi:</label>
        <textarea name="description" id="description">{{ $category->description }}</textarea><br><br>

        <button type="submit">Update</button>
    </form>
@endsection