<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <center>
        <h1>Register Page</h1>    
        <form action="{{ route('register') }}" method="post">
            @csrf
            @method('post')
            <div class="col-md-12">
                <label for="" class="form-label">Email</label> <br>
                <input type="text" name="email" id="email" required>
            </div>
            <br>
            <div class="col-md-12">
                <label for="" class="form-label">Name</label> <br>
                <input type="text" name="name" id="name" required>
            </div>
            <br>
            <div class="col-md-12">
                <label for="" class="form-label">Password</label> <br>
                <input type="password" name="password" id="password" required>
            </div><br>

            <div class="col-md-12">
                <button type="submit" name="register">Register</button>
            </div> <br><br>

            <a href="{{ route('showLoginForm') }}">Back to Login Page</a>
        </form>
    </center> 
</body>
</html>