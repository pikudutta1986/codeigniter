<?php echo view('layout/header', ['title' => 'Home']); ?>

<!-- Hero Section -->
<section class="py-5 text-center bg-light">
    <div class="container">
        <h1 class="display-4 fw-bold">Welcome to MyShop</h1>
        <p class="lead">Discover the latest products at unbeatable prices</p>
        <a href="<?= base_url('products') ?>" class="btn btn-primary btn-lg mt-3">Shop Now</a>
    </div>
</section>

<!-- Featured Categories -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Shop by Category</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card shadow-sm border-0 rounded-3">
                    <img src="https://via.placeholder.com/400x250" class="card-img-top rounded-top" alt="Category">
                    <div class="card-body text-center">
                        <h5 class="card-title">Electronics</h5>
                        <a href="<?= base_url('products') ?>" class="btn btn-outline-primary btn-sm">Explore</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm border-0 rounded-3">
                    <img src="https://via.placeholder.com/400x250" class="card-img-top rounded-top" alt="Category">
                    <div class="card-body text-center">
                        <h5 class="card-title">Fashion</h5>
                        <a href="<?= base_url('products') ?>" class="btn btn-outline-primary btn-sm">Explore</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm border-0 rounded-3">
                    <img src="https://via.placeholder.com/400x250" class="card-img-top rounded-top" alt="Category">
                    <div class="card-body text-center">
                        <h5 class="card-title">Home & Living</h5>
                        <a href="<?= base_url('products') ?>" class="btn btn-outline-primary btn-sm">Explore</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Products -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-4">Featured Products</h2>
        <div class="row g-4">
            <?php for ($i=1; $i<=4; $i++): ?>
                <div class="col-md-3">
                    <div class="card shadow-sm border-0 rounded-3 h-100">
                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Product">
                        <div class="card-body">
                            <h5 class="card-title">Product <?= $i ?></h5>
                            <p class="card-text text-muted">$<?= 100 * $i ?>.00</p>
                            <a href="<?= base_url('products') ?>" class="btn btn-sm btn-primary">Add to Cart</a>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5 text-center bg-dark text-white">
    <div class="container">
        <h2 class="fw-bold">Don’t Miss Out!</h2>
        <p class="lead">Sign up now and get exclusive deals on your favorite products.</p>
        <a href="<?= base_url('login') ?>" class="btn btn-outline-light btn-lg">Sign Up</a>
    </div>
</section>

<?php echo view('layout/footer'); ?>
