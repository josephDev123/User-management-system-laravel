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
      <a class="nav-link" href="#"><i style='color:gray' class="fa fa-bell"></i></a>
      </li>   
      <div class="dropdown dropstart" style=margin-right:'10px'>
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
      <img src="/images.png" width="40" height="30" class="rounded-circle img-fluid"/>
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item" href="#">Action</a></li>
          <li><a class="dropdown-item" href="#">Another action</a></li>
          <li><a class="dropdown-item" href="#">Something else here</a></li>
      </ul>
      </div>

    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <a class="nav-link px-3" href="#">Sign out</a>
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
              <a class="nav-link" href="#">
                <span data-feather="shopping-cart"></span>
                Products
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="users"></span>
                Customers
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="bar-chart-2"></span>
                Reports
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="layers"></span>
                Integrations
              </a>
            </li>
          </ul>
  
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Saved reports</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
              <span data-feather="plus-circle"></span>
            </a>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Current month
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Last quarter
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Social engagement
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Year-end sale
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
            <img src="images/man-avatar.jpg" alt="" class="img-responsive" width="120" height="120">
<br><br>
      <h4>Profile</h4>
      <h6 style="background: rgb(223, 220, 220); font-weight:normal; padding: 4px"><i class="fa fa-user"></i> {{ Auth::user()->name }} </h6>
      <h6 style="background: rgb(223, 220, 220); font-weight:normal; padding: 4px"><i class="fa fa-calendar-alt"></i> {{ Auth::user()->created_at }} </h6>
            <form method="POST" action="profile.php">
              @csrf
              <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" aria-describedby="title">
              </div>

              <div class="mb-3">
                <label for="git_account" class="form-label">Git account</label>
                <input type="text" class="form-control" id="git_account" aria-describedby="title">
              </div>

              <div class="mb-3">
                <label for="link" class="form-label">LinkedIn account</label>
                <input type="text" class="form-control" id="link" aria-describedby="title">
              </div>

              <div class="mb-3">
                <label for="file" class="form-label">profile image</label>
                <input type="file" class="form-control" id="file" aria-describedby="file">
              </div>
              <div class="mb-3">
                <label for="profile_detail" class="form-label">Personal Detail</label>
                <textarea class="form-control" id="profile_detail"></textarea>
              </div>
             
              <button type="submit" class="btn btn-primary">Submit profile</button>
            </form>

            {{-- edit profile --}}
            <form method="POST" action="profile.php">
              @csrf
              @method('put');
              <button type="submit" class="btn btn-primary">Update your profile</button>
            </form>
         </div>

         <div class="col-sm-8">
         <h3><i class="fa fa-info-circle"></i> Personal details</h3>
          
         

        </div>

       </div>
      </main>

       {{-- end main section --}}



    </div>
  </div>
@endsection