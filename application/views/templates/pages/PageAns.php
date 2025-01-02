<div class="container" style="margin-top: -10px;"> 
    <h1>List Answer</h1>
</div>

<!-- Modal Add -->
<div class="modal fade" id="modalQuest" tabindex="-1" aria-labelledby="modalQuestLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalQuestLabel">Add Quesioner</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="bodyModal">
        
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

<table id="tableAns" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tanggal Dibuat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
          
    </tbody> 
</table>

<script>

    

    $(document).ready(function() {
        $('#tableAns').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= base_url('AnswerController/GetDataAns'); ?>",
                "type": "POST"
            },
            "columnDefs": [{
                "target": [-1],
                "orderable": false
            }], 
            responsive: true,
        });
    });

    function getDataAnswer(id){
        
        var dataToSend = { id : id};

        $.ajax({
            type: "POST",
            data: dataToSend,
            url: "<?= base_url('AnswerController/getAnswer'); ?>",
            success: function(response){

                let data = response.getDataQuest;
                
                var temp = new Array();
                
                temp = JSON.parse(data.answer);
                

                var no = 1;
                var keys = Object.keys(temp).sort((a, b) => a - b); // Urutkan key secara numerik

                keys.forEach(key => {
                    var datSend = { id: key };
                    $.ajax({
                        type: "POST",
                        data: datSend,
                        url: "<?= base_url('AnswerController/getViewQuest'); ?>",
                        success: function(response) {
                            console.log(datSend.id);

                            // Buat elemen soal dan jawaban
                            var soal = document.createElement("p");
                            var ans = document.createElement("b");
                            soal.textContent = no + ". " + response.getQuest.quest;
                            ans.textContent = "Jawaban : " + temp[key];

                            // Gunakan jQuery's append untuk menambahkan elemen ke dalam #bodyModal
                            $('#bodyModal').append(soal);
                            $('#bodyModal').append(ans);

                            no++;
                        }
                    });
                });


                $('#modalQuest').modal('show');

            }
        })

    }

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

</script>