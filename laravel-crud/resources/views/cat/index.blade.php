<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List of Cats</title>
</head>
<body>
    <center>
        <h1>List of Cats</h1>
        <div class="container">
            <button type="button" onclick="location.href = '{{ route('cat.create') }}'">Add Cat</button>
        </div>
        <table class="table">   
            <thead>
                <tr>
                    <th>Cat ID</th>
                    <th>Cat Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Color</th>
                    <th>Breed</th>
                    <th>Date Added</th>
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
                </tr>                    
                @endforeach
            </tbody>
        </table>
    </center>
</body>
</html>