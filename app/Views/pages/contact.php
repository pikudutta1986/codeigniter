<?php echo view('layout/header', ['title' => 'Contact']); ?>

<div class="row">
    <div class="col-md-6 mb-4">
        <h2 class="fw-bold mb-3">Get in Touch</h2>
        <p class="text-muted">We’d love to hear from you! Fill out the form and we’ll get back soon.</p>

        <form>
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" placeholder="Your Name">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" placeholder="Your Email">
            </div>
            <div class="mb-3">
                <label class="form-label">Message</label>
                <textarea class="form-control" rows="5" placeholder="Write your message"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send Message</button>
        </form>
    </div>

    <div class="col-md-6">
        <h2 class="fw-bold mb-3">Our Location</h2>
        <p class="text-muted">123 Main Street, Kolkata, India</p>
        <iframe class="w-100 rounded" height="300" 
            src="https://maps.google.com/maps?q=Kolkata&t=&z=13&ie=UTF8&iwloc=&output=embed" 
            style="border:0;" allowfullscreen></iframe>
    </div>
</div>

<?php echo view('layout/footer'); ?>
