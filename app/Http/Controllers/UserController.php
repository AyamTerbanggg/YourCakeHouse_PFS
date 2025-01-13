<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\modelDetailTransaksi;
use App\Models\product;
use App\Models\tblCart;
use App\Models\transaksi;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    public function index(request $request)
    {
        $data = User::paginate(10);
        return view('admin.page.user', [
            'name'      => "User Management",
            'title'     => 'Admin User Management',
            'data'      => $data,
        ]);
    }

    public function addModalUser()
    {
        return view('admin.modal.modalUser', [
            'title' => 'Tambah Data User',
            'nik'   => date('Ymd') . rand(000, 999),
        ]);
    }
    public function store(UserRequest $request)
    {
        $data = new User;
        $data->name         = $request->nama;
        $data->email        = $request->email;
        $data->password     = bcrypt($request->password);
        $data->is_admin     = 1;

        // dd($request);die;
        if ($request->hasFile('foto')) {
            $photo = $request->file('foto');
            $filename = date('Ymd') . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('storage/user'), $filename);
            $data->foto = $filename;
        }
        $data->save();
        Alert::toast('Data berhasil disimpan', 'success');
        return redirect()->route('userManagement');
    }
    public function show($id)
    {
        $data = User::findOrFail($id);
        // $hasValue = Hash::make($data->password);
        return view(
            'admin.modal.editUser',
            [
                'title' => 'Edit data User',
                'data'  => $data,
                // 'pass'  => (string) $hasValue,
            ]
        )->render();
    }
    public function update(UserRequest $request, $id)
    {
        $data = User::findOrFail($id);

        if ($request->file('foto')) {
            $photo = $request->file('foto');
            $filename = date('Ymd') . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('storage/user'), $filename);
            $data->foto = $filename;
        } else {
            $filename = $request->foto;
        }

        $field = [
            'name'                  => $request->nama,
            'email'                 => $request->email,
            'password'              => bcrypt($request->password),
        ];

        $data::where('id', $id)->update($field);
        Alert::toast('Data berhasil diupdate', 'success');
        return redirect()->route('userManagement');
    }
    public function destroy($id)
    {
        $product = User::findOrFail($id);
        $product->delete();

        $json = [
            'success' => "Data berhasil dihapus"
        ];

        echo json_encode($json);
    }

    
    public function login()
    {
        return view('user.modal.loginUser', [
            'title' => 'Login',
        ]);
    }

    public function showRegisterForm()
    {
        return view('user.modal.registerUser ', [
            'title' => 'Register',
        ]);
    }

    public function register(Request $request)
    {
        // Validasi dan proses pendaftaran
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        // Buat pengguna baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    
        // Redirect to the login page with a success message
        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }

    public function userManagement()
    {
        $name = "User  Management"; // Definisikan variabel
        return view('admin.page.user', [
            'name' => $name, // Kirim variabel ke view
            'title' => 'Admin User Management',
        ]);
    }
    // public function logout(Request $request)
    // {
    //     Auth::logout(); // Mengeluarkan pengguna
    //     return redirect()->route('Home')->with('success', 'You have been logged out.'); // Mengarahkan ke halaman index
    // }
}