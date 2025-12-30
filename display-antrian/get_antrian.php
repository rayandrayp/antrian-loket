<?php
// pengecekan ajax request untuk mencegah direct access file, agar file tidak bisa diakses secara langsung dari browser
// jika ada ajax request
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
  // panggil file "database.php" untuk koneksi ke database
  require_once "../config/database.php";

  // ambil tanggal sekarang
  $tanggal = gmdate("Y-m-d", time() + 60 * 60 * 7);

  // sql statement untuk menampilkan jumlah data dari tabel "tbl_antrian_loket" berdasarkan "tanggal"
  $query = mysqli_query($mysqli, "SELECT no_antrian as jumlah,id_loket,jenis FROM tbl_antrian_loket 
                                  WHERE tanggal='$tanggal' and status = '1'")
    or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
  // ambil data hasil query
  $data = mysqli_fetch_assoc($query);
  // buat variabel untuk menampilkan data
  $jumlah_antrian = $data['jumlah'];
  $kodeJenis = switch ($data['jenis']) {
    case 'BPJS':  $kodeJenis = 'B'; break;
    case 'LAB':   $kodeJenis = 'L'; break;
    case 'JKN':   $kodeJenis = 'J'; break;
    case 'RANAP': $kodeJenis = 'R'; break;
    default:      $kodeJenis = 'A';
  }

  // tampilkan data
  echo json_encode([
    'kode'   => $kodeJenis,
    'nomor'  => number_format($jumlah_antrian, 0, '', '.'),
    'loket'  => $data['id_loket']
  ]);
}
