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
                <a class="nav-link" href="{{ route('home')}}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('bill')}}">Bills</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="">Water usage</a>
              </li>
              <li class="nav-item" >
                <a class="nav-link" href="{{ route('messages')}}">Messages</a>
              </li>
              <li class="nav-item" >
                <a class="nav-link" href="{{ route('admin')}}"  data-bs-toggle="modal" data-bs-target="#myModal">Admin</a>
              </li>
            </ul>
            <a class="nav-link" href="#">@if(isset($name)){{ $name }} @endif</a>
          </div>
        </div>
      </nav>
    <div class="container">
        @yield('content')
    </div>
    @yield('footer')
  

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Admin Login</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="post" action="{{ route('adminpost') }}">
          @csrf
          <label>Email</label><br>
          <input type="email" id="email" class="form-control" name="email" required><br>
          <label>Password</label><br>
          <input type="password" id="password" class="form-control" name="password" required><br>
          <input type="submit" class="btn btn-custom" value="Login">
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
</body>
</html>