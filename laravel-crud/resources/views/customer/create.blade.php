<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Product</title>
</head>
<body>
    <a href="{{ route('customer.index') }}">Back</a>
    <center>
        <h1>Add an Customer</h1>
        <form action="{{ route('customer.store') }}" method="post" class="form">
            @csrf
            @method('post')
            <div class="col-md-12">
                <label for="" class="form-label">Firstname</label><br>
                <input type="text" name="firstname" id="firstname" class="form-control" required>
            </div>
            <div class="col-md-12">
                <label for="" class="form-label">Middlename</label><br>
                <input type="text" name="middlename" id="middlename" class="form-control" required>
            </div>
            <div class="col-md-12">
                <label for="" class="form-label">Lastname</label><br>
                <input type="text" name="lastname" id="lastname" class="form-control" required>
            </div>
            <div class="col-md-12">
                <label for="" class="form-label">Email Address</label><br>
                <input type="email" name="email_address" id="email_address" class="form-control" required>
            </div>

            <div class="col-md-12">
                <button type="submit" name="submit">Submit</button>
            </div>
        </form>
    </center>
</body>
</html>