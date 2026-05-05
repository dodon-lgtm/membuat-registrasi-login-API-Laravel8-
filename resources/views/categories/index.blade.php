<!DOCTYPE html>
<html>
<head>
    <title>Data Category</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h2>Data Category</h2>

<a href="/categories/create" class="btn btn-success mb-3">Tambah</a>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Nama</th>
    </tr>

    @foreach($categories as $category)
    <tr>
        <td>{{ $category->id }}</td>
        <td>{{ $category->name }}</td>
    </tr>
    @endforeach
</table>

</body>
</html>