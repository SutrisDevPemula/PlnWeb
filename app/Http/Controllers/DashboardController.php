<?php

namespace App\Http\Controllers;

use App\Models\AuthModel;
use App\Models\categori;
use App\Models\pelanggan;
use App\Models\pelayanan;
use App\Models\pembayaran;
use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $countPelanggan = pelanggan::count();
        $countTransaksi = transaksi::count();
        $countPembayaran = pembayaran::count();
        $countCategory = categori::count();
        $countLayanan = pelayanan::count();
        // dd($countPelanggan);
        $nav = "Dashboard";
        $menu = "active";
        return view('admin.index', compact('nav', 'menu', 'countPelanggan', 'countTransaksi', 'countPembayaran', 'countCategory', 'countLayanan'));
    }


    public function login()
    {
        return view('login.sign_in');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/admin');
        } else {
            return back()->with('status', 'Username atau password salah');
        }
        // dd("berhasil login");
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/sign_in');
    }

    public function createAccount()
    {
        return view('login.sign_up');
    }

    public function accountPost(Request $request)
    {
        $user = new AuthModel();

        $user->username = $request->name;
        $user->email = $request->email;
        $user->phone = $request->no_telp;
        $user->password = Hash::make($request->password);

        $user->save();

        return back()->with('success', 'Akun berhasil didaftarkan');
    }
}
