<div class="mb-3 d-flex">
    <div onclick="childPage('Absen')" id="Absen" class="px-5 py-2 shadow-md fw-bold  bg-hover-custom me-1" style="cursor: pointer; border-right: 2px solid rgba(0, 0, 0, 0.65); border-bottom: 2px solid rgba(0, 0, 0, 0.65);">Absen</div>

    <div onclick="childPage('Today')" id="Today" class="bg-custom px-5 py-2 shadow-md bg-hover-custom" style="cursor: pointer; border-right: 2px solid rgba(0, 0, 0, 0.65); border-bottom: 2px solid rgba(0, 0, 0, 0.65);">Today's</div>
</div>
<table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>NIM/NRP</th>
                <th>Nama Lengkap</th>
                <th>Status</th>
                <th>Alasan</th>
                <th>Hadir</th>
                <th>Tidak Hadir</th>
                <th>Tanggal</th>
                <!-- <th>Aksi</th> -->
            </tr>
        </thead>
        <tbody>
          
        </tbody>
    </table>

  
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    "url": "<?= base_url('Administrator/getDataAbsen'); ?>",
                    "type": "POST"
                },
                "columnDefs": [{
                    "target": [-1],
                    "orderable": false
                }],
                responsive: true,
                rowReorder: {
                    selector: 'td:nth-child(2)'
                }
            });
        });
        
    function modalDetail(e){
        console.log("Is User = ", e);
        var dataToSend = { e: e };

        $.ajax({  
            type: "POST",
            data: dataToSend,
            url: "<?php echo base_url('View/detailUser?Kehadiran=Kehadiran'); ?>",
            success: function(response){

                $('#modalDetail').modal('show');

                // console.log(response.data);

                $('#id_user').val(response.data['id']);
                $('#nim').val(response.data['nim']);
                $('#namaLengkap').val(response.data['namaLengkap']);
                $('#tglHadir').val(response.data['tglHadir']);
                $('#statusKehadiran').val(response.data['statusKehadiran']);
                $('#alasan').val(response.data['alasan']);
            }
        })

    }


    // Child Component
    function childPage(status){
        console.log('Status Component Page = ', status);

        if(status === "Today"){
            console.log("Today Click");
            $('#Absen').removeClass('bg-custom');
            $('#Today').addClass('bg-custom');

            $("#Today").on('click', function() {
            })
        }else{

            var Kehadiran = "Kehadiran";
            $('#Absen').addClass('bg-custom');
            $('#Today').removeClass('bg-custom');

            $.ajax({ 
                url: 'View/' + Kehadiran, 
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