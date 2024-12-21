<div class="d-flex">
    <div id="sidebar" class="">
        <?php $this->load->view('templates/component/sidebar', $user); ?>
    </div>

    <!-- Main -->
    <div id="mainContent" class="col container">
        <!-- Topside -->
        <div id="topSide" class="row shadow-sm">
            <?php $this->load->view('templates/component/topSide', $user); ?>
        </div>

        <div id="roleId" value="<?= $user['roleId'] ?>"></div>

        <!-- Main Content -->
        <div id="content" class="row justify-content-center pt-5">
            <!-- Isi Content Single Page Application -->
        </div>

        <h3>Progres Page</h3>
    </div>
</div>