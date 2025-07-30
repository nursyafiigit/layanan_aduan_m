<!-- resources/views/members/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Anggota</h1>
    <form action="{{ route('members.update', $member->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Nama:</label>
        <input type="text" name="name" value="{{ $member->name }}" id="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ $member->email }}" id="email" required><br><br>

        <label for="phone_number">Nomor Telepon:</label>
        <input type="text" name="phone_number" value="{{ $member->phone_number }}" id="phone_number" required><br><br>

        <button type="submit">Update Anggota</button>
    </form>
@endsection