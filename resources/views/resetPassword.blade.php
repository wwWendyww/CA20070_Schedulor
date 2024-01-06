{{-- BCS3453 [PROJECT]-SEMESTER 2324/1
Student ID: CA20070
Student Name: Wendy Loh Li Wen
--}}
@extends('layouts.parent')
@section('title')
Password Recovery | Schedulor
@endsection
@section('content')
<div class="container">
    <div class="d-flex justify-content-center m-3 p-4">
        <div class="card shadow">
            <div class="card-body">

                <form method="POST" action="/updatePassword">
                    @csrf
                    <h5 class="logo text-center" href="#">ScheduLor</h5>
                    <h5 class="text-center h5 m-3">Reset Password</h5>

                    <div class="form-group mb-3">
                        <label for="user_email" class="form-label">Email Address</label>
                        <input id="user_email" type="email" class="form-control" name="user_email" required
                            autocomplete="email" autofocus>
                    </div>

                    <div class="form-group mb-3">
                        <label for="user_name" class="form-label">Username</label>
                        <input id="user_name" type="email" class="form-control" name="user_name" required
                            autocomplete="email" autofocus>
                    </div>

                    <div class="form-group mb-3">
                        <label for="user_password" class="form-label">New Password</label>
                        <input id="user_password" type="password" class="form-control" name="user_password" required
                            autocomplete="current-password">
                    </div>

                

                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary w-100">
                            Reset
                        </button>

                    

                </form>
            </div>
        </div>
    </div>
</div>
@endsection