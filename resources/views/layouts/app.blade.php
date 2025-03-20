<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Home')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @yield('style')
  </head>
<body>
  <div class="container-fluid m-0 p-0">
    <div class="row row-cols-2 w-100" style="height: 100vh">       
      <div class="col-3 position-fixed">
        {{-- Sidebar --}}
<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark position-s" style="width: 280px; height: 100vh;">
  <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
    <span class="fs-4">Admin Dashboard</span>
  </a>
  <hr>
  <ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
      <a href="#" class="nav-link {{ request()->routeIs('home') ? 'active' : 'text-white' }}" aria-current="page">
        <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
        Home
      </a>
    </li>
    <li>
      <a href="#" class="nav-link {{ request()->routeIs('products') ? 'active' : 'text-white' }}">
        <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
        Users
      </a>
    </li>
    <li>
      <a href="{{route('orders.index')}}" class="nav-link {{ request()->routeIs('orders.index') ? 'active' : 'text-white' }}">
        <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
        Orders
      </a>
    </li>
    <li>
      <a href="#" class="nav-link {{ request()->routeIs('products.index') ? 'active' : 'text-white' }}">
        <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
        Products
      </a>
    </li>
    <li>
      <a href="#" class="nav-link {{ request()->routeIs('category.index') ? 'active' : 'text-white' }}">
        <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
        Categories
      </a>
    </li>
  </ul>
  <hr>
  <div class="dropdown">
    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
      <img src="https://avatars.githubusercontent.com/u/177164340?v=4" alt="" width="32" height="32" class="rounded-circle me-2">
      <strong>Admin</strong>
    </a>
    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
      <li><a class="dropdown-item" href="#">New project...</a></li>
      <li><a class="dropdown-item" href="#">Settings</a></li>
      <li><a class="dropdown-item" href="#">Profile</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item" href="#">Sign out</a></li>
    </ul>
  </div>
</div>
      </div>
      <div class="col-9" style="margin-left: 280px;">
              @yield('content')
      </div>
    </div>
  </div>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    
</body>
</html>