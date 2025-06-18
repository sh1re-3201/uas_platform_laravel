<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-lg p-4" style="min-width: 350px; max-width: 400px; width: 100%;">
            <h3 class="text-center mb-3 fw-bold">ACCOUNT</h3>
            <h5 class="text-center mb-4 text-muted">Login</h5>
            <p class="text-center mb-4">Welcome back! Please login to your account.</p>

            <hr>
           
            @if(session('error'))
            <div class="alert alert-danger">
                <b>Opps!</b> {{session('error')}}
            </div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <h4>{{ $error }}</h4>
                    @endforeach
                </ul>
            </div>
            @endif
   
            <form action="{{ route('actionlogin') }}" method="post">
            @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required="">
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required="">
                </div class="d-grid">
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
            <hr class="my-4">

            <p class="text-center mb-0">Don't Have an Account? <a href="{{ route('register') }}">Register</a></p>
        </div>
    </div>
</body>
</html>