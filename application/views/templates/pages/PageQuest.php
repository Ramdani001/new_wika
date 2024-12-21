<div class="container" style="margin-top: -10px;"> 
    <h1>List Quesioner</h1>
</div>

<!-- Tambah -->
<button type="button" class="btn btn-primary mb-2 mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Tambah
</button>

<!-- Modal Add -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Quesioner</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url(); ?>QuestController/insert" method="POST">
                <div class="input-group">
                    <span class="input-group-text">Quesioner</span>
                    <textarea class="form-control" aria-label="With textarea" name="quest" id="quest"></textarea>
                </div>

                <p  class="mt-2">
                    <b>Jenis Jawaban</b>
                </p>

                <div class="d-flex gap-3 -mt-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_jawaban" id="pilihan_ganda" value="1">
                        <label class="form-check-label" for="pilihan_ganda">
                            Pilihan Ganda
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_jawaban" id="text_bebas" value="2">
                        <label class="form-check-label" for="text_bebas">
                            Text Bebas
                        </label>
                    </div>
                </div>

                <!-- Answer -->
                <div id="ganda" class="d-none mt-1">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="">a</span>
                        <input type="text" class="form-control" aria-label="ans_1" name="pl1" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="">b</span>
                        <input type="text" class="form-control" aria-label="ans_2" name="pl2" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="">a</span>
                        <input type="text" class="form-control" aria-label="ans_3" name="pl3" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="">c</span>
                        <input type="text" class="form-control" aria-label="ans_4" name="pl4" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="">e</span>
                        <input type="text" class="form-control" aria-label="ans_5" name="pl5" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="">f</span>
                        <input type="text" class="form-control" aria-label="ans_6   " name="pl6" aria-describedby="basic-addon1">
                    </div>

                    <div class="d-flex gap-2">
                        <p style="font-size: 12px;">
                            Apakah ingin tambah pilihan "<b>Lainnya</b>" ?
                        </p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="lainnya_pil" id="ya" value="1">
                            <label class="form-check-label" for="ya">
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="lainnya_pil" id="tidak" value="2">
                            <label class="form-check-label" for="tidak">
                                Tidak
                            </label>
                        </div>
                    </div>

                </div>
                <!-- Answer -->
                <div class="p-3 d-flex gap-3" style="justify-content: end;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>


    </div>
  </div>
</div>

<!--  -->

<table id="tableQuest" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Quest</th>
            <th>Tanggal Dibuat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
          
    </tbody>
</table>

<script>
    $(document).ready(function() {

        $('#tableQuest').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= base_url('QuestController/GetDataQuest'); ?>",
                "type": "POST"
            },
            "columnDefs": [{
                "target": [-1],
                "orderable": false
            }],
            responsive: true,
        });
    });

    // 
    $('#pilihan_ganda').on('click', function() {
        $('#ganda').removeClass('d-none');
    });

    $('#text_bebas').on('click', function() {
        $('#ganda').addClass('d-none');
    });

</script>