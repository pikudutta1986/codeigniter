<?php echo view('layout/header', ['title' => 'Products']); ?>

<div class="row">
    <!-- Sidebar Filters -->
    <aside class="col-md-3 mb-4">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-header bg-dark text-white fw-bold">Filters</div>
            <div class="card-body">
                <!-- Brand Filter -->
                <h6 class="fw-bold">Brand</h6>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Apple" id="brandApple">
                    <label class="form-check-label" for="brandApple">Apple</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Samsung" id="brandSamsung">
                    <label class="form-check-label" for="brandSamsung">Samsung</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Sony" id="brandSony">
                    <label class="form-check-label" for="brandSony">Sony</label>
                </div>
                <hr>

                <!-- Price Filter -->
                <h6 class="fw-bold">Price</h6>
                <input type="range" class="form-range" min="0" max="2000" step="50" id="priceRange">
                <p class="text-muted">Max: $<span id="priceValue">2000</span></p>
                <hr>

                <!-- Category Filter -->
                <h6 class="fw-bold">Category</h6>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Mobiles" id="catMobiles">
                    <label class="form-check-label" for="catMobiles">Mobiles</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Laptops" id="catLaptops">
                    <label class="form-check-label" for="catLaptops">Laptops</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Accessories" id="catAccessories">
                    <label class="form-check-label" for="catAccessories">Accessories</label>
                </div>
            </div>
        </div>
    </aside>

    <!-- Product Grid -->
    <section class="col-md-9">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="fw-bold">Products</h2>
            <select class="form-select w-auto">
                <option value="">Sort by</option>
                <option value="price_low">Price: Low to High</option>
                <option value="price_high">Price: High to Low</option>
                <option value="newest">Newest</option>
            </select>
        </div>

        <div class="row g-4">
            <?php for ($i=1; $i<=8; $i++): ?>
                <div class="col-md-3">
                    <div class="card shadow-sm border-0 rounded-3 h-100">
                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Product">
                        <div class="card-body d-flex flex-column">
                            <h6 class="card-title">Product <?= $i ?></h6>
                            <p class="text-muted mb-2">$<?= 100 * $i ?>.00</p>
                            <a href="<?= base_url('cart') ?>" class="btn btn-sm btn-primary mt-auto">Add to Cart</a>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>

        <!-- Pagination -->
        <nav class="mt-4">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled"><a class="page-link">Previous</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </section>
</div>

<script>
    // JS for price range label
    const range = document.getElementById('priceRange');
    const value = document.getElementById('priceValue');
    range.addEventListener('input', () => {
        value.textContent = range.value;
    });
</script>

<?php echo view('layout/footer'); ?>
