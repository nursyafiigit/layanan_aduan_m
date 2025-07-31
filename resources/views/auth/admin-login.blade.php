@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Login Admin</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.login.post') }}">
                            @csrf
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control"
                                    placeholder="Enter your username" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Enter your password" required>
                            </div>
                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-primary w-100">Login</button>
                            </div>
                        </form>

                        @if(session('error'))
                            <div class="alert alert-danger mt-3">{{ session('error') }}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection