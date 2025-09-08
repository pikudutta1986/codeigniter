<?php echo view('admin/layout/header', ['title' => 'Manage Products']); ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="fw-bold">Manage Products</h2>
    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
        + Add Product
    </a>
</div>

<div class="table-responsive">
    <table class="table table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php for($i=1;$i<=5;$i++): ?>
            <tr>
                <td><?= $i ?></td>
                <td><img src="https://via.placeholder.com/60" class="rounded" alt="Product"></td>
                <td>Product <?= $i ?></td>
                <td>$<?= 100 * $i ?>.00</td>
                <td><?= 10 * $i ?></td>
                <td>Category <?= $i ?></td>
                <td>
                    <a href="#" class="btn btn-sm btn-warning">Edit</a>
                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
            <?php endfor; ?>
        </tbody>
    </table>
</div>

<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h5 class="modal-title">Add New Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Product Name</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Price</label>
                        <input type="number" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Stock</label>
                        <input type="number" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Category</label>
                        <select class="form-select">
                            <option>Electronics</option>
                            <option>Clothing</option>
                            <option>Home</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Product Image</label>
                        <input type="file" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-success">Save Product</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php echo view('admin/layout/footer'); ?>