<h1>Detail Progress Jobdesc</h1>
<?php 
    // var_dump($getJob);
    // die();
?>

<div class="card">
    <div class="card-body">
        <form action="<?php base_url(); ?>Administrator/updateJobdesc" method="post">
            <input name="idJob" id="idJob" type="text" class="form-control" value="<?= $getJob->id ?>" readonly hidden>
            <input name="id_user" id="id_user" type="text" class="form-control" value="<?= $getJob->id_user ?>" readonly hidden>
            <div class="mb-3">
                <label for="nim">NIM / NRP</label>
                <input name="nim" id="nim" type="text" class="form-control" value="<?= $getJob->nim ?>" readonly>
            </div>

            <div class="mb-3">
                <label for="namaLengkap">Nama Lengkap</label>
                <input name="namaLengkap" id="namaLengkap" type="text" class="form-control" value="<?= $getJob->namaLengkap ?>" readonly>
            </div>

            <div class="mb-3">
                <label for="judulJob">Judul Job</label>
                <input name="judulJob" id="judulJob" type="text" class="form-control" value="<?= $getJob->judul_job ?>" readonly>
            </div>

            <div class="mb-3">
                <div class="mb-3">
                    <label for="deskrisi">Descsription Job</label>
                    <textarea  name="deskripsi1" id="deskripsi1"  class="form-control" rows="5"  placeholder="Job Description" readonly></textarea>
            </div> 

            <input id="getStatusJob" type="text" value="<?= $getJob->status_job ?>" hidden>
            <input id="getDeskripsiJob" type="text" value="<?= $getJob->deskripsi ?>" hidden>
            <input id="getEvaluasiJob" type="text" value="<?= $getJob->evaluasi ?>" hidden>
            <div class="mb-3">
                <label for="statusJob">Status Job</label>
                <select name="statusJob" id="statusJob" class="form-select" aria-label="Default select example">
                    <option selected>Status Job</option>
                    <option value="Pending">Pending</option>
                    <option value="Progres">Progres</option>
                    <option value="Done">Done</option>
                    
                    <?php if($getJob->status_job == "Rejected") {?>
                        <option value="Rejected">Rejected</option>
                    <?php }?>

                </select>
            </div> 

            <?php if(!empty($getJob->evaluasi)) {?>
                <div class="mb-3">
                    <label for="evaluasi" class="form-label">Evaluasi Job</label>
                    <textarea class="form-control" id="evaluasi" rows="5" name="evaluasi" placeholder="Jika Sesuai Isi Dengan tanda '-'" readonly></textarea>
                </div>
            <?php }?>
                
            
                <?php if(!empty($getJob->progresDeskripsi)){ ?>
                    <div class="mb-3">
                        <label for="progresDeskripsi">Progres Description</label>
                        <textarea  name="progresDeskripsi" id="progresDeskripsi"  class="form-control" rows="5"  placeholder="Progres Job Description"><?= $getJob->progresDeskripsi ?></textarea>
                    </div>
                <?php } else{?>
                    <div class="mb-3 d-none" id="contentProgres">
                        <div class="mb-3">
                            <label for="progresDeskripsi">Progres Description</label>
                            <textarea  name="progresDeskripsi" id="progresDeskripsi"  class="form-control" rows="5"  placeholder="Progres Job Description"></textarea>
                        </div>
                    </div>
                <?php }?>
        <div class="card-footer text-end">
            <a href="<?php base_url(); ?>Administrator" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>

<div>
    <script>
        var statusJob = $('#getStatusJob').attr('value');
        var getDeskripsiJob = $('#getDeskripsiJob').attr('value');
        var getEvaluasiJob = $('#getEvaluasiJob').attr('value');

        
        $("#evaluasi").val(getEvaluasiJob);
        $("#deskripsi1").val(getDeskripsiJob);
        $("#statusJob option[value='"+ statusJob +"']").prop('selected', true);
        
        $('#statusJob').on('change', function(){
        
            $statusJobActive = $(this).val();

            console.log("Status Job = ", $statusJobActive);
            
            if($statusJobActive == 'Progres' ||  $statusJobActive == 'Done'){
                $('#contentProgres').removeClass('d-none');
            }else{
                $('#contentProgres').addClass('d-none');
            }
        });

       

    </script>
</div>