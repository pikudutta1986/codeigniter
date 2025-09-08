<?php echo view('layout/header', ['title' => 'Login']); ?>

<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-body p-4">
                <h3 class="fw-bold mb-3 text-center">Login</h3>
                <form>
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" class="form-control" placeholder="Enter email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" placeholder="Enter password">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>

                <div class="text-center mt-3">
                    <p class="mb-1">Don’t have an account? <a href="#">Register</a></p>
                    <a href="#">Forgot password?</a>
                </div>

                <hr>
                <div class="d-flex justify-content-center gap-2">
                    <button class="btn btn-outline-dark w-50">Login with Google</button>
                    <button class="btn btn-outline-primary w-50">Login with Facebook</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo view('layout/footer'); ?>
