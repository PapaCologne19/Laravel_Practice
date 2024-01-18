<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Product</title>
</head>
<body>
    <a href="{{ route('product.index') }}">Back</a>
    <center>
        <h1>Create a Product</h1>
        <form action="{{ route('product.store') }}" method="post" class="form">
            @csrf
            @method('post')
            <div class="col-md-12">
                <label for="" class="form-label">Product Name</label><br>
                <input type="text" name="product_name" id="product_name" class="form-control" required>
            </div>
            <div class="col-md-12">
                <label for="" class="form-label">Price</label><br>
                <input type="text" name="price" id="price" class="form-control" required>
            </div>
            <div class="col-md-12">
                <label for="" class="form-label">Quantity</label><br>
                <input type="text" name="quantity" id="quantity" class="form-control" required>
            </div>
            <div class="col-md-12">
                <label for="" class="form-label">Product Description</label><br>    
                <textarea name="product_description" id="product_description" class="form-control"></textarea>
            </div>

            <div class="col-md-12">
                <button type="submit" name="submit">Submit</button>
            </div>
        </form>
    </center>
</body>
</html>