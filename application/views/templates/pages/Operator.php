<button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#tambahModal">
  Tambah
</button>
<table id="tableIntership" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Induk Karyawan</th> 
                <th>Nama Lengkap</th>
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
                    <h1 class="modal-title fs-5" id="modalDetailLabel">Detail Intership</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php base_url(); ?>View/updateUser" method="post"> 
                        <!-- NIM -->
                        <input type="hidden" name="id_user" class="form-control" id="id_user" placeholder="Id User" readonly>
                        <div class="mb-3">
                            <label for="nim" class="form-label">Nomor Induk Karyawan</label>
                            <input type="text" name="nim" class="form-control" id="nim" placeholder="NIM" readonly>
                        </div>
                        <!-- Nama Lengkap -->
                        <div class="mb-3">
                            <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" name="namaLengkap" class="form-control" id="namaLengkap" placeholder="Nama Lengkap">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Alamat Email</label>
                            <input type="text" name="email" class="form-control" id="email" placeholder="Alamat Email">
                        </div>
                        <div class="mb-3">
                            <label for="noTelp" class="form-label">No Telepon</label>
                            <input type="text" name="noTelp" class="form-control" id="noTelp" placeholder="Nama Lengkap">
                        </div>
                        
                        <!-- Status -->
                        <div class="mb-3">
                            <label for="divisi" class="form-label">Divisi</label>
                            <select class="form-select" id="divisi" aria-label="Default select example" name="divisi" id="divisi">
                                <option selected>Divisi</option>
                                <?php foreach ($divisi as $data) {?>
                                    <option value="<?= $data->idDivisi ?>"><?= $data->namaDivisi ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <!-- Status -->
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" aria-label="Default select example" name="status" id="status">
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
    <!-- Modal Hapus -->
    <div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="w-full" action="<?php echo base_url('View/HapusUser') ?>" method="POST">
                
                        <input type="text" class="form-control mb-2" placeholder="Id Divisi" name="idHapus" id="idHapus" >
                        <div class="text-center">
                            <h1 class="mt-2 mb-2">
                                <i class="fa-solid fa-exclamation"></i> 
                            </h1>
                            <h4>
                                Yakin Akan Menghapusnya???
                            </h4>
                        </div>
                        <div class="row justify-content-evenly mx-3 mt-3 gap-4">
                            <button type="button" class="col btn btn-secondary w-full" data-bs-dismiss="modal" aria-label="Close">Batal</button>
                            <button type="submit" class="col btn btn-primary w-full">Hapus</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Detail -->

    <!-- Modal Tambah -->
    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tambahModalLabel">Tambah Operator</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <form action="<?php base_url(); ?>View/InsertOperator" method="post"> 
                    <div class="modal-body">
                        <!-- NIM -->
                        <div class="mb-3">
                            <label for="nim" class="form-label">Nomor Induk Karyawan</label>
                            <input type="text" name="nim" class="form-control" id="nim" placeholder="Nomor Induk Karyawan" >
                        </div>
                        <!-- Nama Lengkap -->
                        <div class="mb-3">
                            <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" name="namaLengkap" class="form-control" id="namaLengkap" placeholder="Nama Lengkap">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Alamat Email</label>
                            <input type="text" name="email" class="form-control" id="email" placeholder="Alamat Email">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                        </div>

                        <div class="mb-3">
                            <label for="noTelp" class="form-label">No Telepon</label>
                            <input type="text" name="noTelp" class="form-control" id="noTelp" placeholder="Nama Lengkap">
                        </div>
                        
                        <!-- Status -->
                        <div class="mb-3">
                            <label for="divisi" class="form-label">Divisi</label>
                            <select class="form-select" id="divisi" aria-label="Default select example" name="divisi" id="divisi">
                                <option selected>Divisi</option>
                                <?php foreach ($divisi as $data) {?>
                                    <option value="<?= $data->idDivisi ?>"><?= $data->namaDivisi ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <!-- Status -->
                        <div class="mb-3 d-none">
                            <label for="status" class="form-label">Status</label>
                            <input type="text" name="status" class="form-control" id="status" value="1">
                            <input type="text" name="profile" class="form-control" id="profile" value="default.png">
                        </div>
                       
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
           
            </div>
        </div>
    </div>
    <!-- Modal Tambah -->


    <script>
        $(document).ready(function() {
            $('#tableIntership').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    "url": "<?= base_url('View/getOperator'); ?>",
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
            url: "<?php echo base_url('View/detailUser'); ?>",
            success: function(response){

                $('#modalDetail').modal('show');

                console.log(response.data);

                $('#nim').val(response.data['nim']);
                $('#namaLengkap').val(response.data['namaLengkap']);
                $('#email').val(response.data['email']);
                $('#noTelp').val(response.data['noTelp']);
                $("#divisi option[value='"+ response.data['idDivisi'] +"']").prop('selected', true);
                $("#status option[value='"+ response.data['isActive'] +"']").prop('selected', true);
            }
        })
    }

        function hapusOperator(e){
        console.log("Is User = ", e);
        var dataToSend = { e: e };
        
            $('#hapusModal').modal('show');
            $('#idHapus').val(e);

    }
        
    </script>