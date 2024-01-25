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

    <title>List of Birds</title>
</head>
<body>
    <center>
        <div class="container mt-5">
            <h1>List of Birds</h1>
            <div class="container mt-5">
                <button type="button" onclick="location.href = '{{ route('welcome') }}'" class="btn btn-dark btn-sm">Back</button>
                <button type="button" onclick="location.href = '{{ route('bird.create') }}'" class="btn btn-primary btn-sm">Add Bird</button>
            </div>
            @if (session()->has('success'))
                <div class="alert alert-success mt-3">
                    {{ session('success') }}
                </div>                
            @endif
            <table class="table table-sm mt-3">
                <thead>
                    <tr>
                        <th>bird ID</th>
                        <th>bird Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Color</th>
                        <th>Breed</th>
                        <th>Date Added</th>
                        <th>Date Updated</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($birds as $bird)
                    <tr>
                        <td>{{ $bird->id }}</td>
                        <td>{{ $bird->bird_name }}</td>
                        <td>{{ $bird->age }}</td>
                        <td>{{ $bird->gender }}</td>
                        <td>{{ $bird->color }}</td>
                        <td>{{ $bird->breed }}</td>
                        <td>{{ $bird->created_at->format('F d, Y - H:i:s A') }}</td>
                        <td>{{ $bird->updated_at->format('F d, Y - H:i:s A') }}</td>
                        <td>
                            <div class="contain">
                                <div class="column">
                                    <button type="button" class="btn btn-success btn-sm" onclick="location.href = '{{ route('bird.edit', ['bird' => $bird]) }}'">Edit</button>
                                </div>
                                <div class="column">
                                    <form action="{{ route('bird.destroy', ['bird' => $bird]) }}" method="POST" class="form-group">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>    
                                    </form>
                                </div>    
                            </div>    
                        </td>    
                    </tr>       
                    @endforeach
                </tbody>
            </table>
        </div>
    </center>
</body>
</html>