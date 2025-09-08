<?php echo view('admin/layout/header', ['title' => 'Manage Orders']); ?>

<h2 class="fw-bold mb-3">Manage Orders</h2>

<div class="table-responsive">
    <table class="table table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Date</th>
                <th>Status</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php for($i=1;$i<=5;$i++): ?>
            <tr>
                <td>#ORD<?= 1000+$i ?></td>
                <td>Customer <?= $i ?></td>
                <td><?= date('Y-m-d') ?></td>
                <td>
                    <span class="badge bg-success">Completed</span>
                </td>
                <td>$<?= 200*$i ?>.00</td>
                <td>
                    <a href="#" class="btn btn-sm btn-info" data-bs-toggle="modal"
                        data-bs-target="#orderDetailModal<?= $i ?>">View</a>
                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>

            <!-- Order Details Modal -->
            <div class="modal fade" id="orderDetailModal<?= $i ?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Order #ORD<?= 1000+$i ?> Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Customer:</strong> Customer <?= $i ?></p>
                            <p><strong>Date:</strong> <?= date('Y-m-d') ?></p>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Product A</td>
                                        <td>2</td>
                                        <td>$100</td>
                                        <td>$200</td>
                                    </tr>
                                    <tr>
                                        <td>Product B</td>
                                        <td>1</td>
                                        <td>$150</td>
                                        <td>$150</td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="fw-bold">Order Total: $350.00</p>
                        </div>
                        <div class="modal-footer">
                            <select class="form-select w-auto">
                                <option>Pending</option>
                                <option selected>Completed</option>
                                <option>Cancelled</option>
                            </select>
                            <button class="btn btn-primary">Update Status</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endfor; ?>
        </tbody>
    </table>
</div>

<?php echo view('admin/layout/footer'); ?>