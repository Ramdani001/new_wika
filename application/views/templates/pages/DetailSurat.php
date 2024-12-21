<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <style>
    @page { size: auto;  margin: 0mm; }
   </style>
</head>
<body>
        
    <div class="container" style="font-size: 15px;">
    <div style=" margin: auto;
    width: 50%;
    padding: 10px;">
        <img src="<?= base_url() ?>assets/img/logoSuratPenerimaan.png" alt="Logo"
        style=" display: block; margin-left: 50px; width: 250px; height: 90px;">
        
    </div>
    <div style="width: 85%;"> 
    <?php
            function formatDate($inputDate) {
                $months = [
                    'Januari', 'Februari', 'Maret', 'April',
                    'Mei', 'Juni', 'Juli', 'Agustus',
                    'September', 'Oktober', 'November', 'Desember'
                ];

               $dateParts = explode('-', $inputDate);
               $year = $dateParts[0];
               $month = $months[(int)$dateParts[1] - 1];
               $day = $dateParts[2];

                return $day . ' ' . $month . ' ' . $year;
            } 
        ?>
        <?php foreach ($data as $surat) { ?>
                
                <div class="" style="display: flex; flex: 1; margin-top: 20px;">
                    <div style=" margin-left: 100px;">
                        <table style="width: 100%;">
                            <tr>
                                <td>
                                Nomor : <?= $surat->nomorSuratBalasan ?>
                                </td>
                                <td style="text-align: right;">
                                Majalengka, <?= formatDate($surat->tglDibuat) ?>
                                </td>
                            </tr>
                        </table>
                        
                    </div>
                </div>   

            <br>
            <div style="margin-left: 100px; line-height: 1.5;">
                <div>
                    Kepada Yth. 
                </div>
                    <div style="">
                        <b>
                            <?= $surat->asalSekolahPemohon ?>
                        </b>
                    </div>
                <div style="">
                    Di Tempat
                </div>
                <div style="margin-top: 6px; margin-left: 45px;">
                    Perihal : <b> Izin Prakter Kerja Lapangan (PKL) </b>
                </div>
                <p style="margin-top: 10px; text-align: justify; line-height: 1.5;">
                    Dengan Hormat, <br>
                    Merujuk Surat Permohonan <b><?= $surat->nomorSuratMou ?></b> tanggal <?= $surat->tglSuratMou ?>, terkait Permohonan Praktik Kerja Lapangan (PKL) di PT Wijaya Karya Industri & Kontruksi Pabrikasi Baja Majalengka terhadap <?= $surat->statusPemohon ?> di bawah ini : <br>
                    
                </p>
                <table style="border-collapse: collapse; text-align: center; width: 100%;" border="1">
                    <thead>
                        <tr>
                            <th style="width: 10%;">NO</th>
                            <th style="width: 30%;">Nama</th>
                            <th style="width: 25%;">Nim</th>
                            <th style="width: 30%;">Jurusan / Kompetensi</th>
                        </tr>    
                    </thead>
                    <tbody>
                        <?php
                            $pemohon = $surat->jumlahPemohon;
                            $no = 1;
                            if($pemohon == 1){
                        ?>

                            <tr>
                                <td> <?= $no++; ?> </td>
                                <td> <?= $surat->namaPemohon1?> </td>
                                <td> <?= $surat->nim1?> </td>
                                <td> <?= $surat->jurusan1?> </td>
                            </tr>
                        <?php }else if($pemohon == 2) {?>
                            <tr>
                                <td> <?= $no++; ?> </td>
                                <td> <?= $surat->namaPemohon1?> </td>
                                <td> <?= $surat->nim1?> </td>
                                <td> <?= $surat->jurusan1?> </td>
                            </tr>
                            <tr>
                                <td> <?= $no++; ?> </td>
                                <td> <?= $surat->namaPemohon2?> </td>
                                <td> <?= $surat->nim2?> </td>
                                <td> <?= $surat->jurusan2?> </td>
                            </tr>
                        <?php }else if($pemohon == 3) {?>
                            <tr>
                                <td> <?= $no++; ?> </td>
                                <td> <?= $surat->namaPemohon1?> </td>
                                <td> <?= $surat->nim1?> </td>
                                <td> <?= $surat->jurusan1?> </td>
                            </tr>
                            <tr>
                                <td> <?= $no++; ?> </td>
                                <td> <?= $surat->namaPemohon2?> </td>
                                <td> <?= $surat->nim2?> </td>
                                <td> <?= $surat->jurusan2?> </td>
                            </tr>
                            <tr>
                                <td> <?= $no++; ?> </td>
                                <td> <?= $surat->namaPemohon3?> </td>
                                <td> <?= $surat->nim3?> </td>
                                <td> <?= $surat->jurusan3?> </td>
                            </tr>
                        <?php }else if($pemohon == 4) {?>
                            <tr>
                                <td> <?= $no++; ?> </td>
                                <td> <?= $surat->namaPemohon1?> </td>
                                <td> <?= $surat->nim1?> </td>
                                <td> <?= $surat->jurusan1?> </td>
                            </tr>
                            <tr>
                                <td> <?= $no++; ?> </td>
                                <td> <?= $surat->namaPemohon2?> </td>
                                <td> <?= $surat->nim2?> </td>
                                <td> <?= $surat->jurusan2?> </td>
                            </tr>
                            <tr>
                                <td> <?= $no++; ?> </td>
                                <td> <?= $surat->namaPemohon3?> </td>
                                <td> <?= $surat->nim3?> </td>
                                <td> <?= $surat->jurusan3?> </td>
                            </tr>
                            <tr>
                                <td> <?= $no++; ?> </td>
                                <td> <?= $surat->namaPemohon4?> </td>
                                <td> <?= $surat->nim4?> </td>
                                <td> <?= $surat->jurusan4?> </td>
                            </tr>
                        <?php }else if($pemohon == 5) {?>
                            <tr>
                                <td> <?= $no++; ?> </td>
                                <td> <?= $surat->namaPemohon1?> </td>
                                <td> <?= $surat->nim1?> </td>
                                <td> <?= $surat->jurusan1?> </td>
                            </tr>
                            <tr>
                                <td> <?= $no++; ?> </td>
                                <td> <?= $surat->namaPemohon2?> </td>
                                <td> <?= $surat->nim2?> </td>
                                <td> <?= $surat->jurusan2?> </td>
                            </tr>
                            <tr>
                                <td> <?= $no++; ?> </td>
                                <td> <?= $surat->namaPemohon3?> </td>
                                <td> <?= $surat->nim3?> </td>
                                <td> <?= $surat->jurusan3?> </td>
                            </tr>
                            <tr>
                                <td> <?= $no++; ?> </td>
                                <td> <?= $surat->namaPemohon4?> </td>
                                <td> <?= $surat->nim4?> </td>
                                <td> <?= $surat->jurusan4?> </td>
                            </tr>
                            <tr>
                                <td> <?= $no++; ?> </td>
                                <td> <?= $surat->namaPemohon5?> </td>
                                <td> <?= $surat->nim5?> </td>
                                <td> <?= $surat->jurusan5?> </td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>

                <p style="margin-top: 10px;  text-align: justify; line-height: 1.5;">
                    Bersama dengan ini kami sampaikan bahwa permohonan tersebut <?= $surat->statusSurat ?> untuk 
                    melaksanakan Praktik Kerja Lapangan di Pabrikasi Baja Majalengka, PT Wijaya Karya Industri &
                    Kontruksi. Selanjutnya Praktik Kerja Lapangan dilaksanakan dengan ketentuan sebagai berikut:
                </p>

                <div style=" margin-top: 10px;">
                    <table>
                        <tr>
                            <td>Waktu Pelaksanaan</td>
                            <td> : </td>
                            <td> <?= $surat->tglMulai ?> s.d <?= $surat->tglAkhir ?> </td>
                        </tr>
                        <tr>
                            <td>Penempatan Unit Kerja</td>
                            <td> : </td>
                            <td> <?= $surat->namaDivisi ?></td>
                        </tr>
                        <tr>
                            <td>Pembimbing</td>
                            <td> : </td>
                            <td> <?= $surat->namaPembimbing ?></td>
                        </tr>
                    </table>
                </div>
                
                <p style="margin-top: 10px;  text-align: justify; line-height: 1.5;">
                    Mohon melakukan konfirmasi maksimal H-3 sebelum waktu pelaksanaan pada kontak dibawah ini :
                </p>

                <div style=" margin-top: 10px;">
                    <table>
                        <tr>
                            <td>Personalia</td>
                            <td> : </td>
                            <td> Jagat Giyana C. </td>
                        </tr>
                        <tr>
                            <td>Kontak Person</td>
                            <td> : </td>
                            <td> 0822 4291 0617 </td>
                        </tr>
                    </table>
                </div>

                <p style="margin-top: 10px;  text-align: justify; line-height: 1.5;">
                    Demikian surat ini disampaikan, atas perhatian dan kerjasamanya kami ucapkan terima kasih.
                </p>

                <!-- TTD -->
                <div style=" margin-top: 20px;">
                    <table style="margin-left: auto; line-height: 1.3;">
                        <tr>
                            <td>Hormat Kami,</td>
                        </tr>
                        <tr>
                            <td style="text-decoration: underline;">
                                PT. Wijaya Karya Industri & Kontruksi
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Pabrikasi Baja Majalengka
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <img src="<?= base_url(); ?>assets/img/QrCode/<?= $surat->ttd_digital ?>" alt="QR Code" width="80">
                            </td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold; text-decoration: underline; line-height: 1;">
                                Titan Rifesha
                            </td>
                        </tr>
                        <tr>
                            <td style="line-height: 1;">
                                Kasie Keuangan & Personalia
                            </td>
                        </tr>
                    </table>
                </div>

            </div>

            

        <?php } ?>
    </div>

</body>
</html> 	