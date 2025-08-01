@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <h1 class="h3 mb-4 d-flex align-items-center gap-2 fw-bold">
            <span>Daftar Peminjaman Buku</span>
        </h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Form Cari --}}
        <form action="{{ route('loans.index') }}" method="GET" class="row g-3 align-items-center mb-4">
            <div class="col-md-8">
                <input type="text" name="search" class="form-control rounded-pill px-3"
                    placeholder="Cari nama peminjam, judul." value="{{ request('search') }}">
            </div>
            <div class="col-md-4 d-grid">
                <button type="submit" class="btn btn-primary rounded-pill px-4">
                    Cari
                </button>
            </div>
        </form>

        {{-- Tabel Peminjaman --}}
        <div class="table-responsive shadow-sm rounded-4 overflow-hidden">
            <table class="table table-bordered table-hover align-middle text-nowrap mb-0" style="table-layout: fixed;">
                <thead class="table-light text-center">
                    <tr>
                        <th style="width: 40px; border-left-top-radius: 1rem;">No</th>
                        <th style="width: 150px;">Nama</th>
                        <th style="width: 200px;">Judul buku</th>
                        <th style="width: 150px;">Tanggal peminjaman</th>
                        <th style="width: 150px;">Tanggal pengembalian</th>
                        <th style="width: 120px;">Status</th>
                        <th style="width: 160px; border-right-top-radius: 1rem;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($loans as $index => $loan)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>{{ $loan->member->name }}</td>
                            <td>{{ $loan->book->title }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($loan->loan_date)->format('d-m-Y') }}</td>
                            <td class="text-center">
                                {{ $loan->return_date ? \Carbon\Carbon::parse($loan->return_date)->format('d-m-Y') : '-' }}
                            </td>
                            <td class="text-center">
                                @if ($loan->status === 'borrowed')
                                    <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">Dipinjam</span>
                                @elseif ($loan->status === 'returned')
                                    <span class="badge bg-success px-3 py-2 rounded-pill">Dikembalikan</span>
                                @else
                                    <span class="badge bg-secondary px-3 py-2 rounded-pill">{{ ucfirst($loan->status) }}</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="d-flex flex-column align-items-center gap-2">
                                    <a href="{{ route('loans.edit', $loan->id) }}"
                                        class="btn btn-sm btn-warning rounded-pill d-flex align-items-center justify-content-center px-3"
                                        style="width: 100px;">
                                        <i class="bi bi-pencil me-1"></i> Edit
                                    </a>
                                    <form action="{{ route('loans.destroy', $loan->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-sm btn-danger rounded-pill d-flex align-items-center justify-content-center px-3"
                                            style="width: 100px;">
                                            <i class="bi bi-trash me-1"></i> Hapus
                                        </button>
                                    </form>
                                    @if($loan->status === 'borrowed')
                                        <a href="{{ route('loans.returnForm', $loan->id) }}"
                                            class="btn btn-sm btn-primary rounded-pill d-flex align-items-center justify-content-center px-3"
                                            style="width: 100px;">
                                            <i class="bi bi-arrow-90deg-left me-1"></i> Kembali
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">
                                <div class="alert alert-warning text-center mb-0">
                                    Tidak ada data peminjaman.
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Tombol Tambah --}}
        <div class="mt-4 text-end">
            <a href="{{ route('loans.create') }}" class="btn btn-success rounded-pill px-4">
                + Tambah Peminjaman
            </a>
        </div>
    </div>
@endsection