<!-- resources/views/members/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Daftar Anggota</h1>

    <!-- Pesan Sukses -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('members.create') }}">Tambah Anggota</a>

    <ul>
        @foreach ($members as $member)
            <li>
                {{ $member->name }} - {{ $member->email }} - {{ $member->phone_number }}
                <a href="{{ route('members.edit', $member->id) }}">Edit</a> |
                <form action="{{ route('members.destroy', $member->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection