<!DOCTYPE html>
<html>
<head>
    <title>Tambah Product</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h2>Tambah Product</h2>

<form action="/products" method="POST">
    @csrf

    <select name="category_id" class="form-control mb-3">
        @foreach($categories as $category)
            <option value="{{ $category->id }}">
                {{ $category->name }}
            </option>
        @endforeach
    </select>

    <input type="text" name="name" class="form-control mb-3" placeholder="Nama Product">

    <textarea name="description" class="form-control mb-3"></textarea>

    <input type="number" name="price" class="form-control mb-3" placeholder="Harga">

    <input type="number" name="stock" class="form-control mb-3" placeholder="Stock">

    <input type="text" name="brand" class="form-control mb-3" placeholder="Brand">

    <input type="text" name="weight" class="form-control mb-3" placeholder="Weight">

    <input type="text" name="color" class="form-control mb-3" placeholder="Color">

    <button class="btn btn-primary">Simpan</button>
</form>

</body>
</html>