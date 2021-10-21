<?php 
// use App\Models\Profiles; 
// use App\Models\User; 
// $profile = new Profiles;
?>

@extends('layout.main');
@section('title', 'users page');
@section('content');
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{ url('/') }}">Joe Dev</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">

    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="#"><i style='color:gray' class="fa fa-envelope fa-lg"></i></a>
      </li>
      <li class="nav-item">
        <a href='{{ url('notification_message') }}' class="btn btn-primary position-relative btn-sm" style='margin-right:20px'>
          <i class="fa fa-bell"></i>
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            {{ $notificationModel->count() }}
            <span class="visually-hidden">unread messages</span>
          </span>
        </a>
      </li>   
      <div class="dropdown dropstart" style=margin-right:'10px'>
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        @foreach ($profileData  as $item)

        @if ( $item->photo_url)
          <img src="{{ asset('/profile_images/'.$item->photo_url) }}" alt="" class="img-responsive" width="30" height="30">
        @else
        <img src="/images.png" width="40" height="30" class="rounded-circle img-fluid"/>
        @endif

    @endforeach 
     
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item" href="#">Action</a></li>
          <li><a class="dropdown-item" href="#">Another action</a></li>
          <li><a class="dropdown-item" href="#">Something else here</a></li>
      </ul>
      </div>

      <div class="navbar-nav">
        <div class="nav-item text-nowrap">
          {{-- <a class="nav-link px-3" href="{{ route('logout') }}">Sign out</a> --}}
  
          <form method="POST" action="{{ route('logout') }}" >
            @csrf
  
           <button class="btn btn-danger btn-sm" style="margin-left:7px; margin-top:5px;" <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();" style="color:white;">
                {{ __('Log Out') }}
            </x-responsive-nav-link>
          </button>
        </form>
        </div>
      </div>
  </header>

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
              <a class="nav-link" href="{{ url('profile') }}">
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
          <h1 class="h2">User Information</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
              <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
              <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
              <span data-feather="calendar"></span>
              This week
            </button>
          </div>
        </div>

        {{-- // information table --}}
       <div class="row">
        <div class="table-responsive">
            <table class="table table-striped caption-top">
              <caption>List of users</caption>
              <caption> <p class="alert alert-danger">Note: Only users with completed profile will be display</p></caption>
              <thead>
                <tr>
                  <th scope="col">id</th>
                  <th scope="col">Title</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Photo</th>
                  <th scope="col">Personal Detail</th>
                  <th scope="col">Contact</th>
                  <th scope="col">Github Account</th>
                  <th scope="col">LinkedIn Account</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($userProfile_detail as $item)
                  <tr> 
                      <th scope="row">{{ $item->id }}</th>
                      <td>{{ $item->title }}</td>
                      <td>{{ $item->name }}</td>
                      <td>{{ $item->email }}</td>
                      <td><img src="{{asset('profile_images/'.$item->photo_url) }}" width="70" height="70" /></td>
                      <td>{{ $item->personal_detail }}</td>
                      <td>{{ $item->contact }}</td>
                      <td>{{ $item->github_account }}</td>
                      <td>{{ $item->linkedin_account }}</td>  
                  </tr>
                @endforeach

              </tbody>
            </table>
        </div>

       </div>
      </main>

       {{-- end main section --}}



    </div>
  </div>
@endsection