<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Location</title>

    <style>
        *{
            font-family: Arial, Helvetica, sans-serif;
        }
        .contain {
            display: grid;
            grid-template-columns: 0fr 0fr;
            grid-template-rows: 0fr 0fr;
            gap: 5px;
            margin: 0 auto;
        }
        .table tbody tr th, .table tbody tr td{
            text-align: center;
            padding: 1rem;
        }
    </style>
</head>

<body>
    <center>
        <br>
        <br>
        <div class="contain" style="justify-content: center">
            <div class="column">
                <button type="button" onclick="location.href = '{{ route('welcome') }}'">Back</button>
            </div>
            <div class="column">
                <button type="button" onclick="location.href = '{{ route('location.create') }}'">Add Location</button>
            </div>
        </div>

        <br>
        <br>
        <div>
            @if (session()->has('success'))
                <div>
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <h2>Location</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Location ID</th>
                    <th>Street</th>
                    <th>Barangay</th>
                    <th>City</th>
                    <th>Region</th>
                    <th>Country</th>
                    <th>Date Added</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($locations as $location)
                    <tr>
                        <td>{{ $location->id }}</td>
                        <td>{{ $location->street }}</td>
                        <td>{{ $location->barangay }}</td>
                        <td>{{ $location->city }}</td>
                        <td>{{ $location->region }}</td>
                        <td>{{ $location->country }}</td>
                        <td>{{ $location->created_at->format('F d, Y') }}</td>
                        <td>
                            <div class="contain">
                                <div class="column">
                                    <button type="button" onclick="location.href = '{{ route('location.edit', ['location' => $location]) }}'">Edit</button>
                                </div>
                                <div class="column">
                                    <form action="{{ route('location.delete', ['location' => $location]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </center>
</body>

</html>
