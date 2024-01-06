{{-- BCS3453 [PROJECT]-SEMESTER 2324/1
Student ID: CA20070
Student Name: Wendy Loh Li Wen
--}}
@extends('layouts.parent')
@section('title')
Group Task | Schedulor
@endsection
@section('content')


<div class="row m-3">
    <div class="col-2 border p-2 ">
        <!-- Modal trigger button -->
       

        <button class="btn btn-primary w-100" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i
                class="bi bi-plus-circle"></i>&nbsp;Task</button>


        <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
            id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title " id="offcanvasScrollingLabel">Create Your Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <form class="form d-flex flex-column flex-fill" action="/submitgrouptask/{{$group_id}}" method="post">
                    @csrf
                    <div class="form-group form-floating mb-3">
                        <input type="text" id="grouptask_name" name="grouptask_name" class="form-control" />
                        <label for="grouptask_name">New Task</label>
                    </div>

                    <div class="form-group form-floating mb-3 ">
                        <input type="datetime-local" id="duedate" name="duedate" class="form-control" />
                        <label for="duedate">Due</label>
                    </div>

                    <div class="form-group form-floating mb-3 ">
                        <select class="form-select" name="priority" id="priority">
                            <option selected value="">Select one</option>
                            <option value="High">High</option>
                            <option value="Middle">Middle</option>
                            <option value="Low">Low</option>
                        </select>
                        <label for="priority">Priority</label>
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary w-100">Add Task</button>
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
     
        @if($data !== [])
        <div class="my-3">

            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>Group Member</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="2">{{$group[0]->user_name}}</td>
                    </tr>
                    <tr>
                        <td colspan="2">{{$group[0]->member1_name}}</td>
                    </tr>
                    <tr>
                        <td colspan="2">{{$group[0]->member2_name}}</td>
                    </tr>

                </tbody>
            </table>
        </div>
        @endif
@if(auth()->user()->subscription=="free")
<button class="btn btn-danger w-100" onclick="subscribe()">Delete Group <i class="bi bi-gem"></i></button>
@else
<a href="/deletegroup/{{$group_id}}" class="btn btn-danger w-100">Delete Group</a>
            @endif
<script>
            const myModal = new bootstrap.Modal(
                document.getElementById("modalId"),
                options,
            );
        </script>
    </div>
    {{-- lists of appointment --}}
    <div class="col-10 border p-2">
        <div id="task_list">
            <table class="table">
                @foreach ($data as $date => $items)
                <thead>
                    <tr>
                        <th colspan="4">{{$date}}</th>
                    </tr>
                    <tr>
                        <th>Task</th>
                        <th>Due</th>
                        <th class="text-end">Actions</th>
                    </tr>
                    @foreach ($items as $item)
                    <tr class="align-middle">
                        <td>{{$item->grouptask_name}}</td>
                        <td>{{Str::substr($item->grouptask_duetime, 0, 5)}}

                        </td>
                        <td class="text-end">
                            @if(auth()->user()->subscription == 'free')
                            <button onclick="subscribe()" class="btn"><i
                                class="bi bi-trash3"></i></button>
                        &nbsp;
                            @else
                            <a href="/deletegrouptask/{{$item->grouptask_id}}" class="btn"><i
                                class="bi bi-trash3"></i></a>
                                @endif
                                &nbsp;
                        </td>
                    </tr>
                    @endforeach
                </thead>
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