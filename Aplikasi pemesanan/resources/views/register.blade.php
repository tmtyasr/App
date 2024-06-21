<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{ asset('img/icon/Screenshot_2023-11-14_122440-removebg-preview.png') }}"/>
    <title>User Register</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
      }
      h1 {
        text-align: center;
      }
      form {
        background-color: #686D76;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        color: #fff;
      }
      form label {
        display: block;
        margin-bottom: 5px;
        color: #fff;
      }
      form input[type="text"],
      form input[type="email"],
      form input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 3px;
        border: 1px solid #ccc;
        box-sizing: border-box;
      }
      .success, .danger, form button {
        width: 100%;
        padding: 10px;
        background-color: #B4B4B8;
        border: none;
        color: #000000;
        border-radius: 3px;
        cursor: pointer;
        transition: background-color 0.3s;
        font-weight: bold;
      }
      form button:hover {
        background-color: #C7C8CC;
      }
      p {
        text-align: center;
      }
      p a {
        text-decoration: none;
        color: #686D76;
        font-weight: bold;
      }

      .success, .danger {
            border-style: solid;
            border-color: #686D76;
            border-radius: 999px;
            background-color: transparent;
            text-align: center;
        }

    </style>
  </head>

  <body class="bg-light">
    <div>
      <h1>Register Page</h1>
      <form action="{{ route('account.processRegister') }}" method="post">
        @csrf
        @if (Session::has('success'))
          <div class="success">{{ Session::get('success') }}</div>
        @endif
        @if (Session::has('error'))
          <div class="danger">{{ Session::get('error') }}</div>
        @endif

        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ old('name') }}" required class="form-control @error('name') is-invalid @enderror">
        @error('name')
          <p class="invalid-feedback">{{ $message }}</p>
        @enderror

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ old('email') }}" required class="form-control @error('email') is-invalid @enderror">
        @error('email')
          <p class="invalid-feedback">{{ $message }}</p>
        @enderror

        <label for="phone">Phone:</label>
        <input type="text" name="phone" value="{{ old('phone') }}" required class="form-control @error('phone') is-invalid @enderror">
        @error('phone')
          <p class="invalid-feedback">{{ $message }}</p>
        @enderror

        <label for="password">Password:</label>
        <input type="password" name="password" required class="form-control @error('password') is-invalid @enderror">
        @error('password')
          <p class="invalid-feedback">{{ $message }}</p>
        @enderror

        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" name="password_confirmation" required class="form-control @error('password_confirmation') is-invalid @enderror">
        @error('password_confirmation')
          <p class="invalid-feedback">{{ $message }}</p>
        @enderror

        <button type="submit">Register</button>
      </form>

      <p>Already have an account? <a href="{{ route('account.login') }}">Login</a></p>
    </div>
  </body>
</html>
