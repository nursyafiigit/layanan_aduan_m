<!-- resources/views/categories/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Tambah Kategori Baru</h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <label for="name">Nama Kategori:</label>
        <input type="text" name="name" id="name" required><br><br>

        <label for="description">Deskripsi:</label>
        <textarea name="description" id="description"></textarea><br><br>

        <button type="submit">Simpan</button>
    </form>
@endsection