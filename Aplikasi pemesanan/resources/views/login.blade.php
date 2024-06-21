<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('img/icon/Screenshot_2023-11-14_122440-removebg-preview.png') }}"/>
    <title>User Login</title>
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

        h4 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 30px;
        }

        form {
            background-color: #686D76;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        form label {
            display: block;
            margin-bottom: 5px;
            color: #fff;
        }

        form input[type="text"],
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
            font-size: 15px;
        }

        form button:hover {
            background-color: #C7C8CC;
        }

        .login-link {
            margin-top: 20px;
        }

        .login-link a {
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

<body>
    <div class="container">
        <div class="card border border-light-subtle rounded-4">
            <div class="card-body p-3 p-md-4 p-xl-5">
                @if (Session::has('success'))
                <div class="success">{{ Session::get('success') }}</div>
                @endif
                @if (Session::has('error'))
                <div class="danger">{{ Session::get('error') }}</div>
                @endif
                <h4>Login Here</h4>
                <form action="{{ route('account.authenticate') }}" method="post">
                    @csrf
                    <label for="email">Email:</label>
                    <input type="text" required class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" placeholder="Email">
                    @error('email')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror

                    <label for="password">Password:</label>
                    <input type="password" required class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
                    @error('password')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror

                    <button type="submit">Login</button>
                </form>
                    <p class="login-link">Don't have an account? <a href="{{ route('account.register') }}">Create new account</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" -->
        <!-- integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->

        
</body>

</html>
