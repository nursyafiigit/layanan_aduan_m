@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Anggota</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Form untuk mengirim data anggota -->
        <form method="POST" action="{{ route('members.store') }}">
            @csrf

            <div class="form-group">
                <label for="name">Nama Anggota:</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Nama Anggota" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
            </div>

            <div class="form-group">
                <label for="phone_number">Nomor Telepon:</label>
                <input type="text" name="phone_number" id="phone_number" class="form-control" placeholder="Nomor Telepon"
                    required>
            </div>

            <!-- Tambahkan data profil anggota -->
            <div class="form-group">
                <label for="address">Alamat:</label>
                <input type="text" name="address" id="address" class="form-control" placeholder="Alamat" required>
            </div>

            <div class="form-group">
                <label for="gender">Jenis Kelamin:</label>
                <select name="gender" id="gender" class="form-control" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="dob">Tanggal Lahir:</label>
                <input type="date" name="dob" id="dob" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="status_pendidikan">Status Pendidikan:</label>
                <input type="text" name="status_pendidikan" id="status_pendidikan" class="form-control"
                    placeholder="Status Pendidikan" required>
            </div>

            <!-- Tombol untuk mengirimkan form -->
            <button type="submit" class="btn btn-primary">Simpan Anggota</button>
        </form>
    </div>
@endsection