<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>">

</div>

<div class="bg-primary bg-login">
    <div class="container bgForm-login w-full d-flex shadow-md">
        <div class="leftContent container p-5">
            <div class="text-center">
                <img src="<?= base_url(); ?>assets/img/Logo.png" alt="" width="100">
                <h5 class="font-elMess fs-5 mt-1 fw-semibold">Intership</h5> 
            </div>
            <form action="<?= base_url(); ?>Login" method="POST" class="mt-5">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" value="<?= set_value('email') ?>">

                    <!-- Pesan Error -->
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>

                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                </div>

                <div class="d-flex justify-content-between mt-2">
                    <div>
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember" class="font-elMess">Remember Me</label>
                    </div>
                    <div>
                        <a href="#" class="font-elMess"> Forget Password </a>
                    </div>
                </div>

                <div class="mt-5 text-center">
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Login</button>
                    <label for="" class="mt-2">
                        Belum Memiliki Akun? <a class="text-primary" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#modalRegister">Register</a>
                    </label>
                </div>
                
            </form>
        </div>
        <div class="rightContent container d-none d-lg-block">
            <div class="text-end mt-5">
                <h6 class="fw-bold">New Update Available</h6>
                <p class="fw-light" style="font-size: 16px !important; color: #A7A7A7!important;">
                    We have some new <br> awesome features
                </p>
                <a href="https://wikaikon.co.id/en.html" target="_blank" class="fw-bold btnLearn">
                    Learn More
                </a>
            </div>
            <div class="mt-4">
                <img src="<?= base_url(); ?>assets/img/bgRightLogin.png" alt="" width="542">
            </div>
        </div>
    </div>
</div>

<!-- Modal Register -->
<div class="modal fade" id="modalRegister" tabindex="-1" aria-labelledby="modalRegister" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-3 col-md-1">
                        <img src="<?= base_url(); ?>assets/img/Logo.png" alt="" width="60">
                    </div>
                    <div class="col-9 col-md-11 fs-3 font-elMess fw-bold">
                        Register Intership
                    </div>
                </div>
           </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url(); ?>Login/auth_regist" method="POST">
        
            <!-- NIM/NIS -->
            <div class="input-group flex-nowrap mb-2">
                <span class="input-group-text" id="basic-addon1">
                    <i class="fa-solid fa-file-signature"></i>
                </span>
                    <input type="text" name="nim" class="form-control" placeholder="Masukan NIM/NRP" aria-label="nim" required aria-describedby="basic-addon1" value="<?= set_value('nim') ?>" >
            </div>

            <!-- Nama Lengkap -->
            <div class="input-group flex-nowrap mb-2">
                <span class="input-group-text" id="basic-addon1">
                    <i class="fa-solid fa-file-signature"></i>
                </span>
                    <input type="text" name="namaLengkap" class="form-control" placeholder="Nama Lengkap" aria-label="NamaLengkap" required aria-describedby="basic-addon1" value="<?= set_value('namaLengkap') ?>" >
            </div>
 
            <!-- Email -->
            <div class="input-group flex-nowrap mb-2">
            <span class="input-group-text" id="basic-addon1">
                <i class="fa-solid fa-envelope"></i>
            </span>
                <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email" required aria-describedby="basic-addon1" >
            </div>

            <!-- noTelp -->
            <div class="input-group flex-nowrap mb-2">
            <span class="input-group-text" id="basic-addon1">
                <i class="fa-solid fa-phone"></i>
            </span>
                <input type="text" name="noTelp" class="form-control" placeholder="No Telepon/Whatsapp" aria-label="noTelp" required aria-describedby="basic-addon1" value="<?= set_value('noTelp') ?>">
            </div>

            <!-- Password -->
            <div class="input-group flex-nowrap mb-2">
            <span class="input-group-text" id="basic-addon1">
                <i class="fa-solid fa-key"></i>
            </span>
                <input type="text" name="password" class="form-control" placeholder="Password" aria-label="password" required aria-describedby="basic-addon1">
            </div>

            <!-- Alamat Rumah -->
            <div class="form-floating mb-2">
                <textarea class="form-control" name="alamatRumah" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 80px" value="<?= set_value('alamatRumah') ?>" required></textarea>
                <label for="floatingTextarea2">Alamat Rumah</label>
            </div>

            <!-- Asal Sekolah -->
            <div class="input-group flex-nowrap mb-2">
            <span class="input-group-text" id="basic-addon1">
                <i class="fa-solid fa-building-columns"></i>
            </span>
                <input type="text" name="asalSekolah" class="form-control" placeholder="Asal Sekolah/Universitas" aria-label="asalSekolah" required aria-describedby="basic-addon1" value="<?= set_value('asalSekolah') ?>">
            </div>

            <!-- Jurusan -->
            <div class="input-group flex-nowrap mb-2">
            <span class="input-group-text" id="basic-addon1">
                <i class="fa-solid fa-book-open-reader"></i>
            </span>
                <input type="text" name="jurusan" class="form-control" placeholder="Jurusan/Prodi" aria-label="jurusan" required aria-describedby="basic-addon1" value="<?= set_value('jurusan') ?>">
            </div>

            <!-- Jurusan -->
            <div class="input-group flex-nowrap mb-2">
            <span class="input-group-text" id="basic-addon1">
                <i class="fa-solid fa-book-open-reader"></i>
            </span>
                <select name="statusUser" id="statusUser" class="form-control">
                    <option value="" selected>Status User</option>
                    <option value="Mahasiswa" >Mahasiswa</option>
                    <option value="Siswa" >Siswa</option>
                    <option value="Guru" >Guru</option>
                </select>
                
            </div>

            <div>
                <p> 
                    <a href="<?= base_url(); ?>quesioner" target="_blank">Quesioner Link</a>
                </p>
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">BATAL</button>
        <button type="submit" class="btn btn-primary">DAFTAR</button>
      </div>
      </form>
    </div>
  </div>
</div>