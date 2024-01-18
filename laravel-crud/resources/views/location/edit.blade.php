<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Location</title>
</head>
<body>
    <a href="{{ route('location.index') }}">Back</a>
    <center>
        <h1>Update Location</h1>
        
        <form action="{{ route('location.update', ['location' => $location]) }}" method="post" class="form">
            @csrf
            @method('put')
            <div class="col-md-12">
                <label for="" class="form-label">Street</label><br>
                <input type="text" name="street" id="street" class="form-control" value="{{ $location->street }}" required>
            </div>
            <div class="col-md-12">
                <label for="" class="form-label">Barangay</label><br>
                <input type="text" name="barangay" id="barangay" class="form-control" value="{{ $location->barangay }}" required>
            </div>
            <div class="col-md-12">
                <label for="" class="form-label">City</label><br>
                <input type="text" name="city" id="city" class="form-control" value="{{ $location->city }}" required>
            </div>
            <div class="col-md-12">
                <label for="" class="form-label">Region</label><br>
                <input type="text" name="region" id="region" class="form-control" value="{{ $location->region }}" required>
            </div>
            <div class="col-md-12">
                <label for="" class="form-label">Country</label><br>
                <input type="text" name="country" id="country" class="form-control" value="{{ $location->country }}" required>
            </div>

            <div class="col-md-12">
                <button type="submit" name="submit">Submit</button>
            </div>
        </form>
    </center>
</body>
</html>