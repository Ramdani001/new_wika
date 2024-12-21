<div class="container">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title fw-bold text-center">
                SURAT PENERIMAAN & SERTIFIKASI
            </h3>
        </div>
        <div class="card-body h-full" style="height: 50vh;">

            <div class="row g-5 mt-5 items-center justify-content-evenly ">
                <?php if($getUser['roleId'] != 3){ ?>
                    <div class="col-5 text-center p-3 card shadow"  data-bs-toggle="modal" data-bs-target="#modalSurat" style="width: 300px; height: 150px; cursor: pointer;">
                        <h4>
                        Surat Penerimaan
                        </h4>
                        <i class="fa-solid fa-file-pen fs-1 mt-3"></i>
                    </div>
                <?php } ?>
                
                <div id="viewSurat" class="col-5 text-center p-3 card shadow" style="width: 300px; height: 150px; cursor: pointer;" value="viewSurat">
                    <h4>
                        View
                    </h4>
                    <i class="fa-solid fa-users-viewfinder  fs-1 mt-3"></i>
                </div>
                <?php if($getUser['roleId'] != 3){ ?>
                <div class="col-5 text-center p-3 card shadow" data-bs-toggle="modal" data-bs-target="#modalSertifikat" style="width: 300px; height: 150px; cursor: pointer;">
                    <h4>
                        Sertifikat
                    </h4>
                    <i class="fa-solid fa-certificate fs-1 mt-3"></i>
                </div>
                <?php }?>
            </div>

        </div>
    </div>
</div>

<!-- Modal Surat -->

