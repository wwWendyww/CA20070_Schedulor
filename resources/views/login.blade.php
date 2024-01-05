{{-- BCS3453 [PROJECT]-SEMESTER 2324/1
Student ID: CA20070
Student Name: Wendy Loh Li Wen
--}}
@extends('layouts.parent')
@section('title')
Login | Schedulor
@endsection
@section('content')
<div class="container">
    <div class="d-flex justify-content-center m-3 p-4">
        <div class="card shadow">
            <div class="card-body">

                <form method="POST" action="/login">
                    @csrf
                    <h5 class="logo text-center" href="#">ScheduLor</h5>
                    <h5 class="text-center h5 m-3">Login</h5>

                    <div class="form-group mb-3">
                        <label for="user_email" class="form-label">Email Address</label>
                        <input id="user_email" type="email" class="form-control" name="user_email" required
                            autocomplete="email" autofocus>


                    </div>

                    <div class="form-group mb-3">
                        <label for="user_password" class="form-label">Password</label>
                        <input id="user_password" type="password" class="form-control" name="user_password" required
                            autocomplete="current-password">
                    </div>

                    <div class="form-group mb-3">
                        <label for="usertype" class="form-label">User Type</label>
                        <select name="usertype" id="usertype" class="form-select">Select User Type
                            <option value="user">User</option>
                            <option value="admin">Administrator</option>
                        </select>
                    </div>


                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary w-100">
                            Login
                        </button>

                        <div class="form-group mb-3 text-center">
                            <a class="btn btn-link" href="/resetpassword">
                                Forgot Your Password?
                            </a>
                        </div>
                        @if (session('success'))
                        <div class="alert alert-success mb-3" role="alert">
                            <strong>
                                {{session('success')}}
                            </strong>
                        </div>
                        @endif

                        @if (session('error'))
                        <div class="alert alert-danger mb-3" role="alert">
                            <strong>
                                {{session('error')}}
                            </strong>
                        </div>
                        @endif

                </form>
                <hr>
                <div>
                    <p>
                        New User?
                        <br>
                    </p>
                    <a class="btn border" href="/login/google">Sign up With Google</a>
                    <a class="btn border" onclick="" href="/register">Sign up With Email</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection