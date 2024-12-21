      <!-- Bootstrap core JavaScript-->
      <script src="<?php base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
      <script src="<?php base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

      <!-- Bootstrap -->
      <script src="<?php base_url(); ?>assets/bootstrap/js/bootstrap.js"></script>
      <script src="<?php base_url(); ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>

      <!-- Core plugin JavaScript-->
      <script src="<?php base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

      <!-- Custom scripts for all pages-->
      <script src="<?php base_url(); ?>assets/js/sb-admin-2.min.js"></script>

      <!-- Page level plugins -->
      <script src="<?php base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
      <script src="<?php base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
      
      <!-- MyStyle -->
      
      <script src="<?php base_url() ?>assets/dataTable/jquery.js"></script>
      <script src="<?php base_url() ?>assets/dataTable/jquery.dataTable.min.js"></script>
      <script src="<?php base_url() ?>assets/dataTable/dataTables.bootstrap.js"></script>
      <script src="<?php base_url() ?>assets/dataTable/responsive.table.js"></script>
      <script src="<?php base_url() ?>assets/dataTable/Row.reorder.js"></script>
      <!-- SweetAlert -->
      <script src="<?php base_url() ?>assets/style/sweetalert/sweetalert2.js"></script>
      <script src="<?php base_url() ?>assets/style/sweetalert/sweetalert2.all.min.js"></script>
      
      <script src="<?= base_url(); ?>assets/style/js/myScript.js"></script>
  
      <script>
        // Get Detail Job Description
        function getDetailJob(e, iduser){
          var sendData = { e: e };
           
          if(e == 'Progres'){
            var dataChildProgres = e + 'child';
            
            var sendData = {iduser : iduser};

            $.ajax({ 
                url: 'View/' + dataChildProgres, 
                data: sendData,
                method: 'POST',
                success: function(response) {        
                    $('#content').html(response);
                },
                error: function() {
                  console.log('Terjadi kesalahan saat memuat konten.');
                }
              });
          }else if(e == "Evaluasi"){
            var sendEvaluasi = {e : e, iduser : iduser};
            console.log(sendEvaluasi);
            $.ajax({  
                type: "POST",
                data: sendEvaluasi,
                url: "<?php echo base_url('Administrator/detailProgres'); ?>",
                success: function(response){ 
                    console.log(response.data[0].id);
                    $('#editidJob').val(response.data[0].id);
                    $('#editid_user').val(response.data[0].id_user);
                    $('#editnamaLengkap').val(response.data[0].namaLengkap);
                    $('#editjudulJob').val(response.data[0].judul_job);
                    $("#editstatusJob option[value='"+ response.data[0].status_job +"").prop('selected', true);
                    $('#editdeskripsi').val(response.data[0].deskripsi);
                    $('#editdeskripsiProgres').val(response.data[0].progresDeskripsi);

                    if(response.data[0].status_job == "Done" || response.data[0].status_job == "Rejected"){
                      $('#contentEvaluasi').removeClass('d-none');
                    }else{
                      $('#contentEvaluasi').addClass('d-none');
                    }
                    
                }
            })

          }else{
            console.log("Id User Detail Job Desc = ", e);

              
            $.ajax({  
                type: "POST",
                data: sendData,
                url: "<?php echo base_url('View/detailJob'); ?>",
                success: function(response){

                    console.log(response);

                    $('#id_user').val(response.data['namaLengkap']);
                    $('#judulJob').val(response.data['judul_job']);
                    $('#status_job').val(response.data['status_job']);
                    $('#deskripsi').val(response.data['deskripsi']);
                    $('#tglJob').val(response.data['created_at']);

                    
                }
            })

          }


        }

        $('#ProfileLink').click(function() {
            var value = $(this).attr('value');

            $.ajax({ 
                url: 'View/' + value,
                method: 'POST',
                success: function(response) {        
                    // console.log(response);
                    $('#content').html(response);
                },
                error: function() {
                  console.log('Terjadi kesalahan saat memuat konten.');
                }
              });
      });


        // Single Pages Application (SPA)
    $(document).ready(function() {
      
        // 
        if($('#roleId').attr('value') == 1){
                var value = 'Dashboard';
                
                $.ajax({ 
                    url: 'View/' + value, 
                    method: 'POST',
                    success: function(response) {        
                        $('#content').html(response);
                        console.log("Halaman Dashboard");
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log('Terjadi kesalahan saat memuat konten.');
                        console.log('Status: ' + textStatus);
                        console.log('Error: ' + errorThrown);
                    }
                });

            }else if($('#roleId').attr('value') == 2){
              var value = 'Jobdesc';
                console.log("Aktif");
                $.ajax({ 
                    url: 'View/' + value, 
                    method: 'POST',
                    success: function(response) {        
                        $('#content').html(response);
                    },
                    error: function() {
                    console.log('Terjadi kesalahan saat memuat konten.');
                    }
                });
            }else if($('#roleId').attr('value') == 3){
                var value = 'Progres';
                console.log("Aktif");
                $.ajax({ 
                    url: 'View/' + value, 
                    method: 'POST',
                    success: function(response) {        
                        $('#content').html(response);
                    },
                    error: function() {
                    console.log('Terjadi kesalahan saat memuat konten.');
                    }
                });
                
            }
        });
      </script>


    
  


</body>

</html>