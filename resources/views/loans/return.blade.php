@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Atur Pengembalian Buku</h2>

        <!-- Alert untuk sukses -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('loans.return', $loan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="actual_return_date">Tanggal Pengembalian:</label>
                <input type="date" name="actual_return_date" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Kembalikan Buku</button>
        </form>
    </div>
@endsection