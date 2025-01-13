

<?php $__env->startSection('content'); ?>
    <div class="d-flex flex-row justify-content-start gap-2 align-items-center">
        <div class="card">
            <div class="card-header">
                <h4 style="font-size: 16px;">Export data transaksi</h4>
            </div>
            <div class="card-body">
                <div class="d-flex flex-row gap-3">
                    <div class="d-flex flex-column">
                        <label for="dateStart">Tanggal Mulai</label>
                        <input type="date" name="dateStart" class="form-control">
                    </div>
                    <div class="d-flex flex-column">
                        <label for="dateEnd">Tanggal Akhir</label>
                        <input type="date" name="dateEnd" class="form-control">
                    </div>
                </div>
                <button class="btn btn-success mt-4"> Export</button>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 style="font-size: 16px;">Export data product</h4>
            </div>
            <div class="card-body">
                <div class="d-flex flex-row gap-3">
                    <div class="d-flex flex-column">
                        <label for="dateStart">Tanggal Mulai</label>
                        <input type="date" name="dateStart" class="form-control">
                    </div>
                    <div class="d-flex flex-column">
                        <label for="dateEnd">Tanggal Akhir</label>
                        <input type="date" name="dateEnd" class="form-control">
                    </div>
                </div>
                <button class="btn btn-success mt-4"> Export</button>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Ecommerce_App\resources\views/admin/page/report.blade.php ENDPATH**/ ?>