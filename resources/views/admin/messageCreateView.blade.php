

@extends('layout.main');
@section('title', 'message page');
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

     @forelse ($profileData as $profile)
      <img src="{{ asset('/profile_images/'.$profile->photo_url) }}" alt="" class="img-fluid" width="30" height="30" >  
      @empty
      <img src="/images.png" class="rounded-circle img-fluid" width="30" height="30"/> 
    @endforelse
     
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item" href="#">Action</a></li>
          <li><a class="dropdown-item" href="#">Another action</a></li>
          <li><a class="dropdown-item" href="#">Something else here</a></li>2021_09_08_151714_create_profiles_table.php
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
          <h4 class="h5">Create message</h4>
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

       <div class="row justify-content-center">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
           <div class="col-8">
                <form method="post" action="/store_message">
                    @csrf
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="Title" name="subject" aria-describedby="subject of content">
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label"> Content</label>
                        <textarea class="form-control" id="content" rows="3" name="content"></textarea>
                      </div>
                
                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
           </div>
        
       </div>
      </main>

       {{-- end main section --}}



    </div>
  </div>
@endsection