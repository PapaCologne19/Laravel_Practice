<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Fruit</title>
</head>
<body>
    <center>
        <div class="container">
            <button type="button" class="btn" onclick="location.href = '{{ route('fruit.index') }}'">Back</button>
        </div>
        <h1>Update Fruit</h1>
        <form action="{{ route('fruit.update', ['fruit' => $fruit]) }}" method="POST" class="form-group">
            @csrf
            @method('put')
            <div class="col-md-12">
                <label for="" class="form-label">Fruit Name</label><br>
                <input type="text" name="fruit_name" value="{{ $fruit->fruit_name }}" required>
            </div>
            <div class="col-md-12">
                <label for="" class="form-label">Color</label><br>
                <input type="text" name="color" value="{{ $fruit->color }}" required>
            </div>
            <div class="col-md-12">
                <label for="" class="form-label">Taste</label><br>
                <input type="text" name="taste" value="{{ $fruit->taste }}" required>
            </div>
            <div class="col-md-12">
                <label for="" class="form-label">Quantity</label><br>
                <input type="number" name="quantity" value="{{ $fruit->quantity }}" required>
            </div>
            <div class="col-md-12">
                <label for="" class="form-label">Price</label><br>
                <input type="number" name="price" value="{{ $fruit->price }}" required>
            </div>
            <br>
            <button type="submit" name="submit">Update</button>
        </form>
    </center>
</body>
</html>