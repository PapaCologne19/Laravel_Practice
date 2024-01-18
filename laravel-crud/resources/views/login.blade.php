<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>

<body>
    <center>
        <h1>Login Page</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login') }}" method="post">
            @csrf
            @method('post')
            <div class="col-md-12">
                <label for="" class="form-label">Email</label> <br>
                <input type="text" name="email" required>
            </div>
            <br>
            <div class="col-md-12">
                <label for="" class="form-label">Password</label> <br>
                <input type="password" name="password" id="" required>
            </div><br>

            <div class="col-md-12">
                <button type="submit" name="login">Login</button>
            </div> <br><br>

            <a href="{{ route('showRegistrationForm') }}">Don't have account? Register here</a>
        </form>
    </center>
</body>

</html>
