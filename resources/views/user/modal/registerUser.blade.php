<!-- Modal -->
<div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-center w-100" id="registerModalLabel" style="color: #493628">Register</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="color: #493628">
        <div class="register-container mt-3">

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('registerUser .process') }}">
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="d-flex justify-content-center"> <!-- Memusatkan tombol -->
                    <button type="submit" class="btn btn-primary btn-block w-100 mt-3" style="background-color: #493628">Register</button> <!-- Tambahkan w-100 di sini -->
                </div>
                
            </form>

            <!-- Button trigger modal for Login -->
            <div class="text-center mt-3">
                <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Already have an account? Login</a>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class ="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<style>
    body {
        background-color: #f8f9fa;
    }
    /* .register-container {
        max-width: 400px;
        margin: auto;
        padding: 30px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    } */
    .register-container h2 {
        margin-bottom: 20px;
        color: #000957;
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
</style>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>