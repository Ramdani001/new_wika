<div class="" style="margin-top: -10px;">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#" style="text-decoration: none; color: black;">Job Description</a>
            </li>
        </ol>
    </nav>
    <div class="container">

        <!-- JobDsc -->
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
                    <button onclick="getDetailJob('Progres', <?= $data->id ?>)" class="btn btn-warning text-light" >
                        Detail
                    </button>
                </div>
            </div>
        <?php } ?>
    </div> 

<!-- Tambah -->

</div>
