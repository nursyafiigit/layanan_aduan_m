    @extends('layouts.app')
    @section('content')
        <div class="container py-4">
            <h1 class="h3 mb-4 d-flex align-items-center gap-2 fw-bold">
                <span>Daftar Buku</span>
            </h1>
            {{-- Filter Form --}}
            <form action="{{ route('books.index') }}" method="GET" class="row g-3 align-items-end mb-4">
                <div class="col-md-5">
                    <label for="search" class="form-label">Cari Buku</label>
                    <input type="text" name="search" id="search" class="form-control rounded-pill px-3"
                        placeholder="Cari judul, pengarang..." value="{{ request('search') }}">
                </div>

                <div class="col-md-4">
                    <label for="category_id" class="form-label">Kategori</label>
                    <select name="category_id" id="category_id" class="form-select rounded-pill px-3">
                        <option value="">Semua Kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3 d-grid">
                    <button type="submit" class="btn btn-primary rounded-pill">
                        <i class="bi bi-search me-1"></i> Cari
                    </button>
                </div>
            </form>

            {{-- Tabel --}}
            <div class="table-responsive shadow-sm rounded-4 overflow-hidden">
                <table class="table table-bordered table-hover align-middle text-nowrap mb-0">
                    <thead class="table-light text-center">
                        <tr>
                            <th style="width: 50px;">No</th>
                            <th>Judul</th>
                            <th>Pengarang</th>
                            <th>Kategori</th>
                            <th>Tahun</th>
                            <th>Stok</th>
                            <th>Status</th>
                            <th style="width: 160px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($books as $book)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->category->name }}</td>
                                <td class="text-center">
                                    {{ $book->published_at ? \Carbon\Carbon::parse($book->published_at)->format('Y') : '-' }}
                                </td>
                                <td class="text-center">{{ $book->available }}</td>
                                <td class="text-center">
                                    @if ($book->available > 0)
                                        <span class="badge bg-success px-3 py-2 rounded-pill">Tersedia</span>
                                    @else
                                        <span class="badge bg-danger px-3 py-2 rounded-pill">Habis</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="d-flex flex-column align-items-center gap-2"> <a
                                            href="{{ route('books.edit', $book->id) }}"
                                            class="btn btn-sm btn-warning rounded-pill text-nowrap d-flex justify-content-center align-items-center px-3"
                                            style="width: 100px;"> <i class="bi bi-pencil me-1"></i> Edit </a>
                                        <form action="{{ route('books.destroy', $book->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus buku ini?');"> @csrf
                                            @method('DELETE') <button type="submit"
                                                class="btn btn-sm btn-danger rounded-pill text-nowrap d-flex justify-content-center align-items-center px-3"
                                                style="width: 100px;"> <i class="bi bi-trash me-1"></i> Hapus </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">
                                    <div class="alert alert-warning text-center mb-0">
                                        Tidak ada buku ditemukan.
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="mt-4 d-flex justify-content-center">
                {{ $books->links() }}
            </div>

            {{-- Tambah Buku --}}
            <div class="mt-4 text-end">
                <a href="{{ route('books.create') }}" class="btn btn-success rounded-pill px-4">
                    + Tambah Buku
                </a>
            </div>

        </div>
    @endsection
