<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-center w-100" id="staticBackdropLabel" style="color: #493628">Login</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="login-container mt-3" style="color: #493628">
          <?php if(session('error')): ?>
              <div class="alert alert-danger">
                  <?php echo e(session('error')); ?>

              </div>
          <?php endif; ?>

          <form method="POST" action="<?php echo e(route('loginproses.user')); ?>">
              <?php echo csrf_field(); ?>

              <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" required autofocus  placeholder="Masukkan email anda">
                  <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <span class="text-danger"><?php echo e($message); ?></span>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>

              <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" required placeholder="Masukkan password anda">
                  <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <span class="text-danger"><?php echo e($message); ?></span>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>

              <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                  <label class="form-check-label" for="remember_me">Remember Me</label>
              </div>

              <div class="d-flex justify-content-center" > <!-- Memusatkan tombol -->
                  <button type="submit" class="btn btn-primary w-100 mt-3" style="background-color: #493628">Login</button> <!-- Tambahkan w-100 di sini -->
              </div>
          </form>
          <div class="text-center mt-2" style="color: #493628">
              <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal">Don't have an account? Register</a>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<style>
    /* .login-container {
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 8px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    } */
    .modal-title {
        color: #000957; /* Warna judul modal */
        font-size: 1.5rem;
        font-weight: bold;
    }
    .btn-primary {
        background-color: #344CB7;
        border: none;
    }
    .btn-primary:hover {
        background-color: #000957;
    }
    .text-danger {
        font-size: 0.9rem;
    }
</style><?php /**PATH C:\xampp\htdocs\Ecommerce_App\resources\views/user/modal/loginUser.blade.php ENDPATH**/ ?>