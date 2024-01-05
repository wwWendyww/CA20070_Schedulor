{{-- BCS3453 [PROJECT]-SEMESTER 2324/1
Student ID: CA20070
Student Name: Wendy Loh Li Wen
--}}
@extends('layouts.parent')
@section('title')
User Subscription List | Schedulor
@endsection
@section('content')

<div class="row justify-content-center">
    {{-- search --}}
    <div class="col-6 ">
        <h4 class="pagetitle">User Subscription List</h4>
        <form class="d-flex " role="search">
            <div class="form-group form-floating w-100 " method="GET">
                <input type="datetime" name="search" id="search" class="form-control" type="search">
                <label class="form-label" for="search">Search User</label>
            </div>
            <button type="submit" class="btn"><i class="bi bi-search"></i></button>
        </form>
    </div>
</div>
<div class="row m-3">
    @if(session('success'))
    <div class="alert alert-primary" role="alert">
        <strong>{{session('success')}}</strong>
    </div>
    @endif


    <div class="col-12 border p-2">
        <div id="user_subscription">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subscription Status</th>
                        <th>Billing Address</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                @foreach ($data as $item)
                <tbody>

                    <tr class="align-middle">
                        <td>{{$item->user_name}}</td>
                        <td class="align-items-center">
                            {{$item->user_email}}</td>
                            <td class="align-items-center">
                                {{strtoupper($item->subscription)}}</td>
                                <td>{{ucwords($item->payment_billing)}}</td>
                                <td class="text-end">
                            @if($item->subscription=="free")
                            <a href="/updateSubscription/{{$item->id}}" class="btn"><i class="bi bi-arrow-up"></i></a>
                            &nbsp;
                            @else
                            
                            @endif

                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
<script>
    function subscribe(){
        alert('Please Subscribe');
        window.location.href = '/subscription';
    }
</script>


@endsection