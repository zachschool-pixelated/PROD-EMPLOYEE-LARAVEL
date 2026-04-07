<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
</head>
<body>

    <div class="container">
        <h1>Edit Category</h1>

        @if ($errors->any())
            <div style="margin-bottom: 16px; color: #c0392b;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/categories/{{ $category->id }}" method="POST" class="product-form">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="category_name123">Category Name:</label>
                <input type="text" id="category_name123" name="category_name123" value="{{ old('category_name123', $category->name) }}">
            </div>

            <button type="submit" class="btn-submit">Update Category</button>
        </form>

        <div style="margin-top: 20px;">
            <a href="/categories" class="btn-edit">Back to Category List</a>
        </div>
    </div>

</body>
</html>
