<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\pelanggan;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\TransaksiController;
use App\Models\transaksi;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
   return view('users.index');
});

Route::get('/', [MasterController::class, 'categoryForUser']);
Route::get('/pelanggan/baru', [TransaksiController::class, 'pelangganBaru'])->name('pelanggan/baru');
Route::post('/getLayanan', [TransaksiController::class, 'getLayanan'])->name('getLayanan');
Route::post('/daftar_pemasangan_baru', [TransaksiController::class, 'postDataNewTransaction'])->name('daftar_pemasangan_baru');
Route::get('/daftar_perubahan_daya', [TransaksiController::class, 'perubahanDaya'])->name('daftar_perubahan_daya');
Route::get('/pelanggan/detail/{no_hp}', [PelangganController::class, 'getPelanggan'])->name('admin.pelanggan.detail');
Route::post('/postPerubahanDaya', [TransaksiController::class, 'postDataPerubahanDaya'])->name('postPerubahanDaya');
Route::get('/pembayaran', [PembayaranController::class, 'pembayaran'])->name('pembayaran');
Route::get('/getPembayaran/{id}', [PembayaranController::class, 'getPembayaran'])->name('getPembayaran');
Route::post('/postPembayaran', [PembayaranController::class, 'postPembayaran'])->name('postPembayaran');
Route::get('/informasi', [MasterController::class, 'userInformation'])->name('informasi');
Route::get('/informasi/detail/{id}', [MasterController::class, 'getUserInformation'])->name('informasi.detail');
Route::get('/informasi/detaill/{id}', [MasterController::class, 'getUserInformationByCategory'])->name('informasi.detaill');










Route::get('/admin/sign_in', [DashboardController::class, 'login'])->name('login')->middleware('guest');
Route::post('/admin/sign_in', [DashboardController::class, 'authenticate'])->name('admin.sign_in');
Route::get('/admin/create_account', [DashboardController::class, 'createAccount'])->name('admin.create_account');
Route::post('/admin/create_account', [DashboardController::class, 'accountPost'])->name('admin.create_account');
Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');

// Route::group(['middleware' => 'auth', "prefix" => "/admin"], function () {
Route::get('/admin', [DashboardController::class, 'index'])->name('admin')->middleware('auth');
Route::get('/admin/informasi', [MasterController::class, 'informasi']);
Route::get('/admin/daftar/informasi', [MasterController::class, 'daftarInformasi']);
Route::post('/admin/informasi/post', [MasterController::class, 'informasiPost'])->name('admin.informasi.post');
Route::post('/admin/informasi/edit/post', [MasterController::class, 'editInformasiPost'])->name('admin.informasi.edit.post');
Route::get('/getDataPost', [MasterController::class, 'dataTablePost'])->name('getDataPost');
Route::post('/actionInformasi', [MasterController::class, 'actionInformasi'])->name('actionInformasi');
Route::get('/edit/informasi/{id}', [MasterController::class, 'editInformasi'])->name('edit.informasi');

// Route::get('/admin/master/golongan', [MasterController::class, 'index'])->name('admin.master.golongan');


Route::get('/admin/daya', [MasterController::class, 'daya'])->name('admin.master.daya');
Route::post('/admin/master/daya/save', [MasterController::class, 'postDataDaya'])->name('admin.master.daya.save');
Route::post('/admin/master/daya/delete', [MasterController::class, 'deleteDataDaya'])->name('admin.master.daya.delete');
Route::get('/admin/master/daya/update/{id}', [MasterController::class, 'getDataDaya'])->name('admin.master.daya.update');
Route::post('/admin/master/daya/update', [MasterController::class, 'updateDataDaya'])->name('admin.master.daya.update');

Route::get('/admin/layanan', [MasterController::class, 'layanan'])->name('admin.master.layanan');
Route::post('/admin/master/layanan/save', [MasterController::class, 'postDataLayanan'])->name('admin.master.layanan.save');
Route::post('/admin/master/layanan/delete', [MasterController::class, 'deleteDataLayanan'])->name('admin.master.layanan.delete');
Route::get('/admin/master/layanan/update/{id}', [MasterController::class, 'getDataLayanan'])->name('admin.master.layanan.update');
Route::post('/admin/master/layanan/update', [MasterController::class, 'updateDataLayanan'])->name('admin.master.layanan.update');

Route::get('/get/category', [MasterController::class, 'getCategoty'])->name('get.category');

Route::get('/admin/category', [MasterController::class, 'category'])->name('admin.master.category');
Route::post('/admin/master/category/save', [MasterController::class, 'postDataCategory'])->name('admin.master.category.save');
Route::post('/admin/master/category/delete', [MasterController::class, 'deleteDataCategory'])->name('admin.master.category.delete');
Route::get('/admin/master/category/update/{id}', [MasterController::class, 'getDataCategory'])->name('admin.master.category.update');
Route::post('/admin/master/category/update', [MasterController::class, 'updateDataCategory'])->name('admin.master.category.update');

Route::get('/admin/pelanggan', [PelangganController::class, 'index'])->name('admin.pelanggan');
Route::get('/admin/pelanggan/detail/{id}', [PelangganController::class, 'getDataPelanggan'])->name('admin.pelanggan.detail');

Route::get('/admin/transaksi', [TransaksiController::class, 'index'])->name('admin.transaksi');
Route::get('/admin/transaksi/detail/{id}', [TransaksiController::class, 'getDataTransaksi'])->name('admin.transaksi.detail');
Route::post('/admin/transaksi/update', [TransaksiController::class, 'updateDataTransaksi'])->name('admin.transaksi.update');
Route::get('/admin/transaksi/struk/{id}', [TransaksiController::class, 'getPDF'])->name('admin.transaksi.struk');

Route::get('/admin/pembayaran', [PembayaranController::class, 'index'])->name('admin.pembayaran');
Route::post('/admin/pembayaran/approved', [PembayaranController::class, 'approvedBayar'])->name('admin.pembayaran.approved');
// });

// Route::get()

// Route::get('/admin/category', function () {
//     return view('admin.pages.category');
// });
