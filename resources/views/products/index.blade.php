<!DOCTYPE html>
<html>
<head>
    <title>Data Product</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h2>Data Product</h2>

<a href="/products/create" class="btn btn-success mb-3">Tambah Product</a>

<table class="table table-bordered">
    <tr>
        <th>Nama</th>
        <th>Category</th>
        <th>Harga</th>
        <th>Stock</th>
    </tr>

    @foreach($products as $product)
    <tr>
        <td>{{ $product->name }}</td>
        <td>{{ $product->category->name }}</td>
        <td>{{ $product->price }}</td>
        <td>{{ $product->stock }}</td>
    </tr>
    @endforeach

</table>

</body>
</html>