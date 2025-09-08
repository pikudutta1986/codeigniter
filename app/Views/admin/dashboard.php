<?php echo view('admin/layout/header', ['title' => 'Dashboard']); ?>

<h1 class="mb-4">Welcome to Admin Dashboard</h1>

<div class="row g-4">
    <div class="col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-body text-center">
                <h4 class="fw-bold">Products</h4>
                <p class="fs-3 text-primary">120</p>
                <a href="/admin/products" class="btn btn-sm btn-primary">Manage</a>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-body text-center">
                <h4 class="fw-bold">Orders</h4>
                <p class="fs-3 text-success">56</p>
                <a href="/admin/orders" class="btn btn-sm btn-success">View Orders</a>
            </div>
        </div>
    </div>
</div>

<?php echo view('admin/layout/footer'); ?>