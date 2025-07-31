@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <h1 class="h3 mb-4 d-flex align-items-center gap-2 fw-bold">
            <span>Daftar Anggota</span>
        </h1>

        {{-- Filter Form --}}
        <form action="{{ route('members.index') }}" method="GET" class="row g-3 align-items-end mb-4">
            <div class="col-md-4">
                <label for="search" class="form-label">Cari Anggota</label>
                <input type="text" name="search" id="search" class="form-control rounded-pill px-3"
                    placeholder="Cari nama atau email..." value="{{ request('search') }}">
            </div>

            <div class="col-md-3">
                <label for="gender" class="form-label">Jenis Kelamin</label>
                <select name="gender" id="gender" class="form-select rounded-pill px-3">
                    <option value="">Semua Jenis Kelamin</option>
                    <option value="Laki-laki" {{ request('gender') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ request('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <div class="col-md-3">
                <label for="status_pendidikan" class="form-label">Status Pendidikan</label>
                <select name="status_pendidikan" id="status_pendidikan" class="form-select rounded-pill px-3">
                    <option value="">Semua Status Pendidikan</option>
                    <option value="SMA" {{ request('status_pendidikan') == 'SMA' ? 'selected' : '' }}>SMA</option>
                    <option value="Sarjana" {{ request('status_pendidikan') == 'Sarjana' ? 'selected' : '' }}>Sarjana</option>
                    <option value="Magister" {{ request('status_pendidikan') == 'Magister' ? 'selected' : '' }}>Magister
                    </option>
                </select>
            </div>

            <div class="col-md-2 d-grid">
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
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Nomor Telepon</th>
                        <th>Umur</th>
                        <th>Jenis Kelamin</th>
                        <th>Status Pendidikan</th>
                        <th>Alamat</th>
                        <th style="width: 160px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($members as $member)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->email }}</td>
                            <td>{{ $member->phone_number }}</td>
                            <td class="text-center">
                                @php
                                    $dob = \Carbon\Carbon::parse($member->profile->dob);
                                    $age = $dob->diffInYears(\Carbon\Carbon::now());
                                @endphp
                                {{ $age }} Tahun
                            </td>
                            <td class="text-center">{{ $member->profile->gender }}</td>
                            <td class="text-center">{{ $member->profile->status_pendidikan }}</td>
                            <td>{{ $member->profile->address }}</td>
                            <td class="text-center">
                                <div class="d-flex flex-column align-items-center gap-2">
                                    <a href="{{ route('members.edit', $member->id) }}"
                                        class="btn btn-sm btn-warning rounded-pill text-nowrap d-flex justify-content-center align-items-center px-3"
                                        style="width: 100px;"> <i class="bi bi-pencil me-1"></i> Edit </a>
                                    <form action="{{ route('members.destroy', $member->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus anggota ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-sm btn-danger rounded-pill text-nowrap d-flex justify-content-center align-items-center px-3"
                                            style="width: 100px;"> <i class="bi bi-trash me-1"></i> Hapus </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9">
                                <div class="alert alert-warning text-center mb-0">
                                    Tidak ada anggota ditemukan.
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-4 d-flex justify-content-center">
            {{ $members->links() }}
        </div>

        {{-- Tambah Anggota --}}
        <div class="mt-4 text-end">
            <a href="{{ route('members.create') }}" class="btn btn-success rounded-pill px-4">
                + Tambah Anggota
            </a>
        </div>
    </div>
@endsection