<div class="container" style="margin-top: -10px;"> 
    <h1>List Quesioner</h1>
</div>

<!-- Tambah -->
<button type="button" class="btn btn-primary mb-2 mt-3" data-bs-toggle="modal" data-bs-target="#modalQuest" id="addModal">
  Tambah
</button>

<!-- Modal Add -->
<div class="modal fade" id="modalQuest" tabindex="-1" aria-labelledby="modalQuestLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalQuestLabel">Add Quesioner</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" id="form_id">
            <input type="hidden" name="id_quest" id="id_quest">
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
                        <input type="text" class="form-control" aria-label="ans_1" name="pl1"  id="pl1" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="">b</span>
                        <input type="text" class="form-control" aria-label="ans_2" name="pl2" id="pl2" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="">a</span>
                        <input type="text" class="form-control" aria-label="ans_3" name="pl3" id="pl3" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="">c</span>
                        <input type="text" class="form-control" aria-label="ans_4" name="pl4" id="pl4" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="">e</span>
                        <input type="text" class="form-control" aria-label="ans_5" name="pl5" id="pl5" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="">f</span>
                        <input type="text" class="form-control" aria-label="ans_6   " name="pl6" id="pl6" aria-describedby="basic-addon1">
                    </div>

                    <div class="d-flex gap-2">
                        <p style="font-size: 12px;">
                            Apakah ingin tambah pilihan "<b>Lainnya</b>" ?
                        </p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="lainnya_pil" id="lainnya_ya" value="1">
                            <label class="form-check-label" for="ya">
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="lainnya_pil" id="lainnya_tidak" value="2">
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

<!-- Small Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteModalLabel">Delete Quest!</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <h6>
                Anda Yakin ingin menghapus Quesioner?
            </h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-danger" id="btnDelete">Hapus</button>
      </div>


    </div>
  </div>
</div>
<!-- Small Modal -->


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
    
    $('#addModal').on('click', function() {

        $('#form_id').attr('action', '<?= base_url(); ?>QuestController/insert');

        $('#modalQuestLabel').text('Add Quesioner');

        $('#quest').text('');

        if($('#pilihan_ganda').is(':checked')){
            $('#pilihan_ganda').prop('checked', false);
        }

        if($('#text_bebas').is(':checked')){
            $('#text_bebas').prop('checked', false);
        }

        if($('#lainnya_ya').is(':checked')){
            $('#lainnya_ya').prop('checked', false);
        }

        if($('#lainnya_tidak').is(':checked')){
            $('#lainnya_tidak').prop('checked', false);
        }

        $('#ganda').addClass('d-none');
        $('#id_quest').val("");

        for($i = 1; $i<=6; $i++){
            $('#pl'+$i).val('');
        }


    });

    function getDataQuest(id){
        var dataToSend = { id : id};

        // Show Modal
        $('#modalQuest').modal('show');

        // Change Title Modal
        $('#modalQuestLabel').text('Update Quesioner');

        $('#form_id').attr('action', '<?= base_url(); ?>QuestController/update');

        // Get data
        $.ajax({
            type: "POST",
            data: dataToSend,
            url: "<?= base_url('QuestController/getEditQuest'); ?>",
            success: function(response){
                console.log(response);

                let data = response.getDataQuest;

                $('#quest').text(data.quest);
                $('#id_quest').val(data.id_quest);

                var temp = new Array();

                temp = JSON.parse(data.ganda);

                temp.forEach((element, index) => {
                    $('#pl'+ (index +1)).val(element);
                });

                console.log(temp);

                if(data.text_bebas == 0){
                    $('#pilihan_ganda').click();
                }else{
                    $('#text_bebas').click();
                }

                if(data.lainnya == 1){
                    $('#lainnya_ya').click();
                }else{
                    $('#lainnya_tidak').click();
                }

            }
        })


    }

    function deleteQuest(id){
        console.log(id);
        var dataToSend = { id : id};

        $('#deleteModal').modal('show');

        $('#btnDelete').on('click', function() {
            // alert("Hapus");
            $.ajax({
            type: "POST",
            data: dataToSend,
            url: "<?= base_url('QuestController/deleteQuest'); ?>",
            success: function(response){
                console.log(response);
                if(response == 200){
                    alert("Data Berhasil Dihapus!");

                    location.reload(true);

                }
            }
        })
        });


    }

</script>