<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
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
                <button type="button" onclick="location.href = '{{ route('product.create') }}'">Add Product</button>
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
        <table class="table">
            <thead>
                <tr style="padding: 1rem;">
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Product Description</th>
                    <th>Date Added</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody style="padding: 1rem;">
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->product_description }}</td>
                        <td>{{ $product->created_at->format('F d, Y - H:i:s A') }}</td>
                        <td>
                            <div class="contain">
                                <div class="column">
                                    <button
                                        onclick="location.href= '{{ route('product.edit', ['product' => $product]) }}'">Edit</button>
                                </div>
                                <div class="column">
                                    <form action="{{ route('product.delete', ['product' => $product]) }}"
                                        method="post">
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
