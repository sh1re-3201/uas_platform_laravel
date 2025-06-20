<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register</title>
  <style>
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
    }
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f9f9f9;
      min-height: 100vh;
      margin: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      box-sizing: border-box;
    }

    .register-form {
      background-color: white;
      padding: 40px 30px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
      width: 100%;
      max-width: 400px;
      text-align: center;
    }

    .register-form h2 {
      font-size: 19px;
      color: #000;
      margin-bottom: 25px;
    }

    .form-group {
      margin-bottom: 18px;
      text-align: left;
    }

    .form-group input,
    .form-group select {
      width: 95%;
      padding: 12px 15px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
      background-color: #fefefe;
    }

    .error-message {
      color: red;
      font-size: 13px;
      margin-top: 5px;
    }

    .register-form button {
      width: 100%;
      padding: 12px;
      background-color: #2563eb;
      color: white;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      margin-top: 10px;
      transition: background-color 0.2s;
    }

    .register-form button:hover {
      background-color: #1d4ed8;
    }

    .bottom-text {
      margin-top: 20px;
      font-size: 14px;
      color: #888;
    }

    .bottom-text a {
      color: #2563eb;
      text-decoration: none;
      font-weight: 500;
    }

    .bottom-text a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <form class="register-form" method="POST" action="{{ route('register') }}" onsubmit="return validateForm()" novalidate>
    @csrf

    <h2>WELCOME<br><span style="font-weight: bold; color: #555;">Sign up to your account</span></h2>

{{-- Flash Message Sukses --}}
@if (session('success'))
  <div style="background-color: #d1e7dd; color: #0f5132; padding: 10px 15px; border-radius: 6px; margin-bottom: 20px; font-size: 14px;">
    {{ session('success') }}
  </div>
@endif

{{-- Error Message --}}
@if ($errors->any())
  <div class="error-message" style="background-color: #f8d7da; color: #842029; padding: 10px 15px; border-radius: 6px; margin-bottom: 20px; font-size: 14px;">
    <ul style="list-style: none; padding: 0; margin: 0;">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif


    <div class="form-group">
      <input type="text" id="name" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}" />
      <div class="error-message" id="error-name"></div>
    </div>

    <div class="form-group">
      <input type="text" id="email" name="email" placeholder="Alamat Email" value="{{ old('email') }}" />
      <div class="error-message" id="error-email"></div>
    </div>

    <div class="form-group">
      <input type="password" id="password" name="password" placeholder="Kata Sandi" />
      <div class="error-message" id="error-password"></div>
    </div>

    <div class="form-group">
      <input type="password" id="confirm" name="password_confirmation" placeholder="Konfirmasi Kata Sandi" />
      <div class="error-message" id="error-confirm"></div>
    </div>

    <button type="submit">Daftar</button>

    <div class="bottom-text">
      Sudah punya akun? <a href="/login">Masuk</a>
    </div>
  </form>

  <script>
    function validateForm() {
      let valid = true;
      document.querySelectorAll(".error-message").forEach(e => e.textContent = "");

      const name = document.getElementById("name").value.trim();
      const email = document.getElementById("email").value.trim();
      const password = document.getElementById("password").value.trim();
      const confirm = document.getElementById("confirm").value.trim();

      if (!name) {
        document.getElementById("error-name").textContent = "Nama wajib diisi!";
        valid = false;
      }

      if (!email) {
        document.getElementById("error-email").textContent = "Email wajib diisi!";
        valid = false;
      } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        document.getElementById("error-email").textContent = "Format email tidak valid!";
        valid = false;
      }

      if (!password) {
        document.getElementById("error-password").textContent = "Password wajib diisi!";
        valid = false;
      }

      if (!confirm || password !== confirm) {
        document.getElementById("error-confirm").textContent = "Konfirmasi tidak cocok!";
        valid = false;
      }

      return valid;
    }
  </script>
</body>
</html>
