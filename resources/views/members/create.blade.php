<!-- resources/views/members/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Tambah Anggota</h1>
    <form action="{{ route('members.store') }}" method="POST">
        @csrf

        <label for="name">Nama:</label>
        <input type="text" name="name" id="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>

        <label for="phone_number">Nomor Telepon:</label>
        <input type="text" name="phone_number" id="phone_number" required><br><br>

        <button type="submit">Simpan Anggota</button>
    </form>
@endsection