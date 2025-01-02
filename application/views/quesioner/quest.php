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

        <form action="<?= base_url() ?>QuestController/InsertAnswer" method="POST">
            <div class="p-3" id="contentQuest">

                <div class="mb-4">
                    <div>
                        <p>Nama Lengkap : *</p>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Nama Lengkap" aria-label="NamaLengkap" aria-describedby="basic-addon1" name="namaLengkap" id="namaLengkap" require>
                        </div>
                    </div>
                    <div>
                        <p>Alamat Email : *</p>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Alamat Email Yang Dipakai Pembuatan Akun di WIKA INTERN" aria-label="email" aria-describedby="basic-addon1" name="email" id="email" require>
                        </div>
                    </div>
                </div>

            </div>
        </form>

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

        $(document).ready(function() {
            $.ajax({
            type: "POST",
            url: "<?= base_url('QuestController/GetAllQuest'); ?>",
            success: function(response){
                console.log(response);

                response.forEach((element, index) => {
                    var inpt = $('<p>');
                    inpt.attr('name', element.id_quest);
                    inpt.text( (index+1)+". "+element.quest);
    
                    $('#contentQuest').append(inpt);

                    if(element.text_bebas == 1){
                        var txtBebas = `<div class="input-group" id="alasan_lainnya">
                        <textarea class="form-control" aria-label="With textarea" placeholder="`+element.quest+`" style="width: 100%;" name="`+element.id_quest+`"></textarea>
                    </div>`;

                        $('#contentQuest').append(txtBebas);
                    }else{

                        var gnd = JSON.parse(element.ganda);

                        gnd.forEach((e, i) => {
                            if(e != ''){
                                var ganda = `<div class="form-check">
                                        <input class="form-check-input" type="radio" name="`+element.id_quest+`" id="`+element.id_quest+`" value="`+e+`">
                                        <label class="form-check-label" for="q1">
                                        `+e+`
                                        </label>
                                    </div>`;
                            }
                            $('#contentQuest').append(ganda);
                        });
                    }

                });

                $('#contentQuest').append(`<div class="p-4" style="display: flex; justify-content: end; gap: 10px;">
                    <button class="btn btn-secondary" type="button">
                        <a href="<?= base_url(); ?>" style="text-decoration: none; color: white;">Cancel</a>
                    </button>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>`)



            }
        })
        })


    </script>

  
</body>
</html>