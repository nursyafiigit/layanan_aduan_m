@extends('layouts.app')

@section('content')
    <div class="container">
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Members</h2>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4" style="gap: 10px;">
            
            <form method="GET" action="{{ route('members.search') }}" class="flex-grow-1" style="max-width: 400px;">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search members..."
                        value="{{ request('search') }}">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="fas fa-search"></i> Search
                    </button>
                </div>
            </form>

            <a href="{{ route('members.create') }}" class="btn btn-primary rounded-pill px-4">
                <i class="fas fa-plus me-2"></i> Tambah Anggota
            </a>
        </div>

        <!-- Daftar Anggota -->
        <div id="memberList" class="list-group shadow-sm">
            @forelse ($members as $member)
                <div class="list-group-item d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle text-white d-flex justify-content-center align-items-center me-3"
                            style="width: 45px; height: 45px; background-color: #{{ substr(md5($member->name), 0, 6) }};">
                            {{ strtoupper(substr($member->name, 0, 1)) }}
                        </div>
                        <div>
                            <div class="fw-bold">{{ $member->name }}</div>
                            <small class="text-muted">{{ $member->email }} - {{ $member->phone_number }}</small>
                        </div>
                    </div>

                    <div class="d-flex flex-column align-items-end">
                        <a href="{{ route('members.edit', $member->id) }}"
                            class="btn btn-outline-primary rounded-pill mb-2 px-3 w-100">
                            <i class="fas fa-edit me-1"></i> Edit
                        </a>
                        <form action="{{ route('members.destroy', $member->id) }}" method="POST"
                            onsubmit="return confirm('Hapus anggota ini?');" class="w-100">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger rounded-pill px-3 w-100">
                                <i class="fas fa-trash-alt me-1"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="list-group-item text-center text-muted">
                    Tidak ada anggota ditemukan.
                </div>
            @endforelse
        </div>
    </div>

    @if (isset($limit) && $limit != 'all' && $members->count() >= 5)
        <div class="text-center mt-3">
            @if(isset($search))
                <a href="{{ route('members.search', ['search' => $search, 'limit' => 'all']) }}" 
                   class="btn btn-secondary rounded-pill px-4">
                    Selengkapnya
                </a>
            @else
                <a href="{{ route('members.index', ['limit' => 'all']) }}" 
                   class="btn btn-secondary rounded-pill px-4">
                    Selengkapnya
                </a>
            @endif
        </div>
    @elseif(isset($limit) && $limit == 'all')
        <div class="text-center mt-3">
            @if(isset($search))
                <a href="{{ route('members.search', ['search' => $search]) }}" 
                   class="btn btn-outline-primary rounded-pill px-4">
                    Kembali
                </a>
            @else
                <a href="{{ route('members.index') }}" 
                   class="btn btn-outline-primary rounded-pill px-4">
                    Kembali
                </a>
            @endif
        </div>
    @endif

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection
