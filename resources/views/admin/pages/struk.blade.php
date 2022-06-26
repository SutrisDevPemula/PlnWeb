<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body style="width: 90%; font-size: 12px;">
  @if($transaksi)
  <table>
    <tbody>
      <tr>
        <td>Tanggal</td>
        <td>:</td>
        <td>{{date('Y-m-d')}}</td>
      </tr>
      <tr>
        <td>ID Transaksi </td>
        <td>:</td>
        <td>BR7861242</td>
      </tr>
      <tr>
        <td>Kepada Yth. Bapak/Ibu/Sdr </td>
        <td>:</td>
        <td>{{$transaksi->nama}}</td>
      </tr>
      <tr>
        <td>Alamat </td>
        <td>:</td>
        <td>Kecamatan {{$transaksi->kecamatan}} Desa {{$transaksi->desa}} RT/RW {{$transaksi->rt}}/{{$transaksi->rw}} </td>
      </tr>
    </tbody>
  </table>
  <p>Dengan Hormat,</p>
  <p>Serhubungan dengan permohonan <b>{{strtoupper($transaksi->jenis_permohonan)}}</b> yang Bapak/Ibu/Sdr, atas pelanggan :</p>
  <table>
    <tbody>
      <tr>
        <td>Nama</td>
        <td>:</td>
        <td>{{$transaksi->nama}}</td>
      </tr>
      <tr>
        <td>Alamat </td>
        <td>:</td>
        <td>Kecamatan {{$transaksi->kecamatan}} Desa {{$transaksi->desa}} RT/RW {{$transaksi->rt}}/{{$transaksi->rw}}</td>
      </tr>
      <tr>
        <td>Layanan </td>
        <td>:</td>
        <td>{{$transaksi->jenis_layanan}}</td>
      </tr>
      <tr>
        <td>Tarif Baru </td>
        <td>:</td>
        <td>R1MT</td>
      </tr>
      <tr>
        <td>Daya Baru </td>
        <td>:</td>
        <td>{{$transaksi->jumlah_daya}} VA</td>
      </tr>
      <tr>
        <td>Dapat disetujui dengan total biaya sebesar </td>
        <td>:</td>
        <td>Rp. {{number_format($transaksi->tarif_pemasangan + $transaksi->biaya_ppj + $transaksi->biaya_slo)}} (Pemasangan : {{number_format($transaksi->tarif_pemasangan)}}, PPj : {{number_format($transaksi->biaya_ppj)}}, SLO / PPn : {{number_format($transaksi->biaya_ppj)}})</td>
      </tr>
    </tbody>
  </table>
  <p>Selanjutnya Bapak/Ibu/Sdr dipersilahkan melakukan pembayaran melalui Bank/loket Mitra PLN dengan nomor Registrasi (kode bayar) 74296434 selambat-lambatnya ( 3 x 24 jam ) sejak diterimanya email konfirmasi ini. untuk informasi status permohonan Anda. bisa di pantau melalu laman web kami dengan memasukkan kode taransaksi</p>
  <p>
    Atas perhatian Bapak/Ibu/Sdr kami ucapkan terimakasih
  </p>
  <p>Hormat Kami.</p>
  <br>
  <p>PT PLN Persero</p>
  @endif
</body>

</html>