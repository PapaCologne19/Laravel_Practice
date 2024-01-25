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
            <button type="button" class="btn btn-dark" onclick="location.href = '/welcome'" title="Back"><i
                    class="bi bi-arrow-90deg-left"></i></button>
            <button type="button" class="btn btn-primary" onclick="location.href = '{{ route('cat.add') }}'"
                title="Add Cat">
                <i class="bi bi-plus-lg"></i>
            </button>
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
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#viewModal-{{ $cat->id }}" title="View">
                                            <i class="bi bi-eye text-white"></i>
                                        </button>
                                    </div>
                                    <div class="column">
                                        <button class="btn btn-success btn-sm" type="button"
                                            onclick="location.href = '{{ route('cat.edit', ['cat' => $cat]) }}'"
                                            title="Edit">
                                            <i class="bi bi-gear"></i>
                                        </button>
                                    </div>
                                    <div class="column">
                                        <form action="{{ route('cat.delete', ['cat' => $cat]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" type="submit" title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>

                            {{-- Modal for Viewing Information --}}
                            <div class="modal fade" id="viewModal-{{ $cat->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="col-md-12">
                                                    <h6 class="fs-6"><strong>Cat Name: </strong>{{ $cat->cat_name }}
                                                    </h6>
                                                </div>
                                                <div class="col-md-12">
                                                    <h6 class="fs-6"><strong>Age: </strong>{{ $cat->age }}</h6>
                                                </div>
                                                <div class="col-md-12">
                                                    <h6 class="fs-6"><strong>Gender: </strong>{{ $cat->gender }}
                                                    </h6>
                                                </div>
                                                <div class="col-md-12">
                                                    <h6 class="fs-6"><strong>Color: </strong>{{ $cat->color }}</h6>
                                                </div>
                                                <div class="col-md-12">
                                                    <h6 class="fs-6"><strong>Breed: </strong>{{ $cat->breed }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- End of Modal for Viewing Information --}}
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </center>
</body>

</html>
