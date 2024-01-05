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
        <h4 class="pagetitle">Task List</h4>
        <form class="d-flex " role="search">
            <div class="form-group form-floating w-100 " method="GET">
                <input type="datetime" name="search" id="search" class="form-control" type="search">
                <label class="form-label" for="search">Search Task</label>
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
                class="bi bi-plus-circle"></i>&nbsp;Task</button>


        <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
            id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title " id="offcanvasScrollingLabel">Create Your Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <form class="form d-flex flex-column flex-fill" action="/submittask" method="post">
                    @csrf
                    <div class="form-group form-floating mb-3">
                        <input type="text" id="task_name" name="task_name" class="form-control" required />
                        <label for="task_name">New Task</label>
                    </div>
                    <div class="form-group form-floating mb-3">
                        <textarea id="task_remarks" name="task_remarks" class="form-control h-100" required></textarea>
                        <label for="task_remarks">Remarks</label>
                    </div>
                    <div class="form-group form-floating mb-3 ">
                        <input type="datetime-local" id="duedate" name="duedate" class="form-control" required />
                        <label for="duedate">Due</label>
                    </div>
                    <div class="form-group form-floating mb-3 ">
                        <select class="form-select" name="category" id="category" required>
                            <option selected value="">Select one</option>
                            <option value="Works">Works</option>
                            <option value="Personal">Personal</option>
                            <option value="Family">Family</option>
                        </select>
                        <label for="category">Category</label>
                    </div>

                    <div class="form-group form-floating mb-3 ">
                        <select class="form-select" name="priority" id="priority" required>
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
        @if(auth()->user()->subscription=='free')
        <button class="btn btn-primary w-100 my-3" type="button" onclick="subscribe()"> <i
                class="bi bi-plus-circle"></i>&nbsp;Group @if(auth()->user()->subscription=="free")
            <i class="bi bi-gem"></i>
            @endif </a></button>
        @endif

        @if(auth()->user()->subscription=='premium')
        <button class="btn btn-primary w-100 my-3" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#groupOffcanvas" aria-controls="groupOffcanvas"> <i
                class="bi bi-plus-circle"></i>&nbsp;Group</button>
        <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
            id="groupOffcanvas" aria-labelledby="groupOffcanvasLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title " id="groupOffcanvasLabel">Add Group</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <form class="form d-flex flex-column flex-fill" action="/addgroup" method="post">
                    @csrf
                    <div class="form-group form-floating mb-3">
                        <input type="text" id="group_name" name="group_name" class="form-control" />
                        <label for="group_name">New Group</label>
                    </div>
                    <div class="form-group form-floating mb-3">
                        <textarea id="group_description" name="group_description" class="form-control h-100"></textarea>
                        <label for="group_description">Group Description</label>
                    </div>
                    <div class="form-group form-floating mb-3">
                        <input type="email" id="member1" name="member1" class="form-control h-100" />
                        <label for="member1">Member1 Email</label>
                        <p class="form-text text-muted">Make sure he/she has registered the account</p>

                    </div>
                    <div class="form-group form-floating mb-3">
                        <input type="email" id="member2" name="member2" class="form-control h-100" />
                        <label for="member2">Member 2 Email</label>
                        <p class="form-text text-muted">Make sure he/she has registered the account</p>
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary w-100">Add Group</button>
                    </div>
                </form>
            </div>
        </div>
        @endif

        @if($taskgroup !== [])
        <form action="/grouptask" method="get">
            <div class="mb-3">
                <label for="group" class="form-label">Group</label>
                <select class="form-select form-select" name="group" id="group">
                    @foreach ($taskgroup as $group)
                    <option value={{$group->group_id}}>{{$group->group_name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100">View Group Task</button>
        </form>
        @endif
        @if(session('addGroupError'))
        <div class="alert alert-danger" role="alert">
            <strong>{{session('addGroupError')}}</strong>
        </div>

        @endif
        @if(session("g_success"))
        <div
            class="alert alert-success"
            role="alert"
        >
            <strong>{{session("g_success")}}</strong> 
        </div>
        
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
                        <th colspan="5s">{{$date}}</th>
                    </tr>
                    <tr>
                        <th>Task</th>
                        <th>Remarks</th>
                        <th>Priority</th>
                        <th></th>
                        <th class="text-end">Actions</th>
                    </tr>
                    @foreach ($items as $item)
                    <tr class="align-middle">
                        <td>{{$item->task_name}}</td>
                        <td class="align-items-center">
                            {{$item->task_remarks}}
                        </td>
                        <td>{{$item->priority}}</td>
                        <td>{{Str::substr($item->task_duetime, 0, 5)}}
                        </td>
                        <td class="text-end">
                            <a href="/deletetask/{{$item->task_id}}" class="btn"><i class="bi bi-trash3"></i></a>
                            &nbsp;
                            {{-- <a href="/sharetask/{{$item->task_id}}" class="btn"><i class="bi bi-share"></i>
                            </a> --}}
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