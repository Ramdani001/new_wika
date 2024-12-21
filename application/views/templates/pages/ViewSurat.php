<div class="mb-3 d-flex">
    <div onclick="childPage('ViewSurat')" id="ViewSurat" class="px-5 py-2 shadow-md fw-bold bg-custom bg-hover-custom me-1" style="cursor: pointer; border-right: 2px solid rgba(0, 0, 0, 0.65); border-bottom: 2px solid rgba(0, 0, 0, 0.65);">Surat</div>

    <div onclick="childPage('Sertifikat')" id="Sertifikat" class="px-5 py-2 shadow-md bg-hover-custom" style="cursor: pointer; border-right: 2px solid rgba(0, 0, 0, 0.65); border-bottom: 2px solid rgba(0, 0, 0, 0.65);">Sertifikat</div>
</div>
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Surat</th>
                <th>Asal Sekolah</th> 
                <th>Jumlah Pemohon</th>
                <th>Status Surat</th>
                <th>Divisi</th>
                <th>Tanggal Dibuat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
          
        </tbody>
    </table>
`
    <!-- Modal Detail -->
    <div class="modal fade" id="modalViewSurat" tabindex="-1" aria-labelledby="modalDetailLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalDetailLabel">View Surat Penerimaan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="suratHeader">
                        <div class="d-flex justify-content-center">
                            <img src="<?= base_url() ?>assets/img/logoSuratPenerimaan.png" alt="Logo WIKA" width="100"
                            style="
                            margin-left: auto;
                            margin-right: auto;
                            width: 30%;
                            height: 17%;
                            "
                            >
                        </div>
                        <div class="" style="display: flex; flex: 1; margin-top: 20px;">
                            <div style="font-size: 10.5px;">
                                <table class="mb-2">
                                    <tr>
                                        <td class="d-flex">
                                        Nomor : <span id="nomorSuratBalasan"> </span>  <!-- Nomor Surat Penerimaan -->
                                        </td class="d-flex">
                                        <td class="" style="padding-left: 100px;">
                                        Majalengka, <span id="tglSuratBalasan"> </span> <!-- Tanggal Dibuat -->
                                        </td>
                                    </tr>
                                </table>

                                <div class="text-justify">
                                    Kepada Yth. <br>
                                    <span id="asalSekolah" ></span> <br>
                                    Di Tempat
                                    <br>
                                        <span class="ml-4">Perihal : <b> Izin Praktik Kerja Lapangan (PKL) </b></span>
                                    <br>
                                    Dengan Hormat, <br>
                                    Merujuk Surat Permohonan Nomor <b id="nomorSuratMou">  </b> tanggal <b id="tglSuratMou">16 Oktober 2023</b>, terkait
                                    Permohonan Praktik Kerja Lapangan (PKL) di PT Wijaya Karya Industri & Konstruksi Pabrikasi Baja
                                    Majalengka terhadap <b id="statusPemohon">Mahasiswa</b> di bawah ini :
                                </div>
                                <br>
                                <table  style="border-collapse: collapse; text-align: center; width: 100%;" >
                                <thead>
                                    <tr class="border">
                                        <th class="border" style="width: 10%;">NO</th>
                                        <th class="border" style="width: 30%;">Nama</th>
                                        <th class="border" style="width: 25%;">Nim</th>
                                        <th class="border" style="width: 30%;">Jurusan / Kompetensi</th>
                                    </tr>    
                                </thead>
                                <tbody>
                                    <!-- Pemohon 1 -->
                                    <tr class="border" id="pemohon1">
                                        <td class="border"> 1 </td>
                                        <td class="border text-start" id="namaPemohon1"></td>
                                        <td class="border" id="nim1"></td>
                                        <td class="border" id="jurusan1"></td>
                                    </tr>
                                    <!-- Pemohon 1 -->
                                    <!-- Pemohon 2 -->
                                    <tr class="border d-none" id="pemohon2">
                                        <td class="border"> 2 </td>
                                        <td class="border text-start" id="namaPemohon2"></td>
                                        <td class="border" id="nim2"></td>
                                        <td class="border" id="jurusan2"></td>
                                    </tr>
                                    <!-- Pemohon 2 -->
                                    <!-- Pemohon 3 -->
                                    <tr class="border d-none" id="pemohon3">
                                        <td class="border"> 3 </td>
                                        <td class="border text-start" id="namaPemohon3"></td>
                                        <td class="border" id="nim3"></td>
                                        <td class="border" id="jurusan3"></td>
                                    </tr>
                                    <!-- Pemohon 3 -->
                                    <!-- Pemohon 4 -->
                                    <tr class="border d-none" id="pemohon4">
                                        <td class="border"> 4 </td>
                                        <td class="border text-start" id="namaPemohon4"></td>
                                        <td class="border" id="nim4"></td>
                                        <td class="border" id="jurusan4"></td>
                                    </tr>
                                    <!-- Pemohon 4 -->
                                    <!-- Pemohon 5 -->
                                    <tr class="border d-none" id="pemohon5">
                                        <td class="border"> 5 </td>
                                        <td class="border text-start" id="namaPemohon5"></td>
                                        <td class="border" id="nim5"></td>
                                        <td class="border" id="jurusan5"></td>
                                    </tr>
                                    <!-- Pemohon 5 -->
                                </tbody>
                            </table>
                            <br>

                            <p class="text-justify">
                            Bersama dengan ini kami sampaikan bahwa permohonan tersebut <b id="statusSurat" ></b>
                            untuk melaksanakan Praktik Kerja Lapangan di Pabrikasi Baja Majalengka, PT Wijaya Karya Industri
                            & Konstruksi. Selanjutnya Praktik Kerja Lapangan dilaksanakan dengan ketentuan sebagai berikut : 

                            </p>
                            <table class="text-start" style="border-collapse: collapse; text-align: center; width: 70%;" >
                                <tr>
                                    <td>Waktu Pelaksanaan</td>
                                    <td> : </td>
                                    <td class="fw-semibold"> <span id="tglMulai"></span> s.d <span id="tglAkhir"></span></td>
                                </tr>
                                <tr>
                                    <td>Penempatan Unit Kerja</td>
                                    <td> : </td>
                                    <td class="fw-semibold" id="divisi">  </td>
                                </tr>
                                <tr>
                                    <td>Pembimbing</td>
                                    <td> : </td>
                                    <td class="fw-semibold" id="namaPembimbing"></td>
                                </tr>
                            </table>
                            <p class="text-justify mt-2">
                                Mohon melakukan konfirmasi maksimal H-3 sebelum waktu pelaksanaan pada kontak di bawah ini
                            </p>
                            <table class="text-start" style="margin-top: -10px; border-collapse: collapse; text-align: center; width: 65%;" >
                                <tr>
                                    <td>Personalia</td>
                                    <td> : </td>
                                    <td class="fw-semibold">Jagad Giyana C. </td>
                                </tr>
                                <tr>
                                    <td>Kontak Person</td>
                                    <td> : </td>
                                    <td class="fw-semibold">0822 4291 0617 </td>
                                </tr>
                            </table>
                            <p class="text-justify mt-1">
                                Demikian surat ini disampaikan, atas perhatian dan kerjasamanya kami ucapkan terima kasih
                            </p>
                      
                            <div class="text-end justify-content-end">
                                <span class="" style="margin-right: 113px;">
                                    Hormat Kami, 
                                </span>
                                <br>
                                <span class="text-decoration-underline" >
                                    PT. Wijaya Karya Industri & Konstruksi <br>
                                </span>
                                <div class="mt-2 mb-2" style="margin-right: 100px;">
                                    <img id="ttd_digital" src="" alt="" width="80">
                                </div>
                                <span class="" style="margin-right: 42px;">
                                    <span class="text-decoration-underline fw-bold" style="margin-right: 118px;">
                                        Titan Rifesha
                                    </span>
                                    <br>
                                    Kasie Keuangan & Personalia 

                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Modal Detail -->

    <!-- Modal Surat Edit -->
    
    <!-- Modal Surat Edit -->
    
    <div class="modal fade" id="modalEditSurat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Surat Penerimaan</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="<?php echo base_url('Administrator/UpdateSuratBalasan'); ?>" method="POST" enctype="multipart/form-data">

        <input type="text" class="form-control" placeholder="Nomor Surat" name="idSurat" id="editIdSurat" hidden>

            <!-- Header Surat -->
            <div class="card-header">
                    <h3 class="fw-semiblod">Header</h3>
                    <hr>
                </div>
                <div class="mb-3">
                    <label for="SuratBalasan">Nomor Surat</label>
                    <input type="text" class="form-control" placeholder="Nomor Surat" name="nomorSuratBalasan" id="editNomorSuratBalasan" readonly>
                </div>
                <div class="mb-3">
                    <label for="asalSekolah">Asal Sekolah / Universitas</label>
                    <input type="text" class="form-control" placeholder="Kepada Yth." name="asalSekolahPemohon" id="editAsalSekolahPemohon">
                </div>
                <div class="mb-3">
                    <label for="tglDibuat">Tanggal Dibuat</label>
                    <!-- Value Tanggal Ditambah Majalengka -->
                    <input type="date" class="form-control" placeholder="Tanggal Dibuat" name="tglDibuat" id="editTglDibuat">
                </div>
                <!-- Isi Surat -->
                <div class="card-header">
                    <hr>
                    <h3 class="fw-bold">Isi Surat</h3>
                    <hr>
                </div>
                <div class="mb-3">
                    <label for="nomorSuratMou">Nomor Surat MOU dari Anak PKL</label>
                    <input type="text" class="form-control" placeholder="Nomor Surat MOU dari Anak PKL" name="nomorSuratMou" id="editNomorSuratMou">
                </div>
                <div class="mb-3">
                    <label for="tglSuratMou">Tanggal Surat MOU dari Anak PKL</label>
                    <input type="date" class="form-control" placeholder="Tanggal Surat MOU dari Anak PKL" name="tglSuratMou" id="editTglSuratMou">
                </div>
                <div class="mb-3">
                    <label for="statusPemohon">Status Pemohon</label>
                    <input type="text" class="form-control" placeholder="Status Pemohon Mahasiswa/Siswa" name="statusPemohon" id="editStatusPemohon">
                </div>
                <!-- Tabel -->
                <div class="mb-3">
                    <label for="jumlahPemohon">Jumlah Pemohon</label>
                    <select class="form-select" aria-label="Default select example" name="jumlahPemohon" id="editJumlahPemohon">
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
                <div id="editPemohon1" class="row gap-3 d-none">
                    <h4>Pemohon 1</h4>
                    <div class="mb-3 col">
                        <label for="nim1">NIM / NRP</label>
                        <input type="text" class="form-control" id="editNim1" placeholder="Nama Pemohon" name="nim1" readonly>
                    </div>

                    <div class="mb-3 col">
                        <label for="namaPemohon1">Nama Pemohon</label>
                        <input type="text" class="form-control" id="editNamaPemohon1" placeholder="Nama Pemohon" name="namaPemohon1" readonly>
                    </div>

                    <div class="mb-3 col">
                        <label for="jurusan">Jurusan / Kompetensi</label>
                        <input type="text" class="form-control" placeholder="Jurusan / Kompetensi" id="editjurusan1" name="jurusan1" readonly>
                    </div>
                </div>
                <!-- Pemohon 1 -->
                
                <!-- Pemohon 2 -->
                <div id="editPemohon2" class="row gap-3 d-none">
                    <h4>Pemohon 2</h4>
                    <div class="mb-3 col">
                        <label for="nim1">NIM / NRP</label>
                        <input type="text" class="form-control" id="editNim2" placeholder="Nama Pemohon" name="nim2" readonly>
                    </div>

                    <div class="mb-3 col">
                        <label for="namaPemohon2">Nama Pemohon</label>
                        <input type="text" class="form-control" id="editNamaPemohon2" placeholder="Nama Pemohon" name="namaPemohon2" readonly>
                    </div>

                    <div class="mb-3 col">
                        <label for="jurusan">Jurusan / Kompetensi</label>
                        <input type="text" class="form-control" placeholder="Jurusan / Kompetensi" id="editJurusan2" name="jurusan2" readonly>
                    </div>
                </div>
                <!-- Pemohon 2 -->
                
                <!-- Pemohon 3 -->
                <div id="editPemohon3" class="row gap-3 d-none">
                    <h4>Pemohon 3</h4>
                    <div class="mb-3 col">
                        <label for="nim3">NIM / NRP</label>
                        <input type="text" class="form-control" id="editNim3" placeholder="Nama Pemohon" name="nim3" readonly>
                        </select>
                    </div>

                    <div class="mb-3 col">
                        <label for="namaPemohon3">Nama Pemohon</label>
                        <input type="text" class="form-control" id="editNamaPemohon3" placeholder="Nama Pemohon" name="namaPemohon3" readonly>
                    </div>

                    <div class="mb-3 col">
                        <label for="jurusan">Jurusan / Kompetensi</label>
                        <input type="text" class="form-control" placeholder="Jurusan / Kompetensi" id="editJurusan3" name="jurusan3" readonly>
                    </div>
                </div>
                <!-- Pemohon 3 -->
                
                <!-- Pemohon 4 -->
                <div id="editPemohon4" class="row gap-3 d-none">
                    <h4>Pemohon 4</h4>
                    <div class="mb-3 col">
                        <label for="nim4">NIM / NRP</label>
                        <input type="text" class="form-control" id="editNim4" placeholder="Nama Pemohon" name="nim4" readonly>
                    </div>

                    <div class="mb-3 col">
                        <label for="namaPemohon4">Nama Pemohon</label>
                        <input type="text" class="form-control" id="editNamaPemohon4" placeholder="Nama Pemohon" name="namaPemohon4" readonly>
                    </div>

                    <div class="mb-3 col">
                        <label for="jurusan">Jurusan / Kompetensi</label>
                        <input type="text" class="form-control" placeholder="Jurusan / Kompetensi" id="editJurusan4" name="jurusan4" readonly>
                    </div>
                </div>
                <!-- Pemohon 4 -->
                
                <!-- Pemohon 5 -->
                <div id="editPemohon5" class="row gap-3 d-none">
                    <h4>Pemohon 5</h4>
        
                    <div class="mb-3 col">
                        <label for="nim5">NIM / NRP</label>
                        <input type="text" class="form-control" id="editNim5" placeholder="Nama Pemohon" name="nim5" readonly>
                    </div>

                    <div class="mb-3 col">
                        <label for="namaPemohon5">Nama Pemohon</label>
                        <input type="text" class="form-control" id="editNamaPemohon5" placeholder="Nama Pemohon" name="namaPemohon5" readonly>
                    </div>

                    <div class="mb-3 col">
                        <label for="jurusan">Jurusan / Kompetensi</label>
                        <input type="text" class="form-control" placeholder="Jurusan / Kompetensi" id="editJurusan5" name="jurusan5" readonly>
                    </div>
                </div>
                <!-- Pemohon 5 -->
                    
                    <div class="mb-3">
                        <label for="statusSurat">Status Surat</label>
                        <select class="form-select" aria-label="Default select example" id="editStatusSurat" name="statusSurat">
                            <option selected>Staus Surat</option>
                            <option value="Telah Kami Terima">Telah Kami Terima</option>
                            <option value="Belum Bisa Kami Terima">Belum Bisa Kami Terima</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="dateFrom">Waktu Pelaksanaan</label>
                        <div class="row">
                            <div class="col">
                                <label for="dateFrom">Tanggal Mulai</label>
                                <input type="date" class="form-control" id="editTglMulai" name="tglMulai">
                            </div>
                            <div class="col ">
                                <label for="statusSurat">Tanggal Akhir</label>
                                <input type="date" class="form-control" id="EditTglAkhir" name="tglAkhir">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="divisi">Penempatan Unit Kerja / Divisi</label>
                        <select class="form-select" aria-label="Default select example" id="editDivisi" name="divisi">
                            <option selected>Penempatan Unit Kerja / Divisi</option>
                           
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="pembimbing">Nama Pembimbing</label>
                        <input type="text" class="form-control" placeholder="Nama Pembimbing" name="namaPembimbing" id="editNamaPembimbing">
                    </div>

                    <div class="mb-3">
                        <label for="ttd_digital">Ttd Digital / QR Code</label>
                        <input type="text" class="form-control" placeholder="Ttd Digital / QR Code" id="editTtd_digital" name="old_ttd_digital" hidden>

                        <input type="file" class="form-control" placeholder="Ttd Digital / QR Code" id="edit_ttd_digital" name="ttd_digital">
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
 <script>

    $('#editJumlahPemohon').on('click', function() {
        var pmhn = $(this).val();

            for (var i = 1; i <= 5; i++) {
                if (i <= pmhn) {
                    $('#editPemohon' + i).removeClass('d-none');
                } else {
                    $('#editPemohon' + i).addClass('d-none');
                }
            }
    });

     function pemohonActive() {
         var pmhn = $('#editJumlahPemohon').val();

            for (var i = 1; i <= 5; i++) {
                if (i <= pmhn) {
                    $('#editPemohon' + i).removeClass('d-none');
                } else {
                    $('#editPemohon' + i).addClass('d-none');
                }
            }

            console.log('berhasil');
        }

$(document).ready(function() {
   

    $('#example').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?= base_url('Administrator/getDataSurat'); ?>",
            "type": "POST"
        },
        "columnDefs": [{
            "target": [-1],
            "orderable": false
        }],
        responsive: true,
                
    });

    // Fungsi untuk menghasilkan nomor surat
    function generateNomorSurat(divisi, bulan, tanggal, perusahaan, bulanSekarang, lokasiPerusahaan, jenisSurat, jumlahSurat, tahunSekarang) {
        // Format nomor surat sesuai dengan parameter yang diberikan
        var nomorSurat = divisi + "." +
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


            // Contoh penggunaan fungsi untuk menghasilkan nomor surat
            var kata = "System and Software";
            var divisi = singkatanDariKata(kata);
            var bulan = (new Date().getMonth() + 1).toString().padStart(2, '0');
            var tanggal = new Date().getDate().toString().padStart(2, '0');

            var perusahaan = "WIK";
            var bulanSekarang = new Date().getMonth() + 1; // Mengambil bulan dalam angka (1-12)
            var hurufAbjad = String.fromCharCode(64 + bulanSekarang);
            var lokasiPerusahaan = "MJK";
            var jenisSurat = "KP";
            var jumlahSurat = 1230;  // Misalnya, jumlah surat yang sudah dibuat
            var tahunSekarang = new Date().getFullYear();

            var nomorSurat = generateNomorSurat(divisi, bulan, tanggal, perusahaan, hurufAbjad, lokasiPerusahaan, jenisSurat, jumlahSurat, tahunSekarang);

            console.log("Nomor Surat Generate = ",nomorSurat);

                });
                
            function lihatSurat(e, status){
                console.log("Id Surat = ", e);
                console.log("Id Surat = ", status);
                var id = e;

                if(status == 1){
                    var form = document.createElement("form");
                    form.method = "POST";
                    form.action = "Administrator/DetailSurat";
                    form.target = "_blank";

                    var input = document.createElement("input");
                    input.type = "hidden";
                    input.name = "idSurat";
                    input.value = e;

                    form.appendChild(input);

                    document.body.appendChild(form);

                    form.submit();
                }else if(status == 2){
                    
                    function formatDate(inputDate) {
                        const months = [
                            'Januari', 'Februari', 'Maret', 'April',
                            'Mei', 'Juni', 'Juli', 'Agustus',
                            'September', 'Oktober', 'November', 'Desember'
                        ];

                        const dateParts = inputDate.split('-');
                        const year = dateParts[0];
                        const month = months[parseInt(dateParts[1]) - 1];
                        const day = dateParts[2];

                        return day + ' ' + month + ' ' + year;
                    }

                    var dataToSend = { idSurat: id };
                    $.ajax({  
                        url: 'Administrator/ViewDataSurat',
                        data: dataToSend, 
                        method: 'POST',
                        success: function(response) {
                            $('#modalViewSurat').modal('show');
                            var jumlahPemohon = response.getSurat.jumlahPemohon;

                            $('#nomorSuratBalasan').text(response.getSurat.nomorSuratBalasan);
                            $('#tglSuratBalasan').text(formatDate(response.getSurat.tglDibuat));
                            $('#asalSekolah').text(response.getSurat.asalSekolahPemohon);
                            $('#nomorSuratMou').text(response.getSurat.nomorSuratMou);
                            $('#tglSuratMou').text(formatDate(response.getSurat.tglSuratMou));
                            $('#statusPemohon').text(response.getSurat.statusPemohon);
                            $('#statusSurat').text(response.getSurat.statusSurat);

                            // Kondisi Jumlah Pemohon
                            if(jumlahPemohon == 1){
                                $('#namaPemohon1').text(response.getSurat.namaPemohon1);
                                $('#nim1').text(response.getSurat.nim1);
                                $('#jurusan1').text(response.getSurat.jurusan1);

                                $('#pemohon2').addClass('d-none');
                                $('#pemohon3').addClass('d-none');
                                $('#pemohon4').addClass('d-none');
                                $('#pemohon5').addClass('d-none');
                            }else if(jumlahPemohon == 2){
                                $('#namaPemohon1').text(response.getSurat.namaPemohon1);
                                $('#nim1').text(response.getSurat.nim1);
                                $('#jurusan1').text(response.getSurat.jurusan1);

                                $('#namaPemohon2').text(response.getSurat.namaPemohon2);
                                $('#nim2').text(response.getSurat.nim2);
                                $('#jurusan2').text(response.getSurat.jurusan2);

                                $('#pemohon2').removeClass('d-none');
                                $('#pemohon3').addClass('d-none');
                                $('#pemohon4').addClass('d-none');
                                $('#pemohon5').addClass('d-none');
                            }else if(jumlahPemohon == 3){
                                $('#namaPemohon1').text(response.getSurat.namaPemohon1);
                                $('#nim1').text(response.getSurat.nim1);
                                $('#jurusan1').text(response.getSurat.jurusan1);

                                $('#namaPemohon2').text(response.getSurat.namaPemohon2);
                                $('#nim2').text(response.getSurat.nim2);
                                $('#jurusan2').text(response.getSurat.jurusan2);

                                $('#namaPemohon3').text(response.getSurat.namaPemohon3);
                                $('#nim3').text(response.getSurat.nim3);
                                $('#jurusan3').text(response.getSurat.jurusan3);

                                $('#pemohon2').removeClass('d-none');
                                $('#pemohon3').removeClass('d-none');
                                $('#pemohon4').addClass('d-none');
                                $('#pemohon5').addClass('d-none');
                            }else if(jumlahPemohon == 4){
                                $('#namaPemohon1').text(response.getSurat.namaPemohon1);
                                $('#nim1').text(response.getSurat.nim1);
                                $('#jurusan1').text(response.getSurat.jurusan1);

                                $('#namaPemohon2').text(response.getSurat.namaPemohon2);
                                $('#nim2').text(response.getSurat.nim2);
                                $('#jurusan2').text(response.getSurat.jurusan2);

                                $('#namaPemohon3').text(response.getSurat.namaPemohon3);
                                $('#nim3').text(response.getSurat.nim3);
                                $('#jurusan3').text(response.getSurat.jurusan3);

                                $('#namaPemohon4').text(response.getSurat.namaPemohon4);
                                $('#nim4').text(response.getSurat.nim4);
                                $('#jurusan4').text(response.getSurat.jurusan4);

                                $('#pemohon2').removeClass('d-none');
                                $('#pemohon3').removeClass('d-none');
                                $('#pemohon4').removeClass('d-none');
                                $('#pemohon5').addClass('d-none');
                            }else if(jumlahPemohon == 5){
                                $('#namaPemohon1').text(response.getSurat.namaPemohon1);
                                $('#nim1').text(response.getSurat.nim1);
                                $('#jurusan1').text(response.getSurat.jurusan1);

                                $('#namaPemohon2').text(response.getSurat.namaPemohon2);
                                $('#nim2').text(response.getSurat.nim2);
                                $('#jurusan2').text(response.getSurat.jurusan2);

                                $('#namaPemohon3').text(response.getSurat.namaPemohon3);
                                $('#nim3').text(response.getSurat.nim3);
                                $('#jurusan3').text(response.getSurat.jurusan3);

                                $('#namaPemohon4').text(response.getSurat.namaPemohon4);
                                $('#nim4').text(response.getSurat.nim4);
                                $('#jurusan4').text(response.getSurat.jurusan4);

                                $('#namaPemohon5').text(response.getSurat.namaPemohon5);
                                $('#nim5').text(response.getSurat.nim5);
                                $('#jurusan5').text(response.getSurat.jurusan5);

                                $('#pemohon2').removeClass('d-none');
                                $('#pemohon3').removeClass('d-none');
                                $('#pemohon4').removeClass('d-none');
                                $('#pemohon5').removeClass('d-none');
                            }
                            // Kondisi Jumlah Pemohon

                            $('#tglMulai').text(formatDate(response.getSurat.tglMulai));
                            $('#tglAkhir').text(formatDate(response.getSurat.tglAkhir));
                            $('#divisi').text(response.getSurat.namaDivisi);
                            $('#namaPembimbing').text(response.getSurat.namaPembimbing);
                            $('#ttd_digital').attr('src', '<?= base_url(); ?>assets/img/QrCode/' + response.getSurat.ttd_digital);

                            
                            console.log(response.getSurat.nomorSuratBalasan);
                            console.log(response.getSurat.namaPemohon1);
                        },
                        error: function() {
                        console.log('Terjadi kesalahan saat memuat konten.');
                        }
                    });

                }else if(status == 3){
                    console.log('Edit Id Surat = ', id);
                    $('#modalEditSurat').modal('show');

                    var dataToSend = { idSurat: id };
                    $.ajax({  
                        url: 'Administrator/EditDataSurat',
                        data: dataToSend, 
                        method: 'POST',
                        success: function(response) {
                            console.log("All Data = ", response);

                            $('#editIdSurat').val(response.getSurat.idSurat);

                            $('#editNomorSuratBalasan').val(response.getSurat.nomorSuratBalasan);
                            $('#editAsalSekolahPemohon').val(response.getSurat.asalSekolahPemohon);
                            $('#editTglDibuat').val(response.getSurat.tglDibuat);
                            $('#editAsalSekolah').val(response.getSurat.asalSekolah);
                            $('#editNomorSuratMou').val(response.getSurat.nomorSuratMou);
                            $('#editTglSuratMou').val(response.getSurat.tglSuratMou);
                            $('#editStatusPemohon').val(response.getSurat.statusPemohon);

                            $("#editJumlahPemohon option[value='"+ response.getSurat.jumlahPemohon +"']").prop('selected', true);

                            $("#editStatusSurat option[value='"+ response.getSurat.statusSurat +"']").prop('selected', true);

                            $('#editTglMulai').val(response.getSurat.tglMulai);
                            $('#EditTglAkhir').val(response.getSurat.tglAkhir);
                            $('#editNamaPembimbing').val(response.getSurat.namaPembimbing);
                            $('#editTtd_digital').val(response.getSurat.ttd_digital);
                            
                            // Pemohon
                            $('#editNamaPemohon1').val(response.getSurat.namaPemohon1);
                            $('#editNim1').val(response.getSurat.nim1);
                            $('#editjurusan1').val(response.getSurat.jurusan1);

                            $('#editNamaPemohon2').val(response.getSurat.namaPemohon2);
                            $('#editNim2').val(response.getSurat.nim2);
                            $('#editJurusan2').val(response.getSurat.jurusan2);

                            $('#editNamaPemohon3').val(response.getSurat.namaPemohon3);
                            $('#editNim3').val(response.getSurat.nim3);
                            $('#editJurusan3').val(response.getSurat.jurusan3);

                            $('#editNamaPemohon4').val(response.getSurat.namaPemohon4);
                            $('#editNim4').val(response.getSurat.nim4);
                            $('#editJurusan4').val(response.getSurat.jurusan4);
                            
                            $('#editNamaPemohon5').val(response.getSurat.namaPemohon5);
                            $('#editNim5').val(response.getSurat.nim5);
                            $('#editJurusan5').val(response.getSurat.jurusan5);


                            // Divisi
                            const select = $('#editDivisi');
                            select.empty();

                            Object.keys(response.getDivisi).forEach(function(key) {
                                const divisi = response.getDivisi[key];

                                select.append($('<option>', {
                                    value: divisi.idDivisi,
                                    text: divisi.namaDivisi 
                                }));
                                console.log(divisi.idDivisi, "  ", divisi.namaDivisi)

                            });

                            $("#editDivisi option[value='"+ response.getSurat.idDivisi +"']").prop('selected', true);
                            // Divisi
                            pemohonActive();
                            // Pemohon
                            

                        },
                        error: function() {
                         console.log('Terjadi kesalahan saat memuat konten.');
                        }
                    });



                }
    }
    // Child Component
    function childPage(status){
        console.log('Status Component Page = ', status);

        if(status === "Sertifikat"){
            console.log("Sertifikat Click");
            $('#SuratBalasan').removeClass('bg-custom');
            $('#Sertifikat').addClass('bg-custom');

            $.ajax({ 
                url: 'View/' + status, 
                method: 'POST',
                success: function(response) {        
                    $('#content').html(response);
                },
                error: function() {
                  console.log('Terjadi kesalahan saat memuat konten.');
                }
              });
        }

    }
  

</script>