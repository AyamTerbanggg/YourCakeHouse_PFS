<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller; 
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Foundation\Auth\User;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\TransaksiAdminController;
use App\Http\Controllers\TransaksiController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [TransaksiController::class, 'index'])->name('home');
Route::POST('/addTocart', [TransaksiController::class, 'addTocart'])->name('addTocart');

// Route::get('/admin', [Controller::class, 'admin'])->name('admin');
Route::get('/admin/dashboard', [Controller::class, 'index2'])->name('dashboard');
Route::get('/admin/product', [ProductController::class, 'index'])->name('product');
Route::get('/admin/report', [Controller::class, 'report'])->name('report');
Route::get('/admin/addModal', [ProductController::class, 'addModal'])->name('addModal');

Route::POST('/admin/addData', [ProductController::class, 'store'])->name('addData');
Route::GET('/admin/editModal/{id}', [ProductController::class, 'show'])->name('editModal');
Route::PUT('/admin/updateData/{id}', [ProductController::class, 'update'])->name('updateData');
Route::DELETE('/admin/deleteData/{id}', [ProductController::class, 'destroy'])->name('deleteData');

Route::GET('/admin/user_management', [UserController::class, 'index'])->name('userManagement');
Route::GET('/admin/user_management/addModalUser', [UserController::class, 'addModalUser'])->name('addModalUser');
Route::POST('/admin/user_management/addData', [UserController::class, 'store'])->name('addDataUser');
Route::get('/admin/user_management/editUser/{id}', [UserController::class, 'show'])->name('showDataUser');
Route::PUT('/admin/user_management/updateDataUser/{id}', [UserController::class, 'update'])->name('updateDataUSer');
Route::DELETE('/admin/user_management/deleteUSer/{id}', [UserController::class, 'destroy'])->name('destroyDataUser');


Route::get('/receipt', [ReceiptController::class, 'showReceipt'])->name('receipt.show');

Route::post('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
// Rute untuk halaman utama
Route::get('/', [Controller::class, 'index'])->name('Home');

// Rute untuk halaman shop dan contact dan transaksi
Route::get('/', [Controller::class, 'index'])->name('Home');
Route::get('/shop', [Controller::class, 'shop'])->name('shop');
Route::get('/contact', [Controller::class, 'contact'])->name('contact');
Route::get('/transaksi', [Controller::class, 'transaksi'])->name('transaksi');
Route::get('/checkout', [Controller::class, 'checkout'])->name('checkOut');

// Rute untuk login
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login_user', [UserController::class, 'loginProses'])->name('loginproses.user');


// Rute untuk pendaftaran
Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [UserController::class, 'register'])->name('registerUser .process');

// Rute untuk keranjang
Route::get('/keranjang', [Controller::class, 'keranjang'])->name('keranjang');

//Rute untuk logout
Route::post('/logout', [Controller::class, 'logout'])->name('logout');

Route::get('/checkout', [Controller::class, 'checkout'])->name('checkout');
Route::POST('/checkout/proses/{id}', [Controller::class, 'prosesCheckout'])->name('checkout.product');
Route::POST('/checkout/prosesPembayaran', [Controller::class, 'prosesPembayaran'])->name('checkout.bayar');
Route::get('/checkOut', [Controller::class, 'keranjang'])->name('keranjang');
Route::get('/checkOut/{id}', [Controller::class, 'bayar'])->name('keranjang.bayar');


