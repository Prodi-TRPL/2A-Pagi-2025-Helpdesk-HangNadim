<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NadimDesk Login</title>
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('css/login.css') }}"></link>
</head>

<body>

  <div class="container-login">

    <div class="welcome-section position-relative">
      <div class="position-absolute top-0 z-3" style="left: 35px; padding-top: 16px;">
        <a href="{{ route('home') }}" class="btn btn-outline-light btn-sm rounded-pill fw-semibold">
              <i class="fas fa-arrow-left me-1"></i>Beranda
        </a>
      </div>
        <h1 class="mb-4">Welcome to NadimDesk</h1>  
        <p>Please log in using your administrator credentials to access the NadimDesk dashboard.
          Access is restricted to authorized personnel only.</p>
    </div>

    <div class="form-section">
      <img src="hnd_logo.jpg" alt="Icon" class="mb-4 d-block mx-auto" style="width: 150px;">
      <h2 class="mb-4">Log in</h2>

      <form action="/login" method="POST" class="prevent-multiple-submit" novalidate>
        @csrf

      <div class="mb-3">
        <div class="input-group">
          <span class="input-group-text"><i class="fa fa-user"></i></span>
          <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>
        @error('email') <small class="text-danger"> {{ $message }}</small>@enderror
      </div>

      <div class="mb-4">
        <div class="input-group">
          <span class="input-group-text"><i class="fa fa-lock"></i></span>
          <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        @error('password') <small class="text-danger"> {{ $message }}</small>@enderror
       
        <div class="mb-4 form-group">
          <div class="custom-control custom-checkbox small">
              <input type="checkbox" class="custom-control-input" name="remember" id="customCheck">
              <label class="custom-control-label" for="customCheck">Remember Me</label>
          </div>
      </div>
        <button type="submit" class="btn btn-primary rounded-pill fw-bold w-100 mt-3">Log in</button>
      </form>

    </div>
  </div>

  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/disable_button.js') }}"></script>

</body>
</html>
