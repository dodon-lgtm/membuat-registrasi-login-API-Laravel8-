<!DOCTYPE html>
<html>
<head>
    <title>Tambah Category</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h2>Tambah Category</h2>

<form action="/categories" method="POST">
    @csrf

    <input type="text" name="name" class="form-control mb-3" placeholder="Nama Category">

    <button class="btn btn-primary">Simpan</button>
</form>

</body>
</html>