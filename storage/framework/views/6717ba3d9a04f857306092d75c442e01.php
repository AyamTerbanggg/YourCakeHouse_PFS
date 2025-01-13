
<?php $__env->startSection('title', 'Contact Us'); ?>

<?php $__env->startSection('content'); ?>
    <div class="mt-4 px-5" style="color: #493628">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="content-text fw-bold">
                    <h2 class="font-weight-bold">Welcome to Contact Us!</h2>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-lg-between mt-5">
            <div class="d-flex align-items-center gap-4">
                <i class="fa fa-users fa-2x text-primary"></i>
                <p class="m-0 fs-5">+ 300 Pelanggan</p>
            </div>
            <div class="d-flex align-items-center gap-4">
                <i class="fas fa-home fa-2x text-success"></i>
                <p class="m-0 fs-5">+ 500 Seller</p>
            </div>
            <div class="d-flex align-items-center gap-4">
                <i class="fas fa-shirt fa-2x text-danger"></i>
                <p class="m-0 fs-5">+ 300 Product</p>
            </div>
        </div>
        <hr class="mb-5 justify-content-center">

        <div class="d-flex justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header text-center fw-bold" style="background-color: #493628; color: #FFFFFF">
                        <h4>Criticism and suggestions</h4>
                    </div>
                    <div class="card-body" style="color: #493628">
                        <p class="text-lg-left">Enter your criticism and suggestions for our application so that we can provide it
                        what your needs are and we can develop even better.
                        </p>
                        <form>
                            <div class="mb-3 row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" placeholder="Masukan email Anda" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="pesan" class="col-sm-2 col-form-label">Message</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="pesan" placeholder="Masukan Pesan Anda" rows="3" required></textarea>
                                </div>
                            </div>
                            <button class="btn btn-primary mt-4 w-100 fw-bold" style="background-color: #AB886D">Send Your Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Ecommerce_App\resources\views/user/page/contact.blade.php ENDPATH**/ ?>