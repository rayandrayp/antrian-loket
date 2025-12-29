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
        <div class="col-lg-6 mb-6">
          <div class="px-4 py-3 mb-4 bg-white rounded-2 shadow-sm">
            <!-- judul halaman -->
            <div class="d-flex align-items-center me-md-auto">
              <i class="bi-people-fill text-success me-3 fs-3"></i>
              <h1 class="h5 pt-2">Pemanggilan Nomor Antrian</h1>
            </div>
          </div>

          <div class="card border-0 shadow-sm">

            <div id="display_nomor_loket"></div>
            <div class="card-body text-center d-grid p-5">
              <div class="border border-success rounded-2 py-2 mb-5">
                <h2 class="pt-4">ANTRIAN</h2>
                <!-- menampilkan informasi jumlah antrian -->
                <h1 id="antrian" class="display-1 fw-bold text-success text-center lh-1 pb-2"></h1>
              </div>
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

  <!-- load file audio bell antrian -->
  <audio id="tingtung" src="../assets/audio/tingtung.mp3"></audio>
  <!-- jQuery Core -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- Popper and Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

  <!-- Responsivevoice -->
  <!-- Get API Key -> https://responsivevoice.org/ -->
  <script src="https://code.responsivevoice.org/responsivevoice.js?key=fGfsRsUU"></script>


  <script type="text/javascript">
    $(document).ready(function() {

      function getData() {
        $.ajax({
          type: 'POST', // mengirim data dengan method POST
          url: 'check_nomor.php', // url file proses insert data
          success: function(result) { // ketika proses insert data selesai
            // jika berhasil
            var returnedData = JSON.parse(result);
            // console.log(returnedData.data[0]);
            if (returnedData.data[0]['status'] === 'Sukses') {
              // tampilkan jumlah antrian
              $('#antrian').load('get_antrian.php').fadeIn('slow');

              var bell = document.getElementById('tingtung');

              // mainkan suara bell antrian
              bell.pause();
              bell.currentTime = 0;
              bell.play();

              // set delay antara suara bell dengan suara nomor antrian
              durasi_bell = bell.duration * 770;
              // console.log("nomor_antrian : ".returnedData.data[0]['no_antrian']);
              // mainkan suara nomor antrian
              //alert(returnedData.data[0]['id_loket']);
              setTimeout(function() {
                // console.log("Nomor Antrian, " + data["no_antrian"] + ", menuju, loket, 1", "Indonesian Male");
                responsiveVoice.speak("Nomor Antrian, " + returnedData.data[0]['no_antrian'] + ", menuju, loket " + returnedData.data[0]['id_loket'], "Indonesian Male", {
                  rate: 0.9,
                  pitch: 1,
                  volume: 1
                });
              }, durasi_bell);

              update(returnedData.data[0]['id']);
            }
          },
        });
      }

      function update(id) {
        // console.log("id update : ".id)
        //update status id menjadi 2 (inactive)
        $.ajax({
          type: "POST", // mengirim data dengan method POST
          url: "update.php", // url file proses update data
          data: {
            id: id
          } // tentukan data yang dikirim
        });
      }

      // auto reload data antrian setiap 1 detik untuk menampilkan data secara realtime
      setInterval(function() {
        getData();
      }, 1000);
    });
  </script>
</body>

</html>
