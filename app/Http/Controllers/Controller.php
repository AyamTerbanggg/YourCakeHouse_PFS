<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\modelDetailTransaksi;
use App\Models\product;
use App\Models\tblCart;
use App\Models\transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index(Request $request)
    {
        // return view('user.layout.index',[
        //     'title' => 'Home',
        // ]);

        return view('user.page.home', [
            'title' => 'Home',
            'success' => $request->session()->get('success'),
        ]);
        
    }

    public function home(Request $request)
    {
        return view('user.page.home', [
            'title' => 'Home',
            'success' => $request->session()->get('success'),
        ]);
    }

    public function shop(Request $request)
    {
        if ($request->has('kategory') && $request->has('type')) {
            $category = $request->input('kategory');
            $type = $request->input('type');
            $data = product::where('kategory', $category)
                ->orWhere('type', $type)->paginate(5);
        } else {
            $data = product::paginate(5);
        }
        $countKeranjang = tblCart::where(['idUser' => 'guest123', 'status' => 0])->count();


        return view('user.page.shop', [
            'title'     => 'Shop',
            'data'      => $data, 
            'count'     => $countKeranjang,
        ]);
    }


    public function contact(Request $request)
    {
        return view('user.page.contact', [
            'title'     => 'Contact',
        ]);
    }

    public function transaksi(Request $request)
    {
        $name = 'Admin'; // Tambahkan ini
        return view('user.page.transaksi', [
            'title' => 'Transaksi',
            'name' => $name, // Kirim variabel ke view
        ]);
    }

    public function keranjang(Request $request)
    {
        return view('user.page.keranjang', [
            'title'     => 'Keranjang',
        ]);
    }

    public function checkout(Request $request)
    {
        return view('user.page.checkOut', [
            'title'     => 'check Out',
        ]);

        // Example of storing cart data in session
    $request->session()->put('cart', json_encode($cart));
    }

    // ADMIN
    public function index2(request $request){
        return view('admin.page.dashboard',[
            'name'  => 'Dashboard',
            'title' => 'Admin Dashboard',
        ]);
    }

    public function report(request $request){
        return view('admin.page.report',[
            'name'  => 'Report',
            'title' => 'Admin Report',
        ]);
    }
    // public function product(Request $request)
    // {
    //     $name = 'Admin'; // Definisikan variabel
    //     return view('admin.page.product', [
    //         'title' => 'Admin Product',
    //         'name' => $name, // Kirim variabel ke view
    //     ]);
    // }



    public function loginProses(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek kredensial
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Jika login berhasil, ambil pengguna yang sedang login
            $user = Auth::user();

            // Cek apakah pengguna adalah admin
            if ($user->email === 'admin@gmail.com') {
                // Jika admin, redirect ke halaman admin dashboard
                return redirect()->route('dashboard')->with('success', 'Login successful as admin.');
            } else {
                // Jika bukan admin, redirect ke halaman home
                return redirect()->route('Home')->with('success', 'Login successful.');
            }
        } else {
            // Jika login gagal, kembali ke halaman login dengan pesan error
            return back()->with('error', 'Invalid email or password.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Mengeluarkan pengguna
        $request->session()->invalidate(); // Menghapus session
        $request->session()->regenerateToken(); // Menghasilkan token baru untuk keamanan

        return redirect('/')->with('success', 'You have been logged out.'); // Mengarahkan ke halaman utama
    }
    // public function logout()
    // {
    //     Auth::logout();
    //     request()->session()->invalidate();
    //     request()->session()->regenerateToken();
    //     Alert::toast('Kamu berhasil Logout', 'success');
    //     return redirect('admin');
    // }
}
