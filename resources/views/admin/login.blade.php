<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NadimDesk Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
body {
      font-family: 'Segoe UI';
      background: url('https://images.unsplash.com/photo-1504198453319-5ce911bafcde?auto=format&fit=crop&w=1950&q=80') no-repeat center center fixed;
      background-size: cover;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    body::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  background-color: rgba(255, 255, 255, 0.445); /* Putih dengan opacity 70% */
  z-index: 1;
}
.container-login {
  position: relative;
  z-index: 2; /* Di atas overlay */
}
    .container-login {
      background-color: rgba(255, 255, 255, 0.95);
      display: flex;
      max-width: 800px;
      width: 90%;
      min-height: 450px;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
      font-family: 'Segoe UI', sans-serif;
    }
    .welcome-section {
  background-color: #0d6efd ;
  color: white;
  flex: 1;
  display: flex;
  flex-direction: column;
  justify-content: center;
  padding: 47px 40px 40px 40px; /* padding atas ditambah agar tombol muat */
  position: relative;
}
    .form-section {
      flex: 1;
      padding: 40px;
      font-family: 'Segoe UI', sans-serif;
    }
    .form-section h2 {
      color: #3e3e3e;
    }
    .form-section .form-control {
      border-radius: 8px;
    }
    .form-section .btn-primary {
      border-radius: 8px;
    }
    .input-group-text {
      background-color: #e9ecef;
      border-radius: 8px 0 0 8px;
    }
    .branding h1 {
      color: #003366;
      font-family: 'Segoe UI', sans-serif;
    }
    @media (max-width: 768px) {
      .container-login {
        flex-direction: column;
      }
    }
  </style>
</head>
<body>
  <div class="container-login">
    <div class="welcome-section position-relative">
      <div class="position-absolute top-0 z-3" style="left: 35px; padding-top: 16px;">
        <a href="#home" class="btn btn-outline-light btn-sm rounded-pill fw-semibold">
              <i class="fas fa-arrow-left me-1"></i>Beranda
            </a>
          </div>
      <h1 class="mb-4">Welcome to NadimDesk</h1>  
      <p>Please log in using your personal information to access the helpdesk system. If you experience issues, contact support at support@nadimdesk.com.</p>
    </div>
    <div class="form-section">
      <img src="hnd_logo.jpg" alt="Icon" class="mb-4 d-block mx-auto" style="width: 150px;">
      <h2 class="mb-4">Log in</h2>
      <form action="/login" method="POST">
        <div class="mb-3 input-group">
          <span class="input-group-text"><i class="fa fa-user"></i></span>
          <input type="text" name="username" class="form-control" placeholder="Username" required>
        </div>
        <div class="mb-4 input-group">
          <span class="input-group-text"><i class="fa fa-lock"></i></span>
          <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-primary rounded-pill fw-bold w-100 mt-3">Log in</button>
      </form>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
