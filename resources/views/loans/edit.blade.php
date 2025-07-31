@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Peminjaman Buku</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Form untuk mengedit data peminjaman buku -->
        <form method="POST" action="{{ route('loans.update', $loan->id) }}">
            @csrf
            @method('PUT') <!-- Menentukan bahwa request ini adalah PUT untuk update -->

            <div class="form-group">
                <label for="member_id">Nama Anggota:</label>
                <select name="member_id" id="member_id" class="form-control" required>
                    @foreach($members as $member)
                        <option value="{{ $member->id }}" {{ $loan->member_id == $member->id ? 'selected' : '' }}>
                            {{ $member->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="book_id">Judul Buku:</label>
                <select name="book_id" id="book_id" class="form-control" required>
                    @foreach($books as $book)
                        <option value="{{ $book->id }}" {{ $loan->book_id == $book->id ? 'selected' : '' }}>
                            {{ $book->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="loan_date">Tanggal Peminjaman:</label>
                <input type="date" name="loan_date" id="loan_date" class="form-control" value="{{ $loan->loan_date }}"
                    required>
            </div>

            <div class="form-group">
                <label for="return_date">Tanggal Pengembalian:</label>
                <input type="date" name="return_date" id="return_date" class="form-control" value="{{ $loan->return_date }}"
                    required>
            </div>

            <button type="submit" class="btn btn-primary">Update Peminjaman</button>
        </form>
    </div>
@endsection