<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">

    <title>Login Page</title>

    <style>
        *{
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body>
    <center>
        <div class="container">
            <h1 style="color: blue;">LOGIN PAGE</h1><br />
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="form-group">
                @csrf
                @method('POST')
                <div class="col-md-5 mt-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" required autocomplete="off">
                </div>
                <div class="col-md-5 mt-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="col-md-5 mt-3">
                    <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember" class="form-label">Remember Me</label>
                </div>

                <div class="col-md-12 mt-3">
                    <button type="submit" class="btn btn-primary">Log in</button>
                </div>


                <div class="col-md-12 mt-4">
                    <a href="{{ route('showRegister') }}">Don't have account? Click here</a>
                </div>
            </form>
        </div>
    </center>
</body>

</html>
