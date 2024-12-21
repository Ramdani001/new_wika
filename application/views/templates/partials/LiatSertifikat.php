
<div class="modal fade" id="modalLihatSertifikat" tabindex="-1" aria-labelledby="modalLihatSertifikatLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content"> 
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalLihatSertifikatLabel">Lihat Sertifikat</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        

    @page { size: auto;  margin: 0mm; }
    @media print {
    tr.bg1 {
            background-color: #66ccff !important;
            -webkit-print-color-adjust: exact; 
        }
    tr.bg2 {
            background-color: #daeef3 !important;
            -webkit-print-color-adjust: exact; 
        }
    .bgTopRight{
        z-index: -1;
    }
    .logoRight{
        z-index: 1;
    }
    }

    @font-face /*perintah untuk memanggil font eksternal*/
    {
        font-family: 'OldEnglish'; /*memberikan nama bebas untuk font*/
        src: url('<?= base_url(); ?>assets/font/Monotype.ttf');/*memanggil file font eksternalnya di folder nexa*/
    }
    @font-face
    {
        font-family: 'Algerian'; /*memberikan nama bebas untuk font*/
        src: url('<?= base_url(); ?>assets/font/Algerian.ttf');/*memanggil file font eksternalnya di folder nexa*/
    }

    </style>
</head>
<body>
<!-- Sertifikat -->
<div style="height: 100vh;">
    <img src="<?= base_url(); ?>assets/img/bahanSertifikat/logo.png" style="width: 1000px; margin: 7% 4.1%;  opacity: 0.2; z-index: -1; position: absolute;">
    <div style="margin-top: -10px;">
        <table class="" style="width: 100%; align:center;">
                <tr>
                    <td style="width: 200px; text-align: center;">
                        <img src="<?= base_url(); ?>assets/img/bahanSertifikat/sertifikat/industriLogo.png" alt="" width="150">
                    </td>

                    <td style="" colspan="2" style="width: 400px; text-align: center;">
                        
                    </td>
                    <td style="width: 200px; text-align: center;">
                        <img src="<?= base_url(); ?>assets/img/bahanSertifikat/sertifikat/LogoSertifikat.png" alt="" width="120">
                    </td>
                </tr>

            </table>
            <h1 style="font-family: OldEnglish; text-align: center; margin-top: -30px; font-size: 50px; color: #00022F;">
                Sertifikat
            </h1>
            <h3 style="text-align: center;  font-size: 20px;  font-weight: bold; text-decoration: underline; color: #00022F;">
                PRAKTIK KERJA INDUSTRI
            </h3>
            <h5 style="text-align: center; font-size: 10px;  font-weight: bold; color: #00022F;">
                Nomor : <span id="noSertiBaru">-</span> 
            </h5>
            <div style="text-align: center; color: #00022F;">
                <h1 style=" font-size: 20px;">
                    Diberikan Kepada :
                </h1>
                <h1 style="font-family: Algerian; font-size: 30px; font-weight: lighter; margin-top: -10px; color: #00022F; text-decoration: underline;">
                    <span id="serti_namaLengkap"></span>
                </h1>
                <h1 style="color: #00022F; font-size: 25px; margin-top: -15px;">
                    <span id="serti_asalSekolah">STT Mandala</span>
                </h1>
                <div>
                    <p style=" color: #00022F; text-align: center; width: 70%; font-size: 15px; font-weight: bold; margin: auto; margin-bottom: 10px;">
                        Telah melaksanakan Praktik Kerja Industri pada <br>
                        PT. WIKA Industri & Konstruksi Pabrikasi Baja Majalengka Terhitung <br>
                        mulai tanggal <span id="serti_tgl_mulai"></span> s.d <span id="serti_tgl_akhir"></span> dengan hasil <br>
                        “SANGAT BAIK”
                    </p>
                </div>
            </div>
            <!-- TTD -->
            <div style=" padding-left: 400px;">
                <div style="  width: 70%; margin: auto; font-size: 10px;">
                    <table style="line-height: 1.3; width: 100%; text-align: center;">
                        <tr>
                            <td style="">
                            Majalengka, <span id="serti_tgl_dibuat"></span> <br>
                            PT WIKA Industri & Konstruksi <br>
                                Pabrikasi Baja Majalengka
                            </td>
                        </tr>
                        <tr >
                            <td style="">
                            <img src="<?= base_url(); ?>assets/img/QrCode/Personalia.png" alt="QR Code" width="80">
                            </td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold; line-height: 1; ">
                                Titan Rifesha
                            </td>
                        </tr>
                        <tr>
                            <td style="line-height: 1;">
                                Head of HC & Finance Department
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
</div>

