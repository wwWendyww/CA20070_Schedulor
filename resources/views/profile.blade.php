@extends('layouts.parent')
@section('title')
My Profile | Schedulor
@endsection
@section('content')
<div class="row justify-content-center">
  <div class="col-6">
    <h4 class="pagetitle" style="font-size:2rem">
      Welcome Back! {{auth()->user()->user_name}}
    </h4>
  </div>
</div>
<div class="row justify-content-center">
  <div class="col-6">
    <div class="card shadow">
      <div class="card-body">
        <div class="row">
          <div class="col-11">
            <h5 class="card-title">Your Profile &nbsp;
              @if(strtoupper(auth()->user()->subscription)=="FREE")
              <span class="badge bg-secondary">{{strtoupper(auth()->user()->subscription)}}
              </span>
              @else
              <span class="badge bg-warning">{{strtoupper(auth()->user()->subscription)}}
              </span>
              @endif
          </div>
          <div class="col-1">
            <a href="/profile/{{$user->id}}"></a>
            <!-- Modal trigger button -->
            @if(auth()->user()->type=="type")
            @endif
            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalId">
              <i class="bi bi-pencil-square"></i>
            </button>

            <!-- Modal Body -->
            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
            <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
              role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                      Edit Profile
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="/editprofile/{{$user->id}}" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
                          value="{{$user->user_name}}" />
                      </div>
                      <div class="mb-3">
                        <label for="email" class="form-label">Email Adddress</label>
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="helpId"
                          value="{{$user->user_email}}" />
                      </div>
                      <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password"
                          aria-describedby="helpId" />
                      </div>
                      <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">
                          Reset
                        </button>
                        <button type="submit" class="btn btn-primary">Save</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <!-- Optional: Place to the bottom of scripts -->
            <script>
              const myModal = new bootstrap.Modal(
                document.getElementById("modalId"),
                options,
              );
            </script>

          </div>
        </div>
        </h5>
        <table class="table">
          <tr>
            <th>Your Name: </th>
            <td>{{$user->user_name}}</td>
          </tr>

          <tr>
            <th>Your Email Address: </th>
            <td>{{$user->user_email}} </td>
          </tr>

          <tr>
            <th>Subscription: </th>
            <td>
              {{strtoupper($user->subscription)}}
              @if(strtoupper($user->subscription)=="FREE")
              &nbsp; <a href="/subscription">Click Me For Subscribe</a>
            </td>
            @endif
          </tr>
        </table>
        @if(session('success'))
        <div class="alert alert-success">
          <div class="alert">{{session("success")}}</div>
        </div>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection