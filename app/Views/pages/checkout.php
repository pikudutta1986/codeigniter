<?php echo view('layout/header', ['title' => 'Checkout']); ?>

<div class="row">
    <!-- Billing Details -->
    <div class="col-md-7">
        <h3 class="fw-bold mb-3">Billing Details</h3>
        <form>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">First Name</label>
                    <input type="text" class="form-control" placeholder="John">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Last Name</label>
                    <input type="text" class="form-control" placeholder="Doe">
                </div>
                <div class="col-md-12">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" placeholder="john@example.com">
                </div>
                <div class="col-md-12">
                    <label class="form-label">Phone</label>
                    <input type="text" class="form-control" placeholder="+91 98765 43210">
                </div>
                <div class="col-md-12">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control" placeholder="Street Address">
                </div>
                <div class="col-md-6">
                    <label class="form-label">City</label>
                    <input type="text" class="form-control" placeholder="Kolkata">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Postal Code</label>
                    <input type="text" class="form-control" placeholder="700001">
                </div>
                <div class="col-md-12">
                    <label class="form-label">Country</label>
                    <select class="form-select">
                        <option selected>India</option>
                        <option>USA</option>
                        <option>UK</option>
                        <option>Australia</option>
                    </select>
                </div>
            </div>
        </form>
    </div>

    <!-- Order Summary -->
    <div class="col-md-5">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-body">
                <h4 class="fw-bold mb-3">Order Summary</h4>
                <ul class="list-group list-group-flush mb-3">
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Product 1</span>
                        <span>$200.00</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Product 2</span>
                        <span>$150.00</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <strong>Subtotal</strong>
                        <strong>$350.00</strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Shipping</span>
                        <span>$20.00</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between fw-bold">
                        <span>Total</span>
                        <span>$370.00</span>
                    </li>
                </ul>

                <h5 class="fw-bold mb-2">Payment Method</h5>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="payment" id="cod" checked>
                    <label class="form-check-label" for="cod">
                        Cash on Delivery
                    </label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="payment" id="card">
                    <label class="form-check-label" for="card">
                        Credit/Debit Card
                    </label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="payment" id="upi">
                    <label class="form-check-label" for="upi">
                        UPI / Net Banking
                    </label>
                </div>

                <button class="btn btn-success w-100">Place Order</button>
            </div>
        </div>
    </div>
</div>

<?php echo view('layout/footer'); ?>
