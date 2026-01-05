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

<style>
  html, body {
    height: 100%;
    margin: 0;
  }

  body {
    min-height: 100vh;
    background: linear-gradient(135deg, #0b3c5d, #062f4f);
    font-family: "Arial", Times, serif;
    display: flex;
    flex-direction: column;
  }

  main {
    flex: 1;
    display: flex;
  }

  /* Card utama */
  .card {
    background: transparent;
    color: #fff;
  }

  /* Panel kiri */
  #panel-antrian {
    background: linear-gradient(180deg, #0d4f8b, #083b6d);
    border-radius: 16px;
    height: 100%;

    padding: clamp(24px, 4vw, 64px);

    display: flex;
    flex-direction: column;
    justify-content: center;
    box-shadow: 0 20px 40px rgba(0,0,0,.25);
  }
  /* Judul loket */
  .loket-title {
    font-size: clamp(42px, 4vw, 64px);
    font-weight: 800;
    letter-spacing: 2px;
    text-align: center;
  }

  #nomor {
    font-size: clamp(48px, 8vw, 140px);
    font-weight: 900;

    white-space: nowrap;      /* ⬅️ KUNCI 1 BARIS */
    line-height: 1;           /* ⬅️ RAPAT */
    overflow: hidden;
    text-align: center;
    color: #ffeb3b;
  }

  .fs-4 {
    font-size: clamp(18px, 2vw, 26px) !important;
    text-align: center;
  }


  /* Nomor antrian besar */
  #antrian {
    font-size: 120px !important;
    color: #ffeb3b !important;
    text-shadow: 0 6px 20px rgba(0,0,0,.5);
    text-align: center;
  }

  /* Panel video */
  #panel-video {
    position: relative;
    width: 100%;
    height: 100%;
    background: #000;
    border-radius: 16px;
    overflow: hidden;
  }

  #panel-video video {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    border: none;
  }


  /* Bar loket bawah */
  .loket-item {
    background: linear-gradient(180deg, #0d4f8b, #083b6d);
    border-radius: 18px;
    padding: 20px 12px;

    border: 2px solid rgba(255,255,255,0.25);
    box-shadow: 0 8px 20px rgba(0,0,0,.25);

    min-height: 90px;

    display: flex;
    flex-direction: column;
    justify-content: center;
  }


  .loket-item:hover {
    border-color: #ffeb3b;
    background: rgba(255,235,59,0.08);
    transform: translateY(-3px);
  }

  .loket-item .loket {
    font-size: 35px;
    opacity: .85;
  }

  .loket-item .kode {
    font-size: 50px;
    font-weight: 800;
    color: #ffeb3b;
  }

  .loket-bar {
    padding: 24px;
  }

  @media (min-width: 1600px) {
    #panel-antrian {
      padding: 80px;
    }
    .row.g-3 {
      --bs-gutter-x: 2rem;
      --bs-gutter-y: 2rem;
    }
  }
</style>

