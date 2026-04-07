<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
</head>
<body>

    <div class="container">
        <h1>Categories</h1>

        <div style="margin-bottom: 20px; display: flex; gap: 10px;">
            <a href="/products" class="btn-edit">Back to Products</a>
        </div>

        @if (session('error'))
            <div style="margin-bottom: 16px; color: #c0392b;">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div style="margin-bottom: 16px; color: #c0392b;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/categories123" method="POST" class="product-form">
            @csrf

            <div class="form-group">
                <label for="category_name123">Category Name:</label>
                <input type="text" id="category_name123" name="category_name123" value="{{ old('category_name123') }}">
            </div>

            <button type="submit" class="btn-submit">Save Category</button>
        </form>

        <hr>

        <table class="product-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Products</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->products_count }}</td>
                        <td>
                            <div class="action-buttons">
                                <a href="/categories/{{ $item->id }}/edit" class="btn-edit">Edit</a>

                                <form action="/categories/{{ $item->id }}" method="POST" onsubmit="return confirm('Delete this category?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
