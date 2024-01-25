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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        .contain {
            display: grid;
            grid-template-columns: 0fr 0fr;
            grid-template-rows: 0fr 0fr;
            gap: 5px;
            margin: 0 auto;
        }
    </style>

    <title>Add Bird</title>
</head>
<body>
    <center>
        <div class="container mt-5">
            <h1>Add Bird</h1>
            <div class="container mt-5">
                <button class="btn btn-dark btn-sm" onclick="location.href = '{{ route('bird.index') }}'">Back</button>
            </div>
            <form action="{{ route('bird.store') }}" method="POST" class="form-group">
                @csrf
                @method('POST')
                <div class="col-md-5 mt-3">
                    <label for="" class="form-label">Bird Name</label>
                    <input type="text" name="bird_name" id="bird_name" class="form-control" required>
                </div>
                <div class="col-md-5 mt-3">
                    <label for="" class="form-label">Age</label>
                    <input type="number" name="age" id="age" class="form-control" required>
                </div>
                <div class="col-md-5 mt-3">
                    <label for="" class="form-label">Gender</label>
                    <input type="text" name="gender" id="gender" class="form-control" required>
                </div>
                <div class="col-md-5 mt-3">
                    <label for="" class="form-label">Color</label>
                    <input type="text" name="color" id="color" class="form-control" required>
                </div>
                <div class="col-md-5 mt-3">
                    <label for="" class="form-label">Breed</label>
                    <input type="text" name="breed" id="breed" class="form-control" required>
                </div>
                <div class="col-md-12 mt-5">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </center>
</body>
</html>