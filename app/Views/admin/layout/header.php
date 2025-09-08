<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Admin Panel'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="/admin">Admin Panel</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/admin/products">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="/admin/orders">Orders</a></li>
                    <li class="nav-item"><a class="nav-link text-danger" href="/admin/logout">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container py-4">