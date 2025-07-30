<!-- resources/views/loans/return.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container bg-white p-4 shadow-sm rounded">
        <h2 class="text-center mb-4">Kembalikan Buku</h2>

        <form action="{{ route('loans.return', $loan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="actual_return_date">Tanggal Pengembalian:</label>
                <input type="date" id="actual_return_date" name="actual_return_date" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Kembalikan Buku</button>
        </form>
    </div>
@endsection