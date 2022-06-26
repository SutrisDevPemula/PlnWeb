<?php

namespace App\Http\Controllers;

use App\Models\pembayaran;
use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    //
    public function index()
    {
        $pembayaran = DB::table('vw_pembayaran')->get();
        // dd($transaksi);

        $nav = "Data Pembayaran Pelanggan";
        $menu_daya = "active";

        return view('admin.pages.pembayaran', compact('pembayaran', 'nav', 'menu_daya'));
    }

    public function approvedBayar(Request $request)
    {
        try {
            pembayaran::where('id', $request->id_bayar)->update([
                'status_pembayaran' => $request->status,
            ]);

            transaksi::where('kode_transaksi', $request->kode_tr)->update([
                'status_transaksi' => $request->status
            ]);
            echo ("Success");
            exit;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function pembayaran()
    {
        return view('users.pages.pembayaran');
    }

    public function getPembayaran($key)
    {
        // $data['jml_bayar'] = DB::table('vw_pembayaran')->find('BYR1120647792')->get();
        $data['jml_bayar'] = DB::table('vw_pembayaran')
            ->where('kode_byr', $key)
            ->orWhere('kode_transaksi', $key)
            ->value('jumlah_bayar');
        $data['kode_transaksi'] = DB::table('vw_pembayaran')
            ->where('kode_byr', $key)
            ->orWhere('kode_transaksi', $key)
            ->value('kode_transaksi');
        $data['jenis_permohonan'] = DB::table('vw_pembayaran')
            ->where('kode_byr', $key)
            ->orWhere('kode_transaksi', $key)
            ->value('jenis_permohonan');
        $data['id_bayar'] = DB::table('vw_pembayaran')
            ->where('kode_byr', $key)
            ->orWhere('kode_transaksi', $key)
            ->value('id');
        $data['status'] = DB::table('vw_pembayaran')
            ->where('kode_byr', $key)
            ->orWhere('kode_transaksi', $key)
            ->value('status_bayar');

        $response = json_encode($data);

        echo $response;
    }

    public function postPembayaran(Request $request)
    {
        $pembayaran = pembayaran::findOrFail($request->id_bayar);

        $pembayaran->metode_pembayaran = $request->metode_bayar;
        $pembayaran->status_pembayaran = "WAITING VERIFICATION";
        $pembayaran->waktu_pembayaran = date('Y-m-d H:i:s');

        if ($request->file('bukti_bayar')) {
            $request->validate([

                'bukti_bayar' => 'required|image|mimes:jpeg,png,jpg|max:2048',

            ]);

            $file = $request->file('bukti_bayar');
            $filename = date('YmdHi') . "-" . $request->key . $file->getClientOriginalName();
            $file->move(public_path('buktiBayar'), $filename);
            $pembayaran->bukti_bayar = $filename;
        }
        // $pembayaran->bukti_bayar = $request->metode_bayar;

        try {
            $pembayaran->save();
            return back()->with('success', 'Bukti pembayaran berhasil disimpan mohon menunggu informasi selanjutnya');
        } catch (\Throwable $th) {

            return back()->with('error', 'Bukti pembayaran tidak dapat disimpan mohon untuk mengunggah kembali atau hubungi call center kami');
        }
    }
}
