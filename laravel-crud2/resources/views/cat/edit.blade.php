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
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }
    </style>
    
    <title>Update Cat</title>
</head>

<body>
    <center>
        <h1>Update Cat</h1>
        <div class="container">
            <button type="button" class="btn btn-dark"
                onclick="location.href = '{{ route('cat.index') }}'">Back</button>
        </div>
        <div class="container mt-3">
            <form action="{{ route('cat.update', ['cat' => $cat]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="col-md-12 mt-3">
                    <label class="form-label">Cat Name</label>
                    <input type="text" name="cat_name" id="cat_name" class="form-control" value="{{ $cat->cat_name }}" required>
                </div>
                <div class="col-md-12 mt-3">
                    <label class="form-label">Age</label>
                    <input type="number" name="age" id="age" class="form-control" value="{{ $cat->age }}" required>
                </div>
                <div class="col-md-12 mt-3">
                    <label class="form-label">Gender</label>
                    <input type="text" name="gender" id="gender" class="form-control" value="{{ $cat->gender }}" required>
                </div>
                <div class="col-md-12 mt-3">
                    <label class="form-label">Color</label>
                    <input type="text" name="color" id="color" class="form-control" value="{{ $cat->color }}" required>
                </div>
                <div class="col-md-12 mt-3">
                    <label class="form-label">Breed</label>
                    <input type="text" name="breed" id="breed" class="form-control" value="{{ $cat->breed }}" required>
                </div>
                <div class="col-md-12 mt-3">
                    <button type="submit" class="btn btn-primary" name="update">Submit</button>
                </div>
            </form>
        </div>
    </center>
</body>

</html>
