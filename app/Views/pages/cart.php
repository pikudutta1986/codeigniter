<?php echo view('layout/header', ['title' => 'Cart']); ?>

<h2 class="fw-bold mb-4">Your Shopping Cart</h2>

<div class="table-responsive">
    <table class="table align-middle">
        <thead class="table-dark">
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Total</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i=1; $i<=3; $i++): ?>
                <tr>
                    <td>
                        <img src="https://via.placeholder.com/60" class="me-2 rounded" alt="Product">
                        Product <?= $i ?>
                    </td>
                    <td>$<?= 100 * $i ?>.00</td>
                    <td>
                        <input type="number" value="1" min="1" class="form-control form-control-sm" style="width:80px;">
                    </td>
                    <td>$<?= 100 * $i ?>.00</td>
                    <td><button class="btn btn-sm btn-danger">Remove</button></td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-end mt-3">
    <div class="text-end">
        <h5>Subtotal: $600.00</h5>
        <a href="<?= base_url('checkout') ?>" class="btn btn-success mt-2">Proceed to Checkout</a>
    </div>
</div>

<?php echo view('layout/footer'); ?>
