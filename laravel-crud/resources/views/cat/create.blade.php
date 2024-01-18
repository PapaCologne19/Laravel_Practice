<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Cat</title>
</head>
<body>
    <center>
        <h1>Add Cat</h1>
        <form action="{{ route('cat.store') }}" method="POST" class="form-control">
            @csrf
            @method('POST')
            <div class="col-md-12">
                <label for="" class="form-label">Cat Name</label> <br>
                <input type="text" name="cat_name" id="cat_name" class="form control" required>
            </div>
            <div class="col-md-12">
                <label for="" class="form-label">Age</label> <br>
                <input type="number" name="age" id="age" class="form control" required>
            </div>
            <div class="col-md-12">
                <label for="" class="form-label">Gender</label> <br>
                <input type="text" name="gender" id="gender" class="form control" required>
            </div>
            <div class="col-md-12">
                <label for="" class="form-label">Color</label> <br>
                <input type="text" name="color" id="color" class="form control" required>
            </div>
            <div class="col-md-12">
                <label for="" class="form-label">Breed</label> <br>
                <input type="text" name="breed" id="breed" class="form control" required>
            </div><br>
            <div class="col-md-12">
                <button type="submit">Add</button>
            </div>
        </form>
    </center>
</body>
</html>