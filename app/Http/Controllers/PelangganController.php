<?php

namespace App\Http\Controllers;

use App\Models\pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    //
    public function index()
    {
        $pelanggan = pelanggan::all();

        $nav = "Data Pelanggan";
        $menu_daya = "active";

        return view('admin.pages.pelanggan', compact('pelanggan', 'nav', 'menu_daya'));
    }

    public function getDataPelanggan($id)
    {
        $data['nama'] = pelanggan::where('id', '=', $id)->value('nama');
        $data['kecamatan'] = pelanggan::where('id', '=', $id)->value('kecamatan');
        $data['desa'] = pelanggan::where('id', '=', $id)->value('desa');
        $data['rt'] = pelanggan::where('id', '=', $id)->value('rt');
        $data['rw'] = pelanggan::where('id', '=', $id)->value('rw');
        $data['no_rumah'] = pelanggan::where('id', '=', $id)->value('no_rumah');
        $data['alamat'] = pelanggan::where('id', '=', $id)->value('alamat');
        $response = json_encode($data);
        // dd($arr);

        echo $response;
    }
    public function getPelanggan($no_hp)
    {
        $data['id'] = pelanggan::where('no_hp', '=', $no_hp)->value('id');
        $data['nama'] = pelanggan::where('no_hp', '=', $no_hp)->value('nama');
        $data['kecamatan'] = pelanggan::where('no_hp', '=', $no_hp)->value('kecamatan');
        $data['desa'] = pelanggan::where('no_hp', '=', $no_hp)->value('desa');
        $data['rt'] = pelanggan::where('no_hp', '=', $no_hp)->value('rt');
        $data['rw'] = pelanggan::where('no_hp', '=', $no_hp)->value('rw');
        $data['no_rumah'] = pelanggan::where('no_hp', '=', $no_hp)->value('no_rumah');
        $data['alamat'] = pelanggan::where('no_hp', '=', $no_hp)->value('alamat');
        $response = json_encode($data);
        // dd($arr);

        if ($response != null) {
            # code...
            echo $response;
        } else {
            echo ("null");
        }
    }
}
