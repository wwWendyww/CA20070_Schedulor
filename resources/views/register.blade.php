@extends('layouts.parent')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center flex-fill m-3 p-4">
        <div class="card shadow w-50">
            <div class="card-body">
                <h5 class="card-title text-center m-3">Register</h5>
                @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    <strong> {{session('error')}}
                    </strong>
                </div>
                @else
                @endif
                <form method="POST" action="/register">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="user_name" class="form-label">Name</label>
                        <input id="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror"
                            name="user_name" required autocomplete="name" autofocus>
                        @error('user_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="user_email" class="form-label">Email Address</label>
                        <input id="user_email" type="email"
                            class="form-control @error('user_email') is-invalid @enderror" name="user_email" required
                            autocomplete="user_email">
                        @error('user_email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="form-group mb-3">
                        <label for="password" class="form-label">Password</label>


                        <input id="user_password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="user_password" required
                            autocomplete="new-password">

                        @error('user_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary w-100">
                            Register
                        </button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>

@endsection