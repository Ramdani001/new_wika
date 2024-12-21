<div class="row container text-center">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4 text-center">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2 px-3">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Mahasiswa</div>
                        <div class="h2 mb-0 font-weight-bold text-gray-800">
                                <?= $getMahasiswa ?>
                        </div>
                    </div>
                    <div class="text-secondary col-auto pe-3" style="font-size: 40px;">
                        <i class="fa-solid fa-chalkboard-user"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Guru</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 30px;">
                            <?= $getGuru ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-tie fa-2x text-gray-700 pe-3"></i>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Siswa</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 30px;">
                            <?= $getSiswa ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-700 pe-3"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>

 <div class="d-flex container" style="width: 100%;">
    <table id="example" class=" table table-striped" style="width: 900px; height: 100%;">
        <thead>
            <tr>
                <th>No</th>
                <th>NIM/NRP</th>
                <th>Nama Lengkap</th>
                <th>Asal Sekolah</th>
                <!-- <th>Jurusan</th> -->
                <th>Divisi</th>
                <th>Status</th> 
            </tr>
        </thead>
        <tbody>
          
        </tbody>
    </table>
    <div class="d-flex flex-column p-1 shadow rounded m-1" data-spy="scroll">
        <h6 class="text-center py-1">Magang Aktif</h6>
        <?php foreach ($getUser as $data) { 
            if($data->roleId == 3){ ?>
                <div class="border shadow ms-2 w-full m-2">
                        <div class="w-full p-2">
                            <div>
                                <h5>
                                    Status : <?php 
                                    if($data->isActive == 1){
                                        echo "Aktif";
                                    }else{
                                        echo "Tidak Aktif";
                                    }
                                    ?>

                                </h5>
                            </div>
                            <div>
                                <div class="border position-relative p-2 m-1 rounded shadow" style="width: 300px;">
                                <?= $data->namaLengkap ?>
                                </div>
                            </div>
                        </div> 
                    </div>  
        
           <?php } 
        } ?>
    </div>
 </div>

 <script>
    $(document).ready(function() {
            $('#example').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    "url": "<?= base_url('View/getIntership'); ?>",
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
 </script>