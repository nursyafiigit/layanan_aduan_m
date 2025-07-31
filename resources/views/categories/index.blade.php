@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 fw-bold">Kategori Buku</h1>
            <a href="{{ route('categories.create') }}" class="btn btn-primary" style="border-radius: 1.5rem;">
                <i class="bi bi-plus-circle me-1"></i> Tambah Kategori
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-1"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-1"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if ($categories->isEmpty())
            <div class="text-center text-muted">Tidak ada kategori ditemukan.</div>
        @else
            <div class="list-group shadow-sm">
                @foreach ($categories as $category)
                    @php
                        $initial = strtoupper(substr($category->name, 0, 1));
                        $colors = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'dark'];
                        $bgColor = 'bg-' . $colors[$loop->index % count($colors)];
                    @endphp

                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center gap-3">
                            <div class="rounded-circle text-white {{ $bgColor }} d-flex align-items-center justify-content-center"
                                style="width: 42px; height: 42px; font-weight: bold;">
                                {{ $initial }}
                            </div>
                            <div>
                                <div class="fw-semibold">{{ $category->name }}</div>
                                <div class="text-muted small">{{ $category->description ?? 'Tidak ada deskripsi' }}</div>
                            </div>
                        </div>
                        <div class="d-flex flex-column gap-2">
                            <a href="{{ route('categories.edit', $category->id) }}"
                                class="btn btn-warning btn-sm d-flex align-items-center justify-content-center"
                                style="border-radius: 1.5rem; width: 100px;">
                                <i class="bi bi-pencil-square me-1"></i> Edit
                            </a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus kategori ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="btn btn-danger btn-sm d-flex align-items-center justify-content-center"
                                    style="border-radius: 1.5rem; width: 100px;">
                                    <i class="bi bi-trash-fill me-1"></i> Hapus
                                </button>
                            </form>
                        </div>

                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
