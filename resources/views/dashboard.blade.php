<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>

<h2>Dashboard</h2>

<p>Selamat datang, {{ auth()->user()->email }}</p>

<form method="POST" action="/logout">
    @csrf
    <button type="submit">Logout</button>
</form>

<hr>

<h3>Menu CRUD</h3>
<ul>
    <a href="{{ route('products.create') }}">Create</a>
    <a href="{{ route('products.index') }}">Read</a>
    <a href="{{ route('products.edit', 1) }}">Update</a>
    <a href="{{ route('products.destroy', 1) }}">Delete</a>
</ul>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>