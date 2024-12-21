<div class="" style="margin-top: -10px;">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#" style="text-decoration: none; color: black;">Job Description</a>
            </li>
        </ol>
    </nav>
    <div class="container">
        <?php if($user['roleId'] != 3) {?>
            <button class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#tambahModal">
                Tambah
            </button>
        <?php }?>

        <!-- JobDesc -->
        <?php foreach ($jobdesc as $data) { ?>
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
                    <button onclick="getDetailJob(<?= $data->id ?>)" class="btn btn-warning text-light" data-bs-toggle="modal" data-bs-target="#modalDetail">
                        Detail
                    </button>
                </div>
            </div>
        <?php } ?>
    </div>

<!-- Tambah -->

<!-- Modal Detail -->
<div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="modalDetailLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="modalDetailLabel">Job Description</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" placeholder="Nama Lengkap" name="id_user" id="id_user" readonly>
            </div>

            <div class="mb-3">
                <label for="judulJob" class="form-label">Tittle Job</label>
                <input type="text" class="form-control" id="judulJob" placeholder="Judul Job Desc" name="judulJob" readonly>
            </div>
            
            <div class="mb-3">
                <label for="status_job" class="form-label">Status Job</label>
                <input type="text" class="form-control" id="status_job" placeholder="Status Job" name="status_job" readonly>
            </div>

            <div class="mb-3">
                <label for="tglJob" class="form-label">Tanggal Job</label>
                <input type="text" class="form-control" id="tglJob" placeholder="Tanggal Job" name="tglJob" readonly>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Description Job</label>
                <textarea class="form-control" id="deskripsi" rows="5" name="deskripsi" readonly></textarea>
            </div>
        </div>
    </div>
  </div>
</div>
<!-- Modal Detail -->

<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="tambahModalLabel">Job Description</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?php base_url(); ?>View/InserJob" method="post">
            <div class="mb-3">
                <label for="idUser" class="form-label">Nama</label>
                <select class="form-select" aria-label="Default select example" id="idUser" name="id_user">
                    <option selected>NIM/NRP</option>
                        <?php foreach ($getUser as $data) { ?>
                            <?php if($user['roleId'] != 1) {?>
                                <?php if($user['divisi'] == $data->divisi) {?>
                                    <option value="<?= $data->id ?>"><?= $data->namaLengkap ?></option>
                                <?php } ?>
                            <?php }else{?>
                                <option value="<?= $data->id ?>"><?= $data->namaLengkap ?></option>
                            <?php } ?>
                        <?php }?>
                    </select>
            </div>

            <div class="mb-3">
                <label for="judulJob" class="form-label">Tittle Job</label>
                <input type="text" class="form-control" id="judulJob" placeholder="Judul Job Desc" name="judulJob">
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Description Job</label>
                <textarea class="form-control" id="deskripsi" rows="5" name="deskripsi"></textarea>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </div>
        </form>
    </div>
  </div>
</div>
<!-- Tambah Tambah -->
</div>
