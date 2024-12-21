<div class="container">
    <!-- Edit -->
        <div class="card mx-auto d-none" style=" " id="formEditUser">
            <div class="card-body">
                <form action="<?= base_url(); ?>Administrator/updateProfile" method="post" enctype="multipart/form-data">
                    <input type="text" class="d-none form-control mb-2" placeholder="NIM / NRP" name="idUser" id="idUser">
                    <label for="">NIM / NRP</label>
                    <input type="text" class="form-control mb-2" placeholder="NIM / NRP" name="nim" id="nim">

                    <label for="">Nama Lengkap</label>
                    <input type="text" class="form-control mb-2" placeholder="Nama Lengkap" name="namaLengkap" id="namaLengkap">

                    <label for="">Alamat Email</label>
                    <input type="text" class="form-control mb-2" placeholder="Alamat Email" name="email" id="email">

                    <label for="">No Telepon / Whatsapp</label>
                    <input type="text" class="form-control mb-2" placeholder="No Telepon / WhatsApp" name="noTelp" id="noTelp">

                    <label for="">Jurusan / Kompetensi</label>
                    <input type="text" class="form-control mb-2" placeholder="Jurusan / Kompetensi" name="jurusan" id="jurusan">

                    <label for="">Unit Kerja / Divisi</label>
                    <input type="text" class="form-control mb-2" placeholder="Penempatan Unit Kerja/Divisi" name="divisi" id="divisi" readonly>

                    <label for="">Status Akun</label>
                    <input type="text" class="form-control mb-2" placeholder="Status Akun" name="isActive" id="isActive" readonly>

                    <input type="text" class="d-none form-control mb-2" placeholder="Profile" name="old_profile" id="old_profile">

                    <label for="">Foto Profile</label>
                    <input type="file" class="form-control mb-2" placeholder="Profile" name="gambarProfil" id="gambarProfil">
                    <div class="mx-auto d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary me-3" id="btnKembaliUser">Kembali</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    <!-- View -->
    <div class="card mx-auto" style="width: 50%;" id="modalProfile">
        <div class="card-body">
           <div class="d-flex justify-content-center">
                <img id="gambarProfile" name="gambarProfile" alt="" width="150" height="150" class="object-fit-cover rounded-circle">
           </div>
           <div class="mt-3">
                    <div class="row gap-2">
                        <div class="col d-flex flex-column mb-2">
                            <span class=""> NIM / NRP : </span>    
                            <input type="text" class="bg-white p-0 border-0 col form-control" placeholder="NIM / NRP" name="nim" id="viewnim" readonly>
                        </div>
                        <div class="col d-flex flex-column mb-2">
                            <span class=""> Nama Lengkap : </span>
                            <input type="text" class="bg-white p-0 border-0 col form-control" placeholder="Nama Lengkap" name="namaLengkap" id="viewnamaLengkap" readonly>
                        </div>
                    </div>
                    <div class="row gap-2">
                        <div class="col d-flex flex-column mb-2">
                            <span class=""> Alamat Email : </span>
                            <input type="text" class="bg-white p-0 border-0 col form-control" placeholder="Alamat Email" name="email" id="viewemail" readonly>
                        </div>
                        <div class="col d-flex flex-column mb-2">
                            <span class=""> No Telepon : </span>
                            <input type="text" class="bg-white p-0 border-0 col form-control" placeholder="No Telepon / WhatsApp" name="noTelp" id="viewnoTelp" readonly>
                        </div>
                    </div>
                    <div class="row gap-2 mb-2">
                        <div class="col d-flex flex-column mb-2">
                            <span class=""> Jurusan : </span>
                            <input type="text" class="bg-white p-0 border-0 form-control" placeholder="Jurusan / Kompetensi" name="jurusan" id="viewjurusan" readonly>
                        </div>
                        <div class="col d-flex flex-column mb-2">
                            <span class=""> Divisi</span>
                            <input type="text" class="bg-white p-0 border-0 form-control" placeholder="Divisi" name="divisi" id="viewdivisi" readonly>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col d-flex flex-column mb-2">
                            <span class=""> Status Akun : </span>
                            <input type="text" class="bg-white p-0 border-0 form-control" placeholder="Status Akun" name="isActive" id="viewisActive" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <button class="col btn btn-primary w-full" id="btnChangeUpdate">Update</button>
                    </div>
           </div>
        </div>
    </div>
</div> 
<script>
    
    $('#btnKembaliUser').on('click', function() {
        console.log("Button Kembali Di Klik");
        $('#formEditUser').addClass('d-none');
        $('#modalProfile').removeClass('d-none');
    });
    
    $('#btnChangeUpdate').on('click', function() {
        console.log('Button Change Update');
        $('#formEditUser').removeClass('d-none');
        $('#modalProfile').addClass('d-none');
    });
    $(document).ready(function() {
        
        $.ajax({ 
          url: 'View/Profile',
          method: 'POST',
          success: function(response) {        
              // console.log(response);
              console.log(response);

              $statusAkun = response.getProfile.isActive;
              if($statusAkun == 1){
                $statusAkun = "Aktif";
              }else{
                $statusAkun = "Tidak Aktif";
              }

              $('#viewnim').val(response.getProfile.nim);
              $('#viewnamaLengkap').val(response.getProfile.namaLengkap);
              $('#viewemail').val(response.getProfile.email);
              $('#viewnoTelp').val(response.getProfile.noTelp);
              $('#viewjurusan').val(response.getProfile.jurusan);
              $('#viewdivisi').val(response.getProfile.namaDivisi);
              
              //   Form Update User
              $('#idUser').val(response.getProfile.id);
              $('#nim').val(response.getProfile.nim);
              $('#namaLengkap').val(response.getProfile.namaLengkap);
              $('#email').val(response.getProfile.email);
              $('#noTelp').val(response.getProfile.noTelp);
              $('#jurusan').val(response.getProfile.jurusan);
              $('#divisi').val(response.getProfile.namaDivisi);
              $('#isActive').val($statusAkun);
              $('#old_profile').val(response.getProfile.profile);

              
              $('#viewisActive').val($statusAkun);

              $('#gambarProfile').attr('src', '<?= base_url(); ?>assets/img/user/' + response.getProfile.profile);

          },
          error: function() {
            console.log('Terjadi kesalahan saat memuat konten.');
          }
        });
    });

</script>