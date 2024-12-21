
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
                    <form action="<?php base_url(); ?>View/updateUser" method="post"> 
                        <!-- NIM -->
                        <div class="mb-3">
                            <label for="nim" class="form-label">NIM/NRP</label>
                            <input type="text" name="nim" class="form-control" id="nim" placeholder="NIM" readonly>
                        </div>
                        <!-- Nama Lengkap -->
                        <div class="mb-3">
                            <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" name="namaLengkap" class="form-control" id="namaLengkap" placeholder="Nama Lengkap" readonly>
                        </div>
                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Alamat Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Alamat Email" readonly>
                        </div>
                        <!-- No Telp/W.A -->
                        <div class="mb-3">
                            <label for="noTelp" class="form-label">No Telepon/Whatsapp</label>
                            <input type="noTelp" name="noTelp" class="form-control" id="noTelp" placeholder="No Telepon / Whatsapp" readonly>
                        </div>
                        <!-- Asal Sekolah -->
                        <div class="mb-3">
                            <label for="asalSekolah" class="form-label">asalSekolah</label>
                            <input type="asalSekolah" name="asalSekolah" class="form-control" id="asalSekolah" placeholder="Asal Sekolah / Universitas" readonly>
                        </div>
                        <!-- Jurusan -->
                        <div class="mb-3">
                            <label for="jurusan" class="form-label">Jurusan/Prodi</label>
                            <input type="jurusan" name="jurusan" class="form-control" id="jurusan" placeholder="Jurusan / Prodi" readonly>
                        </div>
                        <!-- Divisi -->
                        <div class="mb-3">
                            <select class="form-select" aria-label="Default select example" name="divisi" id="divisi">
                                <option selected>Divisi</option>
                                <?php foreach ($Divisi as $data) {?>
                                    <option value="<?= $data->idDivisi ?>"><?= $data->namaDivisi ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <!-- Status -->
                        <div class="mb-3">
                            <select class="form-select" aria-label="Default select example" name="status" id="status">
                                <option selected>Status</option>
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
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
                    "url": "<?= base_url('View/getDataUser'); ?>",
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
        console.log("NIM = ", e);
        var dataToSend = { e: e };

        $.ajax({  
            type: "POST",
            data: dataToSend,
            url: "<?php echo base_url('View/detailUser'); ?>",
            success: function(response){

                $('#modalDetail').modal('show');

                console.log(response.data);

                $('#nim').val(response.data['nim']);
                $('#namaLengkap').val(response.data['namaLengkap']);
                $('#email').val(response.data['email']);
                $('#noTelp').val(response.data['noTelp']);
                $('#asalSekolah').val(response.data['asalSekolah']);
                $('#jurusan').val(response.data['jurusan']);
                var idDivisi = response.data['idDivisi'];
                // $("#divisi option").val(idDivisi).change();
                $("#divisi option[value='"+ response.data['idDivisi'] +"']").prop('selected', true);
                $("#status option[value='"+ response.data['isActive'] +"']").prop('selected', true)
            }
        })

    }
        
    </script>