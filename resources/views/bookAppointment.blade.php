{{-- BCS3453 [PROJECT]-SEMESTER 2324/1
Student ID: CA20070
Student Name: Wendy Loh Li Wen
--}}
@extends('layouts.parent')
@section('title')
Booking | Schedulor
@endsection
@section('content')
<div class="container">
    <div class="d-flex justify-content-center m-3 p-4">
        <div class="card shadow">
            <div class="card-body">

                <form method="POST" action="/shareappointment/{{$id}}">
                    @csrf
                    <h5 class="logo text-center" href="#">ScheduLor</h5>
                    <h5 class="text-center h5 m-3">Book For the Appointment</h5>

                    <div class="form-group mb-3">
                        <label for="client_email" class="form-label">Email Address</label>
                        <input id="client_email" type="email" class="form-control" name="client_email" required
                            autocomplete="email" autofocus>
                    </div>

                    <div class="form-group mb-3">
                        <label for="client_name" class="form-label">Name</label>
                        <input id="client_name" type="text" class="form-control" name="client_name" required
                            autocomplete="current-password">
                    </div>

                    <div class="form-group mb-3">
                        <label for="client_phone" class="form-label">Phone Number</label>
                        <input id="client_phone" type="text" class="form-control" name="client_phone"
                            pattern="^(\+?6?01)[0-46-9]-*[0-9]{7,8}$" required autocomplete="current-password">

                        <small id="helpId" class="form-text text-muted">Format : +6012-3456789</small>
                    </div>
                    <div class="form-group mb-3 text-center">
                        <button type="submit" class="btn btn-primary w-75 ">
                            Book
                        </button>




                    </div>
                </form>

                @if (session('success'))
                <div class="alert alert-success mb-3" role="alert">
                    <strong>
                        {{session('success')}}
                    </strong>
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-dangaer mb-3" role="alert">
                    <strong>
                        {{session('error')}}
                    </strong>
                </div>
                @endif

            </div>
        </div>
    </div>
    @endsection