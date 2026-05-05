<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>

<h2>Register</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<form method="POST" action="/register" onsubmit="return validateForm()">
    @csrf

    <label>Email:</label><br>
    <input type="text" name="email" id="email">
    <p style="color:red" id="emailError"></p>
    @error('email')
        <p style="color:red">{{ $message }}</p>
    @enderror

    <br>

    <label>Password:</label><br>
    <input type="password" name="password" id="password">
    <p style="color:red" id="passwordError"></p>

    <br>

    <label>Konfirmasi Password:</label><br>
    <input type="password" name="password_confirmation" id="confirmPassword">
    <p style="color:red" id="confirmError"></p>

    <br><br>

    <button type="submit">Register</button>
</form>

<script>
function validateForm() {
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;
    let confirm = document.getElementById("confirmPassword").value;

    let valid = true;

    // Reset error
    document.getElementById("emailError").innerText = "";
    document.getElementById("passwordError").innerText = "";
    document.getElementById("confirmError").innerText = "";

    // Validasi email kosong
    if (email === "") {
        document.getElementById("emailError").innerText = "Email tidak boleh kosong";
        valid = false;
    }

    // Validasi format email
    else if (!email.includes("@")) {
        document.getElementById("emailError").innerText = "Email harus mengandung @";
        valid = false;
    }

    // Password kosong
    if (password === "") {
        document.getElementById("passwordError").innerText = "Password tidak boleh kosong";
        valid = false;
    }

    // Konfirmasi password
    if (confirm !== password) {
        document.getElementById("confirmError").innerText = "Password tidak cocok";
        valid = false;
    }

    return valid;
}
</script>
<p>Sudah punya akun? <a href="/login">Login</a></p>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>