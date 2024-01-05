{{-- BCS3453 [PROJECT]-SEMESTER 2324/1
Student ID: CA20070
Student Name: Wendy Loh Li Wen
--}}
@extends('layouts.parent')
@section('title')
Task List | Schedulor
@endsection
@section('content')

<div class="row justify-content-center">
    {{-- search --}}
    <div class="col-6 ">
        <h4 class="pagetitle">Administrator List</h4>
        <form class="d-flex " role="search">
            <div class="form-group form-floating w-100 " method="GET">
                <input type="datetime" name="search" id="search" class="form-control" type="search">
                <label class="form-label" for="search">Search Admin</label>
            </div>
            <button type="submit" class="btn"><i class="bi bi-search"></i></button>
        </form>
    </div>
</div>
<div class="row m-3">
    <div class="col-2 border p-2 ">
        <!-- Modal trigger button -->
        <button class="btn btn-primary w-100" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"> <i
                class="bi bi-plus-circle"></i>&nbsp;Administrator</button>

        <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
            id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title " id="offcanvasScrollingLabel">Create Your Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <form class="form d-flex flex-column flex-fill" action="/addadmin" method="post">
                    @csrf
                    <div class="form-group form-floating mb-3">
                        <input type="text" id="admin_name" name="admin_name" class="form-control" required />
                        <label for="admin_name">Administrator Name</label>
                    </div>
                    <div class="form-group form-floating mb-3">
                        <input type="email" id="admin_email" name="admin_email" class="form-control h-100" required>
                        <label for="admin_email">Administrator Email</label>
                    </div>

                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary w-100">Add Administrator</button>
                    </div>


                </form>
            </div>
        </div>
        @if(session('success'))
        <div class="alert alert-success my-3">
            <strong>{{session('success')}}</strong>
        </div>
        @endif



        @if(session('error'))
        <div class="alert alert-danger my-3">
            <strong>{{session('error')}}</strong>
        </div>
        @endif
        <script>
            const myModal = new bootstrap.Modal(
                document.getElementById("modalId"),
                options,
            );
        </script>
    </div>

    <div class="col-10 border p-2">
        <div id="admin_list">
            <table class="table">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                @foreach ($data as $item)
                <tbody>
               
                    <tr class="align-middle">
                        <td>{{$item->user_name}}</td>
                        <td class="align-items-center">
                            {{$item->user_email}}

                        <td class="text-end">
                            <a href="/deleteadmin/{{$item->id}}" class="btn"><i class="bi bi-trash3"></i></a>
                            &nbsp;
              
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