<div class="modal fade" id="modalSurat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Surat Penerimaan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="<?php echo base_url('Administrator/InsertSuratBalasan'); ?>" method="POST" enctype="multipart/form-data">


           <!-- Header Surat -->
           <div class="card-header">
                <h3 class="fw-semiblod">Header</h3>
                <hr>
            </div>
            <div class="mb-3">
                <label for="nomorSuratBalasan">Nomor Surat</label>
                <input type="text" class="form-control" placeholder="Nomor Surat" name="nomorSuratBalasan" id="nomorSuratBalasan" readonly>
            </div>
            <div class="mb-3">
                <label for="asalSekolah">Asal Sekolah / Universitas</label>
                <input type="text" class="form-control" placeholder="Kepada Yth." name="asalSekolahPemohon" id="asalSekolahPemohon" readonly>
            </div>
            <div class="mb-3">
                <label for="tglDibuat">Tanggal Dibuat</label>
                <!-- Value Tanggal Ditambah Majalengka -->
                <input type="date" class="form-control" placeholder="Tanggal Dibuat" name="tglDibuat" id="tglDibuat">
            </div>
            <!-- Isi Surat -->
            <div class="card-header">
                <hr>
                <h3 class="fw-bold">Isi Surat</h3>
                <hr>
            </div>
            <div class="mb-3">
                <label for="nomorSuratMou">Nomor Surat MOU dari Anak PKL</label>
                <input type="text" class="form-control" placeholder="Nomor Surat MOU dari Anak PKL" name="nomorSuratMou" id="nomorSuratMou">
            </div>
            <div class="mb-3">
                <label for="tglSuratMou">Tanggal Surat MOU dari Anak PKL</label>
                <input type="date" class="form-control" placeholder="Tanggal Surat MOU dari Anak PKL" name="tglSuratMou" id="tglSuratMou">
            </div>
            <div class="mb-3">
                <label for="statusPemohon">Status Pemohon</label>
                <select name="statusPemohon" id="statusPemohon" class="form-control">
                    <option value="" selected>Status Pemohonon</option>
                    <option value="Mahasiswa">Mahasiswa</option>
                    <option value="Siswa">Siswa</option>
                    <option value="Guru">Guru</option>
                </select>
            </div>
            <!-- Tabel -->
            <div class="mb-3">
                <label for="jumlahPemohon">Jumlah Pemohon</label>
                <select  class="form-select" aria-label="Default select example" name="jumlahPemohon" id="jumlahPemohon">
                    <option selected>Jumlah Pemohon</option>
                    <option value="1">1 Pemohon</option>
                    <option value="2">2 Pemohon</option>
                    <option value="3">3 Pemohon</option>
                    <option value="4">4 Pemohon</option>
                    <option value="5">5 Pemohon</option>
                </select>
            </div>
            
            <!-- ==== -->
            <!-- Disini Jumlah Pemohon 1-5 Maka inputan yang keluar sesuai jumlah pemohon -->
            <!-- ==== -->
            
            <!-- Pemohon 1 -->
            <div id="pemohon1" class="row gap-3 d-none">
                <h4>Pemohon 1</h4>
                <div class="mb-3 col">
                    <label for="namaPemohon1">Nama Pemohon</label>
                    <select name="namaPemohon1" id="namaPemohon1" class="form-control namaPemohon" onChange="getPemohon('Pemohon1', this.value)">
                        <option value="-">Nama Lengkap</option>
                        <?php foreach ($User as $data) { ?>
                            <?php if($data->roleId == 3) { ?>
                                <option value="<?= $data->id ?>"><?= $data->namaLengkap ?></option>
                            <?php }?>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3 col">
                    <label for="nim1">NIM / NRP</label>
                    <input type="text" class="form-control" placeholder="NIM / NRP" id="nim1" name="nim1" readonly>
                    <input type="text" class="form-control" placeholder="NIM / NRP" id="insertNamaPemohon1" name="insertNamaPemohon1" hidden>
                </div>

                <div class="mb-3 col">
                    <label for="jurusan">Jurusan / Kompetensi</label>
                    <input type="text" class="form-control" placeholder="Jurusan / Kompetensi" id="jurusan1" name="jurusan1" readonly>
                </div>
            </div>
            <!-- Pemohon 1 -->
            
            <!-- Pemohon 2 -->
            <div id="pemohon2" class="row gap-3 d-none">
                <h4>Pemohon 2</h4>
                <div class="mb-3 col">
                    <label for="namaPemohon2">Nama Pemohon</label>
                    <select name="namaPemohon2" id="namaPemohon2" class="form-control namaPemohon" onChange="getPemohon('Pemohon2', this.value)">
                        <option value="-">Nama Lengkap</option>
                        <?php foreach ($User as $data) { ?>
                            <?php if($data->roleId == 3) { ?>
                                <option value="<?= $data->id ?>"><?= $data->namaLengkap ?></option>
                            <?php }?>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3 col">
                    <label for="nim1">NIM / NRP</label>
                    <input type="text" class="form-control" placeholder="NIM / NRP" id="nim2" name="nim2" readonly>
                    <input type="text" class="form-control" placeholder="NIM / NRP" id="insertNamaPemohon2" name="insertNamaPemohon2" hidden>
                </div>

                <div class="mb-3 col">
                    <label for="jurusan">Jurusan / Kompetensi</label>
                    <input type="text" class="form-control" placeholder="Jurusan / Kompetensi" id="jurusan2" name="jurusan2" readonly>
                </div>
            </div>
            <!-- Pemohon 2 -->
            
            <!-- Pemohon 3 -->
            <div id="pemohon3" class="row gap-3 d-none">
                <h4>Pemohon 3</h4>
                <div class="mb-3 col">
                    <label for="namaPemohon3">Nama Pemohon</label>
                    <select name="namaPemohon3" id="namaPemohon3" class="form-control namaPemohon" onChange="getPemohon('Pemohon3', this.value)">
                        <option value="-">Nama Lengkap</option>
                        <?php foreach ($User as $data) { ?>
                            <?php if($data->roleId == 3) { ?>
                                <option value="<?= $data->id ?>"><?= $data->namaLengkap ?></option>
                            <?php }?>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3 col">
                    <label for="nim3">NIM / NRP</label>
                    <input type="text" class="form-control" placeholder="NIM / NRP" id="nim3" name="nim3" readonly>
                    <input type="text" class="form-control" placeholder="NIM / NRP" id="insertNamaPemohon3" name="insertNamaPemohon3" hidden>
                </div>

                <div class="mb-3 col">
                    <label for="jurusan">Jurusan / Kompetensi</label>
                    <input type="text" class="form-control" placeholder="Jurusan / Kompetensi" id="jurusan3" name="jurusan3" readonly>
                </div>
            </div>
            <!-- Pemohon 3 -->
            
            <!-- Pemohon 4 -->
            <div id="pemohon4" class="row gap-3 d-none">
                <h4>Pemohon 4</h4>
                <div class="mb-3 col">
                    <label for="namaPemohon4">Nama Pemohon</label>
                    <select name="namaPemohon4" id="namaPemohon4" class="form-control namaPemohon" onChange="getPemohon('Pemohon4', this.value)">
                        <option value="-">Nama Lengkap</option>
                        <?php foreach ($User as $data) { ?>
                            <?php if($data->roleId == 3) { ?>
                                <option value="<?= $data->id ?>"><?= $data->namaLengkap ?></option>
                            <?php }?>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3 col">
                    <label for="nim4">NIM / NRP</label>
                    <input type="text" class="form-control" placeholder="NIM / NRP" id="nim4" name="nim4" readonly>
                    <input type="text" class="form-control" placeholder="NIM / NRP" id="insertNamaPemohon4" name="insertNamaPemohon4" hidden>
                </div>

                <div class="mb-3 col">
                    <label for="jurusan">Jurusan / Kompetensi</label>
                    <input type="text" class="form-control" placeholder="Jurusan / Kompetensi" id="jurusan4" name="jurusan4" readonly>
                </div>
            </div>
            <!-- Pemohon 4 -->
            
            <!-- Pemohon 5 -->
            <div id="pemohon5" class="row gap-3 d-none">
                <h4>Pemohon 5</h4>
                <div class="mb-3 col">
                    <label for="namaPemohon5">Nama Pemohon</label>
                    <select name="namaPemohon5" id="namaPemohon5" class="form-control namaPemohon" onChange="getPemohon('Pemohon5', this.value)">
                        <option value="-">Nama Lengkap</option>
                        <?php foreach ($User as $data) { ?>
                            <?php if($data->roleId == 3) { ?>
                                <option value="<?= $data->id ?>"><?= $data->namaLengkap ?></option>
                            <?php }?>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3 col">
                    <label for="nim5">NIM / NRP</label>
                    <input type="text" class="form-control" placeholder="NIM / NRP" id="nim5" name="nim5" readonly>
                    <input type="text" class="form-control" placeholder="NIM / NRP" id="insertNamaPemohon5" name="insertNamaPemohon5" hidden>
                </div>

                <div class="mb-3 col">
                    <label for="jurusan">Jurusan / Kompetensi</label>
                    <input type="text" class="form-control" placeholder="Jurusan / Kompetensi" id="jurusan5" name="jurusan5" readonly>
                </div>
            </div>
            <!-- Pemohon 5 -->
                 
                <div class="mb-3">
                    <label for="statusSurat">Status Surat</label>
                    <select class="form-select" aria-label="Default select example" id="statusSurat" name="statusSurat">
                        <option selected>Status Surat</option>
                        <option value="Telah Kami Terima">Telah Kami Terima</option>
                        <option value="Belum Bisa Kami Terima">Belum Bisa Kami Terima</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="dateFrom">Waktu Pelaksanaan</label>
                    <div class="row">
                        <div class="col">
                            <label for="dateFrom">Tanggal Mulai</label>
                            <input type="date" class="form-control" id="tglMulai" name="tglMulai">
                        </div>
                        <div class="col ">
                            <label for="statusSurat">Tanggal Akhir</label>
                            <input type="date" class="form-control" id="tglAkhir" name="tglAkhir">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="divisi">Penempatan Unit Kerja / Divisi</label>
                    <select class="form-select" aria-label="Default select example" id="divisi" name="divisi">
                        <option selected>Penempatan Unit Kerja / Divisi</option>
                        <?php foreach ($divisi as $data) { ?>
                            <?php if($data->idDivisi != 4) {?>
                                <option value="<?= $data->idDivisi ?>"> <?= $data->namaDivisi ?> </option>
                            <?php }?>
                        <?php }?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="pembimbing">Nama Pembimbing</label>
                    <input type="text" class="form-control" placeholder="Nama Pembimbing" name="namaPembimbing" id="namaPembimbing">
                </div>

                <div class="mb-3">
                    <label for="ttd_digital">Ttd Digital / QR Code</label>
                    <input type="file" class="form-control" placeholder="Ttd Digital / QR Code" id="ttd_digital" name="ttd_digital">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
        </div>
     
    </div>
  </div>
</div>

<!-- Modal Sertifikat -->
<div class="modal fade" id="modalSertifikat" tabindex="-1" aria-labelledby="modalSertifikatLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalSertifikatLabel">Data Sertifikat</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
        <form action="<?= base_url(); ?>SertifikatController/Insert" method="POST">
            
            <label for="">No Surat Penerimaan</label>
            <input type="text" class="form-control mb-2" placeholder="No Surat Penilaian" name="no_surat_penilaian" id="no_surat_penilaian" readonly>
            <!-- <input type="text" class="form-control mb-2" placeholder="Id User" name="id_user" id="id_user"> -->
            <label for="">Nama Magang</label>
            <select name="nim_user" id="nim_user" class="form-control">
                
                <option value="" selected>Nama Magang</option>
                <?php foreach ($User as $data) {
                    if($data->roleId == 3){
                ?>
                    <option value="<?= $data->id ?>"><?= $data->namaLengkap ?></option>
                <?php } }?>
            </select>
            <label for="">Tanggal Dibuat</label>
            <input type="date" class="form-control mb-2" placeholder="Tanggal Dibuat" name="tgl_dibuat" id="tgl_dibuat">
            <h5>
                Penilaian - Kepribadian dan Perilaku
            </h5>
            <hr>
            <label for="">Kedisiplinan</label>
            <input type="text" class="form-control mb-2" placeholder="Kedisiplinan" name="kedisiplinan" id="kedisiplinan">
            <label for="">Tanggung Jawab</label>
            <input type="text" class="form-control mb-2" placeholder="Tanggung Jawab" name="tanggung_jawab" id="tanggung_jawab">
            <label for="">Kerapihan</label>
            <input type="text" class="form-control mb-2" placeholder="Kerapihan" name="kerapihan" id="kerapihan">
            <label for="">Komunikasi</label>
            <input type="text" class="form-control mb-2" placeholder="Komunikasi" name="komunikasi" id="komunikasi">
            <h5>
                Penilaian - Proses Kerja
            </h5>
            <hr>
            <label for="">Pemahaman Pekerjaan</label>
            <input type="text" class="form-control mb-2" placeholder="Pemahaman Pekerjaan" name="pemahaman_pekerjaan" id="pemahaman_pekerjaan">
            <label for="">Manajemen Waktu</label>
            <input type="text" class="form-control mb-2" placeholder="Manajemen Waktu" name="manajemen_waktu" id="manajemen_waktu">
            <label for="">Kerjasama Tim</label>
            <input type="text" class="form-control mb-2" placeholder="Kerjasama Tim" name="kerjasama_tim" id="kerjasama_tim">

            <div class="mx-end">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
      </div>
      
    </div>
  </div>
</div>

 <!-- Surat Balasan -->
 <script>
      $('#jumlahPemohon').on('change', function() {
        console.log("Jumlah Pemohon = ", $(this).val());

        if($(this).val() == 1){
            $('#pemohon1').removeClass('d-none');
            $('#pemohon2').addClass('d-none');
            $('#pemohon3').addClass('d-none');
            $('#pemohon4').addClass('d-none');
            $('#pemohon5').addClass('d-none');
        }else if($(this).val() == 2){
            $('#pemohon1').removeClass('d-none');
            $('#pemohon2').removeClass('d-none');
            $('#pemohon3').addClass('d-none');
            $('#pemohon4').addClass('d-none');
            $('#pemohon5').addClass('d-none');
        }else if($(this).val() == 3){
            $('#pemohon1').removeClass('d-none');
            $('#pemohon2').removeClass('d-none');
            $('#pemohon3').removeClass('d-none');
            $('#pemohon4').addClass('d-none');
            $('#pemohon5').addClass('d-none');
        }else if($(this).val() == 4){
            $('#pemohon1').removeClass('d-none');
            $('#pemohon2').removeClass('d-none');
            $('#pemohon3').removeClass('d-none');
            $('#pemohon4').removeClass('d-none');
            $('#pemohon5').addClass('d-none');
        }else if($(this).val() == 5){
            $('#pemohon1').removeClass('d-none');
            $('#pemohon2').removeClass('d-none');
            $('#pemohon3').removeClass('d-none');
            $('#pemohon4').removeClass('d-none');
            $('#pemohon5').removeClass('d-none');
        }

      });

      $('#viewSurat').click(function() {
            var value = $(this).attr('value');
            console.log(value);

            $.ajax({ 
                url: 'View/' + value,
                method: 'POST',
                success: function(response) {        
                    // console.log(response);
                    $('#content').html(response);
                },
                error: function() {
                  console.log('Terjadi kesalahan saat memuat konten.');
                }
              });
        });

        function getPemohon(status, id){

            console.log("Status = ", status, "Id = ", id);
            
            if(status == "Pemohon1"){
                    console.log("Status = ", status, "Id = ", id);

                    var data = {id : id};

                    $.ajax({ 
                        url: 'Administrator/GetPemohon',
                        data: data,
                        method: 'POST',
                        success: function(response) {        
                            // console.log(response);

                            $('#insertNamaPemohon1').val(response.userData.namaLengkap);
                            $('#nim1').val(response.userData.nim);
                            $('#nim1').val(response.userData.nim);
                            $('#jurusan1').val(response.userData.jurusan);
                            $('#asalSekolahPemohon').val(response.userData.asalSekolah);


                        },
                        error: function() {
                        console.log('Terjadi kesalahan saat memuat konten.');
                        }
                    });
            }else if(status == "Pemohon2"){

                    var data = {id : id};

                    $.ajax({ 
                        url: 'Administrator/GetPemohon',
                        data: data,
                        method: 'POST',
                        success: function(response) {        
                            $('#insertNamaPemohon2').val(response.userData.namaLengkap);
                            $('#nim2').val(response.userData.nim);
                            $('#jurusan2').val(response.userData.jurusan)

                        },
                        error: function() {
                        console.log('Terjadi kesalahan saat memuat konten.');
                        }
                    });
            }else if(status == "Pemohon3"){
                console.log("Status = ", status , "ID = ", id);
                console.log("Status = ", status , "ID = ", id);

                    var data = {id : id};

                    $.ajax({ 
                        url: 'Administrator/GetPemohon',
                        data: data,
                        method: 'POST',
                        success: function(response) {        
                            // console.log(response);
                            console.log(response);
                            $('#insertNamaPemohon3').val(response.userData.namaLengkap);
                            $('#nim3').val(response.userData.nim);
                            $('#jurusan3').val(response.userData.jurusan)

                        },
                        error: function() {
                        console.log('Terjadi kesalahan saat memuat konten.');
                        }
                    });
            }else if(status == "Pemohon4"){
                console.log("Status = ", status , "ID = ", id);

                    var data = {id : id};

                    $.ajax({ 
                        url: 'Administrator/GetPemohon',
                        data: data,
                        method: 'POST',
                        success: function(response) {        
                            // console.log(response);
                            console.log(response);
                            $('#insertNamaPemohon4').val(response.userData.namaLengkap);
                            $('#nim4').val(response.userData.nim);
                            $('#jurusan4').val(response.userData.jurusan)

                        },
                        error: function() {
                        console.log('Terjadi kesalahan saat memuat konten.');
                        }
                    });
            }else if(status == "Pemohon5"){
                console.log("Status = ", status , "ID = ", id);

                    var data = {id : id};

                    $.ajax({ 
                        url: 'Administrator/GetPemohon',
                        data: data,
                        method: 'POST',
                        success: function(response) {        
                            // console.log(response);
                            console.log(response);
                            $('#insertNamaPemohon5').val(response.userData.namaLengkap);
                            $('#nim5').val(response.userData.nim);
                            $('#jurusan5').val(response.userData.jurusan)

                        },
                        error: function() {
                        console.log('Terjadi kesalahan saat memuat konten.');
                        }
                    });
            }

        };


        function generateNomorSurat(div, bulan, tanggal, perusahaan, hurufAbjad, lokasiPerusahaan, jenisSurat, jumlahSurat, tahunSekarang) {
        // Format nomor surat sesuai dengan parameter yang diberikan
        var nomorSurat = div + "." +
            bulan + "." +
            tanggal + "/" +
            perusahaan + "." +
            hurufAbjad + "." +
            lokasiPerusahaan + "." +
            jenisSurat + "." +
            jumlahSurat.toString().padStart(5, '0') + "/" +
            tahunSekarang;
        return nomorSurat;
    }

    function singkatanDariKata(kata) {
        var kataArray = kata.split(" ");
        var singkatan = "";
        for (var i = 0; i < kataArray.length; i++) {
            var kata = kataArray[i];
            if (/[A-Z]/.test(kata.charAt(0))) {
                var hurufBesar = kata.charAt(0);
                singkatan += hurufBesar;
            }
        }
        return singkatan;
    }
        // Get Data Surat Penilaian

        // Contoh penggunaan fungsi untuk menghasilkan nomor surat
            

            document.getElementById("divisi").addEventListener("change", function(){
                var selectElement = document.getElementById('divisi');
                var divisiAktif = selectElement.options[selectElement.selectedIndex].text;
                            
                var send = selectElement.value;
                console.log("Data Send Surat Balasan", send);
                $.ajax({ 
                        url: 'SertifikatController/GenSurat',
                        data: send,
                        method: 'POST',
                        success: function(response) {        
                            
                            var kata = divisiAktif;
                            var div = singkatanDariKata(kata);
                            // var div = kata;
                            var bulan = (new Date().getMonth() + 1).toString().padStart(2, '0');
                            var tanggal = new Date().getDate().toString().padStart(2, '0');
                            
                            var perusahaan = "WIK";
                            var bulanSekarang = new Date().getMonth() + 1; // Mengambil bulan dalam angka (1-12)
                            var hurufAbjad = String.fromCharCode(64 + bulanSekarang);
                            var lokasiPerusahaan = "MJK";
                            var jenisSurat = "KP"; // divisi
                            var jumlahSurat = response.jumlahBalasan['num_rows'] + 1;  // Count Field Penilaian
                            var tahunSekarang = new Date().getFullYear();

                            var nomorSurat = generateNomorSurat(div, bulan, tanggal, perusahaan, hurufAbjad, lokasiPerusahaan, jenisSurat, jumlahSurat, tahunSekarang);
                            
                            console.log("Nomor Surat Generate = ",nomorSurat);
                            var nomorSurat = document.getElementById('nomorSuratBalasan').value = nomorSurat;

                            // console.log(response);
                            $('#no_surat_penilaian').val(nomorSurat);


                        },
                        error: function() {
                        console.log('Terjadi kesalahan saat memuat konten.');
                        }
                    });

                console.log("Divisi Aktif", divisiAktif);
            });

            $('#nim_user').on('change', function() {
                console.log($(this).val());
                var data = $(this).val();
                var send = {id : data};

                $.ajax({ 
                        url: 'SertifikatController/GenSerti',
                        data: send,
                        method: 'POST',
                        success: function(response) {        
                            // console.log(response);
                            console.log(response.getSerti.namaDivisi);

                            var kata = response.getSerti.namaDivisi;
                            var div = singkatanDariKata(kata);
                            // var div = kata;
                            var bulan = (new Date().getMonth() + 1).toString().padStart(2, '0');
                            var tanggal = new Date().getDate().toString().padStart(2, '0');
                            
                            var perusahaan = "WIK";
                            var bulanSekarang = new Date().getMonth() + 1; // Mengambil bulan dalam angka (1-12)
                            var hurufAbjad = String.fromCharCode(64 + bulanSekarang);
                            var lokasiPerusahaan = "MJK";
                            var jenisSurat = "KP"; // divisi
                            var jumlahSurat = response.jumlahSurat['num_rows'] + 1;  // Count Field Penilaian
                            var tahunSekarang = new Date().getFullYear();

                            var nomorSurat = generateNomorSurat(div, bulan, tanggal, perusahaan, hurufAbjad, lokasiPerusahaan, jenisSurat, jumlahSurat, tahunSekarang);
                            
                            $('#no_surat_penilaian').val(nomorSurat);


                        },
                        error: function() {
                        console.log('Terjadi kesalahan saat memuat konten.');
                        }
                    });

            });



    </script>