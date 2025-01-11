<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>water</title>
    <link rel="stylesheet" href="{{ asset('styles/layout.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-custom">
        <div class="container-fluid">
          <a class="navbar-brand" href="javascript:void(0)">Water</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <a class="nav-link" href="">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="">Bills</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="">Water usage</a>
              </li>
              <li class="nav-item" >
                <a class="nav-link" href="">Messages</a>
              </li>
              <li class="nav-item" >
                <a class="nav-link" href="">Admin</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <div class="container">
        @yield('content')
    </div>
    @yield('footer')
    
</body>
</html>