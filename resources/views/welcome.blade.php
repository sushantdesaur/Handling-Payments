<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DreamBig Payment Collection - @yield('title') Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
</head>
<body>
    {{-- Navbar --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="{{ url('/') }}">DreamBig Payment Collection</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('/courses') }}">Courses</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('/checkout') }}" aria-disabled="true">Checkout</a>
                  </li>
                </ul>
                @if (Route::has('login'))
                <div class="d-flex justify-content-end  ">
                    <form class="container-fluid">
                        @auth
                            <a href="#" class="button-nav">
                                <button class="btn btn-outline-danger me-2" type="button">Logout</button>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="button-nav">
                                <button class="btn btn-outline-primary me-2" type="button">Log in</button>
                            </a> 
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="button-nav">
                                <button class="btn btn-outline-success me-2" type="button">Register</button>
                            </a>
                        @endif
                    @endauth
                    </form>
                </div>
                @endif
              </div>
            </div>
          </nav>
          @yield('navbar')
        </header>

    <div class="container pt-4">
        @yield('content')
    </div>
    {{-- Footer --}}
      

</body>

</html>