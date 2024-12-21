<div class="container" style="margin-top: -10px;"> 
    <h1>Page Sertifikat</h1>
</div>

<table id="tablePenilaian" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nomor Penilaian</th>
            <th>Nim</th> 
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Asal Sekolah</th>
            <th>Tanggal Dibuat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
          
    </tbody>
</table>

<?php include APPPATH . 'views/templates/partials/EditPenilaian.php'; ?>
<?php include APPPATH . 'views/templates/partials/LiatSertifikat.php'; ?>

<script>

    // Predikat Nilai
    function predikat($nilai) {
        $predikatNilai = "";
            
        if ($nilai >= 3.5 && $nilai <= 4) {
            $predikatNilai = "Sangat Baik";
        } else if ($nilai >= 3.0 && $nilai < 3.5) {
            $predikatNilai = "Baik";
        } else if ($nilai >= 2.5 && $nilai < 3.0) {
            $predikatNilai = "Cukup";
        } else if ($nilai >= 2.0 && $nilai < 2.5) {
            $predikatNilai = "Kurang";
        } else {
            $predikatNilai = "Sangat Kurang";
        }
            
        return $predikatNilai;
    }
        
  

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
    const keluaran = day + ' ' + month + ' ' + year;
    return keluaran;
    }

            // $rata = ($jumlah / 7);
            // $rataRataNilai = floor($rata * 100) / 100;
    // Predikat Nilai

$(document).ready(function() {
   $('#tablePenilaian').DataTable({
       "processing": true,
       "serverSide": true,
       "order": [],
       "ajax": {
           "url": "<?= base_url('SertifikatController/GetDataPenilaian'); ?>",
           "type": "POST"
       },
       "columnDefs": [{
           "target": [-1],
           "orderable": false
       }],
       responsive: true,
   });
});

    function lihatSertifikat(id,status){
        

        // Dowload = 1
        // Lihat = 2
        // Edit = 3

        if(status == 1){
            
            // var form = document.createElement("form");
            //     form.method = "POST";
            //     form.action = "Administrator/DetailPenilaian";
            //     form.target = "_blank";

            //     var input = document.createElement("input");
            //     input.type = "hidden";
            //     input.name = "idSurat";
            //     input.value = e;

            //     form.appendChild(input);

            //     document.body.appendChild(form);

            //     form.submit();

        }else if(status == 2){
            console.log("Lihat Serti");
            var dataToSend = { id : id};
            
            $.ajax({  
            type: "POST", 
            data: dataToSend,
            url: "<?php echo base_url('SertifikatController/ViewSertifikat'); ?>",
            success: function(response){

                $('#modalDetail').modal('show');
                $('#nomor_surat_penilaian').text(response.getSertifikat.no_surat_penilaian);

                $('#PnamaLengkap').text(response.getSertifikat.namaLengkap);
                $('#Pnim').text(response.getSertifikat.nim);
                $('#Pjurusan').text(response.getSertifikat.jurusan);
                $('#PasalSekolah').text(response.getSertifikat.asalSekolah);

                $('#kedisiplinan').text(response.getSertifikat.kedisiplinan);
                $('#predikat_kedisiplinan').text(predikat(response.getSertifikat.kedisiplinan));

                $('#tanggung_jawab').text(response.getSertifikat.tanggung_jawab);
                $('#predikat_tanggung_jawab').text(predikat(response.getSertifikat.tanggung_jawab));
                
                $('#kerapihan').text(response.getSertifikat.kerapihan);
                $('#predikat_kerapihan').text(predikat(response.getSertifikat.kerapihan));

                $('#komunikasi').text(response.getSertifikat.komunikasi);
                $('#predikat_komunikasi').text(predikat(response.getSertifikat.komunikasi));

                $('#pemahaman_pekerjaan').text(response.getSertifikat.pemahaman_pekerjaan);
                $('#predikat_pemahaman_pekerjaan').text(predikat(response.getSertifikat.pemahaman_pekerjaan));

                $('#manajemen_waktu').text(response.getSertifikat.manajemen_waktu);
                $('#predikat_manajemen_waktu').text(predikat(response.getSertifikat.manajemen_waktu));

                $('#kerjasama_tim').text(response.getSertifikat.kerjasama_tim);
                $('#predikat_kerjasama_tim').text(predikat(response.getSertifikat.kerjasama_tim));

                $('#tgl_dibuat').text(formatDate(response.getSertifikat.tgl_dibuat));
                
                $('#serti_tgl_dibuat').text(formatDate(response.getSertifikat.tgl_dibuat));

                $('#noSertiBaru').text(response.getSertifikat.no_surat_penilaian);
                $('#serti_namaLengkap').text(response.getSertifikat.namaLengkap);


                console.log(response.getSertifikat.idUser);
                
                var id = response.getSertifikat.idUser;

                var sendId = {idUser : id};
                // Get Tanggal Mulai & Akhir
                $.ajax({  
                    type: "POST", 
                    data: sendId,
                    url: "<?php echo base_url('SertifikatController/getTanggal'); ?>",
                    success: function(response){
                        console.log("Get Tgl Surat", response.getTanggal);

                        $('#serti_tgl_mulai').text(formatDate(response.getTanggal.tglMulai));
                        $('#serti_tgl_akhir').text(formatDate(response.getTanggal.tglAkhir));

                    }
                });

            }
        })


            $('#modalLihatSertifikat').modal('show');

        }else if(status == 3){
            

            var sendData =  {id : id};
            $.ajax({ 

                url: 'SertifikatController/GetEdit',
                data: sendData,  
                method: 'POST',
                success: function(response) {        
                    $('#PenilaianEdit').modal('show');
                    
                    console.log("Data Sertifikat",response);
                    $('#Edit_no_surat_penilaian').val(response.getSertifikat.no_surat_penilaian);

                    $('#Edit_id_penilaian').val(response.getSertifikat.id_penilaian);

                    $('#Edit_id_user').val(response.getSertifikat.idUser);
                    $('#namaLengkap').val(response.getSertifikat.namaLengkap);
                    $('#jurusan').val(response.getSertifikat.jurusan);
                    $('#asalSekolah').val(response.getSertifikat.asalSekolah);

                    $('#Edit_tgl_dibuat').val(response.getSertifikat.tgl_dibuat);
                    $('#Edit_kedisiplinan').val(response.getSertifikat.kedisiplinan);
                    $('#Edit_tanggung_jawab').val(response.getSertifikat.tanggung_jawab);
                    $('#Edit_kerapihan').val(response.getSertifikat.kerapihan);
                    $('#Edit_komunikasi').val(response.getSertifikat.komunikasi);
                    $('#Edit_pemahaman_pekerjaan').val(response.getSertifikat.pemahaman_pekerjaan);
                    $('#Edit_manajemen_waktu').val(response.getSertifikat.manajemen_waktu);
                    $('#Edit_kerjasama_tim').val(response.getSertifikat.kerjasama_tim);

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
            $('#ViewSurat').removeClass('bg-custom');
            $('#Sertifikat').addClass('bg-custom');

            $("#Sertifikat").on('click', function() {

            })
        }else{
            $('#ViewSurat').removeClass('bg-custom');
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