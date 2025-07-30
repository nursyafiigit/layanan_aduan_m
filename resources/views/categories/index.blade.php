<!-- resources/views/categories/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Daftar Kategori</h1>
    <ul>
        @foreach ($categories as $category)
            <li>
                {{ $category->name }}
                <a href="{{ route('categories.edit', $category->id) }}">Edit</a> |
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </li>
        @endforeach
    </ul>
    <a href="{{ route('categories.create') }}">Tambah Kategori</a>
@endsection