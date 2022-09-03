@extends('Layout.main')
@section('container')

<!doctype html>
<html lang="en">

<head>

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="signin.css" rel="stylesheet">

  <title>Register</title>
</head>

<body class="text-center">

  <main class="form-signin">
    <form method="POST" action="/register/insertRegister">
      @csrf
      <!-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
      <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-send mb-3" viewBox="0 0 16 16">
        <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
      </svg>
      <h1 class="h3 mb-3 fw-normal">Form Registration</h1>

      <div class="form-floating text-start">
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="floatingInput" placeholder="Sendy Apriatna" name="name" required value="{{ old('name')}}">
        <label for="floatingInput">Name</label>
        @error('name')
        <div class="invalid-feedback">
          {{$message}}
        </div>
        @enderror
      </div>
      <div class="form-floating text-start">
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" name="email" required value="{{ old('email')}}">
        <label for="floatingInput">Email address</label>
        @error('email')
        <div class="invalid-feedback">
          {{$message}}
        </div>
        @enderror
      </div>
      <div class="form-floating text-start">
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" name="password" required>
        <label for="floatingPassword">Password</label>
        @error('password')
        <div class="invalid-feedback">
          {{$message}}
        </div>
        @enderror
      </div>

      <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
      <small class="d-block text-center mt-3">Have account? <a href="/login" style="text-decoration: none;">Log in</a></small>
      <p class="mt-3 mb-3 text-muted">&copy; Sendy Apriatna 2022</p>
    </form>
  </main>
</body>

</html>

@endsection