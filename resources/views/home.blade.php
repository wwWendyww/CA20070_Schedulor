{{-- 
BCS3453 [PROJECT]-SEMESTER 2324/1
Student ID: CA20070
Student Name: Wendy Loh Li Wen
 --}}
@extends('/layouts/parent')
@section('title')
SceduLor
@endsection
@section('content')
<div class="row justify-content-center align-item-center home p-3" style="background-color: aliceblue">
    <div class="row text-center my-3">
        <h1 class="h1 slogan my-3">
            Simplify. Schedule. Succeed.
        </h1>
        <p class="introduction my-3">ScheduLor is your all-in-one scheduling platform designed to simplify your time
            management and collaboration needs. 
            <br>ScheduLor seamlessly combines tasklist creation, appointment scheduling, and effortless group collaboration
            in one intuitive interface.</p>
            
        </p>
        <div class="d-flex flex-column justify-content-center my-3">
            <a class="introduction" href="/login" style="text-decoration: none; color:black;font-size:14px" >
                Login with Google
            </a>
            <p class="introduction my-3" style="font-size:10px">OR</p>
            <a class="introduction" href="/register" style="text-decoration: none; color:blue; font-size:14px">
                Sign up with Email
            </a>
        </div>
    </div>
    <div class="row">


    </div>
</div>
@endsection