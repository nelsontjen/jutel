<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">JuTel</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <!-- <li class="nav-item active"> 
    <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li> -->

    <!-- Divider -->
    <!-- <hr class="sidebar-divider"> -->

    <!-- Heading -->
    <!-- <div class="sidebar-heading">
    Interface
</div> -->

    <!-- Divider -->

    <!-- query menu  -->
    <?php
    $id_role = $this->session->userdata('role_id');
    $queryMenu = "SELECT `user_menu`.`id`,`menu` from `user_menu` join `user_access_menu` on `user_menu`.`id` = `user_access_menu`.`menu_id`
    WHERE `user_access_menu`.`role_id` = $id_role ORDER BY `user_access_menu`.`menu_id` ASC";
    $menu = $this->db->query($queryMenu)->result_array();
    // var_dump($menu);die;
    ?>


    <!-- Loop -->
    <?php foreach ($menu as $mUser) : ?>
        <div class="sidebar-heading">
            <?= $mUser['menu'] ?>
        </div>
        <?php
        $idMenu = $mUser['id'];
        $querySubMenu = "SELECT * from `user_sub_menu` JOIN `user_menu` 
    on `user_sub_menu`.`menu_id` = `user_menu`.`id`
    WHERE `user_sub_menu`.`menu_id` = $idMenu AND `user_sub_menu`.`is_active`=1";
        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>
        <?php foreach ($subMenu as $subMUser) : ?>
            <?php if ($title == $subMUser['title']) : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif ?>
                <a class="nav-link" href="<?= base_url($subMUser['url']); ?>">
                    <i class="<?= $subMUser['icon'] ?>"></i>
                    <span><?= $subMUser['title'] ?></span></a>
                </li>
            <?php endforeach ?>
            <hr class="sidebar-divider">
        <?php endforeach ?>

        <!-- Nav Item - Pages Collapse Menu -->
        <!-- <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Menu Selection</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Category :</h6>
                    <a class="collapse-item" href="login.html">Indonesian</a>
                    <a class="collapse-item" href="login.html">Chinese</a>
                    <a class="collapse-item" href="register.html">Italian</a>
                    <a class="collapse-item" href="forgot-password.html">Western</a>
                </div>
            </div>
        </li> -->

        <!-- Nav Item - Charts -->
        <!-- <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Menu</span></a>
        </li> -->


</ul>
<!-- End of Sidebar -->