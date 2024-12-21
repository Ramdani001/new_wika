<h1>Evaluasi Jobdesc</h1>
<?php 
    // var_dump($getJob);
    // die();
?>
    
<div class="container">
    <!-- JobDec -->
    <?php foreach ($jobdesc as $data) { ?>
        <?php if($data->status_job == 'Done') {?>
            <div class="row mb-2 align-items-center w-full rounded shadow-sm border" style="height: 50px;">
                <div class="col-10 me-2">
                    <div class="row">
                        <div class="col">
                            <?= $data->namaLengkap ?>
                        </div>
                        <div class="col">
                            <?= $data->judul_job ?>
                            <?php
                                $status_class = $data->status_job; // Change this value to match your data

                                // Define a mapping of status to classes
                                $status_classes = [
                                    'Progres' => 'text-bg-warning', // Corrected typo
                                    'Done' => 'text-bg-success',
                                    'Rejected' => 'text-bg-danger',
                                ];

                                // Default class for unknown statuses
                                $default_class = 'text-bg-secondary';

                                // Determine the class based on the status
                                $status_class = isset($status_classes[$data->status_job]) ? $status_classes[$data->status_job] : $default_class;
                                ?>
                            <sup>
                                <span id="statusJob" class="badge <?= $status_class ?>">
                                    <?= $data->status_job ?>
                                </span>
                            </sup>
                        </div>
                    </div>
                </div>

                <div class="col text-end">
                    <button onclick="getDetailJob('Evaluasi',<?= $data->id ?>)" class="btn btn-warning text-light" data-bs-toggle="modal" data-bs-target="#modalDetail">
                        Detail
                    </button>
                </div>
            </div>
        <?php }?>
    <?php } ?>
</div>

<!-- Modal Detail -->
<div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="modalDetailLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="modalDetailLabel">Job Description</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="<?php base_url(); ?>Administrator/EvaluasiUpdate" method="post">

            <input type="text" class="form-control" placeholder="Id Job" name="idJob" id="editidJob" hidden>
            <input type="text" class="form-control" placeholder="Id User" name="id_user" id="editid_user" hidden>
                <div class="mb-3">
                    <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" placeholder="Nama Lengkap" name="namaLengkap" id="editnamaLengkap" readonly>
                </div>

                <div class="mb-3">
                    <label for="judulJob" class="form-label">Tittle Job</label>
                    <input type="text" class="form-control" id="editjudulJob" placeholder="Judul Job Desc" name="judulJob" readonly>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Description Job</label>
                    <textarea class="form-control" id="editdeskripsi" rows="5" name="deskripsi" readonly></textarea>
                </div>

                <div class="mb-3">
                    <label for="statusJob">Status Job</label>
                    <select name="statusJob" id="editstatusJob" class="form-select" aria-label="Default select example">
                        <option selected>Status Job</option>
                        <option value="Progres">Progres</option>
                        <option value="Done">Done</option>
                        <option value="Rejected">Rejected</option>
                    </select>
                </div> 

                <div class="d-none" id="contentEvaluasi">
                    <!-- Deskripsi Progres -->
                    <div class="mb-3">
                        <label for="deskripsiProgres" class="form-label">Progres Description</label>
                        <textarea class="form-control" id="editdeskripsiProgres" rows="5" name="deskripsiProgres" readonly></textarea>
                    </div>
                    <!-- Evaluasi -->
                    <div class="mb-3">
                        <label for="evaluasi" class="form-label">Evaluasi Job</label>
                        <textarea class="form-control" id="editevaluasi" rows="5" name="evaluasi" placeholder="Jika Sesuai Isi Dengan tanda '-'"></textarea>
                    </div>
                </div>

                <div class="card-footer m-2 text-end">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
    
                </form>
            </div>

    </div>
  </div>
</div>
<!-- Modal Detail -->

</div>
<script>
       
       
       

    </script>