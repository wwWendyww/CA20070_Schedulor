{{--
BCS3453 [PROJECT]-SEMESTER 2324/1
Student ID: CA20070
Student Name: Wendy Loh Li Wen
--}}
@extends('/layouts.parent')
@section('title')
Subscription Plan | Schedulor
@endsection

@section('content')
<div class="row text-center p-3 subscription mb-3" style="background-color: aliceblue">
    <div>
        <h1 class="pagetitle" style="font-size: 3rem">Select Your Plan</h1>
    </div>
</div>
<div class="mb-3 d-flex flex-row justify-content-center gap-5 flex-fill ">
    <div class="card w-50">
        <div class="card-body p-4">
            <h5 class="card-title">Free</h5>
            <p class="card-subtitle mb-3">Free with limited</p>
            <div class="d-flex flex-fill align-items-center mb-3">
                <h5 class="py-3">Always Free </h5>
            </div>
            <hr>
            <ul class="p-3">
                <li class="mb-3">Create and Manage Your Daily Tasklists</li>
                <li class="mb-3">Setup Reminder</li>
                <li class="mb-3">Make Your Appointment</li>
            </ul>
        </div>
    </div>
    <div class="card w-50">
        <div class="card-body p-4">
            <h5 class="card-title">Premium</h5>
            <p class="card-subtitle mb-3">Enjoy with unlimited!</p>
            <div class="d-flex flex-fill align-items-center mb-3">
                <h5 class="py-3">RM10/lifetime</h5>
                @if(!auth()->check())
                <a class="btn btn-dark d-inline ms-auto w-50" href="/payment">Get Start</a>
                @else
                @if(auth()->user()->subscription=='free')
                <a class="btn btn-dark d-inline ms-auto w-50" href="/payment">Get Start</a>
                @endif
                @endif

            </div>
            <hr>
            <ul class="p-3">
                <li class="mb-3">Unlimited Create and Manage Your Daily Tasklists</li>
                <li class="mb-3">Unlimited Create Group for Sharing</li>
                <li class="mb-3">Unlimited Sharing Your Schedule or Timeline with Your Family, Friends or Collegue</li>
                <li class="mb-3">Unlimited Create and Make Your Appointment</li>
            </ul>
        </div>
    </div>
</div>

@endsection