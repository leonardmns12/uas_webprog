<!DOCTYPE html>

<head>

<link rel="stylesheet" href="{{asset('css/app.css')}}"/>
<script src="https://kit.fontawesome.com/4696d6047b.js" crossorigin="anonymous"></script>
<script src="{{asset('js/app.js')}}"></script>
</head>

<body class="bg-white">
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
      @guest
        <li class="nav-item">
            <a href="{{route('home')}}" class="text-white nav-link">Home</a>
        </li>
        <li class="nav-item d-flex align-items-center justify-content-center">
        <div class="dropdown">
        <a class="text-white text-decoration-none dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Category
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          @foreach($category as $categories)
          <a class="dropdown-item" href="{{route('blog.filter' , ['id' => $categories->id])}}">{{$categories->name}}</a>
          @endforeach
        </div>
      </div>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">About us</a>
        </li>
        @else
        <li class="nav-item">
            <a href="{{route('home')}}" class="text-white nav-link">Home</a>
        </li>
        <li class="nav-item">
        <div class="dropdown nav-link ">
        <a class="text-white text-decoration-none" aria-expanded="false" href="{{route('user.profile')}}">
        Profile
        </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{route('blog.view')}}">Blog</a>
        </li>
        @endguest
      </ul>
    </div>
    <div class="text-white d-flex">
    @guest
    <a class="mx-3 text-decoration-none text-white" href="{{route('auth.register')}}">
    <i class="fas fa-user"></i>
    Sign Up
    </a>
    <a class="text-decoration-none text-white" href="{{route('auth.login')}}">
    <i class="fas fa-sign-in-alt"></i>
    Login
    </a>
    @else
    <a href="{{route('logout')}}" class="text-white text-decoration-none">
    Logout
    </a>
    @endguest
  </div>
  </div>
</nav>
<main class="">
@yield('content')
</main>
</body>

</html>