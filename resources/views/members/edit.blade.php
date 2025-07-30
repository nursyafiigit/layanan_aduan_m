<!-- resources/views/members/edit.blade.php -->

@extends('layouts.app')

@section('content')
<style>
    .form-container {
        max-width: 400px;
        margin: 30px auto;
        padding: 20px;
    }

    .form-container h1 {
        text-align: center;
        margin-bottom: 20px;
        font-size: 28px;
        font-weight: bold;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group input {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 25px;
        font-size: 16px;
        outline: none;
        transition: border-color 0.3s ease;
    }

    .form-group input:focus {
        border-color: #6c63ff;
    }

    .form-group input::placeholder {
        color: #999;
    }

    .btn-submit {
        width: 100%;
        padding: 12px;
        border: none;
        border-radius: 25px;
        background: linear-gradient(90deg, #9b4dff, #4a00e0);
        color: #fff;
        font-weight: bold;
        font-size: 16px;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .btn-submit:hover {
        background: linear-gradient(90deg, #4a00e0, #9b4dff);
    }
</style>

<div class="form-container">
    <h1>Edit Anggota</h1>
    <form action="{{ route('members.update', $member->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <input type="text" name="name" id="name" placeholder="Nama" value="{{ $member->name }}" required>
        </div>

        <div class="form-group">
            <input type="email" name="email" id="email" placeholder="Email" value="{{ $member->email }}" required>
        </div>

        <div class="form-group">
            <input type="text" name="phone_number" id="phone_number" placeholder="Nomor Telepon" value="{{ $member->phone_number }}" required>
        </div>

        <button type="submit" class="btn-submit">Update Anggota</button>
    </form>
</div>
@endsection
