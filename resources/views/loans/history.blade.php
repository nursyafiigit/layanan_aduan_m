@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Riwayat Peminjaman Buku</h2>

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Anggota</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($loans as $loan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $loan->member->name }}</td>
                        <td>{{ $loan->book->title }}</td>
                        <td>{{ $loan->loan_date }}</td>
                        <td>{{ $loan->actual_return_date }}</td>
                        <td>{{ $loan->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection