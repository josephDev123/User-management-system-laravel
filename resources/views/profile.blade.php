<?php 
// use App\Models\Profiles; 
// use App\Models\User; 
// $profile = new Profiles;
?>

@extends('layout.main');
@section('title', 'Profile page');
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
      <img src="{{ asset('/profile_images/'.$profile->photo_url) }}" alt="" class="img-responsive" width="30" height="30">  
    @empty
    <img src="/images.png" width="40" height="30" class="rounded-circle img-fluid pe-1"/> 
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
          <h1 class="h2">Profile</h1>
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

       <div class="row">

         <div class="col-sm-4">
            <h6 class='alert alert-danger'>If no Profile image?. Upload</h6> 
          {{-- @foreach($profileData as $item) 
             @if($item)
                <img src="{{ asset('/profile_images/'.$item->photo_url) }}" alt="" class="img-responsive" width="120" height="120">
             @endif  
            @endforeach --}}

            
    @forelse ($profileData as $profile)
      <img src="{{ asset('/profile_images/'.$profile->photo_url) }}" alt="" class="img-fluid" height="200px" width="200px" >  
      @empty
      <img src="/images.png" class="rounded-circle img-fluid"/> 
    @endforelse
<br><br>

      @if ($profileData)
        @foreach ( $profileData as $item)
        <h4>{{ $item->title }}</h4>
        <br>
        {{ $item->personal_detail }}
        <br> <br>
        @endforeach
      @endif
    
      <h6 style="background: rgb(223, 220, 220); font-weight:normal; padding: 4px"><i class="fa fa-user"></i> {{ Auth::user()->name }} </h6>
      <h6 style="background: rgb(223, 220, 220); font-weight:normal; padding: 4px"><i class="fa fa-calendar-alt"></i> {{ Auth::user()->created_at }} </h6>
<br>
<hr>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (!$profileData->count())
            <form method="POST" action="{{ route('profile') }}" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="title">
              </div>

              <div class="mb-3">
                <label for="git_account" class="form-label">Git account</label>
                <input type="text" class="form-control" id="git_account" name="git_account" aria-describedby="title">
              </div>

              <div class="mb-3">
                <label for="linkedin_account" class="form-label">LinkedIn account</label>
                <input type="text" class="form-control" id="linkedin_account" name="linkedin_account" aria-describedby="title">
              </div>

              <div class="mb-3">
                <label for="phone_contact" class="form-label">Phone contact</label>
                <input type="text" class="form-control" id="phone_contact" name="phone_contact" aria-describedby="title">
              </div>

              <div class="mb-3">
                <label for="img_file" class="form-label">profile image</label>
                <input type="file" class="form-control" id="img_file" name="img_file" aria-describedby="file">
              </div>
              <div class="mb-3">
                <label for="profile_detail" class="form-label">Personal Detail</label>
                <textarea class="form-control" id="profile_detail" name="profile_detail"></textarea>
              </div>
             
              <button type="submit" class="btn btn-primary">Submit profile</button>
            </form>

            @else
            {{-- edit profile --}}
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('profile') }}" enctype="multipart/form-data">
              @csrf
              @method('PATCH')
              <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="title">
              </div>

              <div class="mb-3">
                <label for="git_account" class="form-label">Git account</label>
                <input type="text" class="form-control" id="git_account" name="git_account" aria-describedby="title">
              </div>

              <div class="mb-3">
                <label for="linkedin_account" class="form-label">LinkedIn account</label>
                <input type="text" class="form-control" id="linkedin_account" name="linkedin_account" aria-describedby="title">
              </div>

              <div class="mb-3">
                <label for="phone_contact" class="form-label">Phone contact</label>
                <input type="text" class="form-control" id="phone_contact" name="phone_contact" aria-describedby="title">
              </div>

              <div class="mb-3">
                <label for="img_file" class="form-label">profile image</label>
                <input type="file" class="form-control" id="img_file" name="img_file" aria-describedby="file">
              </div>
              <div class="mb-3">
                <label for="profile_detail" class="form-label">Personal Detail</label>
                <textarea class="form-control" id="profile_detail" name="profile_detail"></textarea>
              </div>
             
              <button type="submit" class="btn btn-primary">Update profile</button>
            </form>
            @endif
         
           
            
         </div>

         <div class="col-sm-7">
         <h3><i class="fa fa-info-circle"></i> Personal details</h3>

         @if (!$profileData->count())
             <div class="alert alert-info">
                  No Details. Update/submit your profile
             </div>
            
           @else
             
              <div style="background: rgb(235, 233, 233); padding:5px; display:flex; justify-content:space-between; font-size:15px">
                <span><i class="fab fa-github"></i></span> <span> @foreach ( $profileData as $item){{ $item->github_account }} @endforeach</span>
              </div>
              <br>

              <div style="background: rgb(235, 233, 233); padding:5px; display:flex; justify-content:space-between; font-size:15px">
                <span><i class="fab fa-linkedin"></i></span> <span>@foreach ( $profileData as $item){{ $item->linkedin_account }} @endforeach</span>
              </div>
    <br>
              <div style="background: rgb(235, 233, 233); padding:5px; display:flex; justify-content:space-between; font-size:15px">
                <span><i class="fas fa-phone-alt"></i></span> <span>@foreach ( $profileData as $item){{ $item->contact }} @endforeach</span>
              </div>
         @endif

         

        </div>

       </div>
      </main>

       {{-- end main section --}}



    </div>
  </div>
@endsection