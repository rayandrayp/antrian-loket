<?php
// pengecekan ajax request untuk mencegah direct access file, agar file tidak bisa diakses secara langsung dari browser
// jika ada ajax request
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
  // panggil file "database.php" untuk koneksi ke database
  require_once "../config/database.php";

  // ambil tanggal sekarang
  $tanggal = gmdate("Y-m-d", time() + 60 * 60 * 7);

  // membuat "no_antrian"
  // sql statement untuk menampilkan data "no_antrian" terakhir pada tabel "tbl_antrian_loket" berdasarkan "tanggal"
  $query = mysqli_query($mysqli, "SELECT no_antrian, id,id_loket FROM tbl_antrian_loket WHERE tanggal='$tanggal' and status = '1'")
    or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
  // ambil jumlah baris data hasil query
  $rows = mysqli_num_rows($query);

  // cek hasil query
  // jika "no_antrian" sudah ada
  if ($rows > 0) {
    $response         = array();
    $response["data"] = array();

    // ambil data hasil query
    while ($row = mysqli_fetch_assoc($query)) {
      $data['id']         = $row["id"];
      $data['no_antrian'] = $row["no_antrian"];
      $data['id_loket'] = $row["id_loket"];
      $data['status']     = "Sukses";

      array_push($response["data"], $data);
    }

    // tampilkan data
    echo json_encode($response);

    // $data = mysqli_fetch_assoc($query);
    // $id_antrian = $data['id'];
    // echo $id_antrian;
    // echo "Sukses";
  } else {
    $response         = array();
    $response["data"] = array();

    // buat data kosong untuk ditampilkan
    $data['id']         = "";
    $data['no_antrian'] = "-";
    $data['status']     = "Kosong";

    array_push($response["data"], $data);

    // tampilkan data
    echo json_encode($response);
  }
}
