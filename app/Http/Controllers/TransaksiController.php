<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\daya;
use App\Models\pelanggan;
use App\Models\pelayanan;
use App\Models\pembayaran;
use App\Models\transaksi;
// use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class TransaksiController extends Controller
{
    //
    public function index()
    {
        $transaksi = DB::table('vw_transaksi')->get();
        // dd($transaksi);

        $nav = "Data Transkasi / Permohonan";
        $menu_daya = "active";

        return view('admin.pages.transaksi', compact('transaksi', 'nav', 'menu_daya'));
    }

    public function getDataTransaksi($id)
    {
        $data['nama'] = DB::table('vw_transaksi')->where('id', '=', $id)->value('nama');
        $data['identitas'] = DB::table('vw_transaksi')->where('id', '=', $id)->value('jenis_identitas');
        $data['no_identitas'] = DB::table('vw_transaksi')->where('id', '=', $id)->value('no_identitas');
        $data['telp'] = DB::table('vw_transaksi')->where('id', '=', $id)->value('no_telp');
        $data['hp'] = DB::table('vw_transaksi')->where('id', '=', $id)->value('no_hp');
        $data['kecamatan'] = DB::table('vw_transaksi')->where('id', '=', $id)->value('kecamatan');
        $data['desa'] = DB::table('vw_transaksi')->where('id', '=', $id)->value('desa');
        $data['rt'] = DB::table('vw_transaksi')->where('id', '=', $id)->value('rt');
        $data['rw'] = DB::table('vw_transaksi')->where('id', '=', $id)->value('rw');
        $data['no_rumah'] = DB::table('vw_transaksi')->where('id', '=', $id)->value('no_rumah');

        // data permohonanan
        $data['id'] = DB::table('vw_transaksi')->where('id', '=', $id)->value('id');
        $data['jenis_permohonan'] = DB::table('vw_transaksi')->where('id', '=', $id)->value('jenis_permohonan');
        $data['jenis_layanan'] = DB::table('vw_transaksi')->where('id', '=', $id)->value('jenis_layanan');
        $data['peruntukan'] = DB::table('vw_transaksi')->where('id', '=', $id)->value('peruntukan');
        $data['daya'] = DB::table('vw_transaksi')->where('id', '=', $id)->value('jumlah_daya');
        $data['tgl_permohonan'] = DB::table('vw_transaksi')->where('id', '=', $id)->value('created_at');
        $data['instalasi'] = DB::table('vw_transaksi')->where('id', '=', $id)->value('waktu_instalasi');
        $data['status_transaksi'] = DB::table('vw_transaksi')->where('id', '=', $id)->value('status_transaksi');
        $data['status_pemasangan'] = DB::table('vw_transaksi')->where('id', '=', $id)->value('status_pemasangan');
        $response = json_encode($data);
        // dd($arr);

        echo $response;
    }

    public function updateDataTransaksi(Request $request)
    {
        transaksi::where('id', $request->id_transaksi)->update([
            'status_transaksi' => $request->status,
            // 'status_pemasangan' => $request->status_pemasangan
        ]);

        echo ("Success");
        exit;
    }

    public function getPDF($id)
    {
        $transaksi = DB::table('vw_transaksi')->where('id', '=', $id)->first();
        $data['nama'] = DB::table('vw_transaksi')->where('id', '=', $id)->value('nama');

        $pdf = PDF::loadView('admin.pages.struk', ['transaksi' => $transaksi]);

        return $pdf->download('Permohonan Pelanggan PLN ' . $data['nama'] . date('Y-m-d') . '.pdf');
        // return view('admin.pages.struk', compact('transaksi'));
    }

    public function pelangganBaru()
    {
        $layanan = pelayanan::all();
        $daya = daya::all();
        return view('users.pages.pasang_baru', compact('layanan', 'daya'));
    }

    public function getLayanan(Request $request)
    {
        $layanan['tarif'] = pelayanan::where('id', $request->layanan)->value('tarif_pemasangan');
        $layanan['ppj'] = daya::where('id', $request->daya)->value('biaya_ppj');
        $layanan['slo'] = daya::where('id', $request->daya)->value('biaya_slo');
        $playanan = json_encode($layanan);

        echo $playanan;
    }

    public function postDataNewTransaction(Request $request)
    {
        $pelanggan = new pelanggan();
        $transaksi = new transaksi();
        $pembayaran = new pembayaran();


        $pelanggan->nama = $request->nama_pelanggan;
        $pelanggan->email = $request->email;
        $pelanggan->no_hp = $request->no_hp;
        $pelanggan->no_telp = $request->no_telp;
        $pelanggan->desa = $request->desa;
        $pelanggan->kecamatan = $request->kec;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->rt = $request->rt;
        $pelanggan->rw = $request->rw;
        $pelanggan->no_rumah = $request->no_rmh;
        $pelanggan->jenis_identitas = $request->jenis_identitas;
        $pelanggan->no_identitas = $request->no_identitas;
        $pelanggan->no_npwp = $request->no_npwp;
        $pelanggan->nama_npwp = $request->nama_npwp;

        $pelanggan->save();

        $dta_planggan = pelanggan::orderBy('id', 'desc')->first();

        $transaksi->kode_transaksi = "PB" . rand();
        $transaksi->id_layanan = $request->layanan;
        $transaksi->id_pelanggan = $dta_planggan->id;
        $transaksi->id_daya = $request->daya;
        $transaksi->jenis_permohonan = "Pasang Baru";
        $transaksi->peruntukan = $request->peruntukan;
        $transaksi->waktu_instalasi = $request->waktu_instal;
        $transaksi->status_pemasangan = "RELEASED";
        $transaksi->no_meter = rand();
        $transaksi->status_transaksi = "RELEASED";

        $transaksi->save();

        $dta_transaksi = transaksi::orderBy('id', 'desc')->first();

        $pembayaran->id_transaksi = $dta_transaksi->id;
        $pembayaran->kode_bayar = "BYR" . rand();
        $pembayaran->bukti_bayar = "";
        $pembayaran->metode_pembayaran = "";
        $pembayaran->jumlah_pembayaran = $request->tot_bayar;
        $pembayaran->status_pembayaran = "RELEASED";
        $pembayaran->status_pembayaran = "RELEASED";
        // $pembayaran->waktu_pembayaran = "RELEASED";

        $pembayaran->save();

        return back()->with('success', 'Terimakasih, permohonan anda sedang kami proses');
    }
    public function postDataPerubahanDaya(Request $request)
    {
        // $pelanggan = new pelanggan();
        $transaksi = new transaksi();
        $pembayaran = new pembayaran();


        $transaksi->kode_transaksi = "PD" . rand();
        $transaksi->id_layanan = $request->layanan;
        $transaksi->id_pelanggan = $request->id_pelanggan;
        $transaksi->id_daya = $request->daya;
        $transaksi->jenis_permohonan = "Perubahan Daya";
        $transaksi->peruntukan = $request->peruntukan;
        $transaksi->waktu_instalasi = $request->waktu_instal;
        $transaksi->status_pemasangan = "RELEASED";
        $transaksi->no_meter = rand();
        $transaksi->status_transaksi = "RELEASED";

        $transaksi->save();

        $dta_transaksi = transaksi::orderBy('id', 'desc')->first();

        $pembayaran->id_transaksi = $dta_transaksi->id;
        $pembayaran->kode_bayar = "BYR" . rand();
        $pembayaran->bukti_bayar = "";
        $pembayaran->metode_pembayaran = "";
        $pembayaran->jumlah_pembayaran = $request->tot_bayar;
        $pembayaran->status_pembayaran = "RELEASED";
        $pembayaran->status_pembayaran = "RELEASED";
        // $pembayaran->waktu_pembayaran = "RELEASED";

        $pembayaran->save();


        return back()->with('success', 'Terimakasih, permohonan anda sedang kami proses');
    }

    public function perubahanDaya()
    {
        $layanan = pelayanan::all();
        $daya = daya::all();
        return view('users.pages.perubahan_daya', compact('layanan', 'daya'));
    }
}
