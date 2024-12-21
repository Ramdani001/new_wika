<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="icon" href="<?= base_url(); ?>assets/img/Logo.png"> 
    <!-- Custom fonts for this template-->
    <link href="<?php base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="<?php base_url(); ?>https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Bootstrap5 -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    
    <!-- Custom styles for this page -->
    <link rel="stylesheet" href="<?php base_url(); ?>assets/dataTable/twitter-bootstrap.css" />
    <link rel="stylesheet" href="<?php base_url(); ?>assets/dataTable/dataTable.bootstrap.css" />
  
    <!-- Fontawesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/fontawesome/css/all.min.css">

    <!-- Sweetalert -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/style/sweetalert/sweetalert2.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/style/sweetalert/sweetalert2.min.css">

    <!-- MyStyle -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/style/css/style.css"> 
</head>
<body>
    

    <div class="mt-4 container border" style="width: 50%; height: 100%;">
        <h3 class="text-center">
            <b>Quesioner</b> Intership WIKA
        </h3>

        <div class="p-3">
            <p>
                1. Apa alasan utama Anda tertarik untuk magang di perusahaan ini?
            </p>

            <div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q1" id="q1">
                    <label class="form-check-label" for="q1">
                    Untuk mendapatkan pengalaman kerja
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q1" id="q1_0">
                    <label class="form-check-label" for="q1_0">
                    Untuk memperluas jaringan profesional
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q1" id="q1_2">
                    <label class="form-check-label" for="q1_2">
                    Untuk meningkatkan keterampilan teknis atau non-teknis
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q1" id="q1_3">
                    <label class="form-check-label" for="q1_3">
                    Lainnya
                    </label>
                </div>
                <div class="input-group d-none" id="alasan_lainnya">
                    <textarea class="form-control" aria-label="With textarea" placeholder="Alasan Lainnya" style="width: 100%;"></textarea>
                </div>
            </div>

            <!-- 2 -->
            <div>
                <p class="mt-2">
                    2. Apakah bidang atau divisi tertentu di perusahaan yang menjadi minat utama Anda?
                </p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q1" id="q1">
                    <label class="form-check-label" for="q1">
                    Ya
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q1" id="q1_0">
                    <label class="form-check-label" for="q1_0">
                    Tidak
                    </label>
                </div>
            </div>

            <!-- 3 -->
            <div>
                <p class="mt-2">
                    3. Seberapa yakin Anda dengan kemampuan teknis dan keterampilan yang dimiliki untuk mendukung tugas selama magang?
                </p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q1" id="q1">
                    <label class="form-check-label" for="q1">
                     Tidak Yakin
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q1" id="q1_0">
                    <label class="form-check-label" for="q1_0">
                     Sangat Yakin
                    </label>
                </div>

            <!-- 4 -->
            <div>
                <p class="mt-2">
                    4. Apakah Anda bersedia mengikuti jam kerja sesuai dengan aturan perusahaan? Jika tidak, sebutkan alasan Anda?
                </p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q1" id="q1">
                    <label class="form-check-label" for="q1">
                     Ya
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q1" id="q1_0">
                    <label class="form-check-label" for="q1_0">
                     Tidak
                    </label>
                </div>
            </div>

            <!-- 5 -->
            <div>
                <p class="mt-2">
                    5. Adakah kebutuhan atau kondisi khusus yang harus perusahaan ketahui sebelum Anda memulai magang?
                </p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q1" id="q1">
                    <label class="form-check-label" for="q1">
                     Ya
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q1" id="q1_0">
                    <label class="form-check-label" for="q1_0">
                     Tidak
                    </label>
                </div>
            </div>

            <!-- 6 -->
            <div>
                <p class="mt-2">
                    6. Apakah Anda siap bekerja di lapangan (site project) jika dibutuhkan selama program magang?
                </p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q1" id="q1">
                    <label class="form-check-label" for="q1">
                     Ya
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q1" id="q1_0">
                    <label class="form-check-label" for="q1_0">
                     Tidak
                    </label>
                </div>
            </div>

            <!-- 7 -->
            <div>
                <p class="mt-2">
                    7. Seberapa yakin Anda dengan keterampilan yang Anda miliki untuk mendukung tugas selama magang di PT WIKA?
                </p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q1" id="q1">
                    <label class="form-check-label" for="q1">
                     Tidak Yakin
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q1" id="q1_0">
                    <label class="form-check-label" for="q1_0">
                     Sangat Yakin
                    </label>
                </div>
            </div>

            <!-- 8 -->
            <div>
                <p class="mt-2">
                    8. Apakah anda akan mengikuti peraturan safety selama berada di kawasan?
                </p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q1" id="q1">
                    <label class="form-check-label" for="q1">
                     Ya
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q1" id="q1_0">
                    <label class="form-check-label" for="q1_0">
                     Tidak
                    </label>
                </div>
            </div>

            <!-- 9 -->
            <div>
                <p class="mt-2">
                    9. Adakah kebutuhan atau kondisi khusus yang perlu diperhatikan oleh PT WIKA sebelum Anda memulai magang?
                    <i>(Contoh: jadwal kuliah, kesehatan, atau transportasi)</i>
                </p>
                <div class="input-group" id="alasan_lainnya">
                    <textarea class="form-control" aria-label="With textarea" placeholder="Alasan Lainnya" style="width: 100%;"></textarea>
                </div>
            </div>

            <!-- 10 -->
            <div>
                <p class="mt-2">
                    10. Adakah saran atau rekomendasi untuk meningkatkan program magang ini agar lebih bermanfaat bagi mahasiswa?
                </p>
                <div class="input-group" id="alasan_lainnya">
                    <textarea class="form-control" aria-label="With textarea" placeholder="Alasan Lainnya" style="width: 100%;"></textarea>
                </div>
            </div>


            <div class="p-4" style="display: flex; justify-content: end; gap: 10px;">
                <button class="btn btn-secondary" type="button">
                    <a href="<?= base_url(); ?>" style="text-decoration: none; color: white;">Cancel</a>
                </button>
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>

        </div>

    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="<?php base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
      <script src="<?php base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

      <!-- Bootstrap -->
      <script src="<?php base_url(); ?>assets/bootstrap/js/bootstrap.js"></script>
      <script src="<?php base_url(); ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>

      <!-- Core plugin JavaScript-->
      <script src="<?php base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

      <!-- Custom scripts for all pages-->
      <script src="<?php base_url(); ?>assets/js/sb-admin-2.min.js"></script>

      <!-- Page level plugins -->
      <script src="<?php base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
      <script src="<?php base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
      
      <!-- MyStyle -->
      
      <script src="<?php base_url() ?>assets/dataTable/jquery.js"></script>
      <script src="<?php base_url() ?>assets/dataTable/jquery.dataTable.min.js"></script>
      <script src="<?php base_url() ?>assets/dataTable/dataTables.bootstrap.js"></script>
      <script src="<?php base_url() ?>assets/dataTable/responsive.table.js"></script>
      <script src="<?php base_url() ?>assets/dataTable/Row.reorder.js"></script>
      <!-- SweetAlert -->
      <script src="<?php base_url() ?>assets/style/sweetalert/sweetalert2.js"></script>
      <script src="<?php base_url() ?>assets/style/sweetalert/sweetalert2.all.min.js"></script>
      
      
    <!-- My Script -->
    <script>
        $('#q1_3').on('click', function() {
            $('#alasan_lainnya').removeClass("d-none");
        })
        
        $('#q1').on('click', function() {
            $('#alasan_lainnya').addClass("d-none");
        });

        $('#q1_0').on('click', function() {
            $('#alasan_lainnya').addClass("d-none");
        });

        $('#q1_2').on('click', function() {
            $('#alasan_lainnya').addClass("d-none");
        });

    </script>

  
</body>
</html>