<!DOCTYPE html>
<?php
use Illuminate\Support\Facades\Auth;

if (Auth::check()) {
  // $auth =0;
  // $auth++;
}
?>


@extends('layout.main')
@section('title', 'Welcome page')
  @section('content');

 
{{-- header --}}
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{ url('/') }}">Joe Dev</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">

    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="#"><i style='color:gray' class="fa fa-envelope fa-lg"></i></a>
      </li>
      <li class="nav-item" >
        <a href='{{ url('notification_message') }}' class="btn btn-primary position-relative btn-sm" style='margin-right:20px'>
          <i class="fa fa-bell"></i>
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            {{ $notificationModel->count() }}
            <span class="visually-hidden">unread messages</span>
          </span>
        </a>
      </li>   
      <div class="dropdown dropstart" style=margin-right:'10px'>
          <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">

        @foreach ($profileData  as $item)

            @if ( $item->photo_url)
              <img src="{{ asset('/profile_images/'.$item->photo_url) }}" alt="" class="img-responsive" width="30" height="30">
            @else
              <img src="images/female_avatar.png" width="40" height="30" class="rounded-circle img-fluid"/>
            @endif
        @endforeach 
    

          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
      </div>
      <li></li>

    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        {{-- <a class="nav-link px-3" href="{{ route('logout') }}">Sign out</a> --}}

        <form method="POST" action="{{ route('logout') }}" >
          @csrf

         <button class="btn btn-danger btn-sm"> <x-responsive-nav-link :href="route('logout')"
                  onclick="event.preventDefault();
                              this.closest('form').submit();" style="color:white; margin-right:10px">
              {{ __('Log Out') }}
          </x-responsive-nav-link>
        </button>
      </form>
      </div>
    </div>
  </header>

  {{-- end of header --}}



  {{-- navbar section --}}
  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse" style="color:white">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ url('/') }}">
                <span data-feather="home"></span>
                Dashboard
              </a>
              
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/profile') }}">
                <span data-feather="file"></span>
                Profile
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/users_details">
                <span data-feather="shopping-cart"></span>
                Users
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/admin_message') }}">
                <span data-feather="users"></span>
                Add message
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ url('/notification_message') }}">
                <span data-feather="users"></span>
                Notification
              </a>
            </li>
          
          </ul>
        </div>
      </nav>
        {{-- end navbar section --}}



   {{-- start main section --}}
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Dashboard</h1> 
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
              <button class="btn btn-success"> Welcome {{ Auth::user()->name }}</button>
              <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
              <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
              <span data-feather="calendar"></span>
              This week
            </button>
          </div>
        </div>

        {{-- @foreach ($users as $user) Welcome {{ $user->name }} --}}
        {{-- dashboard card --}}
        <div class="row">
            <div class="col-md-4 col-xl-3">
              <div class="card bg-c-blue order-card">
                  <div class="card-block">
                      <h6 class="m-b-20">Number of users</h6>
                      <h2 class="text-right"><i class="fa fa-users f-right"></i><span>{{ $users->count() }}</span></h2>
                      <p class="m-b-0">Registered users<span class="f-right">{{ $users->count() }}</span></p>
                  </div>
              </div>
            </div>

            <div class="col-md-4 col-xl-3">
              <div class="card bg-c-green order-card">
                  <div class="card-block">
                      <h6 class="m-b-20">Number of Department</h6>
                      <h2 class="text-right"><i class="fa fa-building f-right"></i><span>486</span></h2>
                      <p class="m-b-0">Departments<span class="f-right">351</span></p>
                  </div>
              </div>
            </div>

            <div class="col-md-4 col-xl-3">
              <div class="card bg-c-yellow order-card">
                  <div class="card-block">
                      <h6 class="m-b-20">Users online</h6>
                      <h2 class="text-right"><i class="fa fa-signal f-right"></i><span>{{ $ip_address }}</span></h2>
                      <p class="m-b-0">Currently Online<span class="f-right"> {{ $ip_address }}</span></p>
                  </div>
              </div>
            </div>
            
            <div class="col-md-4 col-xl-3">
              <div class="card bg-c-pink order-card">
                  <div class="card-block">
                      <h6 class="m-b-20">Notification</h6>
                      <h2 class="text-right"><i class="fa fa-bell-slash f-right"></i><span>486</span></h2>
                      <p class="m-b-0">Notification<span class="f-right">351</span></p>
                  </div>
              </div>
            </div>

            <div class="col-md-4 col-xl-3">
              <div class="card bg-c-pink order-card">
                  <div class="card-block">
                      <h6 class="m-b-20">Gender</h6>
                      <h2 class="text-right"><i class="fa fa-female f-right"></i><span>486</span></h2>
                      <p class="m-b-0">Gender<span class="f-right">351</span></p>
                  </div>
              </div>
            </div>
      </div>


  {{-- end dashboard card --}}
  
        <h2>Analytics</h2>
        <canvas id="myChart" width="400" height="400"></canvas>
      </main>

       {{-- end main section --}}


       {{-- passing the users all to js to get the length of register users --}}
<script type="text/javascript">
    window.data = {!! json_encode($users) !!}
</script>


    </div>
  </div>

  @endsection
