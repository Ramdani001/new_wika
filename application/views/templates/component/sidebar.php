<div id="header" class="text-center pt-2 border-bottom border-secondary pb-1">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand" href="">
        <div class="sidebar-brand-text mx-3 font-elMess fw-bold fs-1">
            WIKA
            <span class="font-elMess position-absolute" style="font-size: 12px; margin-top: 40px; margin-left: -50px;">
            Intership
        </span>
        </div>
        
    </a>


    <!-- Divider -->
    <hr class="sidebar-divider my-0">
 
    <div class="mt-5">
        <?php if($user['roleId'] == '1'){ ?>
            <ul class="nav flex-column">
                <!-- Dashboard -->
                    <li class="nav-item listMenu" value="Dashboard">
                        <div class="nav-link Dashboard collapsed" value="Dashboard">
                            <i class="fas fa-fw fa-house-circle-check"></i>
                            <span>Dashboard</span>
                        </div>
                    </li>

                <!-- Penugasa Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-briefcase"></i>
                        <span>Penugasan</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <div class="text-start collapse-item listMenu" value="Operator">Operator</div>
                            <div class="text-start collapse-item listMenu" value="Intership">Intership</div>
                                <div class="text-start collapse-item listMenu" value="Penempatan">Penempatan</div>
                            <div class="text-start collapse-item listMenu" value="JobDesc">Job Desc</div>
                        </div>
                    </div>
                </li>
                        
                <!-- Monitoring -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#monitoringCollaps"
                            aria-expanded="true" aria-controls="monitoringCollaps">
                            <i class="fas fa-fw fa-users-viewfinder"></i>
                            <span>Monitoring</span>
                        </a>
                        <div id="monitoringCollaps" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                
                                <div class="text-start collapse-item listMenu" value="Kehadiran">Kehadiran</div>
                                <div class="text-start collapse-item listMenu" value="Progres">Progres</div>
                                <div class="text-start collapse-item listMenu" value="Evaluasi">Evaluasi</div>
                            </div>
                        </div>
                    </li>

                <!-- Galeri -->
                    <li class="nav-item listMenu" value="Galeri">
                        <div class="nav-link Galeri collapsed" value="Galeri">
                            <i class="fas fa-fw fa-images"></i>
                            <span>Galeri</span>
                        </div>
                    </li>

                <!-- Surat -->    
                    <li class="nav-item ">
                        <div class="nav-link SuratBalasan listMenu collapsed" value="SuratBalasan">
                            <i class="fas fa-fw fa-file-invoice"></i>
                            <span>Surat</span>
                        </div>               
                    </li>
                    
                        <li class="nav-item ">
                            <div class="nav-link SuratBalasan listMenu collapsed" value="PageDivisi">
                                <i class="fas fa-fw fa-cog"></i>
                                <span>Divisi</span>
                            </div>               
                        </li>
                        <li class="nav-item ">
                            <div class="nav-link SuratBalasan listMenu collapsed" value="PageQuest">
                                <i class="fa-regular fa-newspaper"></i>
                                <span>Quesioner</span>
                            </div>               
                        </li>
                        <li class="nav-item ">
                            <div class="nav-link SuratBalasan listMenu collapsed" value="PageAns">
                                <i class="fa-regular fa-newspaper"></i>
                                <span>Answer</span>
                            </div>               
                        </li>
            </ul>
        <?php }else if($user['roleId'] == '2') {?>
            <ul class="nav flex-column">
 
                <!-- Penugasa Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Penugasan</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <div class="text-start collapse-item listMenu" value="JobDesc">Job Desc</div>
                        </div>
                    </div>
                </li>
                        
                <!-- Monitoring -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#monitoringCollaps"
                            aria-expanded="true" aria-controls="monitoringCollaps">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>Monitoring</span>
                        </a>
                        <div id="monitoringCollaps" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                
                                <div class="text-start collapse-item listMenu" value="Kehadiran">Kehadiran</div>
                                <div class="text-start collapse-item listMenu" value="Progres">Progres</div>
                                <div class="text-start collapse-item listMenu" value="Evaluasi">Evaluasi</div>
                            </div>
                        </div>
                    </li>

                <!-- Surat -->    
                   
                    
            </ul>
        <?php }else if($user['roleId'] == '3') {?>
            <ul class="nav flex-column">
                <li class="nav-item ">
                    <div class="nav-link Progres listMenu collapsed" value="Progres">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Progres</span>
                    </div>               
                </li>
                <li class="nav-item ">
                    <div class="nav-link SuratBalasan listMenu collapsed" value="SuratBalasan">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Surat</span>
                    </div>               
                </li>
            </ul>
        <?php }?>

    </div>
</div>