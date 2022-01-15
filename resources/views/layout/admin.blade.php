<!DOCTYPE html>
<html lang="en">
<head>
    <title>Training Project</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="#">
        <img class="img-responsive2" width="50px" src="https://ntn.com/assets/images/1.png">
    </a>

    <!-- Links -->
    <ul class="navbar-nav">
        <!-- Dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Group management
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('group.index')}}">Home</a>
                <a class="dropdown-item" href="{{ route('group.search')}}">Search</a>
                <a class="dropdown-item" href="{{ route('group.create')}}">Create</a>
            </div>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Team management
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('team.index')}}">Home</a>
                <a class="dropdown-item" href="{{ route('team.search')}}">Search</a>
                <a class="dropdown-item" href="{{ route('team.create')}}">Create</a>
            </div>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Employee management
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('employee.index')}}">Home</a>
                <a class="dropdown-item" href="{{ route('employee.search')}}">Search</a>
                <a class="dropdown-item" href="{{ route('employee.create')}}">Create</a>
            </div>
        </li>

        <li class="nav-item">
            @if(Auth::user())
            <a class="nav-link" href="{{route('admin.logout')}}">Logout: {{ Auth::user()->name }}</a>
            @endif
        </li>
    </ul>
</nav>
<br>

<div class="container">
    @yield('admin_content')
</div>

<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
</body>
</html>
