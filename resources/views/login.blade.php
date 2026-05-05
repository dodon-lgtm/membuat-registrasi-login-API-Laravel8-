<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>

<body>

    <h2>Login</h2>
    @if (session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif
    <form method="POST" action="/login" onsubmit="return validateForm()">
        @csrf

        <label>Email:</label><br>
        <input type="text" id="email" name="email">
        <p id="emailError" style="color:red"></p>
        @error('email')
            <p style="color:red">{{ $message }}</p>
        @enderror

        <br>

        <label>Password:</label><br>
        <input type="password" id="password" name="password">
        <p id="passwordError" style="color:red"></p>

        <br><br>

        <button type="submit">Login</button>
    </form>

    <script>
        function validateForm() {
            let email = document.getElementById("email").value;
            let password = document.getElementById("password").value;
            let valid = true;

            document.getElementById("emailError").innerText = "";
            document.getElementById("passwordError").innerText = "";

            if (email === "") {
                document.getElementById("emailError").innerText = "Email tidak boleh kosong";
                valid = false;
            } else if (!email.includes("@")) {
                document.getElementById("emailError").innerText = "Email harus mengandung @";
                valid = false;
            }

            if (password === "") {
                document.getElementById("passwordError").innerText = "Password tidak boleh kosong";
                valid = false;
            }

            return valid;
        }
    </script>
    <p>Belum punya akun? <a href="/register">Register</a></p>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>
