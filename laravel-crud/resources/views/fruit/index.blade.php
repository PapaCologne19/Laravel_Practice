<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lists of Fruits</title>
</head>
<body>
    <center>
        <div class="container">
            <button type="button" onclick="location.href = '{{ route('welcome') }}'">Back</button>
            <button type="button" class="btn btn-primary" onclick="location.href = '{{ route('fruit.create') }}'">Add Fruit</button>
        </div>
        <h1>Fruits</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Fruit ID</th>
                    <th>Fruit Name</th>
                    <th>Color</th>
                    <th>Taste</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Date Added</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fruits as $fruit)
                    <tr>
                        <td>{{ $fruit->id }}</td>
                        <td>{{ $fruit->fruit_name }}</td>
                        <td>{{ $fruit->color }}</td>
                        <td>{{ $fruit->taste }}</td>
                        <td>{{ $fruit->quantity }}</td>
                        <td>{{ $fruit->price }}</td>
                        <td>{{ $fruit->created_at->format('F d, Y') }}</td>
                        <td>
                            <div class="contain">
                                <div class="column">
                                    <button type="button" onclick="location.href = '{{ route('fruit.edit', ['fruit' => $fruit]) }}'">Edit</button>
                                </div>
                                <div class="column">
                                    <form action="{{ route('fruit.delete', ['fruit' => $fruit]) }}" method="POST">
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