<body class="d-flex flex-column h-200">
  <main class="flex-shrink-0">
    <div class="container-fluid px-4 pt-3 h-100 d-flex flex-column">
      <div class="row flex-grow-1 g-4 align-items-stretch">
        <div class="col-12">
          <div class="px-4 py-3 mb-4 bg-white rounded-2 shadow-sm">
            <!-- judul halaman -->
            <div class="d-flex align-items-center me-md-auto">
              <i class="bi-people-fill text-success me-3 fs-3"></i>
              <h1 class="h5 pt-2">Pemanggilan Nomor Antrian</h1>
            </div>
          </div>

          <div class="card border-0 shadow-sm">
            <div id="display_nomor_loket">
              <div class="row flex-grow-1 align-items-stretch">

                <!-- PANEL KIRI -->
                <div class="col-md-5 col-lg-4 h-100">
                  <div id="panel-antrian" class="h-100">
                    <div class="loket-title">
                      LOKET <span id=loket>-</span>
                    </div>
                    <div class="mt-4">
                      <div class="fs-4">NOMOR ANTRIAN</div>
                      <div id="nomor" class="fw-bold">-</div>
                    </div>
                  </div>
                </div>

                <!-- PANEL KANAN -->
                <div class="col-md-7 col-lg-8 d-flex">
                  <div id="panel-video" class="flex-fill">
                    <video
                      autoplay
                      muted
                      loop
                      playsinline
                      controls>
                      <source src="../assets/video/profil-rs.mp4" type="video/mp4">
                    </video>
                  </div>
                </div>
              </div>
            
              <!-- BAR LOKET BAWAH -->
              <div class="loket-bar mt-4">
                <!-- ROW 1 -->
                <div class="row text-center g-3">
                  <div class="col loket-item">
                    <div class="loket">LOKET 1</div>
                    <div class="kode" id="loket-bar-1">-</div>
                  </div>
                  <div class="col loket-item">
                    <div class="loket">LOKET 2</div>
                    <div class="kode" id="loket-bar-2">-</div>
                  </div>
                  <div class="col loket-item">
                    <div class="loket">LOKET 3</div>
                    <div class="kode" id="loket-bar-3">-</div>
                  </div>
                  <div class="col loket-item">
                    <div class="loket">LOKET 4</div>
                    <div class="kode" id="loket-bar-4">-</div>
                  </div>
                  <div class="col loket-item">
                    <div class="loket">LOKET 5</div>
                    <div class="kode" id="loket-bar-5">-</div>
                  </div>
                </div>
              </div>

              <div class="loket-bar mt-3">
                <!-- ROW 2 -->
                <div class="row text-center g-3">
                  <div class="col loket-item">
                    <div class="loket">LOKET 6</div>
                    <div class="kode" id="loket-bar-6">-</div>
                  </div>
                  <div class="col loket-item">
                    <div class="loket">LOKET 7</div>
                    <div class="kode" id="loket-bar-7">-</div>
                  </div>
                  <div class="col loket-item">
                    <div class="loket">LOKET 8</div>
                    <div class="kode" id="loket-bar-8">-</div>
                  </div>
                  <div class="col loket-item">
                    <div class="loket">LOKET 9</div>
                    <div class="kode" id="loket-bar-9">-</div>
                  </div>
                  <div class="col loket-item">
                    <div class="loket">LOKET 10</div>
                    <div class="kode" id="loket-bar-10">-</div>
                  </div>
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
      <!-- <div class="copyright text-center mb-2 mb-md-0">
        &copy; 2025 - <a href="https://www.rssoepraoen.co.id/" target="_blank" class="text-danger text-decoration-none">www.rssoepraoen.co.id</a>. All rights reserved.
      </div> -->
    </div>
  </footer>

  <!-- load file audio bell antrian -->
  <audio id="tingtung" src="../assets/audio/tingtunganyar.mp3"></audio>
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

      setInterval(function() {
        $('#loket-bar-1').load('get_antrian_loket.php?loket=1').fadeIn("slow");
        $('#loket-bar-2').load('get_antrian_loket.php?loket=2').fadeIn("slow");
        $('#loket-bar-3').load('get_antrian_loket.php?loket=3').fadeIn("slow");
        $('#loket-bar-4').load('get_antrian_loket.php?loket=4').fadeIn("slow");
        $('#loket-bar-5').load('get_antrian_loket.php?loket=5').fadeIn("slow");
        $('#loket-bar-6').load('get_antrian_loket.php?loket=6').fadeIn("slow");
        $('#loket-bar-7').load('get_antrian_loket.php?loket=7').fadeIn("slow");
        $('#loket-bar-8').load('get_antrian_loket.php?loket=8').fadeIn("slow");
        $('#loket-bar-9').load('get_antrian_loket.php?loket=9').fadeIn("slow");
        $('#loket-bar-10').load('get_antrian_loket.php?loket=10').fadeIn("slow");
      }, 1000);

      function getData() {
        $.ajax({
          type: 'POST', // mengirim data dengan method POST
          url: 'check_nomor.php', // url file proses insert data
          success: function(result) { // ketika proses insert data selesai
            // jika berhasil
            var returnedData = JSON.parse(result);
            // console.log(returnedData.data[0]);
            if (returnedData.data[0]['status'] === 'Sukses') {
              $.ajax({
                url: 'get_antrian.php',
                dataType: 'json',
                success: function(res) {
                  let nomorAntrian = res.kode + res.nomor;
                  let loket = res.loket;
                  $('#nomor').text(nomorAntrian);
                  $('#loket').text(loket);
                  $('#loket-bar-' + loket).text(nomorAntrian);
                }
              });

              var bell = document.getElementById('tingtung');

              // mainkan suara bell antrian
              bell.pause();
              bell.currentTime = 0;
              bell.play();
              $('#nomor').text(returnedData.data[0]['no_antrian']);
              $('#loket').text(returnedData.data[0]['id_loket']);
              // set delay antara suara bell dengan suara nomor antrian
              durasi_bell = bell.duration * 770;
              // console.log("nomor_antrian : ".returnedData.data[0]['no_antrian']);
              // mainkan suara nomor antrian
              //alert(returnedData.data[0]['id_loket']);
              setTimeout(function() {
                // console.log("Nomor Antrian, " + data["no_antrian"] + ", menuju, loket, 1", "Indonesian Male");
                responsiveVoice.speak("Nomor Antrian, " + returnedData.data[0]['no_antrian'] + ", menuju, loket " + returnedData.data[0]['id_loket'], "Indonesian Female", {
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
  <!-- <script type="text/javascript">
    $(document).ready(function () {
      setInterval(function () {
        for (let i = 1; i <= 10; i++) {
          $('#loket-bar-' + i)
            .load('get_antrian_loket.php?loket=' + i)
            .fadeIn("slow");
        }
      }, 1000);

      function playAudio(src) {
        return new Promise((resolve) => {
          const audio = new Audio(src);
          audio.onended = resolve;
          audio.play();
        });
      }

      function splitAntrian(no) {
        const huruf = no.match(/[A-Z]/)[0];
        const angka = no.match(/\d+/)[0].split('');
        return { huruf, angka };
      }

      function playNumber(num) {
        return playAudio(`../assets/audio/${num}.wav`);
      }

      async function speak(num) {
        num = parseInt(num, 10);
        if (num === 0) return;
        if (num >= 100) {
          const hundreds = Math.floor(num / 100);

          if (hundreds > 1) {
            await playNumber(hundreds);
            await playAudio('../assets/audio/ratus.wav');
          } else {
            await playAudio('../assets/audio/seratus.wav');
          }

          await speak(num % 100);
          return;
        }
        if (num >= 20) {
          const tens = Math.floor(num / 10);
          await playNumber(tens);
          await playAudio('../assets/audio/puluh.wav');
          await speak(num % 10);
          return;
        }
        if (num >= 12) {
          await playNumber(num - 10);
          await playAudio('../assets/audio/belas.wav');
          return;
        }
        await playNumber(num);
      }

      async function panggil(data) {
        const noAntrian = data.no_antrian;
        const loket = data.id_loket;
        const { huruf, angka } = splitAntrian(noAntrian);

        $('#nomor').text(noAntrian);
        $('#loket').text(loket);
        $('#loket-bar-' + loket).text(noAntrian);

        await playAudio('../assets/audio/tingtunganyar.mp3');
        await playAudio('../assets/audio/antrian.wav');
        await playAudio(`../assets/audio/${huruf}.wav`);
        await speak(angka.join(''));
        await playAudio('../assets/audio/loket.wav');
        await playAudio(`../assets/audio/${loket}.wav`);
      }

      let isPlaying = false;

      function getData() {
        $.ajax({
          type: 'POST',
          url: 'check_nomor.php',
          success: async function (result) {
            const returnedData = JSON.parse(result);

            if (returnedData.data[0]['status'] === 'Sukses') {
              isPlaying = true;

              await panggil(returnedData.data[0]);

              update(returnedData.data[0]['id']);
              isPlaying = false;
            }
          }
        });
      }

      function update(id) {
        $.ajax({
          type: "POST",
          url: "update.php",
          data: { id: id }
        });
      }

      setInterval(function () {
        getData();
      }, 1000);

    });
  </script> -->

</body>

</html>
