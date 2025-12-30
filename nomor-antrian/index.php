<!-- Aplikasi Antrian Berbasis Web 
**********************************************
* Developer   : Indra Styawantoro
* Company     : Indra Studio
* Release     : Juni 2021
* Update      : -
* Website     : www.indrasatya.com
* E-mail      : indra.setyawantoro@gmail.com
* WhatsApp    : +62-821-8686-9898
-->

<!doctype html>
<html lang="en" class="h-100">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Aplikasi Antrian Berbasis Web">
  <meta name="author" content="Indra Styawantoro">

  <!-- Title -->
  <title>Aplikasi Antrian Berbasis Web</title>

  <!-- Favicon icon -->
  <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">

  <!-- Custom Style -->
  <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="d-flex flex-column h-100">
  <main class="flex-shrink-0">
    <div class="container pt-5">
      <div class="row justify-content-lg-center">
        
        <div class="col-lg-5 mb-4">
          <div class="px-4 py-3 mb-4 bg-white rounded-2 shadow-sm">
            <!-- judul halaman -->
            <div class="d-flex align-items-center me-md-auto">
              <i class="bi-people-fill text-success me-3 fs-3"></i>
              <h1 class="h5 pt-2">Nomor Antrian BPJS</h1>
            </div>
          </div>
        
          <div class="card border-0 shadow-sm">
            <div id="printAntrianLoketBPJS" style="display: none;" class="cetak">
              <div style="width: 200px; font-family: Tahoma; margin-top: 10px; margin-right: 5px; margin-bottom: 100px; margin-left: 15px; font-size: 21px !important;border: 0px solid #000;">
                <p style="font-size:12px;" align="center">RS Tk. II dr. Soepraoen<br><span class="small">Jl. S. Supriyadi No.22 , Sukun</span></p>
                <hr>
                <p align="center">Antrian Loket BPJS</p>
                <div id="antrianBPJS1" align="center" style="font-size: 48px !important;"></div>
              </div>
            </div>
            <div id="display_nomor_loket"></div>
            <div class="card-body text-center d-grid p-5">
              <div class="border border-success rounded-2 py-2 mb-5">
                <h3 class="pt-4">ANTRIAN BPJS</h3>
                <!-- menampilkan informasi jumlah antrian -->
                <h1 id="antrianBPJS" class="display-1 fw-bold text-success text-center lh-1 pb-2"></h1>
              </div>
              <!-- button pengambilan nomor antrian -->
              <a id="insertBPJS" href="javascript:void(0)" class="btn btn-success btn-block rounded-pill fs-5 px-5 py-4 mb-2">
                <i class="bi-person-plus fs-4 me-2"></i> Ambil Nomor
              </a>
            </div>
          </div>

        </div>

        <div class="col-lg-5 mb-4">
          <div class="px-4 py-3 mb-4 bg-white rounded-2 shadow-sm">
            <!-- judul halaman -->
            <div class="d-flex align-items-center me-md-auto">
              <i class="bi-people-fill text-success me-3 fs-3"></i>
              <h1 class="h5 pt-2">Nomor Antrian Swasta</h1>
            </div>
          </div>
        
          <div class="card border-0 shadow-sm">
            <div id="printAntrianLoketSwasta" style="display: none;" class="cetak">
              <div style="width: 200px; font-family: Tahoma; margin-top: 10px; margin-right: 5px; margin-bottom: 100px; margin-left: 15px; font-size: 21px !important;border: 0px solid #000;">
                <p style="font-size:12px;" align="center">RS Tk. II dr. Soepraoen<br><span class="small">Jl. S. Supriyadi No.22 , Sukun</span></p>
                <hr>
                <p align="center">Antrian Loket Swasta</p>
                <div id="antrianSwasta1" align="center" style="font-size: 48px !important;"></div>
              </div>
            </div>
            <div id="display_nomor_loket"></div>
            <div class="card-body text-center d-grid p-5">
              <div class="border border-success rounded-2 py-2 mb-5">
                <h3 class="pt-4">ANTRIAN Swasta</h3>
                <!-- menampilkan informasi jumlah antrian -->
                <h1 id="antrianSwasta" class="display-1 fw-bold text-success text-center lh-1 pb-2"></h1>
              </div>
              <!-- button pengambilan nomor antrian -->
              <a id="insertSwasta" href="javascript:void(0)" class="btn btn-success btn-block rounded-pill fs-5 px-5 py-4 mb-2">
                <i class="bi-person-plus fs-4 me-2"></i> Ambil Nomor
              </a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="footer mt-auto py-4">
    <div class="container">
      <!-- copyright -->
      <div class="copyright text-center mb-2 mb-md-0">
        &copy; 2021 - <a href="https://www.indrasatya.com/" target="_blank" class="text-danger text-decoration-none">www.indrasatya.com</a>. All rights reserved.
      </div>
    </div>
  </footer>

  <!-- jQuery Core -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- Popper and Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

  <script type="text/javascript">
    $(document).ready(function() {

      function printDiv(eleId){
          var PW = window.open('', '_blank', 'width=800,height=600');
          PW.document.write(document.getElementById(eleId).innerHTML);
          PW.document.close();
          PW.focus();
          PW.print();
          PW.close();
      }
      // tampilkan jumlah antrian
      $('#antrianBPJS1').load('get_antrian.php?jns=bpjs');
      $('#antrianBPJS').load('get_antrian.php?jns=bpjs');

      $('#antrianSwasta1').load('get_antrian.php?jns=swasta');
      $('#antrianSwasta').load('get_antrian.php?jns=swasta');

      // proses insert data
      $('#insertBPJS').on('click', function() {
        $.ajax({
          type: 'POST',                     // mengirim data dengan method POST
          url: 'insert.php?jns=bpjs',                // url file proses insert data
          success: function(result) {       // ketika proses insert data selesai
            // jika berhasil
            if (result === 'Sukses') {
              // tampilkan jumlah antrian
              $('#antrianBPJS').load('get_antrian.php?jns=bpjs').fadeIn('slow');
              $('#antrianBPJS1').load('get_antrian.php?jns=bpjs').fadeIn('slow');
            }
          },
        });
        printDiv('printAntrianLoketBPJS');
      });

      
      // proses insert data
      $('#insertSwasta').on('click', function() {
        $.ajax({
          type: 'POST',                     // mengirim data dengan method POST
          url: 'insert.php?jns=swasta',                // url file proses insert data
          success: function(result) {       // ketika proses insert data selesai
            // jika berhasil
            if (result === 'Sukses') {
              // tampilkan jumlah antrian
              $('#antrianSwasta').load('get_antrian.php?jns=swasta').fadeIn('slow');
              $('#antrianSwasta1').load('get_antrian.php?jns=swasta').fadeIn('slow');
            }
          },
        });
        printDiv('printAntrianLoketSwasta');
      });
    });
  </script>
</body>

</html>