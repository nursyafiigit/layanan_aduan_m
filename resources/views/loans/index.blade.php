@extends('layouts.app')

@section('content')


    <div class="container">
        <h2>Peminjaman Buku</h2>

        <!-- Button to add new loan -->
        <a href="{{ route('loans.create') }}" class="btn btn-success mb-3">Tambah Peminjaman Buku</a>

        <h3>Daftar Peminjaman Buku</h3>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered mt-3" id="loans-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Anggota</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($loans as $index => $loan)
                    <tr>
                        <td>{{ $index + 1 }}</td> <!-- Nomor urut -->
                        <td>{{ $loan->member->name }}</td>
                        <td>{{ $loan->book->title }}</td>
                        <td>{{ $loan->loan_date }}</td>
                        <td>{{ $loan->return_date }}</td>
                        <td>{{ $loan->status }}</td>
                        <td>
                            <a href="{{ route('loans.edit', $loan->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('loans.destroy', $loan->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                            @if($loan->status == 'borrowed')
                                <a href="{{ route('loans.returnForm', $loan->id) }}" class="btn btn-warning">Atur Pengembalian</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection