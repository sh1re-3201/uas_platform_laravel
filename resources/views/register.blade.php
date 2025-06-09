<!DOCTYPE html>
<html lang="id">
<head>
  <!-- Metadata dasar untuk dokumen HTML -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register</title>
  
  <!-- CSS styling untuk halaman registrasi -->
  <style>
    /* Styling dasar untuk body halaman */
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f9f9f9;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    /* Styling untuk form registrasi */
    .register-form {
      background-color: white;
      padding: 40px 30px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
      width: 100%;
      max-width: 350px;
      text-align: center;
    }

    /* Styling untuk judul form */
    .register-form h2 {
      font-size: 19px;
      color: #000000;
      margin-bottom: 25px;
    }

    /* Styling untuk setiap grup input */
    .form-group {
      margin-bottom: 18px;
      text-align: left;
    }

    /* Styling untuk input fields */
    .form-group input {
      width: 90%;
      padding: 12px 15px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
      background-color: #fefefe;
    }

    /* Styling untuk pesan error */
    .error-message {
      color: red;
      font-size: 13px;
      margin-top: 5px;
    }

    /* Styling untuk tombol submit */
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

    /* Efek hover pada tombol */
    .register-form button:hover {
      background-color: #1d4ed8;
    }

    /* Styling untuk teks di bagian bawah form */
    .bottom-text {
      margin-top: 20px;
      font-size: 14px;
      color: #888;
    }

    /* Styling untuk link di bagian bawah */
    .bottom-text a {
      color: #2563eb;
      text-decoration: none;
      font-weight: 500;
    }

    /* Efek hover pada link */
    .bottom-text a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <!-- Form registrasi dengan event handler onsubmit -->
  <form class="register-form" onsubmit="return validateForm()" novalidate>
    <!-- Judul form -->
    <h2>WELCOME<br><span style="font-weight: bold; color: #555;">Sign up to your account</span></h2>

    <!-- Input field untuk nama lengkap -->
    <div class="form-group">
      <input type="text" id="name" placeholder="Nama Lengkap" />
      <div class="error-message" id="error-name"></div>
    </div>

    <!-- Input field untuk email -->
    <div class="form-group">
      <input type="text" id="email" placeholder="Alamat Email" />
      <div class="error-message" id="error-email"></div>
    </div>

    <!-- Input field untuk password -->
    <div class="form-group">
      <input type="password" id="password" placeholder="Kata Sandi" />
      <div class="error-message" id="error-password"></div>
    </div>

    <!-- Input field untuk konfirmasi password -->
    <div class="form-group">
      <input type="password" id="confirm" placeholder="Konfirmasi Kata Sandi" />
      <div class="error-message" id="error-confirm"></div>
    </div>

    <!-- Tombol submit -->
    <button type="submit">Daftar</button>
    
    <!-- Teks dan link untuk login jika sudah punya akun -->
    <div class="bottom-text">
      Sudah punya akun? <a href="/login">Masuk</a>
    </div>
  </form>

  <!-- JavaScript untuk validasi form -->
  <script>
    /* Fungsi untuk validasi form sebelum submit */
    function validateForm() {
      let valid = true;
      
      // Reset semua pesan error
      document.querySelectorAll(".error-message").forEach(e => e.textContent = "");

      // Ambil nilai dari setiap input field
      const name = document.getElementById("name").value.trim();
      const email = document.getElementById("email").value.trim();
      const password = document.getElementById("password").value.trim();
      const confirm = document.getElementById("confirm").value.trim();

      // Validasi nama
      if (name === "") {
        document.getElementById("error-name").textContent = "Nama wajib diisi!";
        valid = false;
      }

      // Validasi email
      if (email === "") {
        document.getElementById("error-email").textContent = "Email wajib diisi!";
        valid = false;
      } else if (!validateEmail(email)) {
        document.getElementById("error-email").textContent = "Format email tidak valid! Gunakan format seperti user@email.com.";
        valid = false;
      }

      // Validasi password
      if (password === "") {
        document.getElementById("error-password").textContent = "Kata sandi wajib diisi!";
        valid = false;
      }

      // Validasi konfirmasi password
      if (confirm === "") {
        document.getElementById("error-confirm").textContent = "Konfirmasi kata sandi wajib diisi!";
        valid = false;
      } else if (password !== confirm) {
        document.getElementById("error-confirm").textContent = "Konfirmasi tidak cocok dengan kata sandi!";
        valid = false;
      }

      return valid;
    }

    /* Fungsi untuk validasi format email   */
    function validateEmail(email) {
      const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return re.test(email.toLowerCase());
    }
  </script>
</body>
</html>