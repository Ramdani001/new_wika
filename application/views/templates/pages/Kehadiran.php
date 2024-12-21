<div class="mb-3 d-flex">
    <div onclick="childPage('Absen')" id="Absen" class="px-5 py-2 shadow-md fw-bold bg-custom bg-hover-custom me-1" style="cursor: pointer; border-right: 2px solid rgba(0, 0, 0, 0.65); border-bottom: 2px solid rgba(0, 0, 0, 0.65);">Absen</div>

    <div onclick="childPage('Today')" id="Today" class="px-5 py-2 shadow-md bg-hover-custom" style="cursor: pointer; border-right: 2px solid rgba(0, 0, 0, 0.65); border-bottom: 2px solid rgba(0, 0, 0, 0.65);">Today's</div>
</div>
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>NIM/NRP</th>
                <th>Nama Lengkap</th>
                <th>Asal Sekolah</th>
                <!-- <th>Jurusan</th> -->
                <th>Divisi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
          
        </tbody>
    </table>

    <!-- Modal Detail -->
    <div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="modalDetailLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalDetailLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php base_url(); ?>Administrator/Kehadiran" method="post"> 
                        <!-- NIM -->
                        <input type="hidden" name="id_user" class="form-control" id="id_user" placeholder="Id User" readonly>
                        <div class="mb-3">
                            <label for="nim" class="form-label">NIM/NRP</label>
                            <input type="text" name="nim" class="form-control" id="nim" placeholder="NIM" readonly>
                        </div>
                        <!-- Nama Lengkap -->
                        <div class="mb-3">
                            <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" name="namaLengkap" class="form-control" id="namaLengkap" placeholder="Nama Lengkap" readonly>
                        </div>
                        <div class="mb-3">
                            <div class="form-group"> <!-- Date input -->
                                <label for="tglHadir" class="form-label">Tanggal Hadir</label>
                                <input type="date" name="tglHadir" class="form-control" id="tglHadir" placeholder="Tanggal Hadir">
                            </div>
                        </div>
                        <!-- Status -->
                        <div class="mb-3">
                        <label for="namaLengkap" class="form-label">Status Kehadiran</label>
                            <select class="form-select" id="statusKehadiran" aria-label="Default select example" name="status" id="status_kehadiran">
                                <option selected>Status</option>
                                <option value="Hadir">Hadir</option>
                                <option value="Tidak Hadir">Tidak Hadir</option>
                            </select>
                        </div>
                        <!-- Alasan -->
                        <div class="mb-3 d-none" id="formAlasan">
                             <label for="alasan" class="form-label">Alasan</label>
                             <textarea class="form-control" id="alasan" rows="5" name="alasan"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                </div>
                                </form>
            </div>
        </div>
    </div>
    <!-- Modal Detail -->

 <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    "url": "<?= base_url('View/getDataUser?Kehadiran=Kehadiran'); ?>",
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

    $('#statusKehadiran').on('change', function(){
        
        $statusKehadiran = $(this).val();
        console.log("Status Kehadiran = ", $statusKehadiran);

        if($statusKehadiran == 'Tidak Hadir'){
            $('#formAlasan').removeClass('d-none');
        }else{
            $('#formAlasan').addClass('d-none');
        }


    });


    // Child Component
    function childPage(status){
        console.log('Status Component Page = ', status);

        if(status === "Today"){
            console.log("Today Click");
            $('#Absen').removeClass('bg-custom');
            $('#Today').addClass('bg-custom');

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
        }else{
            console.log("Absen Click");
            $('#Absen').addClass('bg-custom');
            $('#Today').removeClass('bg-custom');
        }

    }

 </script>