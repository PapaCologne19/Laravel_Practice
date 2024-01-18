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
    
    <title>List of Cats</title>
</head>

<body>
    <center>
        <h1>List of Cats</h1>
        @if (session()->has('success'))
            <div class="alert alert-success mt-5 mb-5">
                {{ session('success') }}
            </div>
        @endif
        <div class="container mt-5">
            <button type="button" class="btn btn-dark" onclick="location.href = '/welcome'">Back</button>
            <button type="button" class="btn btn-primary" onclick="location.href = '{{ route('cat.add') }}'">Add
                Cat</button>
        </div>
        <div class="container table-responsive">
            <table class="table table-sm table-bordered mt-3">
                <thead>
                    <tr>
                        <th class="text-center">Cat ID</th>
                        <th class="text-center">Cat Name</th>
                        <th class="text-center">Age</th>
                        <th class="text-center">Gender</th>
                        <th class="text-center">Color</th>
                        <th class="text-center">Breed</th>
                        <th class="text-center">Date Added</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cats as $cat)
                        <tr>
                            <td>{{ $cat->id }}</td>
                            <td>{{ $cat->cat_name }}</td>
                            <td>{{ $cat->age }}</td>
                            <td>{{ $cat->gender }}</td>
                            <td>{{ $cat->color }}</td>
                            <td>{{ $cat->breed }}</td>
                            <td>{{ $cat->created_at->format('F d, Y') }}</td>
                            <td>
                                <div class="contain">
                                    <div class="column">
                                        <button class="btn btn-success btn-sm" type="button"
                                            onclick="location.href = '{{ route('cat.edit', ['cat' => $cat]) }}'">Edit</button>
                                    </div>
                                    <div class="column">
                                        <form action="{{ route('cat.delete', ['cat' => $cat]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
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
