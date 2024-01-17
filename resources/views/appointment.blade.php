@extends('layouts.parent')
@section('title')
Appointment | Schedulor
@endsection
@section('content')
<div class="row justify-content-center">
    {{-- search --}}
    <div class="col-6 ">
        <h4 class="pagetitle">Appointment</h4>
        <form class="d-flex " role="search" action="" method="GET">
            <div class="form-group form-floating w-100 ">
                <input type="datetime" name="search" id="search" class="form-control" type="search">
                <label class="form-label" for="search">Search Appointment</label>
            </div>
            <button type="submit" class="btn"><i class="bi bi-search"></i></button>
        </form>
    </div>
</div>



<div class="row m-3">
    <div class="col-2 border p-2 ">
        <!-- Modal trigger button -->
        <a class="btn btn-primary w-100" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling"
            aria-controls="offcanvasScrolling"> &nbsp; <i class="bi bi-plus-circle"></i> Appointment</a>


        <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
            id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Create Your Appointment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <form action="/submitappointment" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Appointment Title</label>
                        <input type="text" class="form-control" name="appointment_name" id="appointment_name"
                            aria-describedby="helpId" />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Appointment Agenda</label>
                        <input type="text" class="form-control" name="appointment_agenda" id="appointment_agenda"
                            aria-describedby="helpId" />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Date</label>
                        <input type="datetime-local" class="form-control" name="appointment_date" id="appointment_date"
                            aria-describedby="helpId" />
                    </div>
                    <button type="reset" class="btn btn-secondary">
                        Reset
                    </button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>

        @if(session('clientData'))
        <div class='table-responsive my-4'>
            <h4 class="pagetitle">Appoinment List</h4>
            <table class="table ">
                <tbody>
                    @foreach (session('clientData') as $item)
                    <tr>
                        <th>Name</th>
                        <td class="text-end">{{$item->client_name}}</td>
                    </tr>
                    <tr>

                        <td colspan="2" class="text-end">{{$item->client_email}}</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-end">{{$item->client_phone}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
        <div id="appointment_list">
            <table class="table">
                @foreach ($data as $date => $items)
                <thead>
                    <tr>
                        <th colspan="4">{{$date}}</th>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <th>Agenda</th>
                        <th>Time</th>
                        <th class='text-end'>Actions</th>
                    </tr>

                </thead>
                <tbody>
                    @foreach ($items as $item)

                    <tr class="align-middle">
                        <td>{{$item->appointment_name}}</td>
                        <td>
                            {{$item->appointment_agenda}}
                        </td>
                        <td>{{Str::substr($item->appointment_time, 0, 5)}}
                        </td>
                        <td class="text-end">
                            <a class="btn btn-none" href="/deleteappointment/{{$item->appointment_id}}"><i
                                    class="bi bi-trash3"></i></a>
                            @if(strtoupper(auth()->user()->subscription=="free"))


                            <button class="btn" onclick="subscribe()"><i class="bi bi-share"></i>
                            </button role="link">

                            <button href="/subscription" class="btn" onclick="subscribe()">
                                <i class="bi bi-person-check"></i>
                            </button>
                            @endif
                            @if(strtoupper(auth()->user()->subscription=="premium"))
                            <button onClick="copy({{$item->appointment_id}})" class="btn btn-none"><i
                                    class="bi bi-share"></i>
                            </button role="link">
                            <a href="/checkappointment/{{$item->appointment_id}}" class="btn">
                                <i class="bi bi-person-check"></i>
                            </a>
                            @endif
                        </td>
                    </tr>

                    @endforeach

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
    function copy(id){
        const url = window.location.href.replace('appointment', `shareappointment/${id}`);
        navigator.clipboard.writeText(url);
        alert('URL is Copied', url);
    }

    function checkAppointment(id){
        window.location.href = `/checkappointment/${id}`;
        const myModal = new bootstrap.Modal(document.getElementById("modalId"),options,);
        myModal.show();

    }
    
</script>

@endsection