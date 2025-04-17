<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login - Project E-Learning</title>
  <link rel="stylesheet" href="pkss/style.css" />
</head>
<body>
  <!-- Background pattern -->
  <img class="pattern-top-right" src="pkss/img/DC8-1.png" alt="Pattern Top Right"/>
  <img class="pattern-bottom-left" src="pkss/img/DC8-2.png" alt="Pattern Bottom Left"/>

  <div class="login-wrapper">
    <div class="login-box">
      <img class="logo" src="pkss/img/logo-1.png" alt="Logo"/>
      <h1>Welcome</h1>

    <form method="POST" action="{{ url('/login') }}">
        @csrf
        <label for="nik">NIK</label>
        <input type="text" id="nik" name="email" class="input-field" />
  
        <label for="password">Password</label>
        <input type="password" id="password" name="password" class="input-field" />
  
        <div class="forgot-password"><a href="#">Forgot Password?</a></div>
  
        <button type="submit" class="login-button" onclick="login()">Login</button>
    </form>
    </div>
  </div>

  <script>
    function login() {
      const nik = document.getElementById("nik").value;
      const password = document.getElementById("password").value;

      if (nik && password) {
        window.location.href = "dashboard.html";
      } else {
        alert("Silakan isi NIK dan Password terlebih dahulu.");
      }
    }
  </script>
</body>
</html>

