<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Location</title>
</head> 
<body>
    <a href="{{ route('location.index') }}">Back</a>
    <center>
        <h1>Add Location</h1>
        <form action="{{ route('location.store') }}" method="post" class="form">
            @csrf
            @method('post')
            <div class="col-md-12">
                <label for="street" class="form-label">Street</label><br>
                <input type="text" name="street" id="street" class="form-control" required>
            </div>
            <div class="col-md-12">
                <label for="barangay" class="form-label">Barangay</label><br>
                <input type="text" name="barangay" id="barangay" class="form-control" required>
            </div>
            <div class="col-md-12">
                <label for="city" class="form-label">City</label><br>
                <input type="text" name="city" id="city" class="form-control" required>
            </div>
            <div class="col-md-12">
                <label for="region" class="form-label">Region</label><br>
                <input type="text" name="region" id="region" class="form-control" required>
            </div>
            <div class="col-md-12">
                <label for="country" class="form-label">Country</label><br>
                <input type="text" name="country" id="country" class="form-control" required>
            </div>

            <div class="col-md-12">
                <button type="submit" name="submit">Submit</button>
            </div>
        </form>
    </center>
</body>
</html>