<!-- Penilaian -->
<div class="" style="">
    <div class="" style=" margin: auto;
    width: 100%;">
        <table class="" style="width: 100%; align:center;">
            <tr>
                <td style="width: 200px; text-align: center;">
                    <img src="<?= base_url(); ?>assets/img/bahanSertifikat/logo.png" alt="" width="250">
                </td>

                <td style="" colspan="2" style="width: 400px; text-align: center;">
                    <div style="text-align: center; margin-top: 40px; font-size: 10px;  padding-left: 50px;">
                        <p >
                            <span style="font-weight: bold; ">
                                PENILAIAN PRAKTIK KERJA LAPANGAN
                            </span> <br>
                            Nomor : <span id="nomor_surat_penilaian"></span>
                        </p>
                    </div>
                </td>
                <td style="width: 200px; text-align: center; z-index: 5;" class="logoRight">
                    <img src="<?= base_url(); ?>assets/img/bahanSertifikat/akhlak.png" alt="" width="150">
                </td>
            </tr>
        </table>
        <div id="backgroundKanan" style=" position: absolute; right: 0; top: 0; z-index: -5;" class="bgTopRight">
            <img src="<?= base_url(); ?>assets/img/bahanSertifikat/kanan.png" alt="" width="500" height="500">
        </div>
        <div id="backgroundKiri" style="margin-top: 180px; position: absolute; left: 0; z-index: -1;">
            <img src="<?= base_url(); ?>assets/img/bahanSertifikat/kiri.png" alt="" width="500" height="420">
        </div>

        <!-- Biodata -->
        
        <div style="margin-top: -20px; margin-left: 60px;">
            <table style="font-size: 10px;">
                <tr>
                    <td width="130">Nama Siswa</td>
                    <td width="10"> : </td>
                    <td > <span id="PnamaLengkap"></span> </td>
                </tr>
                <tr>
                    <td width="130">Nomor Induk</td>
                    <td width="10"> : </td>
                    <td > <span id="Pnim"></span></td>
                </tr>
                <tr>
                    <td width="130">Program Studi</td>
                    <td width="10"> : </td>
                    <td > <span id="Pjurusan"></span> </td>
                </tr>
                <tr>
                    <td width="130">Sekolah </td>
                    <td width="10"> : </td>
                    <td > <span id="PasalSekolah"></span> </td>
                </tr>
            </table>
        </div>

        
        <!-- Biodata -->
        <!-- Nilai -->
        <div style="margin-top: 20px; margin-left: 60px;">
            <table border="1" class="border text-center" style="border-collapse: collapse; width: 90%; font-size: 10px;">
                <tr id="bg1" class="bg1 border" style="background-color: #66ccff">
                    <th class="border" style="font-weight: bold; padding: 5px;">No</th>
                    <th class="border" style="font-weight: bold; padding: 5px;">FAKTOR KOMPETENSI</th>
                    <th class="border" style="font-weight: bold; padding: 5px;">BOBOT</th>
                    <th class="border" style="font-weight: bold; padding: 5px;">NILAI</th>
                    <th class="border" style="font-weight: bold; padding: 5px;">KETERANGAN</th>
                </tr>
                <tr class="bg2" class="border" style="font-weight: bold; background-color: #daeef3;">
                    <th class="border" style="font-weight: bold; padding: 5px; text-align: left; padding-left: 10px;" colspan="2">KEPRIBADIAN DAN PERILAKU</th>
                    <th class="border" style="font-weight: bold; padding: 5px;"></th>
                    <th class="border" style="font-weight: bold; padding: 5px;"></th>
                    <th class="border" style="font-weight: bold; padding: 5px;"></th>
                </tr>
               
                <tr class="border" style="">
                    <th class="border" style="padding: 5px; font-weight: normal;">3</th>
                    <th class="border" style="padding: 5px; text-align: left; font-weight: normal;">Kedisiplinan</th>
                    <!-- Bobot -->
                    <th class="border" style="padding: 5px; font-weight: normal;">20%</th>
                    <!-- Nilai -->
                    <th class="border" style="padding: 5px; font-weight: normal;" id="kedisiplinan">
                        
                    </th>
                    <!-- Keterangan -->
                    <th class="border" style="padding: 5px; font-weight: normal;" id="predikat_kedisiplinan"></th>
                </tr>
                <tr class="border" style="">
                    <th class="border" style="padding: 5px; font-weight: normal;">1</th>
                    <th class="border" style="padding: 5px; text-align: left; font-weight: normal;">Tanggung Jawab</th>
                    <!-- Bobot -->
                    <th class="border" style="padding: 5px; font-weight: normal;">20%</th>
                    <!-- Nilai -->
                    <th class="border" style="padding: 5px; font-weight: normal;" id="tanggung_jawab">
                        
                    </th>
                    <!-- Keterangan -->
                    <th class="border" style="padding: 5px; font-weight: normal;" id="predikat_tanggung_jawab"></th>
                </tr>
                <tr class="border" style="">
                    <th class="border" style="padding: 5px; font-weight: normal;">2</th>
                    <th class="border" style="padding: 5px; text-align: left; font-weight: normal;">Kerapihan</th>
                    <!-- Bobot -->
                    <th class="border" style="padding: 5px; font-weight: normal;">15%</th>
                    <!-- Nilai -->
                    <th class="border" style="padding: 5px; font-weight: normal;" id="kerapihan">
                        
                    </th>
                    <!-- Keterangan -->
                    <th class="border" style="padding: 5px; font-weight: normal;" id="predikat_kerapihan"></th>
                </tr>
                <tr class="border" style="">
                    <th class="border" style="padding: 5px; font-weight: normal;">4</th>
                    <th class="border" style="padding: 5px; text-align: left; font-weight: normal;">Komunikasi</th>
                    <!-- Bobot -->
                    <th class="border" style="padding: 5px; font-weight: normal;">15%</th>
                    <!-- Nilai -->
                    <th class="border" style="padding: 5px; font-weight: normal;" id="komunikasi">
                        
                    </th>
                    <!-- Keterangan -->
                    <th class="border" style="padding: 5px; font-weight: normal;" id="predikat_komunikasi"></th>
                </tr>
                <!-- Proses Kerja -->
                <tr class="bg2" class="border" style="font-weight: bold; background-color: #daeef3;">
                    <th class="border" style="font-weight: bold; padding: 5px; text-align: left; padding-left: 10px;" colspan="2">PROSES KERJA</th>
                    <th class="border" style="font-weight: bold; padding: 5px;"></th>
                    <th class="border" style="font-weight: bold; padding: 5px;"></th>
                    <th class="border" style="font-weight: bold; padding: 5px;"></th>
                </tr>
                <tr class="border" style="">
                    <th class="border" style="padding: 5px; font-weight: normal;">1</th>
                    <th class="border" style="padding: 5px; text-align: left; font-weight: normal;">Pemahaman Pekerjaan</th>
                    <!-- Bobot -->
                    <th class="border" style="padding: 5px; font-weight: normal;">10%</th>
                    <!-- Nilai -->
                    <th class="border" style="padding: 5px; font-weight: normal;" id="pemahaman_pekerjaan">
                        
                    </th>
                    <!-- Keterangan -->
                    <th class="border" style="padding: 5px; font-weight: normal;" id="predikat_pemahaman_pekerjaan"></th>
                </tr>
                <tr class="border" style="">
                    <th class="border" style="padding: 5px; font-weight: normal;">2</th>
                    <th class="border" style="padding: 5px; text-align: left; font-weight: normal;">Manajemen Waktu</th>
                    <!-- Bobot -->
                    <th class="border" style="padding: 5px; font-weight: normal;">10%</th>
                    <!-- Nilai -->
                    <th class="border" style="padding: 5px; font-weight: normal;" id="manajemen_waktu">
                        
                    </th>
                    <!-- Keterangan -->
                    <th class="border" style="padding: 5px; font-weight: normal;" id="predikat_manajemen_waktu"></th>
                </tr>
                <tr class="border" style="">
                    <th class="border" style="padding: 5px; font-weight: normal;">3</th>
                    <th class="border" style="padding: 5px; text-align: left; font-weight: normal;">Kerjasama Dalam Kerja </th>
                    <!-- Bobot -->
                    <th class="border" style="padding: 5px; font-weight: normal;">10%</th>
                    <!-- Nilai -->
                    <th class="border" style="padding: 5px; font-weight: normal;" id="kerjasama_tim">
                        
                    </th>
                    <!-- Keterangan -->
                    <th class="border" style="padding: 5px; font-weight: normal;" id="predikat_kerjasama_tim"></th>
                </tr>
                <tr class="bg2" class="border" style="font-weight: bold; background-color: #daeef3;">
                    <th class="border" style="font-weight: bold; padding: 5px; text-align: center;" colspan="2"> NILAI AKHIR</th>
                    <th class="border" style="font-weight: bold; padding: 5px;"></th>
                    <th class="border" style="font-weight: bold; padding: 5px;" id="rataRataNilai">

                    </th>
                    <th class="border" style="font-weight: bold; padding: 5px;"></th>
                </tr>
            </table>


           <div  style=" display: grid; width: 90%; grid-template-columns: auto auto auto; ">
            <table style="margin-top: 20px; grid-column: span 2; font-size: 10px;">
                    <tr style="text-align: left;">
                        <th>
                            Keterangan Nilai : 
                        </th>
                    </tr>
                    <tr>
                        <td>
                        
                        </td>
                    </tr>
                    <tr>
                        <td>
                            3.5 - 4.0  &nbsp; : Sangat Baik
                        </td>
                    </tr>
                    <tr>
                        <td>
                        
                        </td>
                    </tr>
                    <tr>
                        <td>
                            3.0 - 3.5  &nbsp; : Baik
                        </td>
                    </tr>
                    <tr>
                        <td>
                        
                        </td>
                    </tr>
                    <tr>
                        <td>
                            2.5 - 3.0  &nbsp; : Cukup
                        </td>
                    </tr>
                    <tr>
                        <td>
                        
                        </td>
                    </tr>
                    <tr>
                        <td>
                            2.0 - 2.5  &nbsp; : Kurang
                        </td>
                    </tr>
                    <tr>
                        <td>
                        
                        </td>
                    </tr>
                    <tr>
                        <td>
                            1.0 - 2.0  &nbsp; : Sangat Kurang
                        </td>
                    </tr>
            </table>

            <!-- TTD -->
            <div style="margin-top: 25px;">
                <table style="line-height: 1.3; width: 100%; text-align: right;">
                    <tr>
                        <td style="padding-right: 25px;">
                            Majalengka, <span id="tgl_dibuat"></span>
                            <input type="text" id="idUserGet" style="display: none;" value=""></input>
                            
                        </td>
                    </tr>
                    <tr >
                        <td style="padding-right: 155px;">
                        <img src="<?= base_url(); ?>assets/img/QrCode/Personalia.png" alt="QR Code" width="80">
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; line-height: 1; padding-right: 135px;">
                            Titan Rifesha
                        </td>
                    </tr>
                    <tr>
                        <td class="" style="line-height: 1;">
                            Head of HC & Finance Department
                        </td>
                    </tr>
                </table>
            </div>
           </div>


        </div>
        <!-- Nilai -->

   </div>
</div>

      </div>
      
    </div>
  </div>
</div>
