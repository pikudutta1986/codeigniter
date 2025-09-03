<!DOCTYPE html>
<html>
<head>
    <title>Login (API Version)</title>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow p-4">
                <h3 class="text-center mb-4">Login</h3>

                <div id="alert"></div>

                <form id="loginForm">
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" id="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" id="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById("loginForm").addEventListener("submit", async function(e) {
    e.preventDefault();

    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    try {
        let res = await fetch("<?= base_url('api/login') ?>", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ email, password })
        });

        let data = await res.json();

        if (data.status === "success") {
            // Save JWT token (localStorage is common for APIs)
            localStorage.setItem("jwt_token", data.token);
            localStorage.setItem("user", JSON.stringify(data.user));

            document.getElementById("alert").innerHTML =
                `<div class="alert alert-success">Login successful! Redirecting...</div>`;

            setTimeout(() => {
                window.location.href = "<?= base_url('dashboard') ?>";
            }, 1500);
        } else {
            document.getElementById("alert").innerHTML =
                `<div class="alert alert-danger">${data.message}</div>`;
        }
    } catch (err) {
        document.getElementById("alert").innerHTML =
            `<div class="alert alert-danger">Error: ${err.message}</div>`;
    }
});
</script>
</body>
</